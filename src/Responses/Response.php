<?php

namespace Yengec\Cargo\Responses;

use Psr\Http\Message\ResponseInterface;
use Yengec\Cargo\Exceptions\InvalidResponseException;

/**
 * Class Response
 * @package Yengec\Cargo\Responses
 */
class Response implements \Yengec\Cargo\Responses\ResponseInterface
{
    /**
     * @var ResponseInterface
     */
    protected \Psr\Http\Message\ResponseInterface $response;
    /**
     * @var string
     */
    protected string $code;
    /**
     * @var string
     */
    protected ?string $message;

    protected ?array $body;

    /**
     * Response constructor.
     * @param ResponseInterface $response
     * @throws InvalidResponseException
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        $this->response = $response;
        $array = self::toArray($response);
        if (!$array) {
            throw new InvalidResponseException();
        }

        $meta = $array['meta'];
        self::setCode($meta['code']);
        self::setMessage($meta['message']);
        self::setBody($array['data']);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    public static function toArray(ResponseInterface $response): array
    {
        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return array|null
     */
    public function getBody(): ?array
    {
        return $this->body;
    }

    /**
     * @param array|null $body
     */
    public function setBody(?array $body): void
    {
        $this->body = $body;
    }
}
