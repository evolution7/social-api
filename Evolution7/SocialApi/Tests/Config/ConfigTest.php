<?php

namespace Evolution7\SocialApi\Tests\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    protected $validPlatforms;
    protected $config;

    protected function setUp()
    {
        $this->validPlatforms = array('twitter', 'instagram');
        $this->config = $this->getMockBuilder('\Evolution7\SocialApi\Config\Config')
            ->disableOriginalConstructor()
            ->setMethods(NULL)
            ->getMock();
    }

    protected function tearDown()
    {
        $this->config = null;
    }

    public function testConstructor()
    {
        foreach ($this->validPlatforms as $platform) {
            $config = new \Evolution7\SocialApi\Config\Config(
                $platform,
                'testApiKey',
                'testApiSecret',
                'testApiScopes',
                'testReturnUrl'
            );
            $this->assertEquals($platform, $config->getPlatform());
            $this->assertEquals('testApiKey', $config->getApiKey());
            $this->assertEquals('testApiSecret', $config->getApiSecret());
            $this->assertEquals('testApiScopes', $config->getApiScopes());
            $this->assertEquals('testReturnUrl', $config->getReturnUrl());
        }
    }

    public function testSetPlatformSuccess()
    {
        foreach ($this->validPlatforms as $platform) {
            $this->config->setPlatform($platform);
            $this->assertEquals($platform, $this->config->getPlatform());
        }
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetPlatformFailure()
    {
        $this->config->setPlatform('invalid');
    }

    public function testSetApiKey()
    {
        $this->config->setApiKey('test');
        $this->assertEquals('test', $this->config->getApiKey());
    }

    public function testSetApiSecret()
    {
        $this->config->setApiSecret('test');
        $this->assertEquals('test', $this->config->getApiSecret());
    }

    public function testSetApiScopes()
    {
        $this->config->setApiScopes('test');
        $this->assertEquals('test', $this->config->getApiScopes());
    }

    public function testSetReturnUrl()
    {
        $this->config->setReturnUrl('http://www.example.com');
        $this->assertEquals('http://www.example.com', $this->config->getReturnUrl());
    }
}
