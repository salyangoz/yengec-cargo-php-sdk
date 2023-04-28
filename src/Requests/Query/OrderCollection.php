<?php

namespace Yengec\Cargo\Requests\Query;

/**
 * Class OrderCollection
 * @package Yengec\Cargo\Requests\Query
 */
class OrderCollection implements OrderCollectionInterface
{
    /**
     * @var array
     */
    protected array $orders;

    /**
     * @param string $orderIdentity
     */
    public function add(string $orderIdentity)
    {
        $this->orders[] = $orderIdentity;
    }

    public function toArray(): array
    {
        return $this->orders;
    }
}
