<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Config\ConfigInterface;
use Evolution7\SocialApi\Token\RequestToken;
use Evolution7\SocialApi\Token\AccessToken;
use OAuth\Common\Service\Service;

class Service implements ServiceInterface
{

  protected $config;

  public function __construct(ConfigInterface $config)
  {
    $this->config = $config;
  }

  protected function getConfig()
  {
    return $this->config;
  }

  protected function getService()
  {

    // Get config
    $config = $this->getConfig();

    // Build new service
    $credentials = new Credentials(
      $config->getApiKey(),
      $config->getApiSecret(),
      $config->getReturnUrl()
    );
    $storage = new Session();
    $serviceFactory = new ServiceFactory();
    $service = $serviceFactory->createService(
      $config->getPlatform(),
      $credentials,
      $storage,
      $config->getApiScopes()
    );
    return $service;

  }

  public function getAuthRequest()
  {

    // Get service
    $service = $this->getService();

    // Check if OAuth1
    if (method_exists($service, 'requestRequestToken')) {

      // Generate request token via service provider API
      $token = $service->requestRequestToken(); // OAuth V1 Only
      $requestToken = $token->getRequestToken();
      $requestSecret = $token->getRequestTokenSecret();

      // Generate url
      $url = $service->getAuthorizationUri(
        array('oauth_token' => $requestToken) // OAuth V1 Only
        );  

    } else {
      
      // Generate url
      $url = $service->getAuthorizationUri();
      $requestToken = null;
      $requestSecret = null;

    }

    // Build RequestToken and return
    return new RequestToken($requestToken, $requestSecret, $url->__toString());

  }

  public function getAuthAccess(RequestToken $requestToken, $oauthToken, $oauthVerifier, $code)
  {

    // Get service
    $service = $this->getService();

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
      $accessToken = $service->requestAccessToken($oauthToken, $oauthVerifier);
    } else {
      $accessToken = $service->requestAccessToken($code);
    }

    // Build AccessToken and return
    return new AccessToken($accessToken->getAccessToken(), $accessToken->getAccessTokenSecret());

  }
  
}
