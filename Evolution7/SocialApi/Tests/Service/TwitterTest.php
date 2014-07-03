<?php

namespace Evolution7\SocialApi\Tests\Service;

class TwitterTest extends ServiceTestCommon
{
    protected $twitter;
    protected $queryMock;
    protected $postMock;

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

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testGetCurrentUserHttpUnauthorizedException()
    {
        $this->twitter->getCurrentUser();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testGetPostByIdHttpUnauthorizedException()
    {
        $this->twitter->getPostById(1);
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testSearchHttpUnauthorizedException()
    {
        $this->twitter->search($this->queryMock);
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testCommentHttpUnauthorizedException()
    {
        $this->twitter->comment($this->postMock, $this->queryMock);
    }
}
