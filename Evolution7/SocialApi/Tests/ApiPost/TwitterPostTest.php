<?php

namespace Evolution7\SocialApi\Tests\ApiPost;

use Evolution7\SocialApi\ApiPost\TwitterPost;

class TwitterPostTest extends \PHPUnit_Framework_TestCase
{
    private function getTestRaw()
    {
        return '{
            "id_str": "1234567890",
            "created_at": "Tue Jul 01 05:17:45 +0000 2014",
            "text": "Say hello to my little friend",
            "user": {
                "screen_name": "Evolution_7"
            },
            "media": {
                "media_url": "http:\/\/pbs.twimg.com\/media\/A7EiDWcCYAAZT1D.jpg"
            }
        }';
    }

    public function testGetId()
    {
        $post = new TwitterPost($this->getTestRaw());
        $this->assertEquals('1234567890', $post->getId());
    }

    public function testGetCreated()
    {
        $date = new \DateTime('Tue Jul 01 05:17:45 +0000 2014');
        $post = new TwitterPost($this->getTestRaw());
        $this->assertInstanceOf('DateTime', $post->getCreated());
        $this->assertEquals($date->format('Y-m-d H:i:s'), $post->getCreated()->format('Y-m-d H:i:s'));
    }

    public function testGetBody()
    {
        $post = new TwitterPost($this->getTestRaw());
        $this->assertEquals('Say hello to my little friend', $post->getBody());
    }

    public function testGetUrl()
    {
        $post = new TwitterPost($this->getTestRaw());
        $this->assertEquals('https://twitter.com/Evolution_7/status/1234567890', $post->getUrl());
    }

    public function testGetMediaUrl()
    {
        $post = new TwitterPost($this->getTestRaw());
        $this->assertEquals('http://pbs.twimg.com/media/A7EiDWcCYAAZT1D.jpg', $post->getMediaUrl());
    }
    
    public function testGetUser()
    {
        $post = new TwitterPost($this->getTestRaw());
        $this->assertInstanceOf('\Evolution7\SocialApi\ApiUser\TwitterUser', $post->getUser());
    }
}
