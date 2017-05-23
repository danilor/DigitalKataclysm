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
    public function start(){
        return $this->view( "start.start" );
    }

    public function showMyGithub(){
        return $this->view( "start.mygithub" );
    }

    /**
     * This method will only show a youtube video to show how the dynamic url works
     */
    public function showYoutubeVideo(){
        return $this->view( "start.yvideo" );
    }
}