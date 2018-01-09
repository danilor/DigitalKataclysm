<?php


namespace Kataclysm\Responses;


/**
 * Class ResponseView
 * This class represent the response of type view
 * @package Kataclysm\Responses
 */

class ResponseJson extends Response
{

	/**
	 * The status of the response
	 * @var int
	 */
	private $status = 0;

	/**
	 * The current error id
	 * @var int
	 */
	private $error_id = 0;

	/**
	 * The current error description
	 * @var string
	 */
	private $error_description = '';

	/**
	 * The data to be showed
	 * @var null
	 */
	private $data = null;

	/**
	 * ResponseJson constructor.
	 */
	public function __construct() {

	}

	/**
	 * It gets the status
	 * @return int
	 */
	public function getStatus() : int
	{
		return $this->status;
	}

	/**
	 * Sets the status
	 * @param $status
	 */
	public function setStatus( $status ) {
		$this->status = $status;
	}

	/**
	 * Sets an error with id and description
	 * @param $id
	 * @param $desc
	 */
	public function setError( $id , $desc){
		$this -> error_id = $id;
		$this -> error_description = $desc;
	}

	/**
	 * Sets the data
	 * @param $data
	 */
	public function setData( $data ){
		$this -> data = $data;
	}

	/**
	 * It will construct the response
	 * @return array
	 */
	public function constructResponse() : array
	{
		$r = [];
		$r[ "error" ][ "id" ]           =       $this -> error_id;
		$r[ "error" ][ "desc" ]         =       $this -> error_description;
		$r[ "data" ]                    =       $this -> data;
		return $r;
	}

	/**
	 * Will construct and display the response
	 * @param bool $header
	 * @return string
	 */
	public function execute( bool $header = true ): string {
		if( $header ) header('Content-Type: application/json');
		return json_encode( $this->constructResponse() );
	}


}