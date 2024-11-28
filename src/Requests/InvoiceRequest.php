<?php

namespace Yengec\Cargo\Requests;

/**
 * Class QueryRequest
 * @package Yengec\Cargo\Requests
 */
class InvoiceRequest extends Request
{
    /**
     * Endpoint
     */
    public const PATH = 'shipment/';

    /**
     * @var string
     */
    protected string $code;

    protected string $invoiceUrl;

    public function getInvoiceUrl(): string
    {
        return $this->invoiceUrl;
    }

    public function setInvoiceUrl(string $invoiceUrl): void
    {
        $this->invoiceUrl = $invoiceUrl;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'invoice_url' => $this->getInvoiceUrl()
        ]);
    }

    public function getPath(): string
    {
        return static::PATH . $this->getCode() . '/invoice';
    }
}
