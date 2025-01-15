<?php

namespace Yengec\Cargo\Requests;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;

abstract class Request implements RequestInterface
{
    public const BASE_URI = 'https://cargo.yengec.co/';
    public const TEST_BASE_URI = 'https://cargo-test.yengec.co/';

    protected string $language;
    protected string $service;
    protected string $mode;
    protected ConfigInterface $config;
    protected Client $httpClient;
    protected bool $log = false;

    public function __construct(RequestConfigInterface $requestConfig)
    {
        $baseUrl = $requestConfig->getBaseUrl();
        if (!$baseUrl) {
            $baseUrl = $requestConfig->getMode() == 'live' ? self::BASE_URI : self::TEST_BASE_URI;
        }

        $this->setMode($requestConfig->getMode());
        $this->setLanguage($requestConfig->getLanguage());
        $this->setService($requestConfig->getService());
        $this->setConfig($requestConfig->getConfig());
        $this->setLogActive($requestConfig->isLogActive());

        $this->httpClient = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 60,
            'handler' => $requestConfig->getHandler(),
            'headers' => [
                'Accept-Language' => $requestConfig->getLanguage()
            ]
        ]);
    }

    public function send()
    {
        return $this->httpClient->post($this->getPath(), [
            'json' => $this->toArray()
        ]);
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

    public function getPath()
    {
        return static::PATH;
    }

    public function isLogActive(): bool
    {
        return $this->log;
    }

    public function setLogActive(bool $log): void
    {
        $this->log = $log;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'service'  => $this->getService(),
            'mode'     => $this->getMode(),
            'config'   => $this->getConfig()->get($this->getService()),
            'language' => $this->getLanguage(),
            'log'      => $this->isLogActive()
        ];
    }
}
