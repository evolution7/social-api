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
        // Parse and test
        $parser->parseAccountVerifyCredentials();
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $parser->getFirstUser());
    }

    public function testParseSearchTweets()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-search-tweets.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse and test
        $parser->parseSearchTweets();
        
    }

    public function testParseStatusesShow()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['get-statuses-show-id.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse and test
        $parser->parseStatusesShow();
        
    }

    public function testParseUserArray()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['user.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse and test
        $user = $parser->parseUserArray($response->getArray());
    }

    public function testParsePostArray()
    {
        // Get sample response
        $sampleResponse = $this->sampleResponses['post.json'];
        $response = new Response($sampleResponse, 'json');
        // Get parser
        $parser = new TwitterParser($response);
        // Parse and test
        $user = $parser->parsePostArray($response->getArray());
    }
}
