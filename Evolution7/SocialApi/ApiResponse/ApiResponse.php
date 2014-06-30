<?php

namespace Evolution7\SocialApi\ApiResponse;

use Evolution7\SocialApi\Exception\NotImplementedException;

class ApiResponse implements ApiResponseInterface
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
     * Get field value as raw
     */
    protected function getRawSubset($key)
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
     * Get field value or null if field does not exist
     *
     * @param string $key
     *
     * @return mixed
     */
    protected function getArrayValue($key)
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
            if (!array_key_exists($iKey, $iArray)) {
                return null;
            }
            $iArray = $iArray[$iKey];
        }

        // Return
        return $iArray;

    }

}
