<?php

namespace Evolution7\SocialApi\Config;

interface ConfigInterface
{
    /**
     * Constructor
     *
     * @param string $platform
     * @param string $apiKey
     * @param string $apiSecret
     * @param array  $apiScopes
     * @param string $returnUrl
     */
    public function __construct($platform, $apiKey, $apiSecret, $apiScopes, $returnUrl);

    /**
     * Get platform
     *
     * @return string
     */
    public function getPlatform();

    /**
     * Set platform
     *
     * @param string $platform
     */
    public function setPlatform($platform);

    /**
     * Get API key
     *
     * @return string
     */
    public function getApiKey();

    /**
     * Set API key
     *
     * @param string $apiKey
     */
    public function setApiKey($apiKey);

    /**
     * Get API secret
     *
     * @return string
     */
    public function getApiSecret();

    /**
     * Set API secret
     *
     * @param string $apiSecret
     */
    public function setApiSecret($apiSecret);

    /**
     * Get API scopes
     *
     * @return array
     */
    public function getApiScopes();

    /**
     * Set API scopes
     *
     * @param array $apiScopes
     */
    public function setApiScopes($apiScopes);

    /**
     * Get return url
     *
     * @return string
     */
    public function getReturnUrl();

    /**
     * Set return url
     *
     * @param string $returnUrl
     */
    public function setReturnUrl($returnUrl);
}
