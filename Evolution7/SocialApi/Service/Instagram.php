<?php

namespace Evolution7\SocialApi\Service;

use Evolution7\SocialApi\Service\QueryInterface;
use Evolution7\SocialApi\Entity\User;
use Evolution7\SocialApi\Entity\Post;
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
        // Get query data
        $qHashtag = $query->getHashtag();
        $qMedia = $query->getMedia();
        $qFromId = $query->getFromId();
        $qFromDate = $query->getFromDate();
        $qToId = $query->getToId();
        $qToDate = $query->getToDate();
        $qNumResults = $query->getNumResults();
        // Build request params
        $requestParams = array();
        if (empty($qHashtag)) {
            if (!empty($qFromDate)) {
                $requestParams['min_timestamp'] = $qFromDate->format('U');
            }
            if (!empty($qToDate)) {
                $requestParams['max_timestamp'] = $qToDate->format('U');
            }
        } else {
            if (!empty($qFromId)) {
                // Return media after this max ID
                $requestParams['max_tag_id'] = $qFromId;
            }
            if (!empty($qToId)) {
                // Return media before this min ID
                $requestParams['min_tag_id'] = $qToId;
            }
            if (!empty($qNumResults)) {
                $requestParams['count'] = $qNumResults;
            }
        }
        // Build request url
        if (empty($qHashtag)) {
            $requestUrl = 'media/search?';
            $parseMethod = 'parseMediaSearch';
        } else {
            $requestUrl = 'tags/' . urlencode($qHashtag) . '/media/recent?';
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
    public function comment(ApiPostInterface $post, $comment)
    {
        throw new NotImplementedException();
    }
}
