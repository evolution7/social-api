<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Config\ConfigInterface;
use Evolution7\SocialApi\Token\RequestToken;
use Evolution7\SocialApi\Token\RequestTokenInterface;
use Evolution7\SocialApi\Token\AccessTokenInterface;
use OAuth\Common\Service\ServiceInterface as OAuthServiceInterface;

interface ServiceInterface
{

    /**
     * Constructor
     *
     * @param ConfigInterface      $config
     * @param AccessTokenInterface $accessToken
     */
    public function __construct(ConfigInterface $config, AccessTokenInterface $accessToken = null);

    /**
     * Get instance Config object
     *
     * @return ConfigInterface
     */
    public function getConfig();

    /**
     * Save Config object to service
     *
     * @param ConfigInterface $config
     */
    public function setConfig(ConfigInterface $config);

    /**
     * Get instance AccessToken object
     *
     * @return AccessToken
     */
    public function getAccessToken();

    /**
     * Save AccessToken object to service
     *
     * @param AccessToken $accessToken
     */
    public function setAccessToken(AccessTokenInterface $accessToken);

    /**
     * Create instance of OAuth library Service
     *
     * @return OAuthServiceInterface
     */
    public function getLibService();

    /**
     * Get OAuth request token
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     *
     * @return RequestToken
     */
    public function getAuthRequest();

    /**
     * Get OAuth access token
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     *
     * @param RequestTokenInterface $requestToken
     * @param string                $token           - e.g. $_GET['oauth_token']
     * @param string                $verifier        - e.g. $_GET['oauth_verifier']
     * @param string                $code            - e.g. $_GET['code']
     *
     * @return AccessToken
     */
    public function getAuthAccess(RequestTokenInterface $requestToken, $token, $verifier, $code);










    /**
     * Search for a value through the API
     *
     * @param string $searchTerm
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @return array of ApiItemInterface instances
     */
    //public function search($searchTerm);

    /**
     * Searches for instances of a specific tag after the provided time
     *
     * @param string $tag
     * @param \DateTime $since
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @return array of ApiItemInterface instances
     */
    //public function searchForTagSince($tag, \DateTime $since);

    /**
     * Post a comment on a provided object
     *
     * @param string $objectId the unique identifier of the object
     * @param string $objectType the type of object
     * @param string $message the message that needs to be sent
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @return boolean
     */
    //public function comment($objectId, $objectType, $message);

    /**
     * Sends a message to a user
     *
     * @param string $userId The unique identifier of a user on the service
     * @param string $message The message that needs to be sent
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     * @return boolean
     */
    //public function message($userId, $message);

    /**
     * Returns the official API interface instance
     *
     * This method should be used as sparingly as possible, but sometimes
     * a functionality might be needed that is specific to a service.
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @return \Object
     */
    //public function getOriginalApi();
    
}
