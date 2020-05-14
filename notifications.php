<?php

//print_r($_POST);
require __DIR__ .  '/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
// $url = '/v1/payments/'.$_GET['collection_id'];
// $respuesta = MercadoPago\SDK::get($url);
// $respuesta = $respuesta['body']['payment_method_id'];
// var_dump($respuesta);
// die();


//IPN
if(isset($_GET['id']) && isset($_GET['topic'])){
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
}

//WEBHOOK
if(isset($_POST["id"]) && isset($_POST["type"])){
	//Acá la documentación no es clara. En una parte dice que el ID va en $_POST["data"]["id"] y en otra parte $_POST["id"]. No llegamos con el tiempo para chequearlo a mano.
	$id = $_POST["data"]["id"];
	$type = $_POST["type"];


	if($type == 'payment'){
		$url = '/v1/payments/'.$id;
		$respuesta = MercadoPago\SDK::get($url);


		echo '<p>Notificacion recibida</p>';

		if($respuesta['body']['status'] == 'approved'){
			//Hacer algo con la notificacion
			echo '<p>Entregar productos</p>';
		}
	}
}