<?php

namespace Evolution7\SocialApi\Tests\Service;

/**
 * Map API requests to sample responses
 */
interface ResponseMapInterface
{
    /**
     * Simulates making an API request via the OAuth library service
     *
     * @param string|UriInterface $path
     * @param string              $method       HTTP method
     * @param array               $body         Request body if applicable (an associative array will
     *                                          automatically be converted into a urlencoded body)
     * @param array               $extraHeaders Extra headers if applicable. These will override service-specific
     *                                          any defaults.
     *
     * @return string
     */
    public function request($path, $method = 'GET', $body = null, array $extraHeaders = array());
}
