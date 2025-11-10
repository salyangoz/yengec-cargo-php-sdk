<?php

namespace Yengec\Cargo\Requests;

/**
 * Class Config
 * @package Yengec\Cargo\Requests
 */
class Config implements ConfigInterface
{
    /**
     * @var array
     */
    public $configs = [];

    /**
     * Services
     */
    public const SERVICE_YURTICI = 'yurtici';
    public const SERVICE_MNG = 'mng';
    public const SERVICE_UPS = 'ups';
    public const SERVICE_ARAS = 'aras';
    public const SERVICE_SURAT = 'surat';
    public const SERVICE_PTT = 'ptt';
    public const SERVICE_UPS_GLOBAL = 'ups-global';
    public const SERVICE_AMAZON_EASY_SHIP = 'amazon-easy-ship';
    public const SERVICE_SENDEO = 'sendeo';
    public const SERVICE_HEPSIJET = 'hepsijet';
    public const SERVICE_FEDEX = 'fedex';

    public const SERVICE_DHL = 'dhl';
    public const SERVICE_KARGONOMI = 'kargonomi';
    public const SERVICE_GELIVER = 'geliver';
    public const SERVICE_BASIT_KARGO = 'basit-kargo';
    public const SERVICE_NAVLUNGO = 'navlungo';

    /**
     * @param string $username
     * @param string $password
     */
    public function setYurtici(string $username, string $password): void
    {
        $this->configs[self::SERVICE_YURTICI] = [
            'username' => $username,
            'password' => $password
        ];
    }

    /**
     * @return array
     */
    public function getYurtici(): array
    {
        if (!isset($this->configs[self::SERVICE_YURTICI])) {
            return [];
        }

        return $this->configs[self::SERVICE_YURTICI];
    }

    /**
     * @param string $username
     * @param string $password
     */
    public function setMng(string $username, string $password): void
    {
        $this->configs[self::SERVICE_MNG] = [
            'username' => $username,
            'password' => $password
        ];
    }

    /**
     * @return array
     */
    public function getMng(): array
    {
        if (!isset($this->configs[self::SERVICE_MNG])) {
            return [];
        }

        return $this->configs[self::SERVICE_MNG];
    }


    /**
     * @param string $username
     * @param string $password
     * @param string $userCode
     */
    public function setUps(string $username, string $password, string $userCode): void
    {
        $this->configs[self::SERVICE_UPS] = [
            'username' => $username,
            'password' => $password,
            'user_code' => $userCode
        ];
    }

    /**
     * @return array
     */
    public function getUps(): array
    {
        if (!isset($this->configs[self::SERVICE_UPS])) {
            return [];
        }

        return $this->configs[self::SERVICE_UPS];
    }


    /**
     * @param string $username
     * @param string $password
     * @param string $userCode
     * @param string $branchId
     */
    public function setAras(string $username, string $password, string $userCode, string $branchId = null): void
    {
        $this->configs[self::SERVICE_ARAS] = [
            'username' => $username,
            'password' => $password,
            'user_code' => $userCode,
            'branch_id' => $branchId
        ];
    }

    /**
     * @return array
     */
    public function getAras(): array
    {
        if (!isset($this->configs[self::SERVICE_ARAS])) {
            return [];
        }

        return $this->configs[self::SERVICE_ARAS];
    }

    /**
     * @param string $username
     * @param string $password
     * @param string|null $paymentAccountId
     */
    public function setPtt(
        string $username,
        string $password,
        ?string $paymentAccountId = null
    ): void {
        $this->configs[self::SERVICE_PTT] = [
            'username' => $username,
            'password' => $password,
            'payment_account_id' => $paymentAccountId
        ];
    }

    /**
     * @return array
     */
    public function getPtt(): array
    {
        if (!isset($this->configs[self::SERVICE_PTT])) {
            return [];
        }

        return $this->configs[self::SERVICE_PTT];
    }

    /**
     * @param string $username
     * @param string $password
     */
    public function setSurat(string $username, string $password, string $createPassword): void
    {
        $this->configs[self::SERVICE_SURAT] = [
            'username' => $username,
            'password' => $password,
            'create_password' => $createPassword
        ];
    }

    /**
     * @return array
     */
    public function getSurat(): array
    {
        if (!isset($this->configs[self::SERVICE_SURAT])) {
            return [];
        }

        return $this->configs[self::SERVICE_SURAT];
    }


    /**
     * @param string $username
     * @param string $password
     */
    public function setSendeo(string $username, string $password): void
    {
        $this->configs[self::SERVICE_SENDEO] = [
            'username' => $username,
            'password' => $password,
        ];
    }

    /**
     * @return array
     */
    public function getSendeo(): array
    {
        if (!isset($this->configs[self::SERVICE_SENDEO])) {
            return [];
        }

        return $this->configs[self::SERVICE_SENDEO];
    }

    /**
     * @param string $service
     * @return array
     */
    public function get(string $service): array
    {
        if (!isset($this->configs[$service])) {
            return [];
        }

        return $this->configs[$service];
    }

    /**
     * @param string $sellerId
     * @param string $marketplaceId
     * @param string $refreshToken
     */
    public function setEasyShip(string $sellerId, string $marketplaceId, string $refreshToken): void
    {
        $this->configs[self::SERVICE_AMAZON_EASY_SHIP] = [
            'user_code' => $sellerId,
            'platform_id' => $marketplaceId,
            'refresh_token' => $refreshToken,
        ];
    }

