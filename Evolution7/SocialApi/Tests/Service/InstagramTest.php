<?php

namespace Evolution7\SocialApi\Tests\Service;

use Evolution7\SocialApi\Service\Instagram;

class InstagramTest extends \PHPUnit_Framework_TestCase
{

    private function getConfigMock()
    {
        $config = $this->getMock('Evolution7\SocialApi\Config\ConfigInterface');
        $config->expects($this->any())
               ->method('getPlatform')
               ->will($this->returnValue('instagram'));
        return $config;
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearch()
    {
        $instagram = new Instagram($this->getConfigMock());
        $instagram->search('testvalue');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearchForTagSince()
    {
        $instagram = new Instagram($this->getConfigMock());
        $instagram->searchForTagSince('testvalue', new \DateTime());
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $instagram = new Instagram($this->getConfigMock());
        $instagram->comment('id', 'type', 'message');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testMessage()
    {
        $instagram = new Instagram($this->getConfigMock());
        $instagram->message('id', 'message');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalApi()
    {
        $instagram = new Instagram($this->getConfigMock());
        $instagram->getOriginalApi();
    }

}
