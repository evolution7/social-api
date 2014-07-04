<?php

namespace Evolution7\SocialApi\Token;

interface AccessTokenInterface
{
    /**
     * Constructor
     *
     * @param string $token
     * @param string $secret
     */
    public function __construct($token, $secret);
}
