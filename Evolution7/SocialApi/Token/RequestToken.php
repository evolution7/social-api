<?php

namespace Evolution7\SocialApi\Token;

class RequestToken extends Token implements RequestTokenInterface
{
    protected $redirectUrl;

    /**
     * {@inheritdoc}
     */
    public function __construct($token, $secret, $redirectUrl = null)
    {
        $this->token = $token;
        $this->secret = $secret;
        $this->redirectUrl = $redirectUrl;
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }
}
