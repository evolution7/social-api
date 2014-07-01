<?php

namespace Evolution7\SocialApi\Tests\ApiPost;

use Evolution7\SocialApi\ApiPost\InstagramPost;

class InstagramPostTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @see http://instagram.com/developer/endpoints/media/
     */
    private function getTestRaw()
    {
        return '{
            "data": {
                "type": "image",
                "users_in_photo": [{
                    "user": {
                        "username": "kevin",
                        "full_name": "Kevin S",
                        "id": "3",
                        "profile_picture": "..."
                    },
                    "position": {
                        "x": 0.315,
                        "y": 0.9111
                    }
                }],
                "filter": "Walden",
                "tags": [],
                "comments": {
                    "data": [{
                        "created_time": "1279332030",
                        "text": "Love the sign here",
                        "from": {
                            "username": "mikeyk",
                            "full_name": "Mikey Krieger",
                            "id": "4",
                            "profile_picture": "http://distillery.s3.amazonaws.com/profiles/profile_1242695_75sq_1293915800.jpg"
                        },
                        "id": "8"
                    },
                    {
                        "created_time": "1279341004",
                        "text": "Chilako taco",
                        "from": {
                            "username": "kevin",
                            "full_name": "Kevin S",
                            "id": "3",
                            "profile_picture": "..."
                        },
                        "id": "3"
                    }],
                    "count": 2
                },
                "caption": "Say hello to my little friend",
                "likes": {
                    "count": 1,
                    "data": [{
                        "username": "mikeyk",
                        "full_name": "Mikeyk",
                        "id": "4",
                        "profile_picture": "..."
                    }]
                },
                "link": "http://instagr.am/p/D/",
                "user": {
                    "username": "kevin",
                    "full_name": "Kevin S",
                    "profile_picture": "...",
                    "bio": "...",
                    "website": "...",
                    "id": "3"
                },
                "created_time": "1279340983",
                "images": {
                    "low_resolution": {
                        "url": "http://distillery.s3.amazonaws.com/media/2010/07/16/4de37e03aa4b4372843a7eb33fa41cad_6.jpg",
                        "width": 306,
                        "height": 306
                    },
                    "thumbnail": {
                        "url": "http://distillery.s3.amazonaws.com/media/2010/07/16/4de37e03aa4b4372843a7eb33fa41cad_5.jpg",
                        "width": 150,
                        "height": 150
                    },
                    "standard_resolution": {
                        "url": "http://distillery.s3.amazonaws.com/media/2010/07/16/4de37e03aa4b4372843a7eb33fa41cad_7.jpg",
                        "width": 612,
                        "height": 612
                    }
                },
                "id": "3",
                "location": null
            }
        }';
    }

    public function testGetId()
    {
        $post = new InstagramPost($this->getTestRaw());
        $this->assertEquals('3', $post->getId());
    }

    public function testGetCreated()
    {
        $date = new \DateTime('Sat, 17 Jul 2010 14:29:43 +0000');
        $post = new InstagramPost($this->getTestRaw());
        $this->assertInstanceOf('DateTime', $post->getCreated());
        $this->assertEquals($date->format('Y-m-d H:i:s'), $post->getCreated()->format('Y-m-d H:i:s'));
    }

    public function testGetBody()
    {
        $post = new InstagramPost($this->getTestRaw());
        $this->assertEquals('Say hello to my little friend', $post->getBody());
    }

    public function testGetUrl()
    {
        $post = new InstagramPost($this->getTestRaw());
        $this->assertEquals('http://instagr.am/p/D/', $post->getUrl());
    }

    public function testGetMediaUrl()
    {
        $post = new InstagramPost($this->getTestRaw());
        $this->assertEquals('http://distillery.s3.amazonaws.com/media/2010/07/16/4de37e03aa4b4372843a7eb33fa41cad_7.jpg', $post->getMediaUrl());
    }
    
    public function testGetUser()
    {
        $post = new InstagramPost($this->getTestRaw());
        $this->assertInstanceOf('\Evolution7\SocialApi\ApiUser\InstagramUser', $post->getUser());
    }
}
