<?php

namespace Evolution7\SocialApi\Service;

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
