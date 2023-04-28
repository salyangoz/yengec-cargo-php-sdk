<?php

namespace Yengec\Cargo\Requests;

use Yengec\Cargo\Requests\Create\OrderCollectionInterface;

class CreateRequest extends Request
{
    /**
     * Endpoint
     */
    public const PATH = 'shipment/create';

    /**
     * @var OrderCollectionInterface
     */
    public OrderCollectionInterface $orders;

    /**
     * @param OrderCollectionInterface $collection
     */
    public function setOrders(OrderCollectionInterface $collection): void
    {
        $this->orders = $collection;
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
