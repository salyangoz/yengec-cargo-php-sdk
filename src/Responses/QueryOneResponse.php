<?php

namespace Yengec\Cargo\Responses;

use Yengec\Cargo\Responses\Order\Order;
use Yengec\Cargo\Responses\Order\OrderInterface;

/**
 * Class QueryResponse
 * @package Yengec\Cargo\Responses
 */
class QueryOneResponse extends Response
{
    /**
     * @var OrderInterface
     */
    protected OrderInterface $order;

    /**
     * QueryResponse constructor.
     * @param \Psr\Http\Message\ResponseInterface $response
     * @throws \Yengec\Cargo\Exceptions\InvalidResponseException
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct($response);
        $order = $this->getBody();

        $this->setOrder(new Order(
            $order['identity'],
            $order['status'],
            $order['message'],
            $order['error_code'],
            $order['tracking_code'],
            $order['tracking_url'],
            $order['label'] ?? null,
            $order['receipt'] ?? null,
            $order['shipping_company'] ?? null,
            $order['deci'] ?? null,
            $order['parcel'] ?? null,
            $order['package_count'] ?? null,
        ));
    }

    /**
     * @return OrderInterface
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param OrderInterface $order
     */
    public function setOrder(OrderInterface $order): void
    {
        $this->order = $order;
    }
}
