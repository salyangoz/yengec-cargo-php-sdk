# Yengeç Cargo PHP SDK
Bu SDK ile Yengeç Cargo API servisine kolayca entegre edilebilmesi için tasarlanmıştır.

## İçindekiler
- [Kurulum](#kurulum)
- [Yapılandırma](#yapilandirma)
- [Kargo Gönderisi Oluşturma](#kargo-gonderisi-olusturma)
- [Kargo Gönderisi Sorgulama](#kargo-gonderisi-sorgulama)
- [Kargo Barkod Sorgulama](#kargo-barkod-sorgulama)

## Kurulum

```bash
composer require yengec/yengec-cargo
```

## Yapılandırma

İlk öncelikle kargo servisini başlatmak için yapılandırma ayarlarımızı belirtmemiz gereklidir.
Ben `hepsijet` kargosunu kullanacağım ve her servisin `oturum açma` yöntemi farklı olabilir. `Hepsijet`, basit doğrulama yöntemi kullanmaktadır.

Hangi kargo servisini kullanmak istiyorsanız, o servisin ilgili yöntemini kullanarak başlatmanız gerekmektedir.

<details>
  <summary>Kullanılabilir Kargo Servisleri</summary>

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

> Dipnot, her yöntem set ile başlamalıdır. Örneğin `setHepsijet` gibi.
</details>

```php
use Yengec\Cargo\Requests\Config;
use Yengec\Cargo\Requests\RequestConfig;

$cargoService->setHepsijet(
    username: '******',
    password: '******',
    userCode: '******',
    warehouseId: '***',
    companyName: '*****'
);

// burada da kargo servisinin hangi ortamda çalışacağını ve servisin kendisini de belirtiyoruz.
$requestConfig = new RequestConfig(
    mode: 'test',
    language: 'tr',
    service: 'hepsijet',
    config: $cargoService
);
```

## Kargo Gönderisi Oluşturma

```php
// Burada kargoya verilecek olan ürünleri belirtiyoruz.
$orderItemCollection = new OrderItemCollection();

$orderItemCollection->add(new OrderItem(
    productName: 'Yengeç Ürün',
    quantity: 1,
    weight: 1,
    unitPrice: 100,
    hsCode: '123456789',
));

// Şimdi kargoların içeriğini belirleyelim.
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

// Şimdi kargoları oluşturalım.

$client = new Client($requestConfig);


$create = $client->create(
    $requestConfig,
    $orders
);

// Örnek çıktı
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

## Kargo Gönderisi Sorgulama

```php
$client = new Client($requestConfig);