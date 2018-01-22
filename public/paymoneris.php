<?php

//require './moneris/lib/Moneris.php';
require './moneris/examples/mpgClasses.php';

if (isset ( $_POST["cvv"]) && isset ( $_POST["creditCard"]) && isset ( $_POST["cardholder"]) && isset ( $_POST["emonth"]) && isset ( $_POST["eyear"])) 
	{
		/*try {
			$moneris = Moneris::create(
			    array(
			        'api_key' => 'yesguy',
			        'store_id' => 'store1',
			        'environment' => Moneris::ENV_TESTING,
			        // optional:
			        'require_avs' => false, // default: false
			        'require_cvd' => false
			    ));
            $params = array(
                'cc_number' => $_POST["creditCard"],
                'order_id' => 'iristel-or' . date("dmy-G:i:s"),
                //'order_id' => 'testorderhs',
                'amount' => '2196.00',
                'expiry_month' => $_POST["emonth"],
                'expiry_year' => $_POST["eyear"]
            );
            $result = $moneris->purchase($params);
            $transaction = $result->transaction();

            if ($result->was_successful()) {
            	$trnum = $transaction->number();
            	echo $_POST["cvv"].' // '.$_POST["creditCard"].' // '.$_POST["cardholder"].' // '.$_POST["emonth"].' // '.$_POST["eyear"];
            exit("transaction was successful ". $trnum);

            } else {
                $errors[] = $result->error_message();
                print_r($errors);
                exit();

            }

        } catch (Moneris_Exception $e) {
                $errors[] = $e->getMessage();
        }
        */
        $store_id='store5';
$api_token='yesguy';

/************************* Transactional Variables ****************************/

$type='purchase';
$cust_id='cust id';
$order_id='iristel-or' . date("dmy-G:i:s");
$amount='177.00';
$pan=$_POST["creditCard"];
$expiry_date=$_POST["emonth"].$_POST["eyear"];
$crypt='7';
$dynamic_descriptor='123';
$status_check = 'false';

/*********************** Transactional Associative Array **********************/

$txnArray=array('type'=>$type,
     		    'order_id'=>$order_id,
     		    'cust_id'=>$cust_id,
    		    'amount'=>$amount,
   			    'pan'=>$pan,
   			    'expdate'=>$expiry_date,
   			    'crypt_type'=>$crypt,
   			    'dynamic_descriptor'=>$dynamic_descriptor
   		       );

/**************************** Transaction Object *****************************/

$mpgTxn = new mpgTransaction($txnArray);

/****************************** Request Object *******************************/

$mpgRequest = new mpgRequest($mpgTxn);
$mpgRequest->setProcCountryCode("CA"); //"US" for sending transaction to US environment
$mpgRequest->setTestMode(true); //false or comment out this line for production transactions

/***************************** HTTPS Post Object *****************************/

/* Status Check Example
$mpgHttpPost  =new mpgHttpsPostStatus($store_id,$api_token,$status_check,$mpgRequest);
*/

$mpgHttpPost  =new mpgHttpsPost($store_id,$api_token,$mpgRequest);

/******************************* Response ************************************/

$mpgResponse=$mpgHttpPost->getMpgResponse();

print("\nCardType = " . $mpgResponse->getCardType());
print("\nTransAmount = " . $mpgResponse->getTransAmount());
print("\nTxnNumber = " . $mpgResponse->getTxnNumber());
print("\nReceiptId = " . $mpgResponse->getReceiptId());
print("\nTransType = " . $mpgResponse->getTransType());
print("\nReferenceNum = " . $mpgResponse->getReferenceNum());
print("\nResponseCode = " . $mpgResponse->getResponseCode());
print("\nISO = " . $mpgResponse->getISO());
print("\nMessage = " . $mpgResponse->getMessage());
print("\nIsVisaDebit = " . $mpgResponse->getIsVisaDebit());
print("\nAuthCode = " . $mpgResponse->getAuthCode());
print("\nComplete = " . $mpgResponse->getComplete());
print("\nTransDate = " . $mpgResponse->getTransDate());
print("\nTransTime = " . $mpgResponse->getTransTime());
print("\nTicket = " . $mpgResponse->getTicket());
print("\nTimedOut = " . $mpgResponse->getTimedOut());
print("\nStatusCode = " . $mpgResponse->getStatusCode());
print("\nStatusMessage = " . $mpgResponse->getStatusMessage());


	} else
	{
		echo 'empty';
	}
?>