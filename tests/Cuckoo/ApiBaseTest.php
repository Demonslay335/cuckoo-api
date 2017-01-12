<?php
/**
 * ApiBase test
 * @category testing
 * @package Test_Cuckoo
 * @author Michael Gillespie (demonslay335@gmail.com)
 */
namespace Tests\Cuckoo;

use \Guzzle\Http\Client as GuzzleClient;

class ApiBaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * See if a native GuzzleClient instance
     * returns an instance of \Cuckoo\ApiBase
     */
    public function testCtor() {
        $apiBaseStub = new \Cuckoo\ApiBase(apiKey, new GuzzleClient());
        $this->assertInstanceOf('\Cuckoo\ApiBase', $apiBaseStub);
    }

}