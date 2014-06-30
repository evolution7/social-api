<?php

namespace Evolution7\SocialApi\Service;

class Query implements QueryInterface
{
    private $hashtags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hashtags = array();
    }

    /**
     * {@inheritdoc}
     */
    public static function create()
    {
        return new self();
    }

    /**
     * {@inheritdoc}
     */
    public function getHashtags()
    {
        return array_keys($this->hashtags);
    }

    /**
     * {@inheritdoc}
     */
    public function filterByHashtag($hashtag)
    {
        return $this->filterByHashtags(array($hashtag));
    }

    /**
     * {@inheritdoc}
     */
    public function filterByHashtags($hashtags)
    {
        $this->hashtags = array_merge($this->hashtags, array_flip($hashtags));
        return $this;
    }
}
