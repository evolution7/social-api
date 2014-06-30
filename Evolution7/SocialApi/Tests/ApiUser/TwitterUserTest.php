<?php

namespace Evolution7\SocialApi\Tests\ApiUser;

use Evolution7\SocialApi\ApiUser\TwitterUser;

class TwitterUserTest extends \PHPUnit_Framework_TestCase
{

    private function getTestRaw()
    {
        return '{
            "id_str": "55481097",
            "screen_name": "Evolution_7",
            "name": "Evolution 7"
        }';
    }

    public function testGetId()
    {
        $post = new TwitterUser($this->getTestRaw());
        $this->assertEquals('55481097', $post->getId());
    }

    public function testGetHandle()
    {
        $post = new TwitterUser($this->getTestRaw());
        $this->assertEquals('Evolution_7', $post->getHandle());
    }

    public function testGetUrl()
    {
        $post = new TwitterUser($this->getTestRaw());
        $this->assertEquals('https://twitter.com/Evolution_7', $post->getUrl());
    }

    public function testGetName()
    {
        $post = new TwitterUser($this->getTestRaw());
        $this->assertEquals('Evolution 7', $post->getName());
    }
    
}
