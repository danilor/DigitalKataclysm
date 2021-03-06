<?php


/**
 * Class DB
 * This class will be the main database object of the site. It should be called as global
 */

use Illuminate\Database\Capsule\Manager as Capsule;

class DB
{

    /**
     * The instance of this class
     * @var
     */
    private static $instance;

    /**
     * This is the variable that will handle the main capsule information
     * @var null
     */
    private $capsule = null;
    private $connection = null;
    /**
     * DB constructor.
     */
    public function __construct()
    {
        $this -> capsule = new Capsule;

        $options = [
            'driver'    => config( "db.driver" ),
            'host'      => config( "db.host" ),
            'database'  => config( "db.database" ),
            'username'  => config( "db.username" ),
            'password'  => config( "db.password" ),
            'charset'   => config( "db.charset" ),
            'collation' => config( "db.collation" ),
            'prefix'    => config( "db.prefix" ),
        ];
        $this -> capsule -> addConnection( $options );
        $this -> capsule->setAsGlobal(); /** I am still not sure how this one works, but it is a recommendation to use it, so we are going to use it :)*/
    }

    /**
     * This will return the current capsule object
     * @return Capsule
     */
    public function capsule() : Illuminate\Database\Capsule\Manager
    {
        return $this->capsule;
    }

    public function connection() : \Illuminate\Database\MySqlConnection
    {
        return $this->connection();
    }


    /**
     * This will return the current APP instance, if it does not exist, then we are creating it.
     * @return Kataclysm
     */
    public static function getInstance(  ) : DB
    {
        if (!DB::$instance instanceof self) {
            DB::$instance = new self(  );
        }
        return DB::$instance;
    }

    /**
     * This method will return the connection
     */
    public static function con( ) : \Illuminate\Database\MySqlConnection
    {
        return self::getInstance()->capsule()->getConnection();
    }

}