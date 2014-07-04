<?php

namespace Evolution7\SocialApi\Token;

abstract class Token
{
    protected $token;
    protected $secret;

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }
}
