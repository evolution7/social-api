<?php

namespace Evolution7\SocialApi\Tests\ApiItem;

use Evolution7\SocialApi\ApiItem\Facebook;

class FacebookTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetIdentifier()
    {
        $facebook = new Facebook();
        $facebook->getIdentifier();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetUri()
    {
        $facebook = new Facebook();
        $facebook->getUri();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetMediaUri()
    {
        $facebook = new Facebook();
        $facebook->getMediaUri();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testComment()
    {
        $facebook = new Facebook();
        $facebook->comment('message');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalObject()
    {
        $facebook = new Facebook();
        $facebook->getOriginalObject();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetOriginalJSON()
    {
        $facebook = new Facebook();
        $facebook->getOriginalJSON();
    }

}
