<?php
namespace Kataclysm;


use Kataclysm\Data\Request;
use Kataclysm\Responses\Response;
use Kataclysm\Routing\Routes;
use Kataclysm\System\SystemException;

/**
 * Class Kataclysm
 * @package Kataclysm
 * @link https://github.com/danilor/DigitalKataclysm
 */
class Kataclysm
{

    /**
     * This is the namespace for the controllers
     * @var string
     */
    private $controller_namespace = 'Controllers';

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
     * Returns the APP basepath
     * @return string
     */
    public function getAppPath() : string
    {
        return $this->dir . DIRECTORY_SEPARATOR . 'app';
    }

    /**
     * Returns the Views basepath
     * @return string
     */
    public function getViewsPath() : string
    {
        return $this->dir . DIRECTORY_SEPARATOR . 'Assets' . DIRECTORY_SEPARATOR . 'Views';
    }

    /**
     * Returns the Storage basepath
     * @return string
     */
    public function getStoragePath() : string
    {
        return $this->dir . DIRECTORY_SEPARATOR . 'Storage';
    }

    /**
     * Returns the Config basepath
     * @return string
     */
    public function getConfigPath() : string
    {
        return $this->getAppPath() . DIRECTORY_SEPARATOR . 'Config';
    }

    /**
     * Returns the Web basepath
     * @return string
     */
    public function getWebPath() : string
    {
        return $this->dir . DIRECTORY_SEPARATOR . 'web';
    }


    /**
     * Get the Request Variable
     * @return Request
     */
    public function getRequest() : Request
    {
        return $this->request;
    }


    /**
     * It will return the blade object
     * @return \Philo\Blade\Blade
     */
    public function getBlade() : \Philo\Blade\Blade
    {
        return $this->blade;
    }


    /**
     * This is the main function where the APP will execute the view and the response
     */
    public function execute(){
        return $this->renderSimpleRoute();
    }


    /**
     * This will make a render of a simple route (in this case, a simple route is that one that only works with a class and a method,
     * we have to include closures in the future
     * TODO: change this comment when we add the closures
     * @return string
     * @see \Kataclysm\Responses\Response
     */
    private function renderSimpleRoute(){
        try{
            /**
             * If the class ROUTES does not find the giving route, it will throw an error,
             * and we are capturing that error almost at the end of this function
             */
            $route = Routes::findRoute( $this->getRequest()->getUri() , $this->getRequest()->getMethod() );
            /**
             * We get the class name and the method name. The class name should
             * come with the namespace
             */
            $className = "\\" . $this->controller_namespace . "\\" . $route->getClassName();
            $methodName = $route->getMethodName();
            /**
             * Now we check if the class actually exists, and if it does, then we check if the method exists into that class.
             */
            if( class_exists( $className ) ){
                $classObject = new $className();
                if( method_exists( $classObject , $methodName ) ){
                    /**
                     * The response we are getting from the method must be an object of the type Response (or any other class that inherits from it)
                     * if not, then the work should throw an error
                     */
                    $response = $classObject -> $methodName() ;
                    return $this->processResponse( $response );
                }else{
                    return $this->sendErrorPage( new \Exception("Method [" . $methodName . "] does not exist in the given class [". $className ."]") );
                }
            }else{
                return $this->sendErrorPage( new \Exception("Class does not exist or it is not in the class map") );
            }

        }catch (\Exception $err){
            /**
             * This is the expected error in the case the route does not exist, the class give an error or something similar.
             */
            return $this->sendErrorPage( $err );
        }
    }


    /**
     * This method will process the response and return the final string to be show into the page
     * @param Response $response
     * @return string
     * @throws SystemException If the process returns an error, we return it
     */
    private function processResponse( Response $response ) : string
    {
        try{
            return Response::processResponse( $response );
        }catch ( \Error $err ){
            throw new SystemException($err->getMessage(),$err->getCode(),$err);
        }catch ( \Exception $err ){
            throw new SystemException($err->getMessage(),$err->getCode(),$err);
        }

    }


    /**
     * This method will return the error page
     * @param \Exception $err
     * @return string
     */
    private function sendErrorPage(\Exception $err ) : string{
        // TODO make a way to handle the system errors
        return "Error : " . $err->getMessage();
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