<?php

namespace Evolution7\SocialApi\Tests\Service;

class TwitterTest extends ServiceTestCommon
{
    protected $twitter;
    protected $queryMock;
    protected $postMock;

    protected function getResponseMap()
    {
        return new TwitterResponseMap();
    }

    protected function setUp()
    {
        $this->twitter = $this->getServiceMock(
            '\Evolution7\SocialApi\Service\Twitter',
            array($this->getConfigMock('twitter'))
        );
        $this->queryMock = $this->getQueryMock();
        $this->postMock = $this->getPostMock();
    }

    protected function tearDown()
    {
        $this->twitter = null;
    }

    public function testGetCurrentUser()
    {
        // Get user
        $user = $this->twitter->getCurrentUser();
        // Test user
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $user);
    }

    public function testGetPostById()
    {
        // Get post
        $post = $this->twitter->getPostById(1);
        // Test post
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\Post', $post);
    }

    public function testSearch()
    {
        // Get posts
        $posts = $this->twitter->search($this->queryMock);
        // Test output
        $this->assertEquals(4, count($posts));
        // Test posts
        foreach ($posts as $post) {
            // Test post
            $this->assertInstanceOf('\Evolution7\SocialApi\Entity\Post', $post);
            // Test user
            $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $post->getUser());
        }
    }

    public function testCommentHttpUnauthorizedException()
    {
        // Test comment
        $this->twitter->comment($this->postMock, 'test @test');
    }
}
