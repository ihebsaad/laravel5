
<?php
require './moneris/examples/mpgClasses.php';
/**************************** Request Variables *******************************/

$store_id = 'store5';
$api_token = 'yesguy';

/********************************* Recur Variables ****************************/
$recurUnit = 'day';
$startDate = date('Y/m/d',strtotime('+30 days',strtotime(date("Y/m/d")))) . PHP_EOL; // after 30 days from today date
$numRecurs = '99';
$recurInterval = '30';
$recurAmount = '31.00';
$startNow = 'true';

/************************* Transactional Variables ****************************/

$orderId = 'recurIristel-'.date("dmy-G:i:s");
$custId = 'heythemtest';
$creditCard = '654654';
$nowAmount = '50.00';
$expiryDate = '0918';
$cryptType = '7';

/*********************** Recur Associative Array **********************/

$recurArray = array('recur_unit'=>$recurUnit, // (day | week | month)
					'start_date'=>$startDate, //yyyy/mm/dd
					'num_recurs'=>$numRecurs,
					'start_now'=>$startNow,
					'period' => $recurInterval,
					'recur_amount'=> $recurAmount
					);

$mpgRecur = new mpgRecur($recurArray);

/*********************** Transactional Associative Array **********************/

$txnArray=array('type'=>'purchase',
				'order_id'=>$orderId,
				'cust_id'=>$custId,
				'amount'=>$nowAmount,
				'pan'=>$creditCard,
				'expdate'=>$expiryDate,
				'crypt_type'=>$cryptType
				);

/**************************** Transaction Object *****************************/

$mpgTxn = new mpgTransaction($txnArray);

/****************************** Recur Object *********************************/

$mpgTxn->setRecur($mpgRecur);

/************************ Request Object ******************************/ 
		 
		$mpgRequest = new mpgRequest($mpgTxn); 
		 
		/*********************** HTTPS Post Object ****************************/ 
		 
		$mpgHttpPost  =new mpgHttpsPost($store_id,$api_token,$mpgRequest); 
		 
		/*************************** Response *********************************/ 
		 
		$mpgResponse=$mpgHttpPost->getMpgResponse(); 

		$respcode = $mpgResponse->getResponseCode();

		if ((int)$respcode < 50)
		{ print($mpgResponse->getTxnNumber()); }
		else
		{
			echo '</br>';
			print($mpgResponse->getResponseCode());
			echo '</br>ERROR:';
			print($mpgResponse->getMessage());
		}
?>

     