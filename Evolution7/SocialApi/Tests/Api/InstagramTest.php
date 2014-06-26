<?php

namespace Evolution7\SocialApi\Tests\Api;

use Evolution7\SocialApi\Api\Instagram;

class InstagramTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearch()
    {
        $instagram = new Instagram();
        $instagram->search('testvalue');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testSearchForTagSince()
    {
        $instagram = new Instagram();
        $instagram->searchForTagSince('testvalue', new \DateTime());
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $instagram = new Instagram();
        $instagram->comment('id', 'type', 'message');
    }
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testMessage()
    {
        $instagram = new Instagram();
        $instagram->message('id', 'message');
    }
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalApi()
    {
        $instagram = new Instagram();
        $instagram->getOriginalApi();
    }
}
