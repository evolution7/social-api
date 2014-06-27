<?php

namespace Evolution7\SocialApi\Tests\Service;

use Evolution7\SocialApi\Service\ServiceFactory;
use Evolution7\SocialApi\Config\ConfigInterface;

class ServiceFactoryTest extends \PHPUnit_Framework_TestCase
{

    private function getConfigMock($platform)
    {
        $config = $this->getMock('Evolution7\SocialApi\Config\ConfigInterface');
        $config->expects($this->any())
               ->method('getPlatform')
               ->will($this->returnValue($platform));
        return $config;
    }

    public function testCreate()
    {
        $result = ServiceFactory::get($this->getConfigMock('instagram'));
        $this->assertInstanceOf('\Evolution7\SocialApi\Service\Instagram', $result);
        $result = ServiceFactory::get($this->getConfigMock('twitter'));
        $this->assertInstanceOf('\Evolution7\SocialApi\Service\Twitter', $result);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCreateNotExist()
    {
        ServiceFactory::get($this->getConfigMock('notexist'));
    }
    
}
