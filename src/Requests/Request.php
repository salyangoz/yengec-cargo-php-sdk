<?php

namespace Yengec\Cargo\Requests;

use GuzzleHttp\Client;

abstract class Request implements RequestInterface
{
    public const BASE_URI = 'https://cargo.yengec.co/';
    public const TEST_BASE_URI = 'https://cargo-test.yengec.co/';

    protected string $language;
    protected string $service;
    protected string $mode;
    protected ConfigInterface $config;
    protected Client $httpClient;

    public function __construct(RequestConfigInterface $requestConfig)
    {
        $this->setMode($requestConfig->getMode());
        $this->setLanguage($requestConfig->getLanguage());
        $this->setService($requestConfig->getService());
        $this->setConfig($requestConfig->getConfig());
        $this->httpClient = new Client([
            'base_uri' => $requestConfig->getMode() == 'live' ? self::BASE_URI : self::TEST_BASE_URI,
            'timeout' => 60
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

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'service'  => $this->getService(),
            'mode'     => $this->getMode(),
            'config'   => $this->getConfig()->get($this->getService()),
            'language' => $this->getLanguage()
        ];
    }
}
