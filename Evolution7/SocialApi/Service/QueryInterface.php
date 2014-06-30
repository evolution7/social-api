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
}
