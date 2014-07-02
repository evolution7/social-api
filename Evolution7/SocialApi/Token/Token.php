<?php

namespace Evolution7\SocialApi\Token;

class Token implements TokenInterface
{
    protected $token;
    protected $secret;

    /**
     * {@inheritdoc}
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function getSecret()
    {
        return $this->secret;
    }
}
