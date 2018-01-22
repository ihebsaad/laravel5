<?php

require './moneris/lib/Moneris.php';
//require './moneris/examples/mpgClasses.php';

if (isset ( $_POST["cvv"]) && isset ( $_POST["creditCard"]) && isset ( $_POST["cardholder"]) && isset ( $_POST["emonth"]) && isset ( $_POST["eyear"]) && isset ( $_POST["totalc"])) 
	{
		$expyear = strtotime($_POST["eyear"]);
		$nexpyear = date("y", $expyear);
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
                'order_id' => 'iristel-or-'.date("dmy-G:i:s").rand(pow(10, $digits-1), pow(10, $digits)-1),
                //'order_id' => 'testorderhs',
                'amount' => $_POST["totalc"],
                'expiry_month' => $_POST["emonth"],
                //'expiry_month' => '05',
                'expiry_year' => $nexpyear
                //'expiry_year' => '18'
            );


            $result = $moneris->purchase($params);
            $transaction = $result->transaction();

            
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
               //exit(),
        }


	} else
	{
		echo 'empty';
	}
?>