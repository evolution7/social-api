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
     * Get field value as raw
     */
    public function getRawSubset($key)
    {
        
        // Get array value
        $arrayValue = $this->getArrayValue($key);

        // Return encoded as json
        if (!is_null($arrayValue)) {
            return json_encode($arrayValue);
        } else {
            return null;
        }

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
     * {@inheritdoc}
     */
    public function getArrayValue($key)
    {

        // Get array
        $array = $this->getArray();

        // Make key an array if string given
        if (!is_array($key)) {
            $key = array($key);
        }

        // Iterate over key dimensions and check key exists
        $dimensions = count($key);
        for ($iArray = $array, $i = 0; $i < $dimensions; ++$i) {
            $iKey = $key[$i];
            if (!is_array($iArray) || !array_key_exists($iKey, $iArray)) {
                return null;
            }
            $iArray = $iArray[$iKey];
        }

        // Return
        if (!is_null($iArray) && !is_array($iArray)) {
            return mb_convert_encoding($iArray, 'ISO-8859-15', 'auto');
        } else {
            return $iArray;
        }

    }
}
