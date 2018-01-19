<?php

require '/moneris/lib/Moneris.php';

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
                'amount' => '20.00',
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
		//echo $_POST["cvv"].' // '.$_POST["creditCard"].' // '.$_POST["cardholder"].' // '.$_POST["emonth"].' // '.$_POST["eyear"];

	} else
	{
		echo 'empty';
	}
?>