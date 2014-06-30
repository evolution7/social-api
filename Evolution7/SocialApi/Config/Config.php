<?php

namespace Evolution7\SocialApi\Config;

class Config implements ConfigInterface
{
    const PLATFORM_INSTAGRAM = 'instagram';
    const PLATFORM_TWITTER = 'twitter';

    public function __construct($platform, $apiKey, $apiSecret, $apiScopes, $returnUrl)
    {
        $this->setPlatform($platform);
        $this->setApiKey($apiKey);
        $this->setApiSecret($apiSecret);
        $this->setApiScopes($apiScopes);
        $this->setReturnUrl($returnUrl);
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function setPlatform($platform)
    {
        $platform = trim(strtolower($platform));
        switch ($platform) {
            case self::PLATFORM_INSTAGRAM:
            case self::PLATFORM_TWITTER:
                $this->platform = $platform;
                break;
            default:
                throw new \InvalidArgumentException(
                    sprintf("Platform '%s' not supported", $platform)
                );
                break;
        }
        
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiSecret()
    {
        return $this->apiSecret;
    }

    public function setApiSecret($apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    public function getApiScopes()
    {
        return $this->apiScopes;
    }

    public function setApiScopes($apiScopes)
    {
        $this->apiScopes = $apiScopes;
    }

    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    public function setReturnUrl($returnUrl)
    {
        $this->returnUrl = $returnUrl;
    }
}
