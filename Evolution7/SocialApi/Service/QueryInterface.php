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
     * Get hashtag to filter by
     *
     * @return string
     */
    public function getHashtag();

    /**
     * Filter by hashtag
     *
     * @param string $hashtag
     *
     * @return QueryInterface
     */
    public function filterByHashtag($hashtag);

    /**
     * Get media to filter by
     *
     * @return array
     */
    public function getMedia();

    /**
     * Only get posts with images
     *
     * @return QueryInterface
     */
    public function filterImages();

    /**
     * Only get posts with videos
     *
     * @return QueryInterface
     */
    public function filterVideos();

    /**
     * Only get posts with images or videos
     *
     * @return QueryInterface
     */
    public function filterImagesAndVideos();

    /**
     * Get from id to filter by
     *
     * @return DateTime
     */
    public function getFromId();

    /**
     * Get from date to filter by
     *
     * @return DateTime
     */
    public function getFromDate();

    /**
     * Set from id/date to filter by
     *
     * @param int      $id
     * @param DateTime $date
     *
     * @return QueryInterface
     */
    public function limitFrom($id, DateTime $date);

    /**
     * Get to id to filter by
     *
     * @return int
     */
    public function getToId();

    /**
     * Get to date to filter by
     *
     * @return DateTime
     */
    public function getToDate();

    /**
     * Set from id/date to filter by
     *
     * @param int      $id
     * @param DateTime $date
     *
     * @return QueryInterface
     */
    public function limitTo($id, DateTime $date);

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
