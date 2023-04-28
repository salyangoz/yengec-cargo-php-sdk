<?php

namespace Yengec\Cargo\Requests\Create;

interface OrderItemInterface
{
    /**
     * @return string
     */
    public function getProductName(): string;

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void;

    /**
     * @return float
     */
    public function getQuantity(): ?float;

    /**
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void;

    /**
     * @return float
     */
    public function getUnitPrice(): ?float;

    /**
     * @param float|null $unitPrice
     */
    public function setUnitPrice(?float $unitPrice): void;

    /**
     * @return string
     */
    public function getHsCode(): ?string;

    /**
     * @param string|null $hsCode
     */
    public function setHsCode(?string $hsCode): void;

    /**
     * @return array|string[]
     */
    public function toArray(): array;
}
