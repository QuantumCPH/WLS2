<?php


/**
 * Description of payment gateway
 *
 * 
 */
class Payment {

    //put your code here

    private static $PaypalEmail   = 'paypal@example.com';
    
    public static function SendPayment($querystring,$environment){
        
        $querystring = "?business=".urlencode(self::$PaypalEmail)."&".$querystring;
        
        if($environment=='live'){
            $paypalUrl = '';
        }else{
            $paypalUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        }
        die($paypalUrl.$querystring);
        header("Location:".$paypalUrl.$querystring);
        exit();
    }
}
?>
