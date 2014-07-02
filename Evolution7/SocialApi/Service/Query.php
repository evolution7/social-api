<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Entity\Post;

class Query implements QueryInterface
{
    private $hashtag;
    private $media;
    private $from;
    private $to;
    private $numResults;

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
    public function getHashtag()
    {
        return $this->hashtag;
    }

    /**
     * {@inheritdoc}
     */
    public function filterByHashtag($hashtag)
    {
        $this->hashtag = $hashtag;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * {@inheritdoc}
     */
    public function filterImages()
    {
        $this->media = array('images');
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function filterVideos()
    {
        $this->media = array('videos');
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function filterImagesAndVideos()
    {
        $this->media = array('images', 'videos');
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * {@inheritdoc}
     */
    public function limitFrom(Post $from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * {@inheritdoc}
     */
    public function limitTo(Post $to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumResults()
    {
        return $this->numResults;
    }

    /**
     * {@inheritdoc}
     */
    public function limitNumResults($numResults)
    {
        $this->numResults = $numResults;
        return $this;
    }
}
