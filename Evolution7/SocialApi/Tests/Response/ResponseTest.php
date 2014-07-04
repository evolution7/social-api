<?php

namespace Evolution7\SocialApi\Tests\Response;

use \Evolution7\SocialApi\Response\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    protected $jsonSampleData;
    protected $jsonResponseObject;

    protected function setUp()
    {
        $this->jsonSampleData = json_encode(array(
            'data' => array('key' => 'value')
        ));
        $this->jsonResponseObject = new Response(
            $this->jsonSampleData,
            'json'
        );
    }

    protected function tearDown()
    {
        $this->jsonSampleData = null;
        $this->jsonResponseObject = null;
    }

    public function testGetRaw()
    {
        $this->assertEquals($this->jsonSampleData, $this->jsonResponseObject->getRaw());
    }

    public function testGetFormat()
    {
        $this->assertEquals('json', $this->jsonResponseObject->getFormat());
    }

    public function testGetArray()
    {
        $this->assertEquals(
            $this->jsonSampleData,
            json_encode($this->jsonResponseObject->getArray())
        );
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\ResponseInvalidException
     */
    public function testResponseInvalid()
    {
        $jsonResponse = new Response('invalid', 'json');
    }

    /**
     * @expectedException \Evolution7\SocialApi\Exception\ResponseFormatNotSupportedException
     */
    public function testResponseFormatNotSupported()
    {
        $jsonResponse = new Response('', 'invalid');
    }
}
