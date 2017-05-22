<?php
namespace Kataclysm;


use Kataclysm\Data\Request;

/**
 * Class Kataclysm
 * @package Kataclysm
 * @link https://github.com/danilor/DigitalKataclysm
 */
class Kataclysm
{
    /**
     * The instance of this class
     * @var
     */
    private static $instance;
    /**
     * This will hold the Request variable
     * @var null
     */
    private $request = null;

    /**
     * The blade variable
     * @var null
     */
    private $blade = null;

    /**
     * This should work as the base path of the site.
     * @var null
     */
    private $dir = null;

    /**
     * Kataclysm constructor.
     * @param string $dir This is here because in any case we want to override the __DIR__ variable
     */
    public function __construct( string $dir = null)
    {
        if( $dir == null ) $dir = __DIR__;
        $this->dir = $dir;
        /**
         * Lets create the Request object
         */
        $this->request = new Request();
        $views = $this->dir . '/./Assets/Views';
        $cache = $this->dir . '/./Storage/ViewsCache';

        $this->blade = new \Philo\Blade\Blade( $views , $cache );
    }

    /**
     * Returns the DIR basepath
     * @return string
     */
    public function getAppBasePath() : string
    {
        return $this->dir;
    }




    /**
     * Get the Request Variable
     * @return null
     */
    public function getRequest() : Request
    {
        return $this->request;
    }

    public function getBlade() : \Philo\Blade\Blade
    {
        return $this->blade;
    }


    /**
     * This will return the current APP instance, if it does not exist, then we are creating it.
     * @param string|null $dir Just in case we want to override the __DIR__ variable in the constructor
     * @return Kataclysm
     */
    public static function getInstance( string $dir = null ) : Kataclysm
    {
        if (!Kataclysm::$instance instanceof self) {
            Kataclysm::$instance = new self( $dir );
        }
        return Kataclysm::$instance;
    }

    /**
     * It will take the current APP instance and return the REQUEST object
     * @return Request
     */
    public static function getInstanceRequest() : Request
    {
        return self::getInstance()->getRequest();
    }

    public static function getInstanceBlade() : \Philo\Blade\Blade
    {
        return self::getInstance()->getBlade();
    }


}