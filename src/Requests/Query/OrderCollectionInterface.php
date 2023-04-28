<?php

namespace Yengec\Cargo\Requests\Query;

interface OrderCollectionInterface
{
    /**
     * @param string $orderIdentity
     */
    public function add(string $orderIdentity);

    public function toArray(): array;
}
