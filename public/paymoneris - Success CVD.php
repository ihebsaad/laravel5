<?php 
## ## This program takes 3 arguments from the command line: ## 1. Store id ## 2. api token ## 3. order id ## ## Example php -q TestPurchase-Efraud.php store1 45728773 45109 ## 
require './moneris/examples/mpgClasses.php';
if (isset ( $_POST["cvv"]) && isset ( $_POST["creditCard"]) && isset ( $_POST["cardholder"]) && isset ( $_POST["emonth"]) && isset ( $_POST["eyear"]) && isset ( $_POST["totalc"])) 
	{
		$expyear = strtotime($_POST["eyear"]);
		$nexpyear = date("y", $expyear);
		$expmonth = $_POST["emonth"];
		if (strlen($expmonth) == 1)
		{
			$expmonth = sprintf("%02d", $expmonth);
		}
		$digits = 3; 
		/************************ Request Variables ***************************/ 
		 
		$store_id='store5'; $api_token='yesguy'; 
		 
		/********************* Transactional Variables ************************/ 
		 
		$type='purchase'; 
		$order_id='iristelOR-'.date("dmy-G:i:s").rand(pow(10, $digits-1), pow(10, $digits)-1); 
		$cust_id=$_POST["cardholder"]; 
		$amount='10.50'; 
		//$amount=$_POST["totalc"];
		//$pan='4242424242424242'; 
		$pan=$_POST["creditCard"]; 
		//$expiry_date='0818';  //December 2008 
		$expiry_date=$expmonth.$nexpyear; 
		$crypt='7'; 
		 
		/************************** AVS Variables *****************************/ 
		 /*
		$avs_street_number = '201'; $avs_street_name = 'Michigan Ave'; $avs_zipcode = 'M1M1M1'; $avs_email = 'test@host.com'; $avs_hostname = 'www.testhost.com'; $avs_browser = 'Mozilla'; $avs_shiptocountry = 'Canada'; $avs_merchprodsku = '123456'; 
		$avs_custip = '192.168.0.1'; $avs_custphone = '5556667777'; */
		 
		/************************** CVD Variables *****************************/ 
		 
		$cvd_indicator = '1'; $cvd_value = $_POST["cvv"]; 
		 
		/********************** AVS Associative Array *************************/ 
		 /*
		$avsTemplate = array('avs_street_number'=>$avs_street_number,                      'avs_street_name' =>$avs_street_name,                      'avs_zipcode' => $avs_zipcode,                      'avs_hostname'=>$avs_hostname,       'avs_browser' =>$avs_browser,       'avs_shiptocountry' => $avs_shiptocountry, 
		 

		 
		      'avs_merchprodsku' => $avs_merchprodsku,       'avs_custip'=>$avs_custip,       'avs_custphone' => $avs_custphone                     ); */
		 
		/********************** CVD Associative Array *************************/ 
		 
		$cvdTemplate = array('cvd_indicator' => $cvd_indicator,'cvd_value' => $cvd_value); 
		 
		/************************** AVS Object ********************************/ 
		 /*
		$mpgAvsInfo = new mpgAvsInfo ($avsTemplate); */
		 
		/************************** CVD Object ********************************/ 
		 
		$mpgCvdInfo = new mpgCvdInfo ($cvdTemplate); 
		 
		/***************** Transactional Associative Array ********************/ 
		 
		$txnArray=array( 	'type'=>$type,
				           'order_id'=>$order_id,           
				           'cust_id'=>$cust_id,           
				           'amount'=>$amount,           
				           'pan'=>$pan,           
				           'expdate'=>$expiry_date,           
				           'crypt_type'=>$crypt
				                        ); 
		/********************** Transaction Object ****************************/ 
		 
		$mpgTxn = new mpgTransaction($txnArray); 
		 
		/************************ Set AVS and CVD *****************************/ 
		 
		//$mpgTxn->setAvsInfo($mpgAvsInfo); 
		$mpgTxn->setCvdInfo($mpgCvdInfo); 
		 
		/************************ Request Object ******************************/ 
		 
		$mpgRequest = new mpgRequest($mpgTxn); 
		 
		/*********************** HTTPS Post Object ****************************/ 
		 
		$mpgHttpPost  =new mpgHttpsPost($store_id,$api_token,$mpgRequest); 
		 
		/*************************** Response *********************************/ 
		 
		$mpgResponse=$mpgHttpPost->getMpgResponse(); 
		 
		/*print("\nCardType = " . $mpgResponse->getCardType()); print("\nTransAmount = " . $mpgResponse->getTransAmount()); print("\nTxnNumber = " . $mpgResponse->getTxnNumber()); print("\nReceiptId = " . $mpgResponse->getReceiptId()); print("\nTransType = " . $mpgResponse->getTransType()); print("\nReferenceNum = " . $mpgResponse->getReferenceNum()); print("\nResponseCode = " . $mpgResponse->getResponseCode()); print("\nISO = " . $mpgResponse->getISO()); print("\nMessage = " . $mpgResponse->getMessage()); print("\nAuthCode = " . $mpgResponse->getAuthCode()); print("\nComplete = " . $mpgResponse->getComplete()); print("\nTransDate = " . $mpgResponse->getTransDate()); print("\nTransTime = " . $mpgResponse->getTransTime()); print("\nTicket = " . $mpgResponse->getTicket()); print("\nTimedOut = " . $mpgResponse->getTimedOut()); 
		//print("\nAVSResponse = " . $mpgResponse->getAvsResultCode()); 
		print("\nCVDResponse = " . $mpgResponse->getCvdResultCode()); print("\nITDResponse = " . $mpgResponse->getITDResponse()); */
		print($mpgResponse->getTxnNumber());
 }
 else
	{
		echo 'empty';
	}
?> 