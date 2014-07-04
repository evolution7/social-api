<?php

namespace Evolution7\SocialApi\Entity;

interface PostInterface extends BaseInterface
{
    /**
     * Set post created date
     *
     * @param DateTime $created
     */
    public function setCreated($created);

    /**
     * Get post created date
     *
     * @throws NotSupportedByAPIException
     *
     * @return DateTime
     */
    public function getCreated();

    /**
     * Set post body
     *
     * @param string $body
     */
    public function setBody($body);

    /**
     * Get post body
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getBody();

    /**
     * Set post media URL
     *
     * @param string $mediaUrl
     */
    public function setMediaUrl($mediaUrl);

    /**
     * Get post media URL
     *
     * @throws NotSupportedByAPIException
     *
     * @return string
     */
    public function getMediaUrl();

    /**
     * Set user
     *
     * @param ApiUserInterface $user
     */
    public function setUser($user);

    /**
     * Get user
     *
     * @throws NotSupportedByAPIException
     *
     * @return ApiUserInterface
     */
    public function getUser();
}
