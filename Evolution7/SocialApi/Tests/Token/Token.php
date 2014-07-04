<?php

namespace Evolution7\SocialApi\Tests\Token;

class Token extends \PHPUnit_Framework_TestCase
{
    protected $token;

    protected function tearDown()
    {
        $this->token = null;
    }

    public function testGetToken()
    {
        $this->assertEquals('testToken', $this->token->getToken());
    }

    public function testGetSecret()
    {
        $this->assertEquals('testSecret', $this->token->getSecret());
    }
}
