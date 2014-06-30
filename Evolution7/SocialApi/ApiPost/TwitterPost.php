<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiItem\ApiItem;
use Evolution7\SocialApi\Exception\NotImplementedException;

class TwitterPost extends ApiItem implements ApiPostInterface
{

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getArrayValue('id_str');
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->getArrayValue('text');
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        throw new NotImplementedException();
    }









    public function getIdentifier()
    {
        throw new NotImplementedException();
    }

    public function getUri()
    {
        throw new NotImplementedException();
    }

    public function getMediaUri()
    {
        throw new NotImplementedException();
    }

    public function comment($message)
    {
        throw new NotImplementedException();
    }

    public function getOriginalObject()
    {
        throw new NotImplementedException();
    }

    public function getOriginalJSON()
    {
        throw new NotImplementedException();
    }
    
}
