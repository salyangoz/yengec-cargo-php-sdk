<?php

namespace Yengec\Cargo;

use Closure;
use Yengec\Cargo\Exceptions\ServiceException;
use Yengec\Cargo\Requests\CancelRequest;
use Yengec\Cargo\Requests\Create\OrderInterface;
use Yengec\Cargo\Requests\CreateOneRequest;
use Yengec\Cargo\Requests\InvoiceRequest;
use Yengec\Cargo\Requests\QueryOneRequest;
use Yengec\Cargo\Responses\CreateOneResponse;
use Yengec\Cargo\Responses\QueryOneResponse;
use Yengec\Cargo\Responses\Response;
use Yengec\Cargo\Requests\TestRequest;
use GuzzleHttp\Exception\ClientException;
use Yengec\Cargo\Responses\ResponseInterface;
use Yengec\Cargo\Exceptions\BadRequestException;
use Yengec\Cargo\Requests\RequestConfigInterface;
use Yengec\Cargo\Exceptions\ServiceConfigException;
use Yengec\Cargo\Exceptions\InvalidRequestException;
use Yengec\Cargo\Exceptions\InvalidAddressException;
use Yengec\Cargo\Exceptions\InvalidResponseException;

/**
 * Class Client
 * @package Yengec\Cargo\
 */
class Client
{

    /**
     * @param RequestConfigInterface $requestConfig
     * @throws BadRequestException
     * @throws InvalidRequestException
     * @throws InvalidResponseException
     * @throws ServiceConfigException|InvalidAddressException|ServiceException
     */
    public static function test(RequestConfigInterface $requestConfig): void
    {
        $request = new TestRequest($requestConfig);
        self::withHandler(function () use ($request) {
            $request->send();
        });
    }

    /**
     * @param RequestConfigInterface $requestConfig
     * @param OrderInterface $order
     * @return CreateOneResponse
     * @throws BadRequestException
     * @throws InvalidAddressException
     * @throws InvalidRequestException
     * @throws InvalidResponseException
     * @throws ServiceConfigException|ServiceException
     */
    public static function createOne(
        RequestConfigInterface $requestConfig,
        OrderInterface $order
    ): CreateOneResponse {
        $request = new CreateOneRequest($requestConfig);
        $request->setOrder($order);
        return self::withHandler(function () use ($request) {
            return new CreateOneResponse($request->send());
        });
    }

    public static function queryOne(
        RequestConfigInterface $requestConfig,
        string $code
    ): QueryOneResponse {
        $request = new QueryOneRequest($requestConfig);
        $request->setCode($code);

        return self::withHandler(function () use ($request) {
            return new QueryOneResponse($request->send());
        });
    }

    public static function cancel(
        RequestConfigInterface $requestConfig,
        string $code
    ): void {
        $request = new CancelRequest($requestConfig);
        $request->setCode($code);

        self::withHandler(function () use ($request) {
            $request->send();
        });
    }


    public static function invoice(
        RequestConfigInterface $requestConfig,
        string $code,
        string $invoiceUrl
    ): void {
        $request = new InvoiceRequest($requestConfig);
        $request->setCode($code);
        $request->setInvoiceUrl($invoiceUrl);

        self::withHandler(function () use ($request) {
            $request->send();
        });
    }

    /**
     * @param Closure $func
     * @return mixed
     * @throws BadRequestException
     * @throws InvalidRequestException
     * @throws InvalidResponseException|ServiceConfigException
     * @throws InvalidAddressException|ServiceException
     */
    public static function withHandler(Closure $func): ?ResponseInterface
    {
        try {
            return $func();
        } catch (ClientException $clientException) {
            $response = new Response($clientException->getResponse());
            switch ($response->getCode()) {
                case 'VALIDATION_ERROR':
                    throw new BadRequestException($response->getMessage());
                case 'INVALID_SERVICE_CONFIG':
                    throw new ServiceConfigException($response->getMessage());
                case 'INVALID_ADDRESS':
                    throw new InvalidAddressException($response->getMessage());
                case 'SERVICE_EXCEPTION':
                    throw new ServiceException($response->getMessage());
                default:
                    throw new InvalidRequestException($response->getMessage());
            }
        }
    }
}
