<?php
/**
 * File object test code
 * @category testing
 * @package Test_Malwr
 * @author Michael Gillespie (demonslay335@gmail.com)
 */
namespace Tests\Cuckoo;

use \Cuckoo\File;

class FileTest extends \PHPUnit_Framework_TestCase
{
    private $_file;

    private $_fileStub;

    public function setUp() {
        $this->_file = new File(apiUrl);

        $this->_fileStub = $this->getMock('\Cuckoo\File',
                                          array('add', 'status'),
                                          array(apiUrl));
    }

    public function tearDown() {
        unset($this->_file, $this->_fileStub);
    }

    public function testAddAndStatus() {
    	$mockAddResponse = array(
    		'status' => 'added',
    		'sha256' => '14ebd45fc9162f8afc4fd10186a46d2fb9844bf27b9d3217fd9fdb4107f17acd',
    		'uuid' => 'YWFmYTEwYTIwZjkwNDdiYWJjMmU1MWQ2ZjY1MWU3OTY'
    	);

    	$this->_fileStub->expects($this->any())
    	                ->method('add')
    	                ->will($this->returnValue($mockAddResponse));

    	$response = $this->_fileStub->add( __DIR__ . '/_files/good.txt');

    	$this->assertArrayHasKey('status', $response);
    	$this->assertArrayHasKey('sha256', $response);
    	$this->assertArrayHasKey('uuid', $response);

    	$mockStatusResponse = array(
    		'status' => 'completed'
    	);

    	$this->_fileStub->expects($this->any())
    	                ->method('status')
    	                ->will($this->returnValue($mockStatusResponse));

    	// Get status for uploaded file
    	$status = $this->_fileStub->status($response['uuid']);
    	$this->assertArrayHasKey('status', $status);
    }

}
?>