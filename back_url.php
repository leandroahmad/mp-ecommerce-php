<?php

//print_r($_POST);
require __DIR__ .  '/vendor/autoload.php';
MercadoPago\SDK::setAccessToken('APP_USR-2663259158662105-042420-9db17e1e9c9486ac5fd5fbfdb6ffd3ff-349885057');
// $url = '/v1/payments/'.$_GET['collection_id'];
// $respuesta = MercadoPago\SDK::get($url);
// $respuesta = $respuesta['body']['payment_method_id'];
// var_dump($respuesta);
// die();

$url = '/v1/payments/'.$_GET['collection_id'];
$respuesta = MercadoPago\SDK::get($url);

if($_GET['status'] == 'success' && $respuesta['body']['status'] == 'approved'){
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

if($_GET['status'] == 'success' && $respuesta['body']['status'] != 'approved'){
	echo 'Intento de fraude';
}

if($_GET['status'] == 'pending'){
	echo 'Pago en proceso';
}

if($_GET['status'] == 'failure'){
	echo 'Pago rechazado';
}