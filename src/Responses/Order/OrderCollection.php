<?php

namespace Yengec\Cargo\Responses\Order;

/**
 * Class OrderCollection
 * @package Yengec\Cargo\Responses\Create
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
    public function add(OrderInterface $order)
    {
        $this->orders[] = $order;
    }

    /**
     * @param \Closure $callback
     */
    public function each(\Closure $callback): void
    {
        foreach ($this->getOrders() as $order) {
            $callback($order);
        }
    }

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }
}
