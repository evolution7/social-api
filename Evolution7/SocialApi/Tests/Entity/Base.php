<?php

namespace Evolution7\SocialApi\Tests\Entity;

class Base extends \PHPUnit_Framework_TestCase
{
    protected $validPlatforms;
    protected $entity;

    protected function setUp()
    {
        $this->validPlatforms = array('twitter', 'instagram');
    }

    public function testSetPlatformSuccess()
    {
        foreach ($this->validPlatforms as $platform) {
            $this->entity->setPlatform($platform);
            $this->assertEquals($platform, $this->entity->getPlatform());
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetPlatformFailure()
    {
        $this->entity->setPlatform('invalid');
    }

    public function testSetId()
    {
        $this->entity->setId('test');
        $this->assertEquals('test', $this->entity->getId());
    }

    public function testSetPaginationId()
    {
        $this->entity->setPaginationId('test');
        $this->assertEquals('test', $this->entity->getPaginationId());
    }
}
