<?php

class Db 
{
	private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() 
    {
      	if(!isset(self::$instance)) 
      	{
        	$pdoOpts = [
				PDO::ATTR_ERRMODE			 => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES	 => false 
			];

			$config = $GLOBALS['config'];

        	$host = isset($config['components']['db']['host']) ? 
				$config['components']['db']['host'] : 'localhost';

			$username = isset($config['components']['db']['user']) ? 
				$config['components']['db']['user'] : 'root';

			$password = isset($config['components']['db']['pass']) ? 
				$config['components']['db']['pass'] : '';

			$dbName = isset($config['components']['db']['name']) ? 
				$config['components']['db']['name'] : '';

			$port = isset($config['components']['db']['port']) ? 
				$config['components']['db']['port'] : '3306';

			$charset = isset($config['components']['db']['charset']) ? 
				$config['components']['db']['charset'] : 'utf8';

			$dsn = "mysql:host=$host;dbname=$dbName;port=$port;charset=$charset";

        	self::$instance = new PDO($dsn, $username, $password, $pdoOpts);
      	}

      	return self::$instance;
    }
}