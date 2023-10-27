<?php

namespace Yengec\Cargo\Responses;

use Psr\Http\Message\ResponseInterface;
use Yengec\Cargo\Responses\Order\Order;
use Yengec\Cargo\Exceptions\InvalidResponseException;
use Yengec\Cargo\Responses\Order\OrderInterface;

/**
 * Class CreateResponse
 * @package Yengec\Cargo\Responses
 */
class CreateOneResponse extends Response
{
    /**
     * @var OrderInterface
     */
    public OrderInterface $order;

    /**
     * CreateResponse constructor.
     * @param ResponseInterface $response
     * @throws InvalidResponseException
     */
    public function __construct(ResponseInterface $response)
    {
        parent::__construct($response);
        $order = $this->getBody()['order'];

        $this->setOrder(new Order(
            $order['identity'],
            $order['status'],
            $order['message'],
            $order['error_code'] ?? null,
            $order['tracking_code'],
            $order['tracking_url'],
            $order['label'],
            $order['receipt']
        ));
    }

    /**
     * @return OrderInterface
     */
    public function getOrder(): OrderInterface
    {
        return $this->order;
    }

    /**
     * @param OrderInterface $order
     */
    public function setOrder(OrderInterface $order): void
    {
        $this->order = $order;
    }
}