    /**
     * @return array
     */
    public function getEasyShip(): array
    {
        if (!isset($this->configs[self::SERVICE_AMAZON_EASY_SHIP])) {
            return [];
        }

        return $this->configs[self::SERVICE_AMAZON_EASY_SHIP];
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $accessToken
     * @param string $userCode
     */
    public function setUpsGlobal(string $accessToken, string $userCode): void
    {
        $this->configs[self::SERVICE_UPS_GLOBAL] = [
            'access_token' => $accessToken,
            'user_code' => $userCode
        ];
    }

    /**
     * @return array
     */
    public function getUpsGlobal(): array
    {
        if (!isset($this->configs[self::SERVICE_UPS_GLOBAL])) {
            return [];
        }

        return $this->configs[self::SERVICE_UPS_GLOBAL];
    }

    /**
     * @param string $accessToken
     * @param string $warehouseId
     * @param string $companyName
     * @param string $companyCode
     * @param string $companyAddressId
     * @return void
     */
    public function setHepsijet(
        string $accessToken,
        string $warehouseId,
        string $companyName,
        string $companyCode,
        string $companyAddressId
    ): void {
        $this->configs[self::SERVICE_HEPSIJET] = [
            'access_token' => $accessToken,
            'company_code' => $companyCode,
            'warehouse_id' => $warehouseId,
            'company_name' => $companyName,
            'company_address_id' => $companyAddressId,
        ];
    }

    /**
     * @return array
     */
    public function getHepsijet(): array
    {
        if (!isset($this->configs[self::SERVICE_HEPSIJET])) {
            return [];
        }

        return $this->configs[self::SERVICE_HEPSIJET];
    }

    /**
     * @param string $trackUsername
     * @param string $trackPassword
     * @param string $createUsername
     * @param string $createPassword
     * @param string $userCode
     * @return void
     */
    public function setFedex(
        string $trackUsername,
        string $trackPassword,
        string $createUsername,
        string $createPassword,
        string $userCode
    ): void
    {
        $this->configs[self::SERVICE_FEDEX] = [
            'username' => $trackUsername,
            'password' => $trackPassword,
            'user_code' => $userCode,
            'create_username' => $createUsername,
            'create_password' => $createPassword
        ];
    }

    /**
     * @return array
     */
    public function getFedex(): array
    {
        if (!isset($this->configs[self::SERVICE_FEDEX])) {
            return [];
        }

        return $this->configs[self::SERVICE_FEDEX];
    }

    public function setDhl(
        string $username,
        string $password,
        string $userCode
    ): void
    {
        $this->configs[self::SERVICE_DHL] = [
            'username' => $username,
            'password' => $password,
            'user_code' => $userCode,
        ];
    }

    /**
     * @param string $apiToken
     * @param string $shipmentStrategy
     * @param string $preferredCarrier
     * @return void
     */
    public function setKargonomi(
        string $apiToken,
        string $shipmentStrategy,
        string $preferredCarrier
    ): void
    {
        $this->configs[self::SERVICE_KARGONOMI] = [
            'api_token' => $apiToken,
            'shipment_strategy' => $shipmentStrategy,
            'preferred_carrier' => $preferredCarrier
        ];
    }

    /**
     * @return array
     */
    public function getDhl(): array
    {
        if (!isset($this->configs[self::SERVICE_DHL])) {
            return [];
        }

        return $this->configs[self::SERVICE_DHL];
    }

    public function getKargonomi(): array
    {
        if (!isset($this->configs[self::SERVICE_KARGONOMI])) {
            return [];
        }

        return $this->configs[self::SERVICE_KARGONOMI];
    }
    /**
     * @param string $apiToken
     * @param string $shipmentStrategy
     * @param string $preferredCarrier
     * @return void
     */
    public function setBasitKargo(
        string $apiToken,
        string $shipmentStrategy,
        string $preferredCarrier
    ): void
    {
        $this->configs[self::SERVICE_BASIT_KARGO] = [
            'api_token' => $apiToken,
            'shipment_strategy' => $shipmentStrategy,
            'preferred_carrier' => $preferredCarrier
        ];
    }

    /**
     * @return array
     */
    public function getBasitKargo(): array
    {
        if (!isset($this->configs[self::SERVICE_BASIT_KARGO])) {
            return [];
        }

        return $this->configs[self::SERVICE_BASIT_KARGO];
    }

    /**
     * @param string $apiToken
     * @param string $shipmentStrategy
     * @param string $preferredCarrier
     * @return void
     */
    public function setGeliver(
        string $apiToken,
        string $shipmentStrategy,
        string $preferredCarrier
    ): void
    {
        $this->configs[self::SERVICE_GELIVER] = [
            'api_token' => $apiToken,
            'shipment_strategy' => $shipmentStrategy,
            'preferred_carrier' => $preferredCarrier
        ];
    }

    /**
     * @return array
     */
    public function getGeliver(): array
    {
        if (!isset($this->configs[self::SERVICE_GELIVER])) {
            return [];
        }

        return $this->configs[self::SERVICE_GELIVER];
    }

    /**
     * @param string $apiToken
     * @param string $shipmentStrategy
     * @param string $preferredCarrier
     * @return void
     */
    public function setNavlungo(
        string $accessToken,
        string $shipmentStrategy,
        string $preferredCarrier
    ): void
    {
        $this->configs[self::SERVICE_NAVLUNGO] = [
            'access_token' => $accessToken,
            'shipment_strategy' => $shipmentStrategy,
            'preferred_carrier' => $preferredCarrier
        ];
    }

    /**
     * @return array
     */
    public function getNavlungo(): array
    {
        if (!isset($this->configs[self::SERVICE_NAVLUNGO])) {
            return [];
        }

        return $this->configs[self::SERVICE_NAVLUNGO];
    }
}
