<?php

namespace Evolution7\SocialApi\Service;

class Query implements QueryInterface
{
    private $hashtag;
    private $media;
    private $fromId;
    private $fromDate;
    private $toId;
    private $toDate;
    private $numResults;

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
        if (!is_null($this->media) && is_array($this->media)) {
            return array_keys($this->media);    
        } else {
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function filterImages()
    {
        $this->media['images'] = true;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function filterVideos()
    {
        $this->media['videos'] = true;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function filterImagesAndVideos()
    {
        $this->filterImages();
        $this->filterVideos();
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFromId()
    {
        return $this->fromId;
    }

    /**
     * {@inheritdoc}
     */
    public function getFromDate()
    {
        return $this->fromDate;
    }

    /**
     * {@inheritdoc}
     */
    public function limitFrom($id, DateTime $date)
    {
        $this->fromId = $id;
        $this->fromDate = $date;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getToId()
    {
        return $this->toId;
    }

    /**
     * {@inheritdoc}
     */
    public function getToDate()
    {
        return $this->toDate;
    }

    /**
     * {@inheritdoc}
     */
    public function limitTo($id, DateTime $date)
    {
        $this->toId = $id;
        $this->toDate = $date;
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
