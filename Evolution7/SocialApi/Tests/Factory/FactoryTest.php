<?php

namespace Evolution7\SocialApi\Tests\Factory;

use Evolution7\SocialApi\Factory\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $result = Factory::create('instagram');
        $this->assertInstanceOf('Evolution7\SocialApi\Api\Instagram', $result);
        $result = Factory::create('twitter');
        $this->assertInstanceOf('Evolution7\SocialApi\Api\Twitter', $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateNotExist()
    {
        Factory::create('notexist');
    }
}
