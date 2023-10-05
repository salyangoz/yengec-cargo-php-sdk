<?php

namespace Yengec\Cargo\Requests\Create;

class OrderSender implements ArrayableInterface
{
    private string $name;
    private ?string $address;
    private ?string $city;
    private ?string $district;
    private ?string $countryCode;
    private ?string $taxNumber;
    private ?string $phone;
    private ?string $voec;
    private ?string $pva;
    private ?string $ioss;
    private ?string $postalCode;

    /**
     * OrderSender constructor.
     * @param string $name
     * @param string|null $address
     * @param string|null $city
     * @param string|null $district
     * @param string|null $countryCode
     * @param string|null $taxNumber
     * @param string|null $phone
     * @param string|null $voec
     * @param string|null $pva
     * @param string|null $ioss
     */
    public function __construct(
        string $name,
        ?string $address,
        ?string $city,
        ?string $district,
        ?string $countryCode,
        ?string $taxNumber,
        ?string $phone,
        ?string $voec,
        ?string $pva,
        ?string $ioss,
        ?string $postalCode
    ) {
        $this->name = $name;
        $this->address = $address;
        $this->city = $city;
        $this->district = $district;
        $this->countryCode = $countryCode;
        $this->taxNumber = $taxNumber;
        $this->phone = $phone;
        $this->voec = $voec;
        $this->pva = $pva;
        $this->ioss = $ioss;
        $this->postalCode = $postalCode;
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
     * @return string
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
     * @return string|null
     */
    public function getVoec(): ?string
    {
        return $this->voec;
    }

    /**
     * @param string|null $voec
     */
    public function setVoec(?string $voec): void
    {
        $this->voec = $voec;
    }

    /**
     * @return string|null
     */
    public function getPva(): ?string
    {
        return $this->pva;
    }

    /**
     * @param string|null $pva
     */
    public function setPva(?string $pva): void
    {
        $this->pva = $pva;
    }

    /**
     * @return string|null
     */
    public function getIoss(): ?string
    {
        return $this->ioss;
    }

    /**
     * @param string|null $ioss
     */
    public function setIoss(?string $ioss): void
    {
        $this->ioss = $ioss;
    }

    /**
     * @return array|string[]
     */
    public function toArray(): array
    {
        return [
            'name'     => $this->getName(),
            'city'     => $this->getCity(),
            'district' => $this->getDistrict(),
            'address'  => $this->getAddress(),
            'phone'    => $this->getPhone(),
            'tax_number' => $this->getTaxNumber(),
            'country_code' => $this->getCountryCode(),
            'ioss' => $this->getIoss(),
            'voec' => $this->getVoec(),
            'pva' => $this->getPva(),
            'postal_code' => $this->getPostalCode()
        ];
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
