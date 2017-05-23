<?php


namespace Kataclysm\Responses;


/**
 * Class ResponseView
 * This class represent the response of type view
 * @package Kataclysm\Responses
 */
class ResponseView extends Response
{

    /**
     * This represent the view this response is using.
     * @var string
     */
    private $view = '';

    /**
     * This represent the data we want to push to this view
     * @var array
     */
    private $data = [];


    /**
     * ResponseView constructor.
     */
    public function __construct(  )
    {

    }

    /**
     * @return string
     */
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * @param string $view
     */
    public function setView(string $view)
    {
        $this->view = $view;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }


    /**
     * This method will add a single element to the data
     * @param $d This does not have type because we wan add anything
     */
    public function addData( $key, $value ){
        $this -> data[ $key ]         =       $value;
    }


    /**
     * All responses should return a full string of what
     * they want to print into the page.
     * @return string
     */
    public function execute(): string
    {
        /**
         * Lets get the blade instance
         */
        $blade = \Kataclysm\Kataclysm::getInstance()->getBlade();


        $view = $blade  ->  view() -> make( $this->getView() );
        /**
         * if there is actual data
         */
        //dd( $this->getData() );
        if( COUNT( $this->getData() ) > 0 ){
            $view->with( $this->getData() );
        }

        return $view->render();
    }
}