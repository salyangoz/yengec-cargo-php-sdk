<?php

namespace Yengec\Cargo\Requests;

use GuzzleHttp\HandlerStack;

interface RequestConfigInterface
{
    /**
     * @return string
     */
    public function getMode(): string;

    /**
     * @param string $mode
     */
    public function setMode(string $mode): void;

    /**
     * @return string
     */
    public function getLanguage(): string;

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void;

    /**
     * @return string
     */
    public function getService(): string;

    /**
     * @param string $service
     */
    public function setService(string $service): void;

    /**
     * @return ConfigInterface
     */
    public function getConfig(): ConfigInterface;

    /**
     * @param ConfigInterface $config
     */
    public function setConfig(ConfigInterface $config): void;

    public function setBaseUrl(string $basUrl): void;

    public function getBaseUrl(): ?string;

    public function setHandler(HandlerStack $handler): void;

    public function getHandler() : ?HandlerStack;

    public function setLogActive(bool $log): void;

    public function isLogActive() : bool;
}
