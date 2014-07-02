<?php

namespace Evolution7\SocialApi\Entity;

class Post extends Base
{
    private $created;
    private $url;
    private $body;
    private $mediaUrl;
    private $user;

    /**
     * Set post created date
     *
     * @param DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get post created date
     *
     * @throws NotSupportedByAPIException
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set post URL
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get post URL
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set post body
     *
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * Get post body
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set post media URL
     *
     * @param string $mediaUrl
     */
    public function setMediaUrl($mediaUrl)
    {
        $this->mediaUrl = $mediaUrl;
    }

    /**
     * Get post media URL
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getMediaUrl()
    {
        return $this->mediaUrl;
    }

    /**
     * Set user
     *
     * @param ApiUserInterface $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @throws NotSupportedByAPIException
     *
     * @return ApiUserInterface
     */
    public function getUser()
    {
        return $this->user;
    }
}
