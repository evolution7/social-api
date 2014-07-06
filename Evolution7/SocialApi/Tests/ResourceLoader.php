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
        $handle = opendir($this->sampleResponsesDir);
        if ($handle !== false) {
            while (($filename = readdir($handle)) !== false) {
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
