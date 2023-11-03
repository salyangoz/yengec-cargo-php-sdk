<?php

namespace Yengec\Cargo\Requests;

/**
 * Class QueryRequest
 * @package Yengec\Cargo\Requests
 */
class QueryOneRequest extends Request
{
    /**
     * Endpoint
     */
    public const PATH = 'shipment/';

    /**
     * @var string
     */
    protected string $code;

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
        return parent::toArray();
    }

    public function getPath(): string
    {
        return static::PATH . $this->getCode();
    }
}
