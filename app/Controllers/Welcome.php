<?php

namespace Controllers;

use \Kataclysm\Data\Controller;
use Kataclysm\Responses\ResponseView;

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
    public function start(){
        $request = request(); // Lets bring the request


        $response = new ResponseView();
        $response->setView( "start" );

        return $response;


    }
}