<?php

namespace Yengec\Cargo\Requests\Create;

/**
 * Class OrderCollection
 * @package Yengec\Cargo\
 */
class OrderItemCollection implements OrderItemCollectionInterface
{
    /**
     * @var array
     */
    public array $items = [];

    /**
     * @param OrderItemInterface $item
     */
    public function add(OrderItemInterface $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_map(function (OrderItemInterface $item) {
            return $item->toArray();
        }, $this->items);
    }
}
