<?php

namespace Yengec\Cargo\Requests\Create;

use Carbon\Carbon;

class Order implements OrderInterface
{
    protected string $city;
    protected ?string $phone;
    protected string $address;
    protected string $identity;
    protected string $receiver;
    protected ?string $district;
    protected ?string $neighborhood;
    protected ?string $email;
    protected ?string $postalCode;
    protected ?OrderSender $sender;
    protected ?Carbon $shipAt;
    protected ?string $countryCode;
    protected ?string $currency;
    protected ?float $total;
    protected ?string $exportMethod;
    protected ?string $exportReason;
    protected ?string $method;
    protected ?OrderItemCollection $orderItems;
    protected string $id;
    protected ?string $invoiceCode;
    protected ?string $labelDescription;
    protected ?float $cargoPrice;
    protected ?float $duty;
    protected ?float $discount;
    protected ?Billing $billing;
    protected ?WareHouse $wareHouse;
    protected ?string $addressId;

    /**
     * Order constructor.
     * @param string $identity
     * @param string $receiver
     * @param string $address
     * @param string|null $phone
     * @param string $city
     * @param string|null $district
     * @param string|null $email
     * @param Carbon|null $shipAt
     * @param string|null $countryCode
     * @param string|null $currency
     * @param float|null $total
     * @param float|null $discount
     * @param string|null $exportMethod
     * @param string|null $exportReason
     * @param string|null $method
     * @param string|null $postalCode
     * @param OrderSender|null $sender
     * @param OrderItemCollection|null $orderItems
     * @param string $id
     * @param string|null $invoiceCode
     * @param string|null $shippingSlipDescription
     * @param Billing $billing
     * @param float|null $cargoPrice
     * @param float|null $duty
     * @param WareHouse $wareHouse
     * @param string|null $addressId
     */
    public function __construct(
        string $identity,
        string $receiver,
        string $address,
        ?string $phone,
        string $city,
        ?string $district,
        ?string $neighborhood,
        ?string $email,
        ?Carbon $shipAt,
        ?string $countryCode,
        ?string $currency,
        ?float $total,
        ?float $discount,
        ?string $exportMethod,
        ?string $exportReason,
        ?string $method,
        ?string $postalCode,
        OrderSender $sender,
        ?OrderItemCollection $orderItems,
        string $id,
        ?string $invoiceCode,
        ?string $shippingSlipDescription,
        Billing $billing,
        ?float $cargoPrice,
        ?float $duty,
        WareHouse $wareHouse,
        ?string $addressId = null
    ) {
        $this->setIdentity($identity);
        $this->setReceiver($receiver);
        $this->setAddress($address);
        $this->setPostalCode($postalCode);
        $this->setPhone($phone);
        $this->setCity($city);
        $this->setDistrict($district);
        $this->setEmail($email);
        $this->setSender($sender);
        $this->setShipAt($shipAt);
        $this->setCountryCode($countryCode);
        $this->setCurrency($currency);
        $this->setTotal($total);
        $this->setExportMethod($exportMethod);
        $this->setExportReason($exportReason);
        $this->setMethod($method);
        $this->setItems($orderItems);
        $this->setId($id);
        $this->setInvoiceCode($invoiceCode);
        $this->setLabelDescription($shippingSlipDescription);
        $this->setBilling($billing);
        $this->setCargoPrice($cargoPrice);
        $this->setDuty($duty);
        $this->setWareHouse($wareHouse);
        $this->setDiscount($discount);
        $this->setAddressId($addressId);
        $this->setNeighborhood($neighborhood);
    }

    /**
     * @return OrderSender|null
     */
    public function getSender(): ?OrderSender
    {
        return $this->sender;
    }

