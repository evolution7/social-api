<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Service\QueryInterface;
use Evolution7\SocialApi\Entity\User;
use Evolution7\SocialApi\Entity\Post;
use Evolution7\SocialApi\Response\Response;
use Evolution7\SocialApi\Parser\InstagramParser;
use Evolution7\SocialApi\Exception\NotImplementedException;

class Instagram extends Service implements ServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getCurrentUser()
    {
        $libService = $this->getLibService();
        $requestUrl = 'users/self';
        $response = new Response($libService->request($requestUrl));
        $parser = new InstagramParser($response);
        $parser->parseUsersSelf();
        return $parser->getFirstUser();
    }

    /**
     * {@inheritdoc}
     */
    public function getPostById($id)
    {
        $libService = $this->getLibService();
        $requestUrl = 'media/' . $id;
        $response = new Response($libService->request($requestUrl));
        $parser = new InstagramParser($response);
        $parser->parseMedia();
        return $parser->getFirstPost();
    }

    /**
     * {@inheritdoc}
     */
    public function search(QueryInterface $query)
    {
        // Get library service
        $libService = $this->getLibService();
        // Build request params
        $requestParams = array();
        if (is_null($query->getHashtag())) {
            // TODO
            // if (!empty($qFromDate)) {
            //     $requestParams['min_timestamp'] = $qFromDate->format('U');
            // }
            // if (!empty($qToDate)) {
            //     $requestParams['max_timestamp'] = $qToDate->format('U');
            // }
        } else {
            $qFrom = $query->getFrom();
            $qTo = $query->getTo();
            if (!is_null($qFrom)) {
                // Return media before/newer than this min ID
                $paginationId = $qFrom->getPaginationId();
                $paginationId = is_null($paginationId) ? $qFrom->getId() : $paginationId;
                $requestParams['min_tag_id'] = $paginationId;
            }
            if (!is_null($qTo)) {
                // Return media after/older than this max ID
                $paginationId = $qTo->getPaginationId();
                $paginationId = is_null($paginationId) ? $qTo->getId() : $paginationId;
                $requestParams['max_tag_id'] = $qTo->getPaginationId();
            }
            if (!is_null($query->getNumResults())) {
                $requestParams['count'] = $query->getNumResults();
            }
        }
        // Build request url
        if (is_null($query->getHashtag())) {
            $requestUrl = 'media/search?';
            $parseMethod = 'parseMediaSearch';
        } else {
            $requestUrl = 'tags/' . urlencode($query->getHashtag()) . '/media/recent?';
            $parseMethod = 'parseTagsMediaRecent';
        }
        $requestUrl .= http_build_query(
            $requestParams,
            null,
            '&',
            PHP_QUERY_RFC3986
        );
        // Search api
        $response = new Response($libService->request($requestUrl), 'json');
        // Parse response
        $parser = new InstagramParser($response);
        $parser->$parseMethod();
        return $parser->getPosts();
    }

    /**
     * {@inheritdoc}
     */
    public function comment(Post $post, $comment)
    {
        throw new NotImplementedException();
    }
}
