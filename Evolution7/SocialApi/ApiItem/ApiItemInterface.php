<?php

namespace Evolution7\SocialApi\ApiItem;

interface ApiItemInterface
{

    /**
     * Get item ID
     *
     * @throws NotImplementedException;
     * @throws NotSupportedByAPIException;
     * @return string
     */
    public function getId();

    /**
     * Get item URL
     *
     * @throws NotImplementedException;
     * @throws NotSupportedByAPIException;
     */
    public function getUrl();

    /**
     * Get original API response for item
     *
     * @throws NotImplementedException;
     * @return \Object
     */
    public function getRaw();

    /**
     * Get API response parsed into an array
     *
     * @throws NotImplementedException;
     * @return string json
     */
    public function getArray();

}
