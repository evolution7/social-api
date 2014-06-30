<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiItem\ApiItem;
use Evolution7\SocialApi\Exception\NotImplementedException;

class InstagramPost extends ApiItem implements ApiPostInterface
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
    public function getUsername()
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

}
