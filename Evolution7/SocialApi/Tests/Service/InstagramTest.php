<?php

namespace Evolution7\SocialApi\Tests\Service;

class InstagramTest extends ServiceTestCommon
{
    protected $instagram;
    protected $queryMock;
    protected $postMock;

    protected function getResponseMap()
    {
        return new InstagramResponseMap();
    }

    protected function setUp()
    {
        $this->instagram = $this->getServiceMock(
            '\Evolution7\SocialApi\Service\Instagram',
            array($this->getConfigMock('instagram'))
        );
        $this->queryMock = $this->getQueryMock();
        $this->postMock = $this->getPostMock();
    }

    protected function tearDown()
    {
        $this->instagram = null;
    }

    public function testGetCurrentUser()
    {
        // Get user
        $user = $this->instagram->getCurrentUser();
        // Test user
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\User', $user);
    }

    public function testGetPostById()
    {
        // Get post
        $post = $this->instagram->getPostById('1');
        // Test post
        $this->assertInstanceOf('\Evolution7\SocialApi\Entity\Post', $post);
    }

    public function testSearch()
    {
        // Get posts
        $posts = $this->instagram->search($this->queryMock);
        // Test output
        $this->assertEquals(2, count($posts));
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
        $this->instagram->comment($this->postMock, 'test');
    }
}
