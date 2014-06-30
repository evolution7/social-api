<?php

namespace Evolution7\SocialApi\ApiPost;

use Evolution7\SocialApi\ApiResponse\ApiResponse;
use Evolution7\SocialApi\Exception\NotImplementedException;
use Evolution7\SocialApi\ApiUser\TwitterUser;

class TwitterPost extends ApiResponse implements ApiPostInterface
{

    private $user;

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
        $id = $this->getId();
        $user = $this->getUser();
        if (!is_null($id) && !is_null($user)) {
            return 'https://twitter.com/' . $user->getHandle() . '/status/' . $id;
        } else {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     *
     * @see https://dev.twitter.com/docs/entities#tweets
     */
    public function getMediaUrl()
    {
        return $this->getArrayValue(array('media', 'media_url'));
    }
    
    /**
     * {@inheritdoc}
     *
     * @return TwitterUser
     */
    public function getUser()
    {
        if (is_null($this->user)) {
            $this->user = new TwitterUser($this->getRawSubset('user'));
        }
        return $this->user;
    }

}
