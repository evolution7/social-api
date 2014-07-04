<?php

namespace Evolution7\SocialApi\Tests\Parser;

use \Evolution7\SocialApi\Tests\ResourceLoader;

class Parser extends \PHPUnit_Framework_TestCase
{
    protected $sampleResponses;

    protected function setUp()
    {
        // Get platform from class name
        $class = substr(get_class($this), strrpos(get_class($this), '\\')+1);
        $platform = substr($class, 0, strpos($class, 'ParserTest'));
        // Load sample responses
        $resourceLoader = new ResourceLoader($platform);
        $this->sampleResponses = $resourceLoader->loadSampleResponses();
    }

    protected function tearDown()
    {
        $this->sampleResponses = null;
    }
}
