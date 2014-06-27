<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Config\ConfigInterface;
use Evolution7\SocialApi\Token\RequestToken;
use Evolution7\SocialApi\Token\AccessToken;

class Service implements ServiceInterface
{

    protected $config;

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function getAuthRequest()
    {

    }

    public function getAuthAccess()
    {

    }
    
}
