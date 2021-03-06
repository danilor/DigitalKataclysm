<?php

namespace Controllers;

use \Kataclysm\Data\Controller;
use Kataclysm\Data\Request;
use Kataclysm\Responses\ResponseRedirect;


/**
 * Class Welcome
 * This class will take care of the welcome page
 * @package Controller
 */
class Welcome extends Controller
{

    /**
     * This is the method that will show the welcome page
     */
    public function start() : \Kataclysm\Responses\ResponseView
    {
        return $this->view( "start.start" );
    }

    public function showMyGithub() : \Kataclysm\Responses\ResponseView
    {
        return $this->view( "start.mygithub" );
    }

    /**
     * This method will only show a youtube video to show how the dynamic url works
     */
    public function showYoutubeVideo() : \Kataclysm\Responses\ResponseView
    {
        $data = [];
        $data["youtube_id"]     =       segment(2);
        return $this->view( "start.yvideo" , $data );
    }

    /**
     * This will show the example of the database connection. Please refer to the app.ini file to see the information
     * @return \Kataclysm\Responses\ResponseView
     */
    public function showDatabase() : \Kataclysm\Responses\ResponseView
    {
        $data = [];
        $name = \DB::con()->table("test")->get();
        $data[ "names" ] = $name;
        return $this->view( "start.database" , $data );
    }


	/**
	 * It will show the example of a JSON Request page
	 * @return \Kataclysm\Responses\ResponseJson
	 */
    public function showJSON() : \Kataclysm\Responses\ResponseJson
    {
    	$response = new \Kataclysm\Responses\ResponseJson();
    	$response -> setData(
    		[
    		    "Example"   => true,
			    "Response"  => true,
		    ]
	    );
    	return $response;
    }

	/**
	 * It will show the example of a XML Request page
	 * @return \Kataclysm\Responses\ResponseJson
	 */
	public function showXML() : \Kataclysm\Responses\ResponseXML
	{
		$response = new \Kataclysm\Responses\ResponseXML();
		$response -> setData(
			[
				"Example"   => true,
				"Response"  => true,
			]
		);
		return $response;
	}

	/**
	 * This will show the example form page.
	 * @return \Kataclysm\Responses\ResponseView
	 */
	public function showForm() : \Kataclysm\Responses\ResponseView
	{
		$data = [];
		$data[ "success" ]      =       false;
		$input =  request()->getInput();
		if( isset( $input[ "error" ] ) ){ // If there are errors in the URL comming from other pages, we are showing them.
			$data[ "error" ] = $input[ "error" ];
		}elseif( isset( $input[ "status" ] ) && (int)$input[ "status" ] === 1 ){
			$data[ "success" ]      =       true;
		}
		return $this->view( "start.form" , $data );
	}


	public function postForm() : \Kataclysm\Responses\ResponseRedirect
	{


		$response = new ResponseRedirect();
		$response->setUrl( "/form_example" );


		/**
		 * INFORMATION:
		 * https://github.com/Wixel/GUMP
		 */

		$post_data = request()->getInput();
		$v = getValidator();
		// The GUMP class recomends sanitizing the data, but since we are getting it from the request object, it should come already sanitized.
		//$post_data = $v->sanitize( $post_data );

		$v->validation_rules(array(
			'name'          => 'required|alpha_numeric|max_len,100|min_len,3',
			'email'         => 'required|valid_email',
			//'gender'      => 'required|exact_len,1|contains,m f',
			//'credit_card' => 'required|valid_cc'
			'address'       => 'required|alpha_numeric|max_len,100|min_len,3',
			'nickname'      => 'alpha_numeric|max_len,100|min_len,1',
		));

		/*$v->filter_rules(array(
			'username' => 'trim|sanitize_string',
			'password' => 'trim',
			'email'    => 'trim|sanitize_email',
			'gender'   => 'trim',
			'bio'	   => 'noise_words'
		));*/

		// Lets run the validation
		$validated_data = $v->run( $post_data );
		//dd( $post_data , $validated_data , $v->get_readable_errors(false) );
		if( $validated_data ){ // The validation was successful
			$response -> addQueryStringItem( "status" , 1 );
		}else{ // There were errors in the validation
			$response -> addQueryStringItem( "status" , 0 );
			foreach( $v->get_readable_errors(false) AS $error ){ // We are going to iterate over all errors
				$response -> addQueryStringItem( "error[]" , strip_tags( $error ) );
			}
		}
		return $response;
	}

}