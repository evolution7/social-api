<?php

namespace Evolution7\SocialApi\Token;

interface AccessTokenInterface
{
  
  /**
   * Constructor
   *
   * @param $token
   * @param $secret
   */
  public function __construct($token, $secret);
  
}
