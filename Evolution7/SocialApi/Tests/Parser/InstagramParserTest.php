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
}
