<?php

require './moneris/lib/Moneris.php';
//require './moneris/examples/mpgClasses.php';

if (isset ( $_POST["cvv"]) && isset ( $_POST["creditCard"]) && isset ( $_POST["cardholder"]) && isset ( $_POST["emonth"]) && isset ( $_POST["eyear"])) 
	{
		try {
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

            // was it a successful transaction?
			// any response code greater than 49 is an error code:
			if ((int) $moneris->ResponseCode >= 50 || (int) $moneris->ResponseCode == 0) {
				// trying to make some sense of this... grouping them as best as I can:
				switch ($moneris->ResponseCode) {
					// ...
					case '481':
					case '483':
						$this->error_code(Moneris_Result::ERROR_DECLINED);
						break;
					// ...
				}
				return $this->was_successful(false);
			}

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
        
/*$store_id='store1';
$api_token='yesguy';



$type='purchase';
$cust_id='cust id';
$order_id='iristel-or' . date("dmy-G:i:s");
$amount='177.00';
$pan='4242424242424242';
$expiry_date='1808';
$crypt='8';
$dynamic_descriptor='123';
$status_check = 'false';



$txnArray=array('type'=>$type,
     		    'order_id'=>$order_id,
     		    'cust_id'=>$cust_id,
    		    'amount'=>$amount,
   			    'pan'=>$pan,
   			    'expdate'=>$expiry_date,
   			    'crypt_type'=>$crypt,
   			    'dynamic_descriptor'=>$dynamic_descriptor
   		       );


$mpgTxn = new mpgTransaction($txnArray);


$mpgRequest = new mpgRequest($mpgTxn);
$mpgRequest->setProcCountryCode("CA"); 
$mpgRequest->setTestMode(true); */



/* Status Check Example
$mpgHttpPost  =new mpgHttpsPostStatus($store_id,$api_token,$status_check,$mpgRequest);
*/
/*
$mpgHttpPost  =new mpgHttpsPost($store_id,$api_token,$mpgRequest);


$mpgResponse=$mpgHttpPost->getMpgResponse();*/
/*
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
print("\nStatusMessage = " . $mpgResponse->getStatusMessage());*/
/*$msgresp = $mpgResponse->getReferenceNum();
print_r($msgresp);*/


	} else
	{
		echo 'empty';
	}
?>