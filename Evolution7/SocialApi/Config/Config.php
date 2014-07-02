<?php

namespace Evolution7\SocialApi\Config;

class Config implements ConfigInterface
{
    const PLATFORM_INSTAGRAM = 'instagram';
    const PLATFORM_TWITTER = 'twitter';

    /**
     * {@inheritdoc}
     */
    public static function validatePlatform($platform)
    {
        switch ($platform) {
            case self::PLATFORM_INSTAGRAM:
            case self::PLATFORM_TWITTER:
                return true;
            default:
                return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function __construct($platform, $apiKey, $apiSecret, $apiScopes, $returnUrl)
    {
        $this->setPlatform($platform);
        $this->setApiKey($apiKey);
        $this->setApiSecret($apiSecret);
        $this->setApiScopes($apiScopes);
        $this->setReturnUrl($returnUrl);
    }

    /**
     * {@inheritdoc}
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * {@inheritdoc}
     */
    public function setPlatform($platform)
    {
        if (self::validatePlatform($platform)) {
            $this->platform = $platform;
        } else {
            throw new \InvalidArgumentException(
                sprintf("Platform '%s' not supported", $platform)
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getApiSecret()
    {
        return $this->apiSecret;
    }

    /**
     * {@inheritdoc}
     */
    public function setApiSecret($apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    /**
     * {@inheritdoc}
     */
    public function getApiScopes()
    {
        return $this->apiScopes;
    }

    /**
     * {@inheritdoc}
     */
    public function setApiScopes($apiScopes)
    {
        $this->apiScopes = $apiScopes;
    }

    /**
     * {@inheritdoc}
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }
}
