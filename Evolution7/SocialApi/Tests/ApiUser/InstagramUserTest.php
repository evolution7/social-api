<?php

namespace Evolution7\SocialApi\Tests\ApiUser;

use Evolution7\SocialApi\ApiUser\InstagramUser;

class InstagramUserTest extends \PHPUnit_Framework_TestCase
{
    private function getTestRaw()
    {
        return '{
            "data": {
                "id": "1574083",
                "username": "snoopdogg",
                "full_name": "Snoop Dogg",
                "profile_picture": "http://distillery.s3.amazonaws.com/profiles/profile_1574083_75sq_1295469061.jpg",
                "bio": "This is my bio",
                "website": "http://snoopdogg.com",
                "counts": {
                    "media": 1320,
                    "follows": 420,
                    "followed_by": 3410
                }
            }
        }';
    }

    public function testGetId()
    {
        $post = new InstagramUser($this->getTestRaw());
        $this->assertEquals('1574083', $post->getId());
    }

    public function testGetHandle()
    {
        $post = new InstagramUser($this->getTestRaw());
        $this->assertEquals('snoopdogg', $post->getHandle());
    }

    public function testGetUrl()
    {
        $post = new InstagramUser($this->getTestRaw());
        $this->assertEquals('http://instagram.com/snoopdogg', $post->getUrl());
    }

    public function testGetName()
    {
        $post = new InstagramUser($this->getTestRaw());
        $this->assertEquals('Snoop Dogg', $post->getName());
    }
}
