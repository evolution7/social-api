<?php

namespace Evolution7\SocialApi\Token;

class AccessToken extends Token implements AccessTokenInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct($token, $secret)
    {
        $this->token = $token;
        $this->secret = $secret;
    }
}
