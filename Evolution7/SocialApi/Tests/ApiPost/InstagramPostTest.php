<?php

namespace Evolution7\SocialApi\Tests\ApiPost;

use Evolution7\SocialApi\ApiPost\InstagramPost;

class InstagramPostTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException Evolution7\SocialApi\Exception\NotImplementedException
     */
    public function testGetId()
    {
        $instagram = new InstagramPost("");
        $instagram->getId();
    }
    
}
