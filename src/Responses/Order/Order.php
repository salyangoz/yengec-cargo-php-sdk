<?php

namespace Yengec\Cargo\Responses\Order;

/**
 * Class Order
 * @package Yengec\Cargo\Responses\Create
 */
class Order implements OrderInterface
{
    /**
     * @var string
     */
    protected ?string $identity;
    /**
     * @var ?string
     */
    protected ?string $status;
    /**
     * @var string
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

    protected ?string $addressId;
    /**
     * Order constructor.
     * @param string $identity
     * @param string $status
     * @param string|null $message
     * @param string|null $errorCode
     * @param string|null $trackingCode
     * @param string|null $trackingUrl
     * @param string|null $label
     * @param string|null $receipt
     */
    public function __construct(
        ?string $identity,
        ?string $status,
        ?string $message,
        ?string $errorCode,
        ?string $trackingCode,
        ?string $trackingUrl,
        ?string $label,
        ?string $receipt
    ) {
        $this->setIdentity($identity);
        $this->setStatus($status);
        $this->setMessage($message);
        $this->setErrorCode($errorCode);
        $this->setTrackingCode($trackingCode);
        $this->setTrackingUrl($trackingUrl);
        $this->setLabel($label);
        $this->setReceipt($receipt);
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
    public function setIdentity(?string $identity): void
    {
        $this->identity = $identity;
    }

    /**
     * @return bool
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
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
}
