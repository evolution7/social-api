<?php

namespace Evolution7\SocialApi\Tests\Parser;

use \Evolution7\SocialApi\Parser\InstagramParser;
use \Evolution7\SocialApi\Response\Response;

class InstagramParserTest extends Parser
{
    public function testParseTagsMediaRecent()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-tags-tag_name-media-recent.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new InstagramParser($response);
        // Parse and test
        $parser->parseTagsMediaRecent();
    }

    public function testParseMediaSearch()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-media-search.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new InstagramParser($response);
        // Parse and test
        $parser->parseMediaSearch();
        
    }

    public function testUsersSelf()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-users-self.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new InstagramParser($response);
        // Parse and test
        $parser->parseUsersSelf();
        
    }

    public function testParseMedia()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-media-media_id.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new InstagramParser($response);
        // Parse and test
        $parser->parseMedia();
        
    }

    public function testParseUserArray()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['user.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new InstagramParser($response);
        // Parse data
        $user = $parser->parseUserArray($response->getArray());
        // Test output
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $user);
        $this->assertEquals('1574083', $user->getId());
        $this->assertEquals('snoopdogg', $user->getHandle());
        $this->assertEquals('Snoop Dogg', $user->getName());
        $this->assertEquals(
            'http://distillery.s3.amazonaws.com/profiles/profile_1574083_75sq_1295469061.jpg',
            $user->getImageUrl()
        );
    }

    public function testParsePostArray()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['post.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new InstagramParser($response);
        // Parse data
        $post = $parser->parsePostArray($response->getArray());
        // Test output
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\Post', $post);
        $this->assertEquals('3', $post->getId());
        $this->assertEquals('Hello world', $post->getBody());
        $this->assertEquals(
            'http://distillery.s3.amazonaws.com/media/2010/07/16/4de37e03aa4b4372843a7eb33fa41cad_7.jpg',
            $post->getMediaUrl()
        );
        $dateTime = new \DateTime();
        $dateTime->setTimestamp(1279340983);
        $this->assertEquals($dateTime, $post->getCreated());
        // Test user
        $user = $post->getUser();
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $user);
        $this->assertEquals('3', $user->getId());
        $this->assertEquals('kevin', $user->getHandle());
        $this->assertEquals('Kevin S', $user->getName());
        $this->assertEquals('...', $user->getImageUrl());
    }
}
