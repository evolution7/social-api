<?php

namespace Evolution7\SocialApi\Tests\Entity;

class UserTest extends Base
{
    protected function setUp()
    {
        parent::setUp();
        $this->entity = new \Evolution7\SocialApi\Entity\User;
    }

    protected function tearDown()
    {
        $this->entity = null;
    }

    public function testSetHandle()
    {
        $this->entity->setHandle('test');
        $this->assertEquals('test', $this->entity->getHandle());
    }

    public function testSetName()
    {
        $this->entity->setName('test');
        $this->assertEquals('test', $this->entity->getName());
    }

    public function testSetImageUrl()
    {
        $this->entity->setImageUrl('http://www.example.com');
        $this->assertEquals('http://www.example.com', $this->entity->getImageUrl());
    }
}
