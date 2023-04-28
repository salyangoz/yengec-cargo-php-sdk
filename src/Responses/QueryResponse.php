<?php

namespace Yengec\Cargo\Responses;

use Yengec\Cargo\Responses\Order\Order;
use Yengec\Cargo\Responses\Order\OrderCollection;
use Yengec\Cargo\Responses\Order\OrderCollectionInterface;

/**
 * Class QueryResponse
 * @package Yengec\Cargo\Responses
 */
class QueryResponse extends Response
{
    /**
     * @var OrderCollectionInterface
     */
    protected OrderCollectionInterface $orders;

    /**
     * QueryResponse constructor.
     * @param \Psr\Http\Message\ResponseInterface $response
     * @throws \Yengec\Cargo\Exceptions\InvalidResponseException
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct($response);
        $ordersAsArray = $this->getBody()['orders'];

        $collection = new OrderCollection();
        array_map(function ($order) use (&$collection) {
            $collection->add(
                new Order(
                    $order['identity'],
                    $order['status'],
                    $order['message'],
                    $order['error_code'],
                    $order['tracking_code'],
                    $order['tracking_url'],
                    $order['deci'],
                    $order['package_count']
                )
            );
        }, $ordersAsArray);

        $this->setOrders($collection);
    }

    /**
     * @return OrderCollection|OrderCollectionInterface
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param OrderCollection|OrderCollectionInterface $orders
     */
    public function setOrders($orders): void
    {
        $this->orders = $orders;
    }
}
