<?php

require './moneris/lib/Moneris.php';
//require './moneris/examples/mpgClasses.php';

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
			        'require_cvd' => true
			    ));
            $params = array(
                'cc_number' => $_POST["creditCard"],
                //'cc_number' => '4242424242424242',
                'order_id' => 'iristel-or-'.date("dmy-G:i:s").rand(pow(10, $digits-1), pow(10, $digits)-1),
                //'order_id' => 'testorderhs',
                'amount' => $_POST["totalc"],
                'expiry_month' => $_POST["emonth"],
                //'expiry_month' => '05',
                'expiry_year' => $nexpyear
                //'expiry_year' => '18'
            );

            // without CVD AVS
            /*
            $result = $moneris->purchase($params);
            $transaction = $result->transaction();

            
            if ($result->was_successful()) {
            	$trnum = $transaction->number();
            exit($trnum);

            } else {
                $errors[] = $result->error_message();
                print_r($errors);
                exit();

            }
			*/
            // verify card
            //  https://developer.moneris.com/Documentation/NA/E-Commerce%20Solutions/API/Card%20Verification?lang=php
            /*$cvdTemplate = array(
					 'cvd_indicator' => '1',
                     'cvd_value' => $_POST["cvv"]
                    );
            $mpgCvdInfo = new mpgCvdInfo ($cvdTemplate);
            $mpgTxn = new mpgTransaction($txnArray);
            $mpgTxn->setCvdInfo($mpgCvdInfo);
            $mpgRequest = new mpgRequest($mpgTxn);
			$mpgRequest->setProcCountryCode("CA"); 
			$mpgRequest->setTestMode(true);
			$mpgHttpPost  =new mpgHttpsPost('store5','yesguy',$mpgRequest);*/

            $errors = array();
			$purchase_result = $moneris->purchase($params);
			$transaction = $purchase_result->transaction();

			if ($purchase_result->was_successful() || $purchase_result->failed_cvd() ) {
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
				$trnum = $transaction->number();
            	exit($trnum);
			}

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