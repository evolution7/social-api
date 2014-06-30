<?php

namespace Evolution7\SocialApi\ApiItem;

interface ApiItemInterface
{

    /**
     * Constructor
     *
     * @param string $raw    - unprocessed API response
     * @param string $format - json by default
     */
    public function __construct($raw, $format = 'json');

    /**
     * Get original API response for item
     *
     * @throws NotImplementedException;
     * @return string
     */
    public function getRaw();

    /**
     * Get original API format for item
     *
     * @throws NotImplementedException;
     * @return string
     */
    public function getFormat();

    /**
     * Get API response parsed into an array
     *
     * @throws NotImplementedException;
     * @return array
     */
    public function getArray();

}
