<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\ApiPost\ApiPostInterface;

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
     * Get from date to filter by
     *
     * @return ApiPostInterface
     */
    public function getFrom();

    /**
     * Set from id/date to filter by
     *
     * @param ApiPostInterface $post
     *
     * @return QueryInterface
     */
    public function limitFrom(ApiPostInterface $post);

    /**
     * Get to date to filter by
     *
     * @return ApiPostInterface
     */
    public function getTo();

    /**
     * Set from id/date to filter by
     *
     * @param ApiPostInterface $post
     *
     * @return QueryInterface
     */
    public function limitTo(ApiPostInterface $post);

    /**
     * Get number results to limit to
     *
     * @return int
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
