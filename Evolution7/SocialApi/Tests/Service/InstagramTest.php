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
        $user = $this->instagram->getCurrentUser();
    }

    public function testGetPostById()
    {
        $post = $this->instagram->getPostById('1');
    }

    public function testSearch()
    {
        $posts = $this->instagram->search($this->queryMock);
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\HttpUnauthorizedException
     */
    public function testCommentHttpUnauthorizedException()
    {
        $this->markTestSkipped('TODO');
        //$this->instagram->comment($this->postMock, 'test');
    }
}
