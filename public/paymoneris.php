<?php

require './moneris/lib/Moneris.php';
//require './moneris/examples/mpgClasses.php';

if (isset ( $_POST["cvv"]) && isset ( $_POST["creditCard"]) && isset ( $_POST["cardholder"]) && isset ( $_POST["emonth"]) && isset ( $_POST["eyear"]) && isset ( $_POST["totalc"])) 
	{
		//$expyear = 
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
                //'cc_number' => '4242424242424242',
                'order_id' => 'iristel-or-'.date("dmy-G:i:s"),
                //'order_id' => 'testorderhs',
                'amount' => $_POST["totalc"],
                //'expiry_month' => $_POST["emonth"],
                'expiry_month' => '05',
                //'expiry_year' => $_POST["eyear"]
                'expiry_year' => '18'
            );


            $result = $moneris->purchase($params);
            $transaction = $result->transaction();

            // was it a successful transaction?
			// any response code greater than 49 is an error code:
			/*if ((int) $moneris->ResponseCode >= 50 || (int) $moneris->ResponseCode == 0) {
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
			}*/

            if ($result->was_successful()) {
            	$trnum = $transaction->number();
            	//echo $_POST["cvv"].' // '.$_POST["creditCard"].' // '.$_POST["cardholder"].' // '.$_POST["emonth"].' // '.$_POST["eyear"];
            	//echo '<script>$scope.formParams.transaction=$trnum
            exit($trnum);

            } else {
                $errors[] = $result->error_message();
                print_r($errors);
                exit();

            }

        } catch (Moneris_Exception $e) {
                $errors[] = $e->getMessage();
        }


	} else
	{
		echo 'empty';
	}
?>