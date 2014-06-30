<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Config\ConfigInterface;
use Evolution7\SocialApi\Token\RequestToken;
use Evolution7\SocialApi\Token\RequestTokenInterface;
use Evolution7\SocialApi\Token\AccessToken;
use Evolution7\SocialApi\Token\AccessTokenInterface;

class Service implements ServiceInterface
{

  private $config;
  private $accessToken;
  private $libService;

  public function __construct(ConfigInterface $config, AccessTokenInterface $accessToken = null)
  {
    $this->setConfig($config);
    if (!is_null($accessToken)) {
      $this->setAccessToken($accessToken);
    }
  }

  public function getConfig()
  {
    return $this->config;
  }

  public function setConfig(ConfigInterface $config)
  {
    $this->config = $config;
  }

  public function getAccessToken()
  {
    return $this->accessToken;
  }

  public function setAccessToken(AccessTokenInterface $accessToken)
  {

    $this->accessToken = $accessToken;

    // Get OAuth libray Service instance
    $libService = $this->getLibService();

    // Create and store Oauth library token using access token
    $libStorage = $libService->getStorage();
    if ($libService::OAUTH_VERSION == 1) {
      $libToken = new \OAuth\OAuth1\Token\StdOAuth1Token();
      $libToken->setRequestToken($accessToken->getToken());
      $libToken->setRequestTokenSecret($accessToken->getSecret());
      $libToken->setAccessTokenSecret($accessToken->getSecret());
    } else {
      $libToken = new \OAuth\OAuth2\Token\StdOAuth2Token();
    }
    $libToken->setAccessToken($accessToken->getToken());
    $libStorage->storeAccessToken($libService->service(), $libToken);

  }

  public function getLibService()
  {

    // Check if lib service does not exist
    if (is_null($this->libService)) {

      // Get config
      $config = $this->getConfig();

      // Build new OAuth library service instance
      $libCredentials = new \OAuth\Common\Consumer\Credentials(
        $config->getApiKey(),
        $config->getApiSecret(),
        $config->getReturnUrl()
      );
      $libStorage = new \OAuth\Common\Storage\Memory();
      $libServiceFactory = new \OAuth\ServiceFactory();
      $this->libService = $libServiceFactory->createService(
        $config->getPlatform(),
        $libCredentials,
        $libStorage,
        $config->getApiScopes()
      );

    }

    return $this->libService;

  }

  public function getAuthRequest()
  {

    // Get OAuth libray Service instance
    $libService = $this->getLibService();

    // Check if OAuth1
    if (method_exists($libService, 'requestRequestToken')) {

      // Generate request token via service provider API
      $token = $libService->requestRequestToken(); // OAuth V1 Only
      $requestToken = $token->getRequestToken();
      $requestSecret = $token->getRequestTokenSecret();

      // Generate url
      $url = $libService->getAuthorizationUri(
        array('oauth_token' => $requestToken) // OAuth V1 Only
        );  

    } else {
      
      // Generate url
      $url = $libService->getAuthorizationUri();
      $requestToken = null;
      $requestSecret = null;

    }

    // Build RequestToken and return
    return new RequestToken($requestToken, $requestSecret, $url->__toString());

  }

  public function getAuthAccess(RequestTokenInterface $requestToken, $token, $verifier, $code)
  {

    // Get OAuth libray Service instance
    $libService = $this->getLibService();

    // Check OAuth version
    if ($libService::OAUTH_VERSION == 1) {

      // Check token paramter is valid
      if (!empty($token) && $token != $requestToken->getToken()) {
        throw new \Exception('OAuth token parameter is invalid.');
      }

      // Create and store Oauth library token using request token
      $libStorage = $libService->getStorage();
      $libRequestToken = new \OAuth\OAuth1\Token\StdOAuth1Token();
      $libRequestToken->setRequestToken($requestToken->getToken());
      $libRequestToken->setAccessToken($requestToken->getToken());
      $libRequestToken->setRequestTokenSecret($requestToken->getSecret());
      $libRequestToken->setAccessTokenSecret($requestToken->getSecret());
      $libStorage->storeAccessToken($libService->service(), $libRequestToken);

      // Build access token from token returned by service provider API
      $oauthAccessToken = $libService->requestAccessToken($token, $verifier);
      $accessToken = new AccessToken(
        $oauthAccessToken->getAccessToken(), $oauthAccessToken->getAccessTokenSecret()
      );

    } else if ($libService::OAUTH_VERSION == 2) {

      // Check code parameter is valid
      if (empty($code)) {
        throw new \Exception('OAuth code parameter is invalid.');
      }

      // Build access token from token returned by service provider API
      $oauthAccessToken = $libService->requestAccessToken($code);
      $accessToken = new AccessToken($oauthAccessToken->getAccessToken(), null);
      
    } else {

      // Not supported
      throw new \Exception("Only OAuth version 1 and 2 are supported.");

    }

    // Build AccessToken and return
    return $accessToken;

  }
  
}
