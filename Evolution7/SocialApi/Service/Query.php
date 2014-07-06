<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Entity\Post;

class Query implements QueryInterface
{
    private $hashtag;
    private $media;
    private $fromPost;
    private $toPost;
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
        return $this->fromPost;
    }

    /**
     * {@inheritdoc}
     */
    public function limitFrom(Post $post)
    {
        $this->fromPost = $post;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTo()
    {
        return $this->toPost;
    }

    /**
     * {@inheritdoc}
     */
    public function limitTo(Post $post)
    {
        $this->toPost = $post;
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