    /**
     * @param OrderSender|null $sender
     */
    public function setSender(?OrderSender $sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * @param string $identity
     */
    public function setIdentity(string $identity): void
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getReceiver(): string
    {
        return $this->receiver;
    }

    /**
     * @param string $receiver
     */
    public function setReceiver(string $receiver): void
    {
        $this->receiver = $receiver;
    }

    /**
     * @return string
     */
    public function getDistrict(): ?string
    {
        return $this->district;
    }

    /**
     * @param string|null $district
     */
    public function setDistrict(?string $district): void
    {
        $this->district = $district;
    }

    public function toArray()
    {
        return [
            'city'      => $this->getCity(),
            'phone'     => $this->getPhone(),
            'email'     => $this->getEmail(),
            'duty'      => $this->getDuty(),
            'total'     => $this->getTotal(),
            'items'     => $this->getItems()->toArray(),
            'method'    => $this->getMethod(),
            'sender'    => $this->getSender() ? $this->getSender()->toArray() : [],
            'ship_at'   => $this->getShipAt() ? $this->getShipAt()->format('Y-m-d H:i') : null,
            'address'   => $this->getAddress(),
            'discount'  => $this->getDiscount(),
            'billing'   => $this->getBilling() ? $this->getBilling()->toArray() : [],
            'identity'  => $this->getIdentity(),
            'receiver'  => $this->getReceiver(),
            'district'  => $this->getDistrict(),
            'currency'  => $this->getCurrency(),
            'order_id'  => $this->getId(),
            'warehouse' => $this->getWareHouse() ? $this->getWareHouse()->toArray() : [],
            'postal_code'   => $this->getPostalCode(),
            'cargo_price'   => $this->getCargoPrice(),
            'country_code'  => $this->getCountryCode(),
            'invoice_code'  => $this->getInvoiceCode(),
            'neighbourhood' => $this->getNeighborhood(),
            'export_method' => $this->getExportMethod(),
            'export_reason' => $this->getExportReason(),
            'label_description' => $this->getLabelDescription(),
            'address_id'    => $this->getAddressId(),
        ];
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getShipAt(): ?Carbon
    {
        return $this->shipAt;
    }

    /**
     * @param Carbon|null $shipAt
     */
    public function setShipAt(?Carbon $shipAt): void
    {
        $this->shipAt = $shipAt;
    }

    /**
     * @return string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * @param float|null $total
     */
    public function setTotal(?float $total): void
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getExportMethod(): ?string
    {
        return $this->exportMethod;
    }

    /**
     * @param string|null $exportMethod
     */
    public function setExportMethod(?string $exportMethod): void
    {
        $this->exportMethod = $exportMethod;
    }

    /**
     * @return string
     */
    public function getExportReason(): ?string
    {
        return $this->exportReason;
    }

    /**
     * @param string|null $exportReason
     */
    public function setExportReason(?string $exportReason): void
    {
        $this->exportReason = $exportReason;
    }

    /**
     * @return OrderItemCollection|null
     */
    public function getItems(): ?OrderItemCollection
    {
        return $this->orderItems;
    }

    /**
     * @param OrderItemCollection|null $orderItems
     */
    public function setItems(?OrderItemCollection $orderItems): void
    {
        $this->orderItems = $orderItems;
    }


    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * @param string|null $method
     */
    public function setMethod(?string $method): void
    {
        $this->method = $method;
    }


    /**
     * @return string|null
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     */
    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return OrderItemCollection|null
     */
    public function getOrderItems(): ?OrderItemCollection
    {
        return $this->orderItems;
    }

    /**
     * @param OrderItemCollection|null $orderItems
     */
    public function setOrderItems(?OrderItemCollection $orderItems): void
    {
        $this->orderItems = $orderItems;
    }

    /**
     * @return string|null
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return void
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getInvoiceCode(): ?string
    {
        return $this->invoiceCode;
    }

    /**
     * @param string|null $invoiceCode
     * @return void
     */
    public function setInvoiceCode(?string $invoiceCode): void
    {
        $this->invoiceCode = $invoiceCode;
    }

    /**
     * @return string|null
     */
    public function getLabelDescription(): ?string
    {
        return $this->labelDescription;
    }

    /**
     * @param string|null $labelDescription
     * @return void
     */
    public function setLabelDescription(?string $labelDescription): void
    {
        $this->labelDescription = $labelDescription;
    }

    /**
     * @return float|null
     */
    public function getCargoPrice(): ?float
    {
        return $this->cargoPrice;
    }

    /**
     * @param float|null $cargoPrice
     * @return void
     */
    public function setCargoPrice(?float $cargoPrice): void
    {
        $this->cargoPrice = $cargoPrice;
    }

    /**
     * @return float|null
     */
    public function getDuty(): ?float
    {
        return $this->duty;
    }

    /**
     * @param float|null $duty
     */
    public function setDuty(?float $duty): void
    {
        $this->duty = $duty;
    }

    /**
     * @return Billing|null
     */
    public function getBilling(): ?Billing
    {
        return $this->billing;
    }

    /**
     * @param Billing|null $billing
     */
    public function setBilling(?Billing $billing): void
    {
        $this->billing = $billing;
    }

    /**
     * @param WareHouse|null $wareHouse
     */
    public function setWareHouse(?WareHouse $wareHouse): void
    {
        $this->wareHouse = $wareHouse;
    }

    /**
     * @return WareHouse|null
     */
    public function getWareHouse(): ?WareHouse
    {
        return $this->wareHouse;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float|null $discount
     */
    public function setDiscount(?float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return string|null
     */
    public function getAddressId(): ?string
    {
        return $this->addressId;
    }

    /**
     * @param string|null $addressId
     */
    public function setAddressId(?string $addressId): void
    {
        $this->addressId = $addressId;
    }

    /**
     * @return string|null
     */
    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    /**
     * @param string|null $neighborhood
     */
    public function setNeighborhood(?string $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }
}
