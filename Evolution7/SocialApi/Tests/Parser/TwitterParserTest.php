<?php

namespace Evolution7\SocialApi\Tests\Parser;

use \Evolution7\SocialApi\Parser\TwitterParser;
use \Evolution7\SocialApi\Response\Response;

class TwitterParserTest extends Parser
{
    public function testParseAccountVerifyCredentials()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-account-verify_credentials.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse data
        $parser->parseAccountVerifyCredentials();
        // Test user
        $user = $parser->getFirstUser();
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $user);
        $this->assertEquals('38895958', $user->getId());
        $this->assertEquals('theSeanCook', $user->getHandle());
        $this->assertEquals('https://twitter.com/theSeanCook', $user->getUrl());
        $this->assertEquals('Sean Cook', $user->getName());
        $this->assertEquals(
            '//si0.twimg.com/profile_images/1751506047/dead_sexy_normal.JPG',
            $user->getImageUrl()
        );
    }

    public function testParseSearchTweets()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-search-tweets.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse data
        $parser->parseSearchTweets();
        // Test output
        $posts = $parser->getPosts();
        $this->assertEquals(4, count($posts));
        // Test posts
        foreach ($posts as $post) {
            // Test post
            $this->assertInstanceOf('\Evolution7\SocialApi\Entity\Post', $post);
            // Test user
            $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $post->getUser());
        }
    }

    public function testParseStatusesShow()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-statuses-show-id.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse data
        $parser->parseStatusesShow();
        // Test post
        $post = $parser->getFirstPost();
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\Post', $post);
        // Test user
        $user = $parser->getFirstUser();
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $post->getUser());
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $user);
    }

    public function testParseUserArray()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['user.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse data
        $user = $parser->parseUserArray($response->getArray());
        // Test user
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $user);
        $this->assertEquals('29516238', $user->getId());
        $this->assertEquals('bullcityrecords', $user->getHandle());
        $this->assertEquals('https://twitter.com/bullcityrecords', $user->getUrl());
        $this->assertEquals('Chaz Martenstein', $user->getName());
        $this->assertEquals(
            '//si0.twimg.com/profile_images/447958234/Lichtenstein_normal.jpg',
            $user->getImageUrl()
        );
    }

    public function testParsePostArray()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['post.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse data
        $post = $parser->parsePostArray($response->getArray());
        // Test post
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\Post', $post);
        $this->assertEquals('250075927172759552', $post->getId());
        $this->assertEquals('Aggressive Ponytail #freebandnames', $post->getBody());
        $this->assertNull($post->getMediaType());
        $this->assertNull($post->getMediaUrl());
        $dateTime = new \DateTime();
        $dateTime->setTimestamp(strtotime('Mon Sep 24 03:35:21 +0000 2012'));
        $this->assertEquals($dateTime, $post->getCreated());
        // Test user
        $user = $post->getUser();
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $user);
        $this->assertEquals('137238150', $user->getId());
        $this->assertEquals('sean_cummings', $user->getHandle());
        $this->assertEquals('https://twitter.com/sean_cummings', $user->getUrl());
        $this->assertEquals('Sean Cummings', $user->getName());
        $this->assertEquals(
            '//si0.twimg.com/profile_images/2359746665/1v6zfgqo8g0d3mk7ii5s_normal.jpeg',
            $user->getImageUrl()
        );
    }
}
