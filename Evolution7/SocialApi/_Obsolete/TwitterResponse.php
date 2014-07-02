<?php

namespace Evolution7\SocialApi\ApiResponse;

use Evolution7\SocialApi\Config\Config;
use Evolution7\SocialApi\ApiResponse\ApiResponse;

/**
 * Handle parsing Twitter API responses
 */
class TwitterResponse extends ApiResponse
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getArrayValue('id_str');
    }

    /**
     * {@inheritdoc}
     */
    public function getCreated()
    {
        $value = $this->getArrayValue('created_at');
        return !is_null($value) ? new \DateTime($value) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getPlatform()
    {
        return Config::PLATFORM_TWITTER;
    }
}
