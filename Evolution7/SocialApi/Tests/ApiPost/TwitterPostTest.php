<?php

namespace Evolution7\SocialApi\Tests\ApiPost;

use Evolution7\SocialApi\ApiPost\TwitterPost;

class TwitterPostTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetIdentifier()
    {
        $twitter = new TwitterPost();
        $twitter->getIdentifier();
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetUri()
    {
        $twitter = new TwitterPost();
        $twitter->getUri();
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetMediaUri()
    {
        $twitter = new TwitterPost();
        $twitter->getMediaUri();
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $twitter = new TwitterPost();
        $twitter->comment('message');
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalObject()
    {
        $twitter = new TwitterPost();
        $twitter->getOriginalObject();
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalJSON()
    {
        $twitter = new TwitterPost();
        $twitter->getOriginalJSON();
    }
}
