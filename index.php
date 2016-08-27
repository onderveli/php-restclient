<?php

$user = "admin";
$password = "onderveli";

require_once 'Pest.php';
$pest = new Pest('https://restoranapi.herokuapp.com/api/');
	$messagedata = array(
    'name' => $user,
    'password' => $password
		);	
	$messagejson = $pest->post('/authenticate', $messagedata);
	$messagearray = json_decode($messagejson,true);
	$token = $messagearray['token'];
	$curl_headers = array();
	$curl_headers[] = 'x-access-token:'.$token;
	$test1=$pest->get('/users', null ,$curl_headers);
	print_r($test1);
?>