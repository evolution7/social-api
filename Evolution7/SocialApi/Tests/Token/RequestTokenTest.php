<?php

namespace Evolution7\SocialApi\Tests\Token;

use \Evolution7\SocialApi\Token\RequestToken;

class RequestTokenTest extends Token
{
    protected function setUp()
    {
        $this->token = new RequestToken('testToken', 'testSecret', 'http://www.example.com');
    }

    public function testGetRedirectUrl()
    {
        $this->assertEquals('http://www.example.com', $this->token->getRedirectUrl());
    }
}
