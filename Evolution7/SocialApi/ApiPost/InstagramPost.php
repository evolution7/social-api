<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiResponse\ApiResponse;
use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\ApiUser\InstagramUser;

class InstagramPost extends ApiResponse implements ApiPostInterface
{
    private $user;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getArrayValue(array('data', 'id'));
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->getArrayValue(array('data', 'caption'));
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->getArrayValue(array('data', 'link'));
    }

    /**
     * {@inheritdoc}
     */
    public function getMediaUrl()
    {
        return $this->getArrayValue(array('data', 'images', 'standard_resolution', 'url'));
    }
    
    /**
     * {@inheritdoc}
     *
     * @return InstagramUser
     */
    public function getUser()
    {
        if (is_null($this->user)) {
            $this->user = new InstagramUser('{"data":'.$this->getRawSubset('user').'}');
        }
        return $this->user;
    }
}
