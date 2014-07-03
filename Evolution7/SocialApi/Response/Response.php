<?php

namespace Evolution7\SocialApi\Response;

use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\Exception\NotSupportedByAPIException;

class Response implements ResponseInterface
{
    private $raw;
    private $format;
    private $array;

    /**
     * {@inheritdoc}
     */
    public function __construct($raw, $format = 'json')
    {
        // Save data
        $this->raw = $raw;
        $this->format = $format;
    }

    /**
     * {@inheritdoc}
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritdoc}
     */
    public function getArray()
    {
        if ($this->getFormat() == 'json') {
            if (is_null($this->array)) {
                $this->array = json_decode($this->raw, true);
            }
            return $this->array;
        } else {
            throw new NotImplementedException();
        }
    }
}
