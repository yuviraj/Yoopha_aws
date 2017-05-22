<?php
$DOCROOTPATH = $_SERVER['DOCUMENT_ROOT'];
$DOCROOTBASEPATH = dirname($_SERVER['DOCUMENT_ROOT']);
	
$predictionURL = 'https://www.swiggy.com/api/place/autocomplete?input=';

$input = $_GET['input'];


if(isset($input) && strlen($input) >= 3) {
	$url = $predictionURL . $input;
	echo curlCall($url, '', 'GET');
} else {
	echo 'null';
}

function curlCall($varCurlUrl, $varPostMessage = false, $reqType){
	//echo $varCurlUrl;
	$ch  = curl_init();
  	curl_setopt($ch, CURLOPT_URL, $varCurlUrl);
  	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  	if($reqType == 'POST'){
	  	curl_setopt($ch,CURLOPT_POSTFIELDS,$varPostMessage);
  	}
  	if($reqType == 'PUT'){
  		curl_setopt($ch,CURLOPT_POSTFIELDS,$varPostMessage);
  		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $reqType);
  	} else if($reqType == 'DELETE'){
  		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $reqType);
  	}
  	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    	'Content-Type: application/json',
	    	'authorization: Token 56c313f1db983c4694aed1d1')
		);
  	$ResponseId = curl_exec($ch);
  	//curl_close($ch);
  	return $ResponseId;
}

?>