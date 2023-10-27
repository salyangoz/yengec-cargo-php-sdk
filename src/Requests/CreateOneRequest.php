<?php

namespace Yengec\Cargo\Requests;

use Yengec\Cargo\Requests\Create\OrderInterface;

class CreateOneRequest extends Request
{
    /**
     * Endpoint
     */
    public const PATH = 'shipment';

    /**
     * @var OrderInterface
     */
    public OrderInterface $order;

    /**
     * @param OrderInterface $order
     */
    public function setOrder(OrderInterface $order): void
    {
        $this->order = $order;
    }

    /**
     * @return OrderInterface
     */
    public function getOrder(): OrderInterface
    {
        return $this->order;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'order' => $this->getOrder()->toArray()
        ]);
    }
}
