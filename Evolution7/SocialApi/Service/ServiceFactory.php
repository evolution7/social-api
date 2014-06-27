<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Config\Config;
use Evolution7\SocialApi\Config\ConfigInterface;
use Evolution7\SocialApi\Service;

/**
 * Factory class for retrieving an ApiService instance
 */
class ServiceFactory
{

    /**
     * Retrieve an ApiService instance
     *
     * @param  ConfigInterface
     * @return ServiceInterface
     */
    public static function get(ConfigInterface $config)
    {
        $platform = $config->getPlatform();
        switch ($platform) {
            case Config::PLATFORM_INSTAGRAM:
                return new Service\Instagram($config);
                break;
            case Config::PLATFORM_TWITTER:
                return new Service\Twitter($config);
                break;
            default:
                throw new \InvalidArgumentException(
                    sprintf('ApiService for %s platform does not exist', $platform)
                );
        }
    }

}
