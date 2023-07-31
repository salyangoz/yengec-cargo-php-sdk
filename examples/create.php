<?php

require __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;
use Yengec\Cargo\Client;
use Yengec\Cargo\Requests\Config;
use Yengec\Cargo\Requests\Create\Billing;
use Yengec\Cargo\Requests\Create\Order;
use Yengec\Cargo\Requests\Create\OrderCollection;
use Yengec\Cargo\Requests\Create\OrderItem;
use Yengec\Cargo\Requests\Create\OrderItemCollection;
use Yengec\Cargo\Requests\Create\OrderSender;
use Yengec\Cargo\Requests\Create\WareHouse;
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

// burada da kargo servisinin hangi ortamda çalışacağını ve servisin kendisini de belirtiyoruz.
$requestConfig = new RequestConfig(
    'test',
    'tr',
    'hepsijet',
    $cargoService
);


// Burada kargoya verilecek olan ürünleri belirtiyoruz.
$orderItemCollection = new OrderItemCollection();

$orderItemCollection->add(new OrderItem(
    'Yengeç Ürün',
    1,
    100,
    '123456789',
    1,
));

// Şimdi kargoların içeriğini belirleyelim.
$orders =  new OrderCollection();

$orders->add(
    new Order(
        'ync-2662202', // Bu siparişin benzersiz kimliği
        'Yengeç', // Alıcı adı
        'Yengeç Adres', // Alıcı adresi
        '05555555555', // Alıcı telefonu
        'İstanbul', // Alıcı şehri
        'Kadıköy', // Alıcı ilçesi
        'yengec_test@yengec.co', // Alıcı emaili
        Carbon::createFromFormat('d/m/Y', '28/04/2023'), // Kargo gönderim tarihi
        'TR', // Alıcı ülke kodu
        'TRY', // Alıcı para birimi
        100, // Alıcı toplam tutarı
        'KARGO', // Kargo gönderim yöntemi
        'SATIS',
        'HX_STD', // Kargo gönderim yöntemi. hepsijet için zorunlu.
        '34700',
        new OrderSender(
            'Yengeç',
            "Yengeç Adres",
            "İstanbul",
            "Kadıköy",
            "TR",
            "123456789",
            "05555555555",
            "123456789",
            "123456789",
            "123456789",
        ),
        $orderItemCollection,
        '123456789',
        '123456789',
        'Yengeç Kargo Açıklama',
        new Billing(
            'Yengeç',
            '05555555555',
            'Yengeç Adres',
            '34700',
            'Kadıköy',
            'İstanbul',
            'Türkiye',
        ),
        10,
        0,
        new WareHouse(
            "Türkiye",
            "İstanbul",
            "Kadıköy",
            "Yengeç Adres",
            "05555555555",
        ),
        '123456789',
    )
);

// Şimdi kargoları oluşturalım.

$client = new Client($requestConfig);


$create = $client->create(
    $requestConfig,
    $orders
);

dd($create);
