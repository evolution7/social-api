<?php

namespace Evolution7\SocialApi\Tests\Response;

use \Evolution7\SocialApi\Parser\TwitterParser;
use \Evolution7\SocialApi\Response\Response;
use \Evolution7\SocialApi\Entity\User;
use \Evolution7\SocialApi\Entity\Post;

class TwitterParserTest extends \PHPUnit_Framework_TestCase
{
    protected $sampleResponses;

    protected function setUp()
    {
        // Load sample responses
        $sampleResponsesDir = dirname(dirname(dirname(__FILE__)))
            . '/Resources/Twitter/SampleResponses';
        $dh = opendir($sampleResponsesDir);
        if ($dh !== false) {
            while (($filename = readdir($dh)) !== false) {
                if (substr($filename, 0, 1) !== '.') {
                    $this->sampleResponses[$filename] = file_get_contents(
                        $sampleResponsesDir . '/' . $filename
                    );
                }
            }
        }
    }

    protected function tearDown()
    {
        $this->sampleResponses = null;
    }

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
}
