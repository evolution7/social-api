<?php

namespace Evolution7\SocialApi\Tests\Api;

use Evolution7\SocialApi\Api\Facebook;

class FacebookTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearch()
    {
        $facebook = new Facebook();
        $facebook->search('testvalue');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearchForTagSince()
    {
        $facebook = new Facebook();
        $facebook->searchForTagSince('testvalue', new \DateTime());
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $facebook = new Facebook();
        $facebook->comment('id', 'type', 'message');
    }
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testMessage()
    {
        $facebook = new Facebook();
        $facebook->message('id', 'message');
    }
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalApi()
    {
        $facebook = new Facebook();
        $facebook->getOriginalApi();
    }
}
