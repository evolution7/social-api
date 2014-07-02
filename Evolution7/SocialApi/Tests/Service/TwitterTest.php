<?php

namespace Evolution7\SocialApi\Tests\Service;

use Evolution7\SocialApi\Service\Query;
use Evolution7\SocialApi\Service\Twitter;

class TwitterTest extends \PHPUnit_Framework_TestCase
{
    private function getConfigMock()
    {
        $config = $this->getMock('Evolution7\SocialApi\Config\ConfigInterface');
        $config->expects($this->any())
               ->method('getPlatform')
               ->will($this->returnValue('twitter'));
        $config->expects($this->any())
               ->method('getApiKey')
               ->will($this->returnValue('twitter'));
        $config->expects($this->any())
               ->method('getApiSecret')
               ->will($this->returnValue('twitter'));
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
        $twitter = new Twitter($this->getConfigMock());
        $twitter->search(Query::create());
    }

    public function testComment()
    {
        //$twitter = new Twitter($this->getConfigMock());
        //$twitter->comment(new TwitterPost(''), 'test');
    }
}
