<?php

namespace Controllers;

use \Kataclysm\Data\Controller;



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

}