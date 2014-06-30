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
        $id = $this->getId();
        $username = $this->getUsername();
        if (!is_null($id)) {
            return 'https://twitter.com/' . $username . '/status/' . $id;
        } else {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->getArrayValue(array('user', 'screen_name'));
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
    
}
