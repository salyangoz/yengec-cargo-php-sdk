<?php

namespace Yengec\Cargo\Requests\Create;

interface OrderItemCollectionInterface
{
    /**
     * @param OrderItemInterface $order
     */
    public function add(OrderItemInterface $order): void;

    /**
     * @return array
     */
    public function toArray(): array;
}
