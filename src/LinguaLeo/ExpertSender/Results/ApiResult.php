<?php

namespace LinguaLeo\ExpertSender\Results;

use Psr\Http\Message\ResponseInterface;

class ApiResult
{
    protected \Psr\Http\Message\ResponseInterface $response;

    /**
     * @var int
     */
    protected $errorCode = 0;

    /**
     * @var int
     */
    protected $responseCode;

    /**
     * @var string
     */
    protected $errorMessage = '';

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->responseCode = $this->response->getStatusCode();
        $this->buildData();
    }

    public function isOk(): bool
    {
        return
            ($this->responseCode >= 200) &&
            ($this->responseCode <= 299) &&
            (!$this->errorCode || (($this->errorCode >= 200) && ($this->errorCode <= 299)));
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return int
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    protected function buildData()
    {
        try {
            $content = $this->response->getBody()->__toString();
            if (preg_match('~<Code>(.+)</Code>~', $content, $matches)) {
                $this->errorCode = (int) $matches[1];
            }
            if (preg_match('~<Message>(.+)</Message>~', $content, $matches)) {
                $this->errorMessage = $matches[1];
            }
        } catch (\RuntimeException $exception) {
            $this->errorCode = 500;
            $this->errorMessage = $exception->getMessage();
        }
    }
}
