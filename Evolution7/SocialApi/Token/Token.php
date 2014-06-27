<?php

namespace Evolution7\SocialApi\Token;

class Token implements TokenInterface
{
  
  $token;
  $secret;

  public function __construct($token, $secret)
  {
    $this->token = $token;
    $this->secret = $secret;
  }

  public function getToken()
  {
    return $this->token;
  }

  public function getSecret()
  {
    return $this->secret;
  }

}
