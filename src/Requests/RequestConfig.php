<?php

namespace Yengec\Cargo\Requests;

use GuzzleHttp\HandlerStack;

/**
 * Class RequestConfig
 * @package Yengec\Cargo\Requests
 */
class RequestConfig implements RequestConfigInterface
{
    /**
     * @var string
     */
    public string $mode;
    /**
     * @var string
     */
    public string $language;
    /**
     * @var string
     */
    public string $service;
    /**
     * @var ConfigInterface
     */
    public ConfigInterface $config;

    public ?string $baseUrl = null;

    public ?HandlerStack $handler = null;

    public bool $log = false;

    /**
     * @param string $mode
     * @param string $language
     * @param string $service
     * @param ConfigInterface $config
     * @param string|null $baseUrl
     * @param HandlerStack|null $handler
     */
    public function __construct(
        string $mode,
        string $language,
        string $service,
        ConfigInterface $config,
        ?string $baseUrl = null,
        ?HandlerStack $handler = null
    ) {
        $this->setMode($mode);
        $this->setLanguage($language);
        $this->setService($service);
        $this->setConfig($config);
        if ($baseUrl) {
            $this->setBaseUrl($baseUrl);
        }
        if ($handler) {
            $this->setHandler($handler);
            $this->setLog(true);
        }
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService(string $service): void
    {
        $this->service = $service;
    }

    /**
     * @return ConfigInterface
     */
    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    /**
     * @param ConfigInterface $config
     */
    public function setConfig(ConfigInterface $config): void
    {
        $this->config = $config;
    }

    public function setBaseUrl(string $basUrl): void
    {
        $this->baseUrl = $basUrl;
    }

    public function getBaseUrl(): ?string
    {
        return $this->baseUrl;
    }

    public function setHandler(HandlerStack $handler): void
    {
        $this->handler = $handler;
    }

    public function getHandler(): ?HandlerStack
    {
        return $this->handler;
    }

    public function isLog(): bool
    {
        return $this->log;
    }

    public function setLog(bool $log): void
    {
        $this->log = $log;
    }
}
