<?php

namespace \Evolution7\SocialApi\Parser;

use \Evolution7\SocialApi\Entity\User;
use \Evolution7\SocialApi\Entity\Post;

/**
 * Twitter API parser
 */
class TwitterParser extends Parser
{
    /**
     * Parse response from /search/tweets
     *
     * @see https://dev.twitter.com/docs/api/1.1/get/search/tweets
     */
    public function parseSearchResponse()
    {
        // Get response array
        $responseArray = $this->response->getArray();
        // Check if statuses exist
        if (array_key_exists('statuses', $responseArray)) {
            // Check if at least one statuses exists
            if (count($responseArray['statuses']) > 0) {
                // Loop statuses
                foreach ($responseArray['statuses'] as $status) {
                    // Parse post data
                    $this->parsePostArray($status);
                }
            }
        }
    }

    /**
     * Parse user array
     *
     * @param array $array
     *
     * @return \Evolution7\SocialApi\Entity\User
     */
    private function parseUserArray($array)
    {
        // Create User
        $user = new User();
        $user->setId($array['id_str']);
        $user->setHandle($array['screen_name']);
        $user->setName($array['name']);
        $user->setUrl(
            'https://twitter.com/' . $user->getHandle()
        );
        $user->setImageUrl($array['profile_image_url_https']);
        $this->users[$user->getId()] = $user;
        return $user;
    }

    /**
     * Parse user array
     *
     * @param array $array
     *
     * @return \Evolution7\SocialApi\Entity\Post
     */
    private function parsePostArray($array)
    {
        // Create User
        if (array_key_exists('user', $array)) {
            $user = $this->parseUserArray($array['user']);
        } else {
            $user = null;
        }
        // Create Post
        $post = new Post();
        if (!is_null($user)) {
            $post->setUser($user);
        }
        $post->setId($array['id_str']);
        $post->setCreated(new \DateTime($array['created_at']));
        $post->setBody($array['text']);
        $post->setUrl(
            'https://twitter.com/' . $user->getHandle() .
            '/status/' . $post->getId()
        );
        $post->setMediaUrl($array['entities']['media'][0]['media_url']);
        $this->posts[$post->getId()] = $post;
        return $post;
    }
}
