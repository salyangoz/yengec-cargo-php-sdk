<?php

namespace Yengec\Cargo\Requests;

interface RequestInterface
{
    public function __construct(RequestConfigInterface $requestConfig);

    public function getPath();
}
