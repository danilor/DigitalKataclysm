<?php
namespace Kataclysm\Data;

use Kataclysm\Responses\ResponseView;
use Kataclysm\System\SystemNotFound;

/**
 * Class Controller
 * This is the class that all controllers should extend
 * @package Kataclysm\Data
 */
abstract class Controller
{
    /**
     * Indicates the origin for this controller
     * @var
     */
    protected $origin;

    /**
     * This method will automatically return a response of the type View
     * @param string $viewName
     * @param array $data
     * @return ResponseView
     */
    public function view(string $viewName , array $data = [] ) : ResponseView
    {
        $request = request(); // Lets bring the request
        $response = new ResponseView();
        $response -> setData( $data );
        $response->setView( $viewName );
        return $response;
    }

    /**
     * This method throws an error of SystemNotFound kind
     * @param string $message
     * @throws SystemNotFound
     */
    public function send404( $message = '' ){
        throw new SystemNotFound( $message );
    }

}