<?php

namespace Evolution7\SocialApi\ApiUser;

use Evolution7\SocialApi\ApiResponse\ApiResponse;
use Evolution7\SocialApi\Exception\NotImplementedException;

class TwitterUser extends ApiResponse implements ApiUserInterface
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
    public function getUrl()
    {
        $handle = $this->getHandle();
        if (!is_null($handle)) {
            return 'https://twitter.com/' . $handle;
        } else {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getHandle()
    {
        return $this->getArrayValue('screen_name');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getArrayValue('name');
    }
}
