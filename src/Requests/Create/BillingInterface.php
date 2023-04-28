<?php

namespace Yengec\Cargo\Requests\Create;

interface BillingInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void;

    /**
     * @return string|null
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
     * @return string|null
     */
    public function getPostCode(): ?string;

    /**
     * @param string|null $postCode
     * @return void
     */
    public function setPostCode(?string $postCode): void;

    /**
     * @return string|null
     */
    public function getDistrict(): ?string;

    /**
     * @param string|null $district
     * @return void
     */
    public function setDistrict(?string $district): void;

    /**
     * @return ?string
     */
    public function getCity(): ?string;

    /**
     * @param ?string $city
     * @return void
     */
    public function setCity(?string $city): void;

    /**
     * @return string|null
     */
    public function getCountry(): ?string;

    /**
     * @param string|null $country
     * @return void
     */
    public function setCountry(?string $country): void;
}
