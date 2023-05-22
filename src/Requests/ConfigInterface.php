<?php

namespace Yengec\Cargo\Requests;

interface ConfigInterface
{
    public function setYurtici(string $username, string $password): void;

    public function getYurtici(): array;

    public function setMng(string $username, string $password): void;

    public function getMng(): array;

    public function setUps(string $username, string $password, string $userCode): void;

    public function getUps(): array;

    public function setAras(string $username, string $password, string $userCode): void;

    public function getAras(): array;

    public function setSurat(string $username, string $password, string $createPassword): void;

    public function getSurat(): array;

    public function setPtt(
        string $username,
        string $password,
        ?string $paymentAccountId = null
    ): void;

    public function getPtt(): array;

    public function get(string $service): array;

    public function setHepsijet(
        string $username,
        string $password,
        string $userCode,
        string $warehouseId,
        string $companyName
    ): void;

    public function getHepsijet(): array;

    public function setHepsilojistik(
        string $username,
        string $password
    ): void;

    public function getHepsilojistik(): array;
}
