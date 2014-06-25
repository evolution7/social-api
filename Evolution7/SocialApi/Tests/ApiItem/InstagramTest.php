<?php

namespace Evolution7\SocialApi\Tests\ApiItem;

use Evolution7\SocialApi\ApiItem\Instagram;

class InstagramTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetIdentifier()
    {
        $instagram = new Instagram();
        $instagram->getIdentifier();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetUri()
    {
        $instagram = new Instagram();
        $instagram->getUri();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetMediaUri()
    {
        $instagram = new Instagram();
        $instagram->getMediaUri();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $instagram = new Instagram();
        $instagram->comment('message');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalObject()
    {
        $instagram = new Instagram();
        $instagram->getOriginalObject();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalJSON()
    {
        $instagram = new Instagram();
        $instagram->getOriginalJSON();
    }
}
