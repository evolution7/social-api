<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Config\ConfigInterface;
use Evolution7\SocialApi\Token\RequestToken;
use Evolution7\SocialApi\Token\AccessToken;

class Service implements ServiceInterface
{

  protected $config;

  public function __construct(ConfigInterface $config)
  {
    $this->config = $config;
  }

  public function getConfig()
  {
    return $this->config;
  }

  public function getLibService()
  {

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
    $libService = $libServiceFactory->createService(
      $config->getPlatform(),
      $libCredentials,
      $libStorage,
      $config->getApiScopes()
    );
    return $libService;

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

  public function getAuthAccess(RequestToken $requestToken, $token, $verifier, $code)
  {

    // Get OAuth libray Service instance
    $libService = $this->getLibService();

    // Determine OAuth version
    if (!empty($verifier) && empty($code)) {
      $version = 1;
    } else if (empty($verifier) && !empty($code)) {
      $version = 2;
    } else {
      throw new \Exception('$token and $code are mutually exclusive.');
    }

    // Check if OAuth version 1
    if ($version == 1) {

      // Check for token mismatch
      if ($version == 1 && $token != $requestToken->getToken()) {
        throw new \Exception('OAuth tokens do not match');
      }

      // Create and store Oauth library token using request token
      $libStorage = $libService->getStorage();
      $libRequestToken = new \OAuth\OAuth1\Token\StdOAuth1Token();
      $libRequestToken->setRequestToken($requestToken->getToken());
      $libRequestToken->setAccessToken($requestToken->getToken());
      $libRequestToken->setRequestTokenSecret($requestToken->getSecret());
      $libRequestToken->setAccessTokenSecret($requestToken->getSecret());
      $libStorage->storeAccessToken($libService->service(), $libRequestToken);

    }

    // Build access token from token returned by service provider API
    if ($version == 1) {
      $oauthAccessToken = $libService->requestAccessToken($token, $verifier);
      $accessToken = new AccessToken(
        $oauthAccessToken->getAccessToken(), $oauthAccessToken->getAccessTokenSecret()
      );
    } else {
      $oauthAccessToken = $libService->requestAccessToken($code);
      $accessToken = new AccessToken($oauthAccessToken->getAccessToken(), null);
    }

    // Build AccessToken and return
    return $accessToken;

  }
  
}
