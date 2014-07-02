<?php

namespace \Evolution7\SocialApi\Parser;

/**
 * Instagram API parser
 */
class InstagramParser extends Parser
{
    /**
     * Parse response from /tags/[tag-name]/media/recent
     *
     * @see http://instagram.com/developer/endpoints/tags/
     */
    public function parseTagsMediaRecentResponse()
    {
        // Get response array
        $responseArray = $this->response->getArray();
        // Check if data exists
        if (array_key_exists('data', $responseArray)) {
            // Check if at least one data record exists
            if (count($responseArray['data']) > 0) {
                // Loop data
                foreach ($responseArray['data'] as $data) {
                    // Parse post array
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
        $post->setId($array['id']);
        $user->setHandle($array['username']);
        $user->setName($array['full_name']);
        $user->setUrl(
            'http://instagram.com/' . $user->getHandle()
        );
        $user->setImageUrl($array['profile_picture']);
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
            $array->setUser($user);
        }
        $post->setId($array['id']);
        $post->setCreated(new \DateTime(date(DATE_ISO8601, $array['created_time'])));
        $post->setBody(is_array($array['caption']) ? $array['caption']['text'] : $array['caption']);
        $post->setUrl($array['link']);
        $post->setMediaUrl($array['images']['standard_resolution']['url']);
        $this->posts[$post->getId()] = $post;
        return $post;
    }
}
