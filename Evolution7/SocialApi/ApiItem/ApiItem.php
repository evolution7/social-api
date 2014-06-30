<?php

namespace Evolution7\SocialApi\ApiItem;

use Evolution7\SocialApi\Exception\NotImplementedException;

class ApiItem implements ApiItemInterface
{

    private $raw;
    private $format;
    private $array;

    public function __construct($raw, $format = 'json')
    {
        $this->raw = $raw;
        $this->format = $format;
    }

    public function getRaw()
    {
        return $this->raw;   
    }

    public function getFormat()
    {
        return $this->format;
    }

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
