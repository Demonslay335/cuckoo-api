<?php
namespace Cuckoo;

class File extends ApiBase
{
    /**
     * @param string $file   absolute file path
     */
    public function scan($file) {
   		try {
            $response = $this->_client->post($this->_apiUrl . 'tasks/create/file/', array(
            	'multipart' => array(
            		array(
            			'name' => 'file',
            			'contents' => fopen($file, 'r'),
            			'filename' => $file
            		)
            	)
            ));
            $this->validateResponse($response->getStatusCode());
            return $this->to_json($response);
        } catch(ClientException $e) {
            $this->validateResponse($e->getResponse()->getStatusCode());
        }
    }

    /**
     * @param string $resource resource id that you retrieve from scan()
     */
    public function rescan($resource) {
        return $this->makeGetRequest('tasks/reschedule/' . $resource, array());
    }

    /**
     * @param string $hash hash of file to search for
	 * @param string $type hash type (md5/sha1/sha256)
     */
    public function searchReport($hash, $type = 'sha256') {
        return $this->makeGetRequest('tasks/search/' . $type . '/' . $hash . '/', array());
    }
}
