<?php

namespace Evolution7\SocialApi\ApiUser;

use Evolution7\SocialApi\ApiResponse\ApiResponse;
use Evolution7\SocialApi\Exception\NotImplementedException;

class InstagramUser extends ApiResponse implements ApiUserInterface
{

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        throw new NotImplementedException();
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        throw new NotImplementedException();
    }

    /**
     * {@inheritdoc}
     */
    public function getHandle()
    {
        throw new NotImplementedException();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        throw new NotImplementedException();
    }
    
}
