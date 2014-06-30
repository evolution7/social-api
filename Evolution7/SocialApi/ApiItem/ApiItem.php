<?php

namespace Evolution7\SocialApi\ApiItem;

use Evolution7\SocialApi\Exception\NotImplementedException;

class ApiItem implements ApiItemInterface
{

    private $raw;
    private $format;
    private $array;

    /**
     * {@inheritdoc}
     */
    public function __construct($raw, $format = 'json')
    {
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

    /**
     * Get field value or null if field does not exist
     *
     * @param string $key
     *
     * @return mixed
     */
    protected function getArrayValue($key)
    {
        $array = $this->getArray();
        if (array_key_exists($key, $array)) {
            return $array[$key];
        } else {
            return null;
        }
    }

}
