<?php

require __DIR__ . '/../vendor/autoload.php';

use Yengec\Cargo\Client;
use Yengec\Cargo\Requests\Config;
use Yengec\Cargo\Requests\RequestConfig;

$cargoService = new Config();
$cargoService->setHepsijet(
    'yengec_integration',
    'admin123',
    'YNGC_IZM',
    '1',
    'Yengeç'
);

$requestConfig = new RequestConfig(
    'test',
    'tr',
    'hepsijet',
    $cargoService
);

$id = 'YNC123456789';

$client = new Client($requestConfig);

$query = $client->test(
    $requestConfig,
);


dd($query);
