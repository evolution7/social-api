<?php

namespace Evolution7\SocialApi\Tests\Service;

use \Evolution7\SocialApi\Exception\HttpUnauthorizedException;

abstract class ServiceTestCommon extends \PHPUnit_Framework_TestCase
{
    protected $sampleResponses;

    abstract protected function getResponseMap();

    protected function getConfigMock($platform)
    {

        // Get mock of config
        $config = $this->getMockBuilder('\Evolution7\SocialApi\Config\Config')
                     ->disableOriginalConstructor()
                     ->getMock();
        
        // Override getPlatform() method
        $config->expects($this->any())
               ->method('getPlatform')
               ->will($this->returnValue($platform));

        // Override getApiKey() method
        $config->expects($this->any())
               ->method('getApiKey')
               ->will($this->returnValue($platform));

        // Override getApiSecret() method
        $config->expects($this->any())
               ->method('getApiSecret')
               ->will($this->returnValue($platform));
        
        // Override getApiScopes() method
        $config->expects($this->any())
               ->method('getApiScopes')
               ->will($this->returnValue(array()));
        
        // Return mock
        return $config;

    }

    protected function getServiceMock($class, $constructorArgs)
    {

        // Get mock of libService
        $libService = $this->getMock('\OAuth\Common\Service\ServiceInterface');

        // Override request() method
        $libService->expects($this->any())
                   ->method('request')
                   ->will($this->returnCallback(array($this->getResponseMap(), 'request')));
        
        // Get mock of service
        $service = $this->getMockBuilder($class)
                     ->setConstructorArgs($constructorArgs)
                     ->setMethods(array(
                         'getLibService',
                     ))
                     ->getMock();
        
        // Override getLibService() method
        $service->expects($this->any())
                ->method('getLibService')
                ->will($this->returnValue($libService));

        // Return mock
        return $service;

    }

    protected function getQueryMock()
    {

        // Get mock of Query
        $query = $this->getMock('\Evolution7\SocialApi\Service\QueryInterface');

        // Override getHashtag() method
        $query->expects($this->any())
              ->method('getHastag')
              ->will($this->returnValue('howwemove'));

        // Return mock
        return $query;
        
    }

    protected function getUserMock()
    {

        // Get mock of User
        $user = $this->getMock('\Evolution7\SocialApi\Entity\User');

        // Override getHandle() method
        $user->expects($this->any())
             ->method('getHandle')
             ->will($this->returnValue('test'));

        // Return mock
        return $user;

    }

    protected function getPostMock()
    {

        // Get mock of Post
        $post = $this->getMock('\Evolution7\SocialApi\Entity\Post');

        // Override getUser() method
        $post->expects($this->any())
             ->method('getUser')
             ->will($this->returnValue($this->getUserMock()));

        // Return mock
        return $post;
        
    }
}
