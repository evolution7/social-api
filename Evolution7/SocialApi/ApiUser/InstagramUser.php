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
        return $this->getArrayValue(array('data', 'id'));
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        $handle = $this->getHandle();
        if (!is_null($handle)) {
            return 'http://instagram.com/' . $handle;
        } else {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getHandle()
    {
        return $this->getArrayValue(array('data', 'username'));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getArrayValue(array('data', 'full_name'));
    }
}
