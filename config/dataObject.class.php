<?php
class dataObject {
	private static $link = null ;
    private static function getLink ( ) {
        if ( self :: $link ) { return self::$link; }
		$ini = '';
		if(!file_exists('_private/config.ini')){ $ini .= '../'; };
		$ini .= '_private/config.ini';
        $parse = parse_ini_file ( $ini , true ) ;

        $driver = $parse [ "db_driver" ] ;
        $dsn = "${driver}:" ;
        $user = $parse [ "db_user" ] ;
        $password = $parse [ "db_password" ] ;
        $options = $parse [ "db_options" ] ;
        $attributes = $parse [ "db_attributes" ] ;

        foreach ( $parse [ "dsn" ] as $k => $v ) {
            $dsn .= "${k}=${v};" ;
        }

        try {
			self::$link = new PDO($dsn,$user,$password,$options);
		}
		catch(PDOException $e){
			die("Could not connect to the database\n");
		}
        foreach ( $attributes as $k => $v ) {
            self :: $link -> setAttribute ( constant ( "PDO::{$k}" )
                , constant ( "PDO::{$v}" ) ) ;
        }

        return self::$link ;
    }

    public static function __callStatic ( $name, $args ) {
        $callback = array ( self :: getLink ( ), $name ) ;
        return call_user_func_array ( $callback , $args ) ;
    }
}
class dataObjectResult {
	public $result;
	public function __construct($dbq){
		$db = dataObject::prepare($dbq);
		$db->execute();
		$this->result = $db;
	}
}
?>
