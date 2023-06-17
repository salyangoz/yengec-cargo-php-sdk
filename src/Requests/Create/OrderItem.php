<?php

namespace Yengec\Cargo\Requests\Create;

class OrderItem implements OrderItemInterface
{
    private string $productName;
    private ?float $quantity;
    private ?float $unitPrice;
    private ?string $hsCode;
    private ?float $weight;
    private ?float $discount;

    /**
     * OrderSender constructor.
     * @param string $productName
     * @param float|null $quantity
     * @param float|null $unitPrice
     * @param string|null $hsCode
     * @param float|null $weight
     * @param float|null $discount
     */
    public function __construct(
        string $productName,
        ?float $quantity,
        ?float $unitPrice,
        ?string $hsCode,
        ?float $weight,
        ?float $discount
    ) {
        $this->productName = $productName;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
        $this->hsCode = $hsCode;
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return float|null
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    /**
     * @param float|null $unitPrice
     */
    public function setUnitPrice(?float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }


    /**
     * @return string|null
     */
    public function getHsCode(): ?string
    {
        return $this->hsCode;
    }

    /**
     * @param string|null $hsCode
     */
    public function setHsCode(?string $hsCode): void
    {
        $this->hsCode = $hsCode;
    }

    /**
     * @return float
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }


    /**
     * @return float|int|null
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param float|int|null $discount
     */
    public function setDiscount($discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return array|string[]
     */
    public function toArray(): array
    {
        return [
            'quantity'      => $this->getQuantity(),
            'unit_price'    => $this->getUnitPrice(),
            'product_name'  => $this->getProductName(),
            'hs_code'       => $this->getHsCode(),
            'weight'        => $this->getWeight()
        ];
    }
}
