<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiResponse\InstagramResponse;
use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\ApiUser\InstagramUser;

class InstagramPost extends InstagramResponse implements ApiPostInterface
{
    private $user;
    
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getArrayValue($this->hasRootElement() ? array('data', 'id') : 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return $this->getArrayValue($this->hasRootElement() ? array('data', 'caption', 'text') : array('caption', 'text'));
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->getArrayValue($this->hasRootElement() ? array('data', 'link') : 'link');
    }

    /**
     * {@inheritdoc}
     */
    public function getMediaUrl()
    {
        if ($this->hasRootElement()) {
            return $this->getArrayValue(array('data', 'images', 'standard_resolution', 'url'));
        } else {
            return $this->getArrayValue(array('images', 'standard_resolution', 'url'));
        }
    }
    
    /**
     * {@inheritdoc}
     *
     * @return InstagramUser
     */
    public function getUser()
    {
        if (is_null($this->user)) {
            $this->user = new InstagramUser($this->getRawSubset(array('data', 'user')));
        }
        return $this->user;
    }
}
