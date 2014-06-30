<?php

namespace Evolution7\SocialApi\Token;

interface RequestTokenInterface
{
    /**
     * Constructor
     *
     * @param $token
     * @param $secret
     * @param $redirectUrl
     */
    public function __construct($token, $secret, $redirectUrl = null);
}
