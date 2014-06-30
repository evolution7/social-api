<?php

namespace Evolution7\SocialApi\Tests\Service;

use Evolution7\SocialApi\Service\Twitter;

class TwitterTest extends \PHPUnit_Framework_TestCase
{
    private function getConfigMock()
    {
        $config = $this->getMock('Evolution7\SocialApi\Config\ConfigInterface');
        $config->expects($this->any())
               ->method('getPlatform')
               ->will($this->returnValue('twitter'));
        return $config;
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearch()
    {
        $twitter = new Twitter($this->getConfigMock());
        $twitter->search('testvalue');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearchForTagSince()
    {
        $twitter = new Twitter($this->getConfigMock());
        $twitter->searchForTagSince('testvalue', new \DateTime());
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $twitter = new Twitter($this->getConfigMock());
        $twitter->comment('id', 'type', 'message');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testMessage()
    {
        $twitter = new Twitter($this->getConfigMock());
        $twitter->message('id', 'message');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalApi()
    {
        $twitter = new Twitter($this->getConfigMock());
        $twitter->getOriginalApi();
    }
}
