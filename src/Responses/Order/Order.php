<?php

namespace Yengec\Cargo\Responses\Order;

/**
 * Class Order
 * @package Yengec\Cargo\Responses\Create
 */
class Order implements OrderInterface
{
    /**
     * @var string|null
     */
    protected ?string $identity;
    /**
     * @var ?string
     */
    protected ?string $status;
    /**
     * @var string|null
     */
    protected ?string $message;

    /**
     * @var string|null Error code
     */
    protected ?string $errorCode;

    /**
     * @var string|null $trackingCode
     */
    protected ?string $trackingCode;

    /**
     * @var string|null $trackingUrl
     */
    protected ?string $trackingUrl;

    protected ?string $label;

    protected ?string $receipt;

    protected ?string $shippingCompany;

    protected ?int $deci;

    protected ?string $parcel;

    protected ?int $packageCount;

    /**
     * @param string|null $identity
     * @param string|null $status
     * @param string|null $message
     * @param string|null $errorCode
     * @param string|null $trackingCode
     * @param string|null $trackingUrl
     * @param string|null $label
     * @param string|null $receipt
     * @param string|null $shippingCompany
     */
    public function __construct(
        ?string $identity,
        ?string $status,
        ?string $message,
        ?string $errorCode,
        ?string $trackingCode,
        ?string $trackingUrl,
        ?string $label,
        ?string $receipt,
        ?string $shippingCompany,
        ?int $deci,
        ?string $parcel,
        ?int $packageCount
    ) {
        $this->setIdentity($identity);
        $this->setStatus($status);
        $this->setMessage($message);
        $this->setErrorCode($errorCode);
        $this->setTrackingCode($trackingCode);
        $this->setTrackingUrl($trackingUrl);
        $this->setLabel($label);
        $this->setReceipt($receipt);
        $this->setShippingCompany($shippingCompany);
        $this->setDeci($deci);
        $this->setParcel($parcel);
        $this->setPackageCount($packageCount);
    }

    /**
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * @param string|null $identity
     */
    public function setIdentity(?string $identity): void
    {
        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * @param string|null $errorCode
     */
    public function setErrorCode(?string $errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return string|null
     */
    public function getTrackingCode(): ?string
    {
        return $this->trackingCode;
    }

    /**
     * @param string|null $trackingCode
     */
    public function setTrackingCode(?string $trackingCode): void
    {
        $this->trackingCode = $trackingCode;
    }

    /**
     * @return string|null
     */
    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    /**
     * @param string|null $trackingUrl
     */
    public function setTrackingUrl(?string $trackingUrl): void
    {
        $this->trackingUrl = $trackingUrl;
    }


    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     */
    public function setLabel(?string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string|null
     */
    public function getReceipt(): ?string
    {
        return $this->receipt;
    }

    /**
     * @param string|null $receipt
     */
    public function setReceipt(?string $receipt): void
    {
        $this->receipt = $receipt;
    }

    /**
     * @param string|null $shippingCompany
     */
    public function setShippingCompany(?string $shippingCompany): void
    {
        $this->shippingCompany = $shippingCompany;
    }

    /**
     * @return string|null
     */
    public function getShippingCompany(): ?string
    {
        return $this->shippingCompany;
    }

    /**
     * @return int|null
     */
    public function getDeci(): ?int
    {
        return $this->deci;
    }

    /**
     * @param int|null $deci
     */
    public function setDeci(?int $deci): void
    {
        $this->deci = $deci;
    }

    /**
     * @return int|null
     */
    public function getPackageCount(): ?int
    {
        return $this->packageCount;
    }

    /**
     * @param int|null $packageCount
     */
    public function setPackageCount(?int $packageCount): void
    {
        $this->packageCount = $packageCount;
    }

    /**
     * @return string|null
     */
    public function getParcel(): ?string
    {
        return $this->parcel;
    }

    /**
     * @param string|null $parcel
     */
    public function setParcel(?string $parcel): void
    {
        $this->parcel = $parcel;
    }
}
