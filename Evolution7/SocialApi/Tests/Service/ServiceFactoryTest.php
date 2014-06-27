<?php

namespace Evolution7\SocialApi\Tests\Service;

use Evolution7\SocialApi\Config\Config;
use Evolution7\SocialApi\Service\ServiceFactory;

class ServiceFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function testCreate()
    {
        $config = new Config('instagram', 'a', 'b', array(), 'c');
        $result = ServiceFactory::get($config);
        $this->assertInstanceOf('\Evolution7\SocialApi\Service\Instagram', $result);
        $config = new Config('twitter', 'a', 'b', array(), 'c');
        $result = ServiceFactory::get($config);
        $this->assertInstanceOf('\Evolution7\SocialApi\Service\Twitter', $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateNotExist()
    {
        $config = new Config('notexist', 'a', 'b', array(), 'c');
        ServiceFactory::get($config);
    }
    
}
