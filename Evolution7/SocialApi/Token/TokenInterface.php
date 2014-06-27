<?php

namespace Evolution7\SocialApi\Token;

interface TokenInterface
{

  /**
   * Constructor
   *
   * @param $token
   * @param $secret
   */
  public function __construct($token, $secret);
  
  /**
   * Get token
   *
   * @return string
   */
  public function getToken();

  /**
   * Get secret
   *
   * @return string
   */
  public function getSecret();

}
