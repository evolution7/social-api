<?php

namespace Evolution7\SocialApi\Service;

interface QueryInterface
{
    /**
     * Alternative constructor
     *
     * @return QueryInterface
     */
    public static function create();

    /**
     * Get hashtags to filter by
     *
     * @return array
     */
    public function getHashtags();

    /**
     * Filter by hashtag
     *
     * @param string $hashtag
     *
     * @return QueryInterface
     */
    public function filterByHashtag($hashtag);

    /**
     * Filter by hashtags
     *
     * @param array $hashtags
     *
     * @return QueryInterface
     */
    public function filterByHashtags($hashtags);

    /**
     * Get media to filter by
     *
     * @return array
     */
    public function getMedia();

    /**
     * Filter by media e.g. images
     *
     * @param array $media
     *
     * @return QueryInterface
     */
    public function filterByMedia($media);

    /**
     * Get from id to filter by
     *
     * @return DateTime
     */
    public function getIdFrom();

    /**
     * Set from id to filter by
     *
     * @param int $id
     *
     * @return QueryInterface
     */
    public function limitIdFrom($id);

    /**
     * Get to id to filter by
     *
     * @return int
     */
    public function getIdTo();

    /**
     * Set to id to filter by
     *
     * @param int $id
     *
     * @return QueryInterface
     */
    public function limitIdTo($id);

    /**
     * Get from date to filter by
     *
     * @return DateTime
     */
    public function getDateFrom();

    /**
     * Set from date to filter by
     *
     * @param DateTime $date
     *
     * @return QueryInterface
     */
    public function limitDateFrom(DateTime $date);

    /**
     * Get to date to filter by
     *
     * @return DateTime
     */
    public function getDateTo();

    /**
     * Set to date to filter by
     *
     * @param DateTime $date
     *
     * @return QueryInterface
     */
    public function limitDateTo(DateTime $date);

    /**
     * Get number results to limit to
     *
     * @return DateTime
     */
    public function getNumResults();

    /**
     * Set number results to limit to
     *
     * @param int $numResults
     *
     * @return QueryInterface
     */
    public function limitNumResults($numResults);
}
