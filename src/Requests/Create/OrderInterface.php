<?php

namespace Yengec\Cargo\Requests\Create;

interface OrderInterface
{
    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @param string $city
     */
    public function setCity(string $city): void;

    /**
     * @return string
     */
    public function getPhone(): ?string;

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void;

    /**
     * @return string
     */
    public function getAddress(): string;

    /**
     * @param string $address
     */
    public function setAddress(string $address): void;

    /**
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
    public function getReceiver(): string;

    /**
     * @param string $receiver
     */
    public function setReceiver(string $receiver): void;

    /**
     * @return string
     */
    public function getDistrict(): ?string;

    /**
     * @param string|null $district
     */
    public function setDistrict(?string $district): void;

    /**
     * Order to array
     * @return mixed
     */
    public function toArray();

    /**
     * @return string|null
     */
    public function getLabelDescription(): ?string;

    /**
     * @param string|null $shippingSlipDescription
     * @return void
     */
    public function setLabelDescription(?string $shippingSlipDescription): void;

    /**
     * @return float|null
     */
    public function getCargoPrice(): ?float;

    /**
     * @param float|null $cargoPrice
     * @return void
     */
    public function setCargoPrice(?float $cargoPrice): void;

    /**
     * @return float|null
     */

    public function getDuty(): ?float;

    /**
     * @param float|null $duty
     */
    public function setDuty(?float $duty): void;
}
