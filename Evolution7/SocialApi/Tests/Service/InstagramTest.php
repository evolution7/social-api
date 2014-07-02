<?php

namespace Evolution7\SocialApi\Tests\Service;

use Evolution7\SocialApi\Service\Query;
use Evolution7\SocialApi\Service\Instagram;

class InstagramTest extends \PHPUnit_Framework_TestCase
{
    private function getConfigMock()
    {
        $config = $this->getMock('Evolution7\SocialApi\Config\ConfigInterface');
        $config->expects($this->any())
               ->method('getPlatform')
               ->will($this->returnValue('instagram'));
        $config->expects($this->any())
               ->method('getApiKey')
               ->will($this->returnValue('instagram'));
        $config->expects($this->any())
               ->method('getApiSecret')
               ->will($this->returnValue('instagram'));
        $config->expects($this->any())
               ->method('getApiScopes')
               ->will($this->returnValue(array()));
        return $config;
    }

    /**
     * @expectedException \OAuth\Common\Storage\Exception\TokenNotFoundException
     */
    public function testSearch()
    {
        $instagram = new Instagram($this->getConfigMock());
        $instagram->search(Query::create());
    }

    public function testComment()
    {
        $instagram = new Instagram($this->getConfigMock());
        //$instagram->comment(new InstagramPost(''), 'test');
    }
}
