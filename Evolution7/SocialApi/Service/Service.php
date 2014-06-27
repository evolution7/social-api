<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Config\ConfigInterface;
use Evolution7\SocialApi\Token\RequestToken;
use Evolution7\SocialApi\Token\AccessToken;
use OAuth\Common\Storage\Consumer\Credentials as OAuthCredentials;
use OAuth\Common\Storage\Memory as OAuthStorageMemory;
use OAuth\Common\Service\ServiceFactory as OAuthServiceFactory;

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

  public function getService()
  {

    // Get config
    $config = $this->getConfig();

    // Build new OAuth library service instance
    $credentials = new OAuthCredentials(
      $config->getApiKey(),
      $config->getApiSecret(),
      $config->getReturnUrl()
    );
    $storage = new OAuthStorageMemory();
    $oauthServiceFactory = new OAuthServiceFactory();
    $oauthService = $oauthServiceFactory->createService(
      $config->getPlatform(),
      $credentials,
      $storage,
      $config->getApiScopes()
    );
    return $oauthService;

  }

  public function getAuthRequest()
  {

    // Get OAuth libray Service instance
    $oauthService = $this->getService();

    // Check if OAuth1
    if (method_exists($oauthService, 'requestRequestToken')) {

      // Generate request token via service provider API
      $token = $oauthService->requestRequestToken(); // OAuth V1 Only
      $requestToken = $token->getRequestToken();
      $requestSecret = $token->getRequestTokenSecret();

      // Generate url
      $url = $oauthService->getAuthorizationUri(
        array('oauth_token' => $requestToken) // OAuth V1 Only
        );  

    } else {
      
      // Generate url
      $url = $oauthService->getAuthorizationUri();
      $requestToken = null;
      $requestSecret = null;

    }

    // Build RequestToken and return
    return new RequestToken($requestToken, $requestSecret, $url->__toString());

  }

  public function getAuthAccess(RequestToken $requestToken, $oauthToken, $oauthVerifier, $code)
  {

    // Get OAuth libray Service instance
    $oauthService = $this->getService();

    // Determine OAuth version
    if (!empty($oauthVerifier) && empty($code)) {
      $version = 1;
    } else if (!empty($oauthVerifier) && empty($code)) {
      $version = 2;
    } else {
      throw new \Exception('$oauthToken and $code are mutually exclusive.');
    }

    // Check for token mismatch
    if ($version == 1 && $oauthToken != $requestToken->getToken()) {
      throw new \Exception('OAuth tokens do not match');
    }

    // Retrieve access token from service provider API
    if ($version == 1) {
      $accessToken = $oauthService->requestAccessToken($oauthToken, $oauthVerifier);
    } else {
      $accessToken = $oauthService->requestAccessToken($code);
    }

    // Build AccessToken and return
    return new AccessToken($accessToken->getAccessToken(), $accessToken->getAccessTokenSecret());

  }
  
}
