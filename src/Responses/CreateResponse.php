<?php

namespace Yengec\Cargo\Responses;

use Psr\Http\Message\ResponseInterface;
use Yengec\Cargo\Responses\Order\Order;
use Yengec\Cargo\Responses\Order\OrderCollection;
use Yengec\Cargo\Exceptions\InvalidResponseException;
use Yengec\Cargo\Responses\Order\OrderCollectionInterface;

/**
 * Class CreateResponse
 * @package Yengec\Cargo\Responses
 */
class CreateResponse extends Response
{
    /**
     * @var OrderCollection|OrderCollectionInterface
     */
    public OrderCollectionInterface $orders;

    /**
     * CreateResponse constructor.
     * @param ResponseInterface $response
     * @throws InvalidResponseException
     */
    public function __construct(ResponseInterface $response)
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
                    $order['error_code'] ?? null,
                    $order['tracking_code'],
                    $order['tracking_url'],
                    $order['label'],
                    $order['receipt']
                )
            );
        }, $ordersAsArray);

        $this->setOrders($collection);
    }

    /**
     * @return OrderCollectionInterface
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param OrderCollectionInterface $orders
     */
    public function setOrders($orders): void
    {
        $this->orders = $orders;
    }
}
