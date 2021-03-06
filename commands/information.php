<?php

namespace Commands;

class information extends \Kataclysm\Console\Command
{
    protected $name = 'Site Information';
    protected $description = 'This command shows the information of the site';

    /**
     * This is the main function that it will call
     * @return mixed
     */
    function execute()
    {
        $this -> mes( "System information taken from the _SERVER variable:" );
        $this -> space();

        if( $this->param( "var" ) !== "" ){
            if( isset( $_SERVER[ $this->param( "var" ) ] ) && is_string( $_SERVER[ $this->param( "var" ) ] ))
                    $this -> mes ( " - " . $this->param( "var" ) . ' = ' . str_limit( $_SERVER[ $this->param( "var" ) ] , 60 ) );
        }else{
            foreach( $_SERVER AS $key =>  $server ){
                if( is_string( $server )) $this -> mes ( " - " .$key . ' = ' . str_limit( $server , 60 ) );
            }
        }
    }
}