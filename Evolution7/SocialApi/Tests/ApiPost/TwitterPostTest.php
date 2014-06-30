<?php

namespace Evolution7\SocialApi\Tests\ApiPost;

use Evolution7\SocialApi\ApiPost\TwitterPost;

class TwitterPostTest extends \PHPUnit_Framework_TestCase
{

    private function getTestRaw()
    {
        return '{
            "id_str": "1234567890",
            "text": "Say hello to my little friend",
            "user": {
                "screen_name": "Evolution_7"
            }
        }';
    }

    public function testGetId()
    {
        $post = new TwitterPost($this->getTestRaw());
        $this->assertEquals('1234567890', $post->getId());
    }

    public function testGetBody()
    {
        $post = new TwitterPost($this->getTestRaw());
        $this->assertEquals('Say hello to my little friend', $post->getBody());
    }

    public function testGetUsername()
    {
        $post = new TwitterPost($this->getTestRaw());
        $this->assertEquals('Evolution_7', $post->getUsername());
    }

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    /* public function testGetIdentifier()
    {
        $twitter = new TwitterPost();
        $twitter->getIdentifier();
    } */

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    /* public function testGetUri()
    {
        $twitter = new TwitterPost();
        $twitter->getUri();
    } */

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    /* public function testGetMediaUri()
    {
        $twitter = new TwitterPost();
        $twitter->getMediaUri();
    } */

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    /* public function testComment()
    {
        $twitter = new TwitterPost();
        $twitter->comment('message');
    } */

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    /* public function testGetOriginalObject()
    {
        $twitter = new TwitterPost();
        $twitter->getOriginalObject();
    } */

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    /* public function testGetOriginalJSON()
    {
        $twitter = new TwitterPost();
        $twitter->getOriginalJSON();
    } */
    
}
