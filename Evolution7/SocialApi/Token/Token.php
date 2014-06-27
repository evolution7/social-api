<?php

namespace Evolution7\SocialApi\Token;

class Token implements TokenInterface
{
  
  $token;
  $secret;

  public function getToken()
  {
    return $this->token;
  }

  public function getSecret()
  {
    return $this->secret;
  }

}