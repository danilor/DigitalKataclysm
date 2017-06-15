<?php
/**
 * This is the main Console command class. The idea
 * is that all commands inherit (extend) this class and with it, it will execute
 * the commands
 */

namespace Kataclysm\Console;


/**
 * Class Command
 * @package Kataclysm\Console
 */

abstract class Command
{
    /**
     * The name of the command
     * @var
     */

    /**
     * This indidcates the size of the headers
     * @var int
     */
    private $header_size = 50;
    private $footer_size = 39;

    private $box_symbol = '|';

    protected $name = '';

    /**
     * The description of the command
     * @var string
     */
    protected $description = '';

    /**
     * The start and end date of the command
     * @var
     */
    private $start ,  $end;

    /**
     * Command constructor.
     */
    public function __construct()
    {

    }

    public function process(){
        $this -> startTime();
        $this -> printHeader();
        $this -> execute();
        $this -> endTime();
        $this -> printFooter();
    }


    /**
     * It will set up the start time
     */
    private function startTime(){
        $this -> start = new \DateTime();
    }

    /**
     * This function will print the header of the command
     * @param bool $bottom_space
     */
    private function printHeader( $bottom_space = true){
        /**
         * If the title is not even, we have to add one point to the header lenght to we can center the information
         */
        if( strlen( $this->name ) % 2 > 0 ) $this -> header_size ++;
        /**
         * Now we calculate the title in the box
         */

        $aux_name = str_limit($this->name , $this->header_size -2 );
        $aux_title = ''; // The aux title will contain the full title (including spaces)
        $spaces = $this -> header_size - strlen( $aux_name );
        $both_sizes = (int)($spaces / 2); // This is the number of spaces before and after the title
        $aux_title = $this -> box_symbol . str_repeat(" " , $both_sizes ) . $aux_name . str_repeat( " " , $both_sizes ) . $this -> box_symbol;
        // dd( $aux_name , $spaces , $both_sizes , $this->header_size );
        /*** The top of the box */
        $this->success( $this -> box_symbol . str_repeat("*" , $this->header_size) . $this -> box_symbol );
        $this->success( $this -> box_symbol . str_repeat(" " , $this->header_size) . $this -> box_symbol );
        /** Now the title */
        $this -> success( $aux_title );
        /*** The bottom of the box */
        $this -> success( $this -> box_symbol . str_repeat(" " , $this->header_size) . $this -> box_symbol );
        $this -> success( $this -> box_symbol . str_repeat("*" , $this->header_size) . $this -> box_symbol );
        if( $bottom_space ){
            $this -> mes( " " );
        }
    }

    /**
     * @param bool $top_space
     */
    private function printFooter($top_space = true){

        /**
         * For the bottom, we are printing the space just before the last box
         */
        if( $top_space ){
            $this -> mes( " " );
        }



        /**
         * If the title is not even, we have to add one point to the header lenght to we can center the information
         */
        /**
         * Now we calculate the title in the box
         */
        $aux_name = 'Execution time: ' . $this -> getSeconds() . ' seconds';
        $aux_title = ''; // The aux title will contain the full title (including spaces)
        $spaces = $this -> footer_size - strlen( $aux_name );
        $both_sizes = (int)($spaces / 2); // This is the number of spaces before and after the title
        $aux_title = $this -> box_symbol . str_repeat(" " , $both_sizes ) . $aux_name . str_repeat( " " , $both_sizes ) . $this -> box_symbol;
        // dd( $aux_name , $spaces , $both_sizes , $this->header_size );
        /*** The top of the box */
        $this->success( $this -> box_symbol . str_repeat("*" , $this->footer_size) . $this -> box_symbol );
        $this->success( $this -> box_symbol . str_repeat(" " , $this->footer_size) . $this -> box_symbol );
        /** Now the title */
        $this -> success( $aux_title );
        /*** The bottom of the box */
        $this -> success( $this -> box_symbol . str_repeat(" " , $this->footer_size) . $this -> box_symbol );
        $this -> success( $this -> box_symbol . str_repeat("*" , $this->footer_size) . $this -> box_symbol );
    }


    /**
     * it will set up the end time
     */
    private function endTime(){
        $this -> end = new \DateTime();
    }

    /**
     * This will return the number of miliseconds between the start and the end of the process
     */
    private function getSeconds() : int
    {
        return (int)$this -> end ->getTimestamp() - $this -> start ->getTimestamp();
    }


    /**
     * @param $message
     */
    public function info($message ){
        \Kataclysm\Console\Console::print_message( $message, \Kataclysm\Console\Console::MESSAGE_TYPE_INFO );
    }

    /**
     * @param $message
     */
    public function warning($message ){
        \Kataclysm\Console\Console::print_message( $message, \Kataclysm\Console\Console::MESSAGE_TYPE_WARNING );
    }

    /**
     * @param $message
     */
    public function mes($message ){
        \Kataclysm\Console\Console::print_message( $message );
    }

    /**
     * @param $message
     */
    public function space( ){
        \Kataclysm\Console\Console::print_message( " " );
    }

    /**
     * @param $message
     */
    public function success($message ){
        \Kataclysm\Console\Console::print_message( $message, \Kataclysm\Console\Console::MESSAGE_TYPE_SUCCESS );
    }

    /**
     * @param $message
     */
    public function error($message ){
        \Kataclysm\Console\Console::print_message( $message, \Kataclysm\Console\Console::MESSAGE_TYPE_ERROR );
    }


    /**
     * This is the main function that it will call
     * @return mixed
     */
    abstract function execute();


}