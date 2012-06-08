<?php


/**
 * Description of payment gateway
 *
 * 
 */
class Payment {

    //put your code here

    private static $PaypalEmail   = 'paypal@example.com';
    
    
//        $paypal_email = 'paypal@example.com';
//        $return_url = 'http://wls2.zerocall.com/b2c.php/';
//        $cancel_url = 'http://wls2.zerocall.com/b2c.php/payments/reject';
//        $notify_url = 'http://wls2.zerocall.com/b2c.php/payments/confirmpayment?order_id='.$order_id.'&amount='.$item_amount;
    
    public static function SendPayment($querystring,$environment){
        
        $querystring .= "?business=".urlencode(self::$PaypalEmail)."&";
        
        if($environment!='live'){
            $paypalUrl = '';
        }else{
            $paypalUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        }
        
        header($paypalUrl.$querystring);
    }
}
?>
