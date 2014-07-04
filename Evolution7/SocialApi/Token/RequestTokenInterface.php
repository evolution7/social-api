<?php

namespace Evolution7\SocialApi\Token;

interface RequestTokenInterface
{
    /**
     * Constructor
     *
     * @param string $token
     * @param string $secret
     * @param string $redirectUrl
     */
    public function __construct($token, $secret, $redirectUrl = null);
}
