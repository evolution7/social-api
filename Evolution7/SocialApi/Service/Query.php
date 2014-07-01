<?php

namespace Evolution7\SocialApi\Service;

class Query implements QueryInterface
{
    private $hashtags;
    private $media;
    private $idFrom;
    private $idTo;
    private $dateFrom;
    private $dateTo;
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

    /**
     * {@inheritdoc}
     */
    public function getMedia()
    {
        return array_keys($this->media);
    }

    /**
     * {@inheritdoc}
     */
    public function filterByMedia($media)
    {
        $this->media = array_merge($this->media, array_flip($hashtags));
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIdFrom()
    {
        return $this->idFrom;
    }

    /**
     * {@inheritdoc}
     */
    public function limitIdFrom($id)
    {
        $this->idFrom = $id;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIdTo()
    {
        return $this->idTo;
    }

    /**
     * {@inheritdoc}
     */
    public function limitIdTo($id)
    {
        $this->idTo = $id;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * {@inheritdoc}
     */
    public function limitDateFrom(DateTime $date)
    {
        $this->dateFrom = $date;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * {@inheritdoc}
     */
    public function limitDateTo(DateTime $date)
    {
        $this->dateTo = $date;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumResults()
    {
        return $this->dateFrom;
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
