<?php

require __DIR__ . '/../vendor/autoload.php';

use Yengec\Cargo\Client;
use Yengec\Cargo\Requests\Config;
use Yengec\Cargo\Requests\Query\OrderCollection;
use Yengec\Cargo\Requests\RequestConfig;

$cargoService = new Config();
$cargoService->setHepsijet(
    username: 'yengec_integration',
    password: 'admin123',
    companyCode: 'YNGC_IZM',
    warehouseId: '1',
    companyName: 'Yengeç'
);

$requestConfig = new RequestConfig(
    mode: 'test',
    language: 'tr',
    service: 'hepsijet',
    config: $cargoService
);

$id = 'YNC123456789';

$client = new Client($requestConfig);
$queryOrders = new OrderCollection();

$queryOrders->add(orderIdentity: $id);

$query = $client->query(
    requestConfig: $requestConfig,
    orders: $queryOrders
);


dd($query);
