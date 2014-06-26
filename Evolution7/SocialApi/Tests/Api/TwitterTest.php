<?php

namespace Evolution7\SocialApi\Tests\Api;

use Evolution7\SocialApi\Api\Twitter;

class TwitterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearch()
    {
        $twitter = new Twitter();
        $twitter->search('testvalue');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearchForTagSince()
    {
        $twitter = new Twitter();
        $twitter->searchForTagSince('testvalue', new \DateTime());
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $twitter = new Twitter();
        $twitter->comment('id', 'type', 'message');
    }
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testMessage()
    {
        $twitter = new Twitter();
        $twitter->message('id', 'message');
    }
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalApi()
    {
        $twitter = new Twitter();
        $twitter->getOriginalApi();
    }
}
