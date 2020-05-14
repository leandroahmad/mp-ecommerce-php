<?php

//print_r($_POST);
require __DIR__ .  '/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
// $url = '/v1/payments/'.$_GET['collection_id'];
// $respuesta = MercadoPago\SDK::get($url);
// $respuesta = $respuesta['body']['payment_method_id'];
// var_dump($respuesta);
// die();

$url = '/v1/payments/'.$_GET['collection_id'];
$respuesta = MercadoPago\SDK::get($url);

if($respuesta['body']['status'] == 'approved'){
	echo '<p><b>Pago exitoso</b></p>';

	$payment_method_id = $respuesta['body']['payment_method_id'];
	$monto_pagado = $respuesta['body']['transaction_details']['total_paid_amount'];
	$numero_de_orden = $respuesta['body']['external_reference'];
	$id_de_pago = $respuesta['body']['id'];

	echo '<p>payment_method_id: '.$payment_method_id.'</p>';
	echo '<p>monto_pagado: '.$monto_pagado.'</p>';
	echo '<p>numero_de_orden: '.$numero_de_orden.'</p>';
	echo '<p>id_de_pago: '.$id_de_pago.'</p>';

	$id = $_GET['collection_id'];
	//Mostrar payment_method_id, monto pagado, numero de orden del pedido, ID de pago
	// echo '<p>payment_method_id: '.$_POST['']

}

if($respuesta['body']['status'] == 'pending' || $respuesta['body']['status'] == 'in_process'){
	echo 'Pago en proceso';
}

if($respuesta['body']['status'] == 'failure'){
	echo 'Pago rechazado';
}