<?php

namespace Yengec\Cargo\Requests\Create;

interface OrderCollectionInterface
{
    /**
     * @param OrderInterface $order
     */
    public function add(OrderInterface $order): void;

    /**
     * @return array
     */
    public function toArray(): array;
}
