<?php


namespace Kataclysm\Responses;


class ResponseRedirect extends Response {
	/**
	 * This is going to be the list of errors
	 *
	 * Esta va a ser la lista de errores
	 *
	 * @var array
	 */
	private $errors = [];

	/**
	 * The URL where we are redirecting
	 *
	 * La URL a donde estamos redirigiendo
	 *
	 * @var string
	 */
	private $url = "/";

	/**
	 * Its the query string of the redirect, in case we want to use it
	 *
	 * Es el QUERY STRING de la redirección, en caso de que queramos usarlo
	 *
	 * @var array
	 */
	private $query_string = [];

	/**
	 * This will hold the input we want to send with the request
	 *
	 * Esto va a contener el INPUT que queremos enviar de vuelta con el request
	 *
	 * @var array
	 */
	private $input = [];


	/**
	 * Gets the list of errors.
	 *
	 * Obtiene la lista de errores
	 *
	 * @return array
	 */
	public function getErrors(): array
	{
		return $this->errors;
	}

	/**
	 * Sets the list of errors
	 *
	 * Establece la lista de errores
	 *
	 * @param array $errors
	 */
	public function setErrors( array $errors )
	{
		$this->errors = $errors;
	}

	/**
	 * Adds one single error to the errors list
	 *
	 * Añade un solo error a la lista de errores
	 *
	 * @param string $err
	 */
	public function addError(string $err ){
		$this -> errors [] = $err;
	}

	/**
	 * Gets the URL of the redirect
	 *
	 * Obtiene la URL de la redirección
	 *
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->url;
	}

	/**
	 * This method will return the URL with the query string as a full URL response
	 * Este método va a devolver la URL con el query string
	 * @return string $url String The full url | La URL completa
	 */
	public function getFullBuiltUrl(){

		$url = $this -> getUrl();
		if( count($this -> getQueryString()) > 0 ){
			$url = $this -> getUrl() . '?' . http_build_query( $this ->getQueryString() );
		}
		return $url;
	}

	/**
	 * Sets the URL of the redirect
	 *
	 * Establece la URL de la redirección
	 *
	 * @param string $url
	 */
	public function setUrl( string $url )
	{
		$this->url = $url;
	}

	/**
	 * Gets the input we want to send with the redirect
	 *
	 * Obtiene el INPUT que queremos enviar con el Redirect
	 *
	 * @return array
	 */
	public function getInput(): array
	{
		return $this->input;
	}

	/**
	 * Sets the input we want to send with the redirect
	 *
	 * Establece el INPUT que queremos enviar con el Redirect
	 *
	 * @param array $input
	 */
	public function setInput(array $input)
	{
		$this->input = $input;

	}

	/**
	 * Get the query string array
	 *
	 * Obtiene el QUERY STRING
	 *
	 * @return array
	 */
	public function getQueryString(): array
	{
		return $this->query_string;
	}

	/**
	 * Set the query string array
	 *
	 * Establece el QUERY STRING
	 *
	 * @param array $query_string
	 */
	public function setQueryString(array $query_string)
	{
		$this->query_string = $query_string;
	}


	/**
	 * Adds a single query string item to the list. If it already exists, it will overwrite it
	 *
	 * Añade un único QUERY STRING ítem a la lista. Si ya existe, éste será sobreescrito.
	 *
	 * @param string $key
	 * @param string $value
	 */
	public function addQueryStringItem(string $key , string $value )
	{
		$this -> query_string[ $key ] = $value;
	}

	/**
	 * All responses should return a full string of what
	 * they want to print into the page.
	 * @return string
	 */
	public function execute(): string {
		return $this->getFullBuiltUrl();
	}
}