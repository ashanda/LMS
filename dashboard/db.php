<?php

	$server = "localhost";
	$username = "root";
	$pass = "123";
	$db = "123";

	//create connection 

	$conn = mysqli_connect($server,$username,$pass,$db);
	if($conn->connect_error){

		die ("Connection Failed!". $conn->connect_error);
	}
	
    $main_db=mysqli_query($conn,"SELECT * FROM lmsdb WHERE id=1");
	$main_db_resalt=mysqli_fetch_array($main_db);
	$dbname = $main_db_resalt['dbname'];
	$udbname = $main_db_resalt['username'];
	$dbpassword = $main_db_resalt['password'];


	$setting=mysqli_query($conn,"SELECT * FROM settings WHERE id=1");
	$setting_resalt=mysqli_fetch_array($setting);
	$reg_prefix = $setting_resalt['reg_prefix'];
	$application_name = $setting_resalt['application_name'];
	$main_logo = $setting_resalt['main_logo'];

	function send_sms($receiver_number,$messsage)
    {
		$conn = mysqli_connect("localhost","root","123","123");
		$sms=mysqli_query($conn,"SELECT * FROM lmssms WHERE id=1");
		$sms_resalt=mysqli_fetch_array($sms);
		$sender_id = $sms_resalt['sender_id'];
		$sa_token = $sms_resalt['sa_token'];
        

        $api_link = 'https://sms.send.lk/api/v3/sms/send';
        $mask = $sender_id;
        $api_key = $sa_token;
        $number = $receiver_number;   //Receiver Number
        $messsage = $messsage;        //SENDING MESSAGE සිංහල / தமிழ் / English

        $msgdata = array("recipient"=>$number, "sender_id"=>$mask, "message"=>$messsage);


			
			$curl = curl_init();
			
			//IF you are running in locally and if you don't have https/SSL. then uncomment bellow two lines
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
			
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $api_link,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => json_encode($msgdata),
			  CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"authorization: Bearer $api_key",
				"cache-control: no-cache",
				"content-type: application/x-www-form-urlencoded",
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			}
    }


	$payment_getway=mysqli_query($conn,"SELECT * FROM lmsgetway WHERE id=1");
	$getway_resalt=mysqli_fetch_array($payment_getway);
	$app_id = $getway_resalt['app_id'];
	$hash_salt = $getway_resalt['hash_salt'];
	$a_token = $getway_resalt['a_token'];

	$lmsurl=mysqli_query($conn,"SELECT * FROM lmsurl WHERE id=1");
	$lmsurl_resalt=mysqli_fetch_array($lmsurl);
	$url = $lmsurl_resalt['url'];
?>