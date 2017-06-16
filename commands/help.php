<?php

namespace Commands;

class help extends \Kataclysm\Console\Command
{
    protected $name = 'Meteor Help System';
    protected $description = 'This command shows the information of the site';

    /**
     * This is the main function that it will call
     * @return mixed
     */
    function execute()
    {
        $this -> mes( "Welcome to the Meteor shell script system." );
        $this -> mes( "This system allows you to generate shell scripts to be executed manually or automatically" );
        $this -> mes( "using automatic jobs as crontab for example." );
        $this -> space();
        $this -> mes( "The main structure for the Meteor scripts is:" );
        $this -> space();
        $this -> info( "php meteor [COMMAND NAME] --[PARAMETER_KEY]=[PARAMETER_VALUE]" );
        $this -> space();
        $this -> mes( "For example:" );
        $this -> space();
        $this -> info( "php meteor information --var=PHP_SELF" );
        $this -> space();
        $this -> mes( "Some commands may not use parameters or may use optional parameters as the example showed before." );
    }
}