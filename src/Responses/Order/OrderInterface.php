<?php

namespace Yengec\Cargo\Responses\Order;

/**
 * Interface OrderInterface
 * @package Yengec\Cargo\Responses\Query
 */
interface OrderInterface
{
    /**
     **
     * @return string
     */
    public function getIdentity(): string;

    /**
     * @param string $identity
     */
    public function setIdentity(string $identity): void;

    /**
     * @return string
     */
    public function getStatus(): string;

    /**
     * @param string $status
     */
    public function setStatus(string $status): void;

    /**
     * @return string
     */
    public function getMessage(): ?string;

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void;

    /**
     * @param string|null $errorCode
     */
    public function setErrorCode(?string $errorCode): void;

    public function setTrackingCode(?string $trackingCode): void;

    public function getTrackingCode(): ?string;

    public function setTrackingUrl(?string $trackingUrl): void;

    public function getTrackingUrl(): ?string;

    public function setLabel(?string $label): void;

    public function getLabel(): ?string;

    public function setReceipt(?string $receipt): void;

    public function getReceipt(): ?string;

    public function setShippingCompany(?string $shippingCompany): void;

    public function getShippingCompany(): ?string;

    public function setDeci(?int $deci): void;

    public function getDeci(): ?int;

    public function setParcel(?int $parcel): void;

    public function getParcel(): ?int;

    public function setPackageCount(?int $packageCount): void;

    public function getPackageCount(): ?int;
}
