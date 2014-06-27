<?php

namespace Evolution7\SocialApi\Token;

class RequestToken extends Token implements RequestTokenInterface
{
  
  protected $redirectUrl;

  public function __construct($token, $secret, $redirectUrl = null)
  {
    $this->token = $token;
    $this->secret = $secret;
    $this->redirectUrl = $redirectUrl;
  }

  public function getRedirectUrl()
  {
    return $this->redirectUrl;
  }

}
