<?php

namespace Evolution7\SocialApi\Tests;

class ResourceLoader
{
    protected $sampleResponsesDir;

    public function __construct($platform)
    {
        $this->sampleResponsesDir = dirname(__DIR__)
            . '/Resources/' . $platform . '/SampleResponses';
    }

    public function loadSampleResponses()
    {
        $sampleResponses = array();
        $dh = opendir($this->sampleResponsesDir);
        if ($dh !== false) {
            while (($filename = readdir($dh)) !== false) {
                if (substr($filename, 0, 1) !== '.') {
                    $sampleResponses[$filename] = file_get_contents(
                        $this->sampleResponsesDir . '/' . $filename
                    );
                }
            }
        }
        return $sampleResponses;
    }

    public function loadSampleResponse($name)
    {
        return file_get_contents($this->sampleResponsesDir . '/' . $name);
    }
}
