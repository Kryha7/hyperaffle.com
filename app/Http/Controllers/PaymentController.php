<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayPalTransaction;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use DB;

//All Paypal Details class

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaymentController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        //Setup PayPal api context
        $paypal_config = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_config['client_id'], $paypal_config['secret']));
        $this->_api_context->setConfig($paypal_config['settings']);
    }

    public function tickets()
    {
        return view('tickets');
    }

    public function postPayment(Request $request)
    {
        \Session::put('tickets', $request->get('tickets'));

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($request->get('name'))->setCurrency('USD')->setQuantity(1)->setPrice($request->get('amount'));

        $item_list = new ItemList();
        $item_list->setItems(array($item));

        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($item_list)->setDescription($request->get('description'));

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)->setTransactions(array($transaction));

        try
        {
            $payment->create($this->_api_context);
        }
        catch (\PayPal\Exception\PPConnectionException $ex)
        {
            if (\Config::get('app.debug'))
            {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('tickets');
            }
            else
            {
               \Session::put('error', 'Some error occur, sorry for inconvenient');
               return Redirect::route('tickets');
            }
        }

        foreach ($payment->getLinks() as $link)
        {
            if ($link->getRel() == 'approval_url')
            {
                $redirect_url = $link->getHref();
                break;
            }
        }

        //add payment id to session
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url))
        {
            //redirect to paypal
            return Redirect::away($redirect_url);
        }

        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('tickets');
    }

    public function getPaymentStatus()
    {
        //get the payment id before session clear
        $payment_id = Session::get('paypal_payment_id');

        //clear the session payment id
        Session::forget('paypal_payment_id');
        if (empty(\Illuminate\Support\Facades\Input::get('PayerID')) || empty(\Illuminate\Support\Facades\Input::get('token')))
        {
            \Session::put('error', 'Payment failed');
            return Redirect::route('tickets');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId(\Illuminate\Support\Facades\Input::get('PayerID'));

        //execute the payment
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved')
        {
            //database logic
            $PayPalTransaction = new PayPalTransaction();
            $PayPalTransaction->payment_id = $payment_id;
            $PayPalTransaction->user_id = Auth::user()->id;
            $PayPalTransaction->tickets_amount = \Session::get('tickets');
            $PayPalTransaction->save();

            $user = User::where('id', Auth::user()->id)->first();
            $user->tickets = $user->tickets + \Session::get('tickets');
            $user->save();

            \Session::forget('tickets');
            \Session::put('success', 'Payment success');

            return Redirect::route('tickets');
        }

        \Session::put('error', 'Payment failed');
        return Redirect::route('tickets');
    }
}
