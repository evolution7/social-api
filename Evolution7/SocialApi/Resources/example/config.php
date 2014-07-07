<?php

use \Evolution7\SocialApi\Config\Config;

// Create config object
$config = new Config(
    'twitter',
    '[twitter_api_key]',
    '[twitter_api_secret]',
    array(),
    $_SERVER['REQUEST_URI']
);
