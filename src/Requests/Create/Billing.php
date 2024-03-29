<?php

namespace Yengec\Cargo\Requests\Create;

class Billing implements BillingInterface
{
    protected string $name;
    protected ?string $email;
    protected ?string $phone;
    protected ?string $address;
    protected ?string $postCode;
    protected ?string $district;
    protected ?string $city;
    protected ?string $country;
    protected ?string $countryCode;
    protected ?string $taxNumber;
    protected ?string $neighborhood;

    public function __construct(
        string $name,
        ?string $phone,
        ?string $address,
        ?string $postCode,
        ?string $district,
        ?string $neighborhood,
        ?string $city,
        ?string $country,
        ?string $countryCode = null,
        ?string $taxNumber = null
    ) {
        $this->name     = $name;
        $this->phone    = $phone;
        $this->address  = $address;
        $this->postCode = $postCode;
        $this->district = $district;
        $this->city     = $city;
        $this->country  = $country;
        $this->countryCode = $countryCode;
        $this->taxNumber = $taxNumber;
        $this->neighborhood = $neighborhood;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * @param string|null $postCode
     */
    public function setPostCode(?string $postCode): void
    {
        $this->postCode = $postCode;
    }

    /**
     * @return string
     */
    public function getDistrict(): ?string
    {
        return $this->district;
    }

    /**
     * @param string|null $district
     */
    public function setDistrict(?string $district): void
    {
        $this->district = $district;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return array|string[]
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'address' => $this->getAddress(),
            'phone' => $this->getPhone(),
            'country' => $this->getCountry(),
            'city' => $this->getCity(),
            'district' => $this->getDistrict(),
            'neighborhood' => $this->getNeighborhood(),
            'postal_code' => $this->getPostCode(),
            'country_code' => $this->getCountryCode(),
        ];
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     */
    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return string|null
     */
    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    /**
     * @param string|null $taxNumber
     */
    public function setTaxNumber(?string $taxNumber): void
    {
        $this->taxNumber = $taxNumber;
    }

    /**
     * @return string|null
     */
    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    /**
     * @param string|null $neighborhood
     */
    public function setNeighborhood(?string $neighborhood): void
    {
        $this->neighborhood = $neighborhood;
    }
}
