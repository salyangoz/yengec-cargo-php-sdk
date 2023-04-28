<?php

namespace Yengec\Cargo\Requests;

use Yengec\Cargo\Requests\Query\OrderCollectionInterface;

/**
 * Class QueryRequest
 * @package Yengec\Cargo\Requests
 */
class QueryRequest extends Request
{
    /**
     * Endpoint
     */
    public const PATH = 'shipment/query';

    /**
     * @var OrderCollectionInterface
     */
    protected OrderCollectionInterface $orders;

    /**
     * @param OrderCollectionInterface $orders
     */
    public function setOrders(OrderCollectionInterface $orders): void
    {
        $this->orders = $orders;
    }

    /**
     * @return OrderCollectionInterface
     */
    public function getOrders(): OrderCollectionInterface
    {
        return $this->orders;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'orders' => $this->getOrders()->toArray()
        ]);
    }
}
