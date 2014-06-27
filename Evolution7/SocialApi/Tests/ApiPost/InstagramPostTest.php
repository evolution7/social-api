<?php

namespace Evolution7\SocialApi\Tests\ApiPost;

use Evolution7\SocialApi\ApiPost\InstagramPost;

class InstagramPostTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetIdentifier()
    {
        $instagram = new InstagramPost();
        $instagram->getIdentifier();
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetUri()
    {
        $instagram = new InstagramPost();
        $instagram->getUri();
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetMediaUri()
    {
        $instagram = new InstagramPost();
        $instagram->getMediaUri();
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $instagram = new InstagramPost();
        $instagram->comment('message');
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalObject()
    {
        $instagram = new InstagramPost();
        $instagram->getOriginalObject();
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalJSON()
    {
        $instagram = new InstagramPost();
        $instagram->getOriginalJSON();
    }
}
