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
     * Get current authenticated user
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     *
     * @return ApiUserInterface[]
     */
    public function getCurrentUser();

    /**
     * Search API using Query object
     *
     * @param QueryInterface $query
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     *
     * @return ApiResponseInterface[]
     */
    public function search(QueryInterface $query);

    /**
     * Commont on ApiPostInterface
     *
     * @param ApiPostInterface $post
     * @param string           $comment
     *
     * @throws \Evolution7\SocialApi\Exception\NotImplementedException;
     * @throws \Evolution7\SocialApi\Exception\NotSupportedByAPIException;
     *
     * @return ApiResponseInterface[]
     */
    public function comment(ApiPostInterface $post, $comment);
}
