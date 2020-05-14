<?php

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

$root_path = 'https://'.$_SERVER['HTTP_HOST'];

// Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

//Info del ejemplo
$buyer = [
	'name' => 'Lalo',
	'surname' => 'Landa',
	'phone' => [
		'area_code' => '011',
		'number' => '22223333'
	],
	'identification' => [
		'type' => 'DNI',
		'number' => '22333444',
	],
	'address' => [
		'street_name' => 'False',
		'street_number' => '123',
		'zip_code' => '1111'
	],
	'email' => 'test_user_63274575@testuser.com',
];

$url_imagen = $_POST['img'];
$url_imagen = str_replace('./', '/', $url_imagen);
$url_imagen = $root_path . $url_imagen;

$producto = [
	'id' => '1234',
	'title' => $_POST['title'],
	'description' => 'Dispositivo móvil de Tienda e-commerce',
	'picture_url' => $url_imagen,
	'currency_id' => 'ARS',
	'quantity' => 1,
	'unit_price' => 75.56
];
$empresa = 'Tienda e-commerce';
$external_reference = 'ABCD1234';

//Forma de pago
//Hasta 6 cuotas
//Sin AMEX ni ATM
$payment_methods = [
	'excluded_payment_methods' => [
		['id' => 'amex']
	],
	'excluded_payment_types' => [
		['id' => 'atm']
	],
	'installments' => 6
];

$url_success = $root_path.'/back_url?status=success';
$url_pending = $root_path.'/back_url?status=pending';
$url_failure = $root_path.'/back_url?status=failure';

$back_urls = [
	'success' => $url_success,
	'pending' => $url_pending,
	'failure' => $url_failure,
];

//$producto = [];
//$producto['title'] = 'Mi producto';
//$producto['quantity'] = 1;
//$producto['unit_price'] = 75.56;


$preference->items = array($producto);
// $preference->buyer = $buyer;
// $preference->external_reference = $external_reference;
// $preference->payment_methods = $payment_methods;
// $preference->back_urls = $back_urls;
// $preference->auto_return = 'all';
$preference->save();

print_r($preference);

die();

$data = [
	'title' => $_POST['title'],
	'img' => $_POST['img'],
	'price' => $_POST['price'],
	'unit' => $_POST['unit'],
];

var_dump($data);

die();