<?php
namespace Evolution7\SocialApi\Factory;

/**
 * Factory class for retrieving an API wrapper instance
 */
class Factory
{
    /**
     * Retrieve an API wrapper
     *
     * @param  string $apiType The type of API
     * @return \Evolution7\SocialApi\Interface\ApiInterface
     */
    public static function create($apiType)
    {
        switch ($apiType) {
            case 'facebook':
                return new \Evolution7\SocialApi\Api\Facebook();
                break;

            default:
                throw new \InvalidArgumentException('API type does not exist');
        }
    }
}