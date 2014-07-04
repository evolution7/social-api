<?php

namespace Evolution7\SocialApi\Tests\Entity;

use Evolution7\SocialApi\Entity\Post;

class PostTest extends Base
{
    protected function setUp()
    {
        parent::setUp();
        $this->entity = new Post;
    }

    protected function tearDown()
    {
        $this->entity = null;
    }

    public function testSetCreated()
    {
        $dateTime = new \DateTime();
        $this->entity->setCreated($dateTime);
        $this->assertSame($dateTime, $this->entity->getCreated());
    }

    public function testSetUrl()
    {
        $this->entity->setUrl('http://www.example.com');
        $this->assertEquals('http://www.example.com', $this->entity->getUrl());
    }

    public function testSetBody()
    {
        $this->entity->setBody('test');
        $this->assertEquals('test', $this->entity->getBody());
    }

    public function testSetMediaUrl()
    {
        $this->entity->setMediaUrl('http://www.example.com');
        $this->assertEquals('http://www.example.com', $this->entity->getMediaUrl());
    }
}
