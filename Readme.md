# Yengec Cargo PHP SDK

This SDK is designed to be easily integrated into the Yengec Cargo API service.

## İçindekiler
- [Installation](#installation)
- [Configuration](#configuration)
- [Creating Shipment](#creating-shipment)
- [Cargo Shipment Query](#cargo-shipment-query)

## Installation

```bash
composer require yengec/yengec-cargo
```

## Configuration

First of all, we need to specify our configuration settings to start the cargo service.
I will use the `hepsijet` cargo and the `login` method of each service may be different. `Hepsijet` uses the simple authentication method.

You must start using the relevant method of the cargo service you want to use.

<details>
  <summary>Available Shipping Services</summary>

    - Yurtici
    - Mng
    - Ups
    - Aras
    - Ptt
    - Surat
    - Sendeo
    - EasyShip
    - UpsGlobal
    - Hepsijet

> Note, each method should start with set. For example, `setHepsijet` etc.
</details>

```php
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
    username: '******',
    password: '******',
    userCode: '******',
    warehouseId: '***',
    companyName: '*****'
);

// here we specify in which environment the cargo service will run and the service itself.
$requestConfig = new RequestConfig(
    mode: 'test',
    language: 'tr',
    service: 'hepsijet',
    config: $cargoService
);
```

## Creating Shipment

```php
// Here we specify the products to be shipped.
$orderItemCollection = new OrderItemCollection();

$orderItemCollection->add(new OrderItem(
    productName: 'Yengeç Ürün',
    quantity: 1,
    weight: 1,
    unitPrice: 100,
    hsCode: '123456789',
));

// Now let's determine the contents of the cargoes.
$orders =  new OrderCollection();

$orders->add(
    new Order(
        identity: 'ync-123', // Bu siparişin benzersiz kimliği
        addressId: '123', // Sadece epsijet için zorunlu.
        receiver: 'Yengeç', // Alıcı adı
        address: 'Yengeç Adres', // Alıcı adresi
        phone: '05555555555', // Alıcı telefonu
        city: 'İstanbul', // Alıcı şehri
        district: 'Kadıköy', // Alıcı ilçesi
        email: 'yengec_test@yengec.co', // Alıcı emaili
        shipAt: Carbon::createFromFormat('d/m/Y', '28/04/2023'), // Kargo gönderim tarihi
        countryCode: 'TR', // Alıcı ülke kodu
        currency: 'TRY', // Alıcı para birimi
        total: 100, // Alıcı toplam tutarı
        // exportMethod: 'KARGO', // Kargo gönderim yöntemi
        method: 'HX_STD', // Kargo gönderim yöntemi. hepsijet için zorunlu.
        exportReason: 'SATIS',
        postalCode: '34700',
        sender: new OrderSender(
            name: 'Yengeç',
            address: "Yengeç Adres",
            city: "İstanbul",
            district: "Kadıköy",
            countryCode: "TR",
            taxNumber: "123456789",
            phone: "05555555555",
            voec: "123456789",
            pva: "123456789",
            ioss: "123456789",
        ),
        orderItems: $orderItemCollection,
        id: '123456789',
        invoiceCode: '123456789',
        shippingSlipDescription: 'Yengeç Kargo Açıklama',
        billing: new Billing(
            name: 'Yengeç',
            phone: '05555555555',
            address: 'Yengeç Adres',
            postCode: '34700',
            district: 'Kadıköy',
            city: 'İstanbul',
            country: 'Türkiye',
        ),
        cargoPrice: 10,
        duty: 0,
        wareHouse: new WareHouse(
            country: "Türkiye",
            city: "İstanbul",
            district: "Kadıköy",
            address: "Yengeç Adres",
            phone: "05555555555",
        )
    )
);

// Let's create the cargos now.

$client = new Client($requestConfig);


$create = $client->create(
    $requestConfig,
    $orders
);

// Example response
/**
 * "identity" => "ync-123"
 * "status" => "created"
 * "message" => "ok"
 * "error_code" => null
 * "tracking_code" => null
 * "tracking_url" => null
 * "deci" => null
 * "parcel" => null
 * "label" => <barkod>
 * "recepiet" => null
 */

```

## Cargo Shipment Query

```php
use Yengec\Cargo\Client;
use Yengec\Cargo\Requests\Config;
use Yengec\Cargo\Requests\Query\OrderCollection;
use Yengec\Cargo\Requests\RequestConfig;

$id = 'YNC123456789';

$cargoService = new Config();
$cargoService->setHepsijet(
    username: '******',
    password: '******',
    userCode: '******',
    warehouseId: '***',
    companyName: '*****'
);

$requestConfig = new RequestConfig(
    mode: 'test',
    language: 'tr',
    service: 'hepsijet',
    config: $cargoService
);

$client = new Client($requestConfig);
$queryOrders = new OrderCollection();

$queryOrders->add(orderIdentity: $id);

$query = $client->query(
    requestConfig: $requestConfig,
    orders: $queryOrders
);
```

