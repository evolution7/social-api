<?php

namespace Evolution7\SocialApi\Tests\Token;

use \Evolution7\SocialApi\Token\AccessToken;

class AccessTokenTest extends Token
{
    protected function setUp()
    {
        $this->token = new AccessToken('testToken', 'testSecret');
    }
}
