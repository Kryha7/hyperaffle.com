<?php
return [
    /* set your paypal credential */
    'client_id' =>'AYwl9nNFqUG1ikaQdvI6xL2zOuzquoMiztV0bZuPP0kpTtj0XA3yn1nfhNwyd6-C2oPSyFW2-ud14qxG',
    'secret' => 'EBBrHdxv-bWpsrS0862PWfVaTXU-sd2UqELn3L4x9kM2w05jVxwcrPbu8s5beU6KCXg06srKOhQhK02f',
    /*
     * SDK configuration
     */
    'settings' => array(
        /*
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /*
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 1000,
        /*
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /*
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /*
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
];