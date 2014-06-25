<?php

namespace Evolution7\SocialApi\Tests\ApiItem;

use Evolution7\SocialApi\ApiItem\Twitter;

class TwitterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetIdentifier()
    {
        $twitter = new Twitter();
        $twitter->getIdentifier();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetUri()
    {
        $twitter = new Twitter();
        $twitter->getUri();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetMediaUri()
    {
        $twitter = new Twitter();
        $twitter->getMediaUri();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $twitter = new Twitter();
        $twitter->comment('message');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalObject()
    {
        $twitter = new Twitter();
        $twitter->getOriginalObject();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalJSON()
    {
        $twitter = new Twitter();
        $twitter->getOriginalJSON();
    }
}
