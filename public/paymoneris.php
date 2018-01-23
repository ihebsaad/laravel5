<?php

require './moneris/lib/Moneris.php';
require './moneris/examples/mpgClasses.php';

if (isset ( $_POST["cvv"]) && isset ( $_POST["creditCard"]) && isset ( $_POST["cardholder"]) && isset ( $_POST["emonth"]) && isset ( $_POST["eyear"]) && isset ( $_POST["totalc"])) 
	{
		$expyear = strtotime($_POST["eyear"]);
		$nexpyear = date("y", $expyear);
		$digits = 3;
		try {
			$moneris = Moneris::create(
			    array(
			        'api_key' => 'yesguy',
			        'store_id' => 'store5',
			        'environment' => Moneris::ENV_TESTING,
			        // optional:
			        'require_avs' => false, // default: false
			        'require_cvd' => true,
			        'cvd_codes' => array('M', 'Y', 'P', 'S', 'U') 
			    ));
            $params = array(
                'cc_number' => $_POST["creditCard"],
                //'cc_number' => '4242424242424242',
                'order_id' => 'iristel-or-'.date("dmy-G:i:s").rand(pow(10, $digits-1), pow(10, $digits)-1),
                //'order_id' => 'testorderhs',
                //'amount' => $_POST["totalc"],
                'amount' => '10.10',
                'expiry_month' => $_POST["emonth"],
                //'expiry_month' => '05',
                'expiry_year' => $nexpyear
                //'expiry_year' => '18'
            );

            // without CVD AVS
            
            /*$result = $moneris->purchase($params);
            $transaction = $result->transaction();

            
            if ($result->was_successful()) {
            	$trnum = $transaction->number();
            exit($trnum);

            } else {
                $errors[] = $result->error_message();
                print_r($errors);
                exit();

            }*/
			
            // verify card
            //  https://developer.moneris.com/Documentation/NA/E-Commerce%20Solutions/API/Card%20Verification?lang=php
            $txnArray=array(
				'type'=>'purchase',
       			'order_id'=>'iristel-or-'.date("dmy-G:i:s").rand(pow(10, $digits-1), pow(10, $digits)-1),
       			'amount'=>'10.10',
       			'pan'=>$_POST["creditCard"],
       			'expdate'=>'0818',
       			'crypt_type'=>'7'
          		);
            $cvdTemplate = array(
					 'cvd_indicator' => '1',
                     'cvd_value' => $_POST["cvv"]
                    );
            $mpgCvdInfo = new mpgCvdInfo ($cvdTemplate);
            $mpgTxn = new mpgTransaction($txnArray);
            $mpgTxn->setCvdInfo($mpgCvdInfo);
            $mpgRequest = new mpgRequest($mpgTxn);
			$mpgRequest->setProcCountryCode("CA"); 
			$mpgRequest->setTestMode(true);
			$mpgHttpPost  =new mpgHttpsPost('store5','yesguy',$mpgRequest);
			$mpgResponse=$mpgHttpPost->getMpgResponse();

			//print_r($mpgResponse);
			//echo "\nITDResponse = " . $mpgResponse->getITDResponse();
			echo 'here we are';

           /* 
			// method 1
            $errors = array();
			$purchase_result = $moneris->purchase($params);
			

			if ($purchase_result->was_successful() && ( $purchase->failed_avs() || $purchase_result->failed_cvd() )) {
				$errors[] = $purchase_result->error_message();
				$void = $moneris->void($purchase_result->transaction());
				// print errors
				print_r($errors);
			} else if (! $purchase_result->was_successful()) {
				$errors[] = $purchase_result->error_message();
				// print errors
				print_r($errors);
			} else {
				// success
				$transaction = $purchase_result->transaction();
				$trnum = $transaction->number();
            	exit($trnum);
			}*/

			/*
			// method 2
			$errors = array();
			$verification_result = $moneris->verify($params);

			if ($verification_result->was_successful() && $verification_result->passed_avs() && $verification_result->passed_cvd()) {
				
				$purchase_result = $moneris->purchase($params);
				$transaction = $purchase_result->transaction();

				if ($purchase_result->was_successful()) {
					$trnum = $transaction->number();
            		exit($trnum);
            		//exit('success');
				} else {
					$errors[] = $purchase_result->error_message();
					print_r($errors);
				}
				
			} */


        } catch (Moneris_Exception $e) {
                $errors[] = $e->getMessage();
                print_r($errors);
               //exit(),
        }


	} else
	{
		echo 'empty';
	}
?>