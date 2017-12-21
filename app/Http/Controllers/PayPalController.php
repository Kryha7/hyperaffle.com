<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\PayPalTransaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use DB;

//-------------------------
//All Paypal Details class
//-------------------------
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

class PayPalController extends Controller
{
private $_api_context;
public function __construct()
{
//------------------------
//setup PayPal api context
//------------------------
$paypal_conf = \Config::get('paypal');
$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
$this->_api_context->setConfig($paypal_conf['settings']);

}

public function addPayment()
{
return view('addPayment');
}

public function postPaymentWithpaypal(Request $request)
{
    \Session::put('tickets',$request->get('amount'));

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$item_1 = new Item();

$item_1->setName('Item 1') //item name
->setCurrency('USD')
->setQuantity(1)
->setPrice($request->get('amount')); //unit price

 $item_list = new ItemList();
$item_list->setItems(array($item_1));

$amount = new Amount();
$amount->setCurrency('USD')
->setTotal($request->get('amount'));

$transaction = new Transaction();
$transaction->setAmount($amount)
->setItemList($item_list)
->setDescription('Your transaction description');

$redirect_urls = new RedirectUrls();
$redirect_urls->setReturnUrl(URL::route('status')) //Specify return URL
->setCancelUrl(URL::route('status'));

$payment = new Payment();
$payment->setIntent('Sale')
->setPayer($payer)
->setRedirectUrls($redirect_urls)
->setTransactions(array($transaction));

try
{
$payment->create($this->_api_context);
}
catch (\PayPal\Exception\PPConnectionException $ex)
{
if (\Config::get('app.debug'))
{
\Session::put('error','Connection timeout');
return Redirect::route('addPayment');
}
else
{
\Session::put('error','Some error occur, sorry for inconvenient');
return Redirect::route('addPayment');
}
}

foreach($payment->getLinks() as $link)
{
if($link->getRel() == 'approval_url')
{
$redirect_url = $link->getHref();
break;
}
}

//--------------------------
// add payment ID to session
//--------------------------
Session::put('paypal_payment_id', $payment->getId());

if(isset($redirect_url))
{
//-------------------
// redirect to paypal
//-------------------
return Redirect::away($redirect_url);
}

\Session::put('error','Unknown error occurred');
return Redirect::route('addPayment');
}

public function getPaymentStatus()
{
//----------------------------------------
// Get the payment ID before session clear
//----------------------------------------
$payment_id = Session::get('paypal_payment_id');

//-----------------------------
// clear the session payment ID
//-----------------------------
Session::forget('paypal_payment_id');
if (empty(\Illuminate\Support\Facades\Input::get('PayerID')) || empty(\Illuminate\Support\Facades\Input::get('token')))
{
\Session::put('error','Payment failed');
return Redirect::route('addPayment');
}
$payment = Payment::get($payment_id, $this->_api_context);

$execution = new PaymentExecution();
$execution->setPayerId(\Illuminate\Support\Facades\Input::get('PayerID'));

        //---Execute the payment ---//
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

        //----------------
        // Here Write your database logic like that insert record or value in database if you want
        //----------------

            $pptransaction = new PayPalTransaction();
            $pptransaction->payment_id = $payment->id;
            $pptransaction->user_id = Auth::user()->id;
            $pptransaction->tickets_amount = \Session::get('tickets');

            $pptransaction->save();

            $user = User::where('id', Auth::user()->id)->first();
            $user->tickets = $user->tickets+\Session::get('tickets');
            $user->save();

            \Session::forget('tickets');



            \Session::put('success','Payment success');

            return Redirect::route('addPayment');
        }
            \Session::put('error','Payment failed');
            return Redirect::route('addPayment');
    }
}