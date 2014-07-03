<?php

namespace Evolution7\SocialApi\Tests\Service;

class InstagramTest extends ServiceTestCommon
{
    protected $instagram;
    protected $queryMock;
    protected $postMock;

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

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testGetCurrentUserHttpUnauthorizedException()
    {
        $this->instagram->getCurrentUser();
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testGetPostByIdHttpUnauthorizedException()
    {
        $this->instagram->getPostById(1);
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testSearchHttpUnauthorizedException()
    {
        $this->instagram->search($this->queryMock);
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testCommentHttpUnauthorizedException()
    {
        $this->instagram->comment($this->postMock, $this->queryMock);
    }
}
