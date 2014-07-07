# Social Network API Abstraction Library

This library provide an abstracted API for using various social networks APIs.

**Supported Platforms**

* Instagram
* Twitter

**Functionality**

* Authentication
    * OAuth v1 and v2
* Retrieve Current User
    * Current OAuth User
* Search Posts
    * e.g. Search Tweets
* Retrieve Post by ID
    * e.g. Get Tweet
* Comment on Posts
    * e.g. Reply to Tweet

## Installation

Install via [Composer](https://getcomposer.org/):
```
    "require": {
        "evolution7/social-api": "dev-master"
    }
```

## Configuration

Select a Platform for setup and configuration instructions:

* [Instagram](Evolution7/SocialApi/Resources/doc/Instagram.md)
* [Twitter](Evolution7/SocialApi/Resources/doc/Twitter.md)

## Usage

Example code is included in the `Evolution7/SocialApi/Resources/example/` directory.

To see the example code in action:

0. Place your API key/secret in the [config.php](Evolution7/SocialApi/Resources/example/config.php) file
0. Launch a PHP server, e.g. `php -S 0.0.0.0:8080`
0. Visit the [index.php](http://localhost:8080/index.php) page and try out the examples

Note: you'll need to authenticate succesfully before any other examples will work.

## License

[MIT license](https://github.com/evolution7/generator-symfony/blob/master/LICENSE)
Copyright (c) 2014, Evolution 7.
