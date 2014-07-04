<?php

namespace Evolution7\SocialApi\Tests\Parser;

class Parser extends \PHPUnit_Framework_TestCase
{
    protected $sampleResponses;

    protected function setUp()
    {
        // Get platform from class name
        $class = substr(get_class($this), strrpos(get_class($this), '\\')+1);
        $platform = substr($class, 0, strpos($class, 'ParserTest'));
        // Load sample responses
        $sampleResponsesDir = dirname(dirname(__DIR__))
            . '/Resources/' . $platform . '/SampleResponses';
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
}
