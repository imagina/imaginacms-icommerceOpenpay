<?php

/**
* Get Payment Method Configuration
* @return collection
*/

if (!function_exists('openpayGetConfiguration')) {

 	function openpayGetConfiguration(){

        $paymentName = config('asgard.icommerceopenpay.config.paymentName');
        $attribute = array('name' => $paymentName);
        $paymentMethod = app("Modules\Icommerce\Repositories\PaymentMethodRepository")->findByAttributes($attribute); 
        
        return $paymentMethod;
    }

}

/**
* Encript url to reedirect
* @param  $orderID
* @param  $transactionID
* @return $url
*/
if (!function_exists('openpayEncriptUrl')) {

     function openpayEncriptUrl($orderID,$transactionID){

        $url = "{$orderID}-{$transactionID}";
        $encrip = base64_encode($url);

        return  $encrip;

    }
}

/**
* Decript url to get data   
* @param  $eUrl
* @return array
*/
if (!function_exists('openpayDecriptUrl')) {

    function openpayDecriptUrl($eUrl){

        $decrip = base64_decode($eUrl);
        $infor = explode('-',$decrip);
        
        return  $infor;

    }
}

/**  
* @param  $eUrl
* @return array
*/
if (!function_exists('openpayIsProductionMode')) {

    function openpayIsProductionMode($mode){

        $isProduction = false;
        if($mode!='sandbox')
            $isProduction = true;

        return $isProduction;

    }
}

/**
* Get Order Reference Commerce
* @param $order
* @param $transaction
* @return reference
*/
if (!function_exists('openpayGetOrderRefCommerce')) {

    
    function openpayGetOrderRefCommerce($order){

        $reference = $order->id; //Just testing
        return $reference;
    }

}

/**
* Decript url to get data   
* @param  $eUrl
* @return array
*/
if (!function_exists('openpayGetOrderDescription')) {

    function openpayGetOrderDescription($order){

        $description = "Orden #{$order->id} - {$order->first_name} {$order->last_name}";
        
        return  $description;

    }
}

