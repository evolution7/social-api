<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiResponse\ApiResponse;
use Evolution7\SocialApi\Exception\NotImplementedException;

class InstagramPost extends ApiResponse implements ApiPostInterface
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
    public function getBody()
    {
        throw new NotImplementedException();
    }

    /**
     * {@inheritdoc}
     */
    public function getMediaUrl()
    {
        throw new NotImplementedException();
    }

    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        throw new NotImplementedException();
    }
}
