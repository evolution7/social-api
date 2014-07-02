<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Config\Config;
use Evolution7\SocialApi\Config\ConfigInterface;
use Evolution7\SocialApi\Token\AccessTokenInterface;

/**
 * Factory class for retrieving an ApiService instance
 */
class ServiceFactory
{
    /**
     * Retrieve an ApiService instance
     *
     * @param  ConfigInterface      $config
     * @param  AccessTokenInterface $accessToken
     *
     * @return ServiceInterface
     */
    public static function get(ConfigInterface $config, AccessTokenInterface $accessToken = null)
    {
        $platform = $config->getPlatform();
        switch ($platform) {
            case Config::PLATFORM_INSTAGRAM:
                return new Instagram($config, $accessToken);
                break;
            case Config::PLATFORM_TWITTER:
                return new Twitter($config, $accessToken);
                break;
            default:
                throw new \InvalidArgumentException(
                    sprintf('ApiService for %s platform does not exist', $platform)
                );
        }
    }
}
