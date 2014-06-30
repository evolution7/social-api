<?php

namespace Evolution7\SocialApi\ApiResponse;

interface ApiResponseInterface
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
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getRaw();

    /**
     * Get original API format for item
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getFormat();

    /**
     * Get API response parsed into an array
     *
     * @throws NotSupportedByAPIException
     * @throws NotImplementedException
     *
     * @return array
     */
    public function getArray();

}
