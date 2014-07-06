<?php

namespace Evolution7\SocialApi\Response;

use Evolution7\SocialApi\Exception\ResponseFormatNotSupportedException;
use Evolution7\SocialApi\Exception\ResponseInvalidException;

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
        // Process data
        switch ($format) {
            case 'json':
                $this->processJson();
                break;
            default:
                throw new ResponseFormatNotSupportedException();
                break;
        }
    }

    /**
     * Decode JSON response as array
     *
     * @throws ResponseInvalidException
     */
    private function processJson()
    {
        // Decode JSON
        $this->array = json_decode($this->raw, true);
        // Check for errors
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                $error = null;
                break;
            case JSON_ERROR_DEPTH:
                $error = 'Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                $error = 'Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                $error = 'Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                $error = 'Syntax error, malformed JSON';
                break;
            case JSON_ERROR_UTF8:
                $error = 'Malformed UTF-8 characters, possibly incorrectly encoded';
                break;
            default:
                $error = 'Unknown error';
                break;
        }
        // Throw exception if error occured
        if (!is_null($error)) {
            throw new ResponseInvalidException(
                sprintf("Response (JSON) Invalid: %s", $error)
            );
        }
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
        return $this->array;
    }
}
