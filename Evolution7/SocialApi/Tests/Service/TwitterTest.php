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
        $user = $this->twitter->getCurrentUser();
        
    }

    public function testGetPostById()
    {
        $post = $this->twitter->getPostById(1);
    }

    public function testSearch()
    {
        $posts = $this->twitter->search($this->queryMock);
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testCommentHttpUnauthorizedException()
    {
        $this->markTestSkipped('TODO');
        //$this->twitter->comment($this->postMock, 'test @test');
    }
}
