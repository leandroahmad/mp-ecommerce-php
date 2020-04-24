<?php

//print_r($_POST);
require __DIR__ .  '/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-2663259158662105-042420-9db17e1e9c9486ac5fd5fbfdb6ffd3ff-349885057');
// $url = '/v1/payments/'.$_GET['collection_id'];
// $respuesta = MercadoPago\SDK::get($url);
// $respuesta = $respuesta['body']['payment_method_id'];
// var_dump($respuesta);
// die();

$id = $_GET['id'];
$topic = $_GET['topic'];


if($topic == 'payment'){
	$url = '/v1/payments/'.$_GET['id'];
	$respuesta = MercadoPago\SDK::get($url);


	echo '<p>Notificacion recibida</p>';

	if($respuesta['body']['status'] == 'approved'){
		//Hacer algo con la notificacion
		echo '<p>Entregar productos</p>';
	}
}