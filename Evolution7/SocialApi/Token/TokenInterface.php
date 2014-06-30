<?php

namespace Evolution7\SocialApi\Token;

interface TokenInterface
{
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
