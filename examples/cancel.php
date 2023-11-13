<?php

require __DIR__ . '/../vendor/autoload.php';

use Yengec\Cargo\Client;
use Yengec\Cargo\Requests\Config;
use Yengec\Cargo\Requests\RequestConfig;

$cargoService = new Config();
$cargoService->setHepsijet(
    'yengec_integration',
    'admin123',
    '1',
    'Yengeç',
    'YNGC_IZM',
    'testaddress'
);

$requestConfig = new RequestConfig(
    'test',
    'tr',
    'hepsijet',
    $cargoService
);

$id = 'ync-21232';

$client = new Client($requestConfig);
$cancel = new \Yengec\Cargo\Requests\CancelRequest($requestConfig, $id);

$client->cancel(
    $requestConfig,
    $id
);
