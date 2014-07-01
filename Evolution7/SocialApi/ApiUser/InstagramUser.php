<?php

namespace Evolution7\SocialApi\ApiUser;

use Evolution7\SocialApi\ApiResponse\InstagramResponse;
use Evolution7\SocialApi\Exception\NotImplementedException;

class InstagramUser extends InstagramResponse implements ApiUserInterface
{
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
        return $this->getArrayValue($this->hasRootElement() ? array('data', 'username') : 'username');
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getArrayValue($this->hasRootElement() ? array('data', 'full_name') : 'full_name');
    }
}
