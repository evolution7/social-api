<?php

namespace Evolution7\SocialApi\Parser;

use \Evolution7\SocialApi\Config\Config;
use \Evolution7\SocialApi\Entity\User;
use \Evolution7\SocialApi\Entity\Post;

/**
 * Instagram API parser
 */
class InstagramParser extends Parser
{
    /**
     * Parse generic response of posts
     */
    private function parsePostsGeneric()
    {
        // Get response array
        $responseArray = $this->response->getArray();
        // Check if data exists
        if (!is_null($responseArray) && array_key_exists('data', $responseArray)) {
            // Check if at least one data record exists
            if (count($responseArray['data']) > 0) {
                // Loop data
                foreach ($responseArray['data'] as $data) {
                    // Parse post array
                    $this->parsePostArray($data);
                }
            }
        }
        // Check pagination
        if (!is_null($responseArray) && array_key_exists('pagination', $responseArray)) {
            // Check pagination id
            if (array_key_exists('min_tag_id', $responseArray['pagination'])) {
                // Iterate over posts
                foreach ($this->posts as $post) {
                    // Save pagination id
                    $post->setPaginationId($responseArray['pagination']['min_tag_id']);
                }
            }
        }
    }

    /**
     * Parse response from /tags/[tag-name]/media/recent
     *
     * @see http://instagram.com/developer/endpoints/tags/
     */
    public function parseTagsMediaRecent()
    {
        $this->parsePostsGeneric();
    }

    /**
     * Parse response from /media/search
     *
     * @see http://instagram.com/developer/endpoints/media/
     */
    public function parseMediaSearch()
    {
        $this->parsePostsGeneric();
    }

    /**
     * Parse response from /users/self
     *
     * @see http://instagram.com/developer/endpoints/users/
     */
    public function parseUsersSelf()
    {
        // Get response array
        $responseArray = $this->response->getArray();
        // Parse user data
        if (!is_null($responseArray) && array_key_exists('data', $responseArray)) {
            $this->parseUserArray($responseArray['data']);
        }
    }

    /**
     * Parse response from /media/:media-id
     *
     * @see http://instagram.com/developer/endpoints/media/
     */
    public function parseMedia()
    {
        // Get response array
        $responseArray = $this->response->getArray();
        // Parse post data
        if (!is_null($responseArray) && array_key_exists('data', $responseArray)) {
            $this->parsePostArray($responseArray['data']);
        }
    }

    /**
     * Parse user array
     *
     * @param array $array
     *
     * @return \Evolution7\SocialApi\Entity\User
     */
    public function parseUserArray($array)
    {
        // Create User
        $user = new User();
        $user->setPlatform(Config::PLATFORM_INSTAGRAM);
        $user->setId($this->getArrayValue('id', $array));
        $user->setHandle($this->getArrayValue('username', $array));
        $user->setName($this->getArrayValue('full_name', $array));
        $user->setUrl(
            'http://instagram.com/' . $user->getHandle()
        );
        $user->setImageUrl($this->getArrayValue('profile_picture', $array));
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
    public function parsePostArray($array)
    {
        // Create User
        if (!is_null($array) && array_key_exists('user', $array)) {
            $user = $this->parseUserArray($this->getArrayValue('user', $array));
        } else {
            $user = null;
        }
        // Create Post
        $post = new Post();
        $post->setPlatform(Config::PLATFORM_INSTAGRAM);
        if (!is_null($user)) {
            $post->setUser($user);
        }
        $post->setId($this->getArrayValue('id', $array));
        $post->setCreated(new \DateTime(date(DATE_ISO8601, $array['created_time'])));
        if (is_array($this->getArrayValue('caption', $array))) {
            $post->setBody($array['caption']['text']);
        } else {
            $post->setBody($array['caption']);
        }
        $post->setUrl($this->getArrayValue('link', $array));
        $post->setMediaType($this->getArrayValue('type', $array));
        $mediaUrl = $this->getArrayValue(
            array($post->getMediaType().'s', 'standard_resolution', 'url'),
            $array
        );
        if (!is_null($mediaUrl)) {
            $post->setMediaUrl(str_replace(array('http://', 'https://'), '//', $mediaUrl));
        }
        $this->posts[$post->getId()] = $post;
        return $post;
    }
}
