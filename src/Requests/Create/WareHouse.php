<?php

namespace Yengec\Cargo\Requests\Create;

class WareHouse
{
    protected ?string $country;
    protected ?string $city;
    protected ?string $district;
    protected ?string $address;
    protected ?string $phone;
    protected ?string $countryCode;
    protected ?string $postalCode;

    public function __construct(
        ?string $country,
        ?string $city,
        ?string $district,
        ?string $address,
        ?string $phone,
        ?string $countryCode,
        ?string $postalCode
    ) {
        $this->country = $country;
        $this->city = $city;
        $this->district = $district;
        $this->address = $address;
        $this->phone = $phone;
        $this->countryCode = $countryCode;
        $this->postalCode = $postalCode;
    }

    /**
     * @return string|null
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
     * @return string|null
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
     * @return string|null
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
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string|null
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
     * @return array|string[]
     */
    public function toArray()
    {
        return [
            'address' => $this->getAddress(),
            'phone' => $this->getPhone(),
            'country' => $this->getCountry(),
            'city' => $this->getCity(),
            'district' => $this->getDistrict(),
            'country_code' => $this->getCountryCode(),
            'postal_code' => $this->getPostalCode()
        ];
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }
}
