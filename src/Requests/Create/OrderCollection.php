<?php

namespace Yengec\Cargo\Requests\Create;

/**
 * Class OrderCollection
 * @package Yengec\Cargo\
 */
class OrderCollection implements OrderCollectionInterface
{
    /**
     * @var array
     */
    public array $orders;

    /**
     * @param OrderInterface $order
     */
    public function add(OrderInterface $order): void
    {
        $this->orders[] = $order;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_map(function (OrderInterface $order) {
            return $order->toArray();
        }, $this->orders);
    }
}
