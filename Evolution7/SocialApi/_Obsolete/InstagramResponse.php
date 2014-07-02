<?php

namespace Evolution7\SocialApi\ApiResponse;

use Evolution7\SocialApi\Config\Config;
use Evolution7\SocialApi\ApiResponse\ApiResponse;

/**
 * Handle parsing Instagram API responses
 */
class InstagramResponse extends ApiResponse
{
    private $hasRootElement;

    protected function hasRootElement()
    {
        if (is_null($this->hasRootElement)) {
            $this->hasRootElement = !is_null($this->getArrayValue('data'));
        }
        return $this->hasRootElement;
    }

    /**
     * {@inheritdoc}
     */
    public function getPlatform()
    {
        return Config::PLATFORM_INSTAGRAM;
    }
}
