<?php

namespace Yengec\Cargo\Responses\Order;

interface OrderCollectionInterface
{
    public function add(OrderInterface $order);

    public function each(\Closure $callback);
}
