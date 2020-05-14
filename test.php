<?php

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

$root_path = 'https://'.$_SERVER['HTTP_HOST'];

// Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = [];
$item['title'] = 'Mi producto';
$item['quantity'] = 1;
$item['unit_price'] = 75.56;
$preference->items = array($item);
$preference->save();

print_r($preference);