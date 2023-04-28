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
     * @param string $message
     */
    public function setMessage(?string $message): void;

    /**
     * @param string|null $errorCode
     */
    public function setErrorCode(?string $errorCode): void;
}
