<?php

namespace Evolution7\SocialApi\Tests\Factory;

use Evolution7\SocialApi\Factory\Factory;

class FactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $result = Factory::create('facebook');
        $this->assertInstanceOf('Evolution7\SocialApi\Api\Facebook', $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateNotExist()
    {
        Factory::create('notexist');
    }
}
