<?php

define('RECAPTCHA_V3_SECRET_KEY','6LfxK6UZAAAAAF2T74p2STF7AV4Ve6-R3AvJvNWu');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$res = verifyReCaptchaV3();
	
	if($res['success']){
		
		$fullname = $_POST['fullname'];
		
		$username = $_POST['username'];
		
		$password = $_POST['password'];
		
		$g_recaptcha_response = $_POST['g-recaptcha-response'];
		
		// REGISTER YOUR USER IN YOUR DATABASE WITH VALIDATION
		
		// CODE HERE
		
		// REGISTER YOUR USER IN YOUR DATABASE WITH VALIDATION
		
		// RETURN JSON RESPONSE
		$json = [
			'status' 	=> true,
			'message' 	=> 'Registration Successfull. Hello, Mr. ' . $fullname,
			'reCaptchaResponse' => $res,
		];
	}else{
		
		$json['status'] = false;
		$json['message'] = 'There is some error. Please try again.';
	
	}
	
	echo json_encode($json);
	
}


function verifyReCaptchaV3(){
	$site_verify_url = "https://www.google.com/recaptcha/api/siteverify";
	
	$data = [
		'secret' => constant('RECAPTCHA_V3_SECRET_KEY'),
		'response' => $_POST['g-recaptcha-response'],
		// 'remoteip' => $_SERVER['REMOTE_ADDR']
	];

	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);

	$context  = stream_context_create($options);
	
	$response = file_get_contents($site_verify_url, false, $context);

	$res = json_decode($response, true);
	
	return $res;
}
?>