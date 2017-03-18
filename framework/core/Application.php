<?php 

class Application 
{
	public static function run()
	{
		// Initialise application
		self::init();
		self::autoload();
		self::dispatch();
	}

	/**
	 *	init()
	 *
	 *	Launches the application, defines core directories and starts basic		
	 *  processes such as session
	 */
	private static function init()
	{
		// Define path constants
		define("DS", DIRECTORY_SEPARATOR);

		// Root directory
		define("ROOT", getcwd() . DS);

		// First level framework directories
		define("APP_PATH", 		 ROOT . "application" . DS);
		define("FRAMEWORK_PATH", ROOT . "framework" . DS);
		define("PUBLIC_PATH",    ROOT . "public" . DS);
		define("IMAGES", 		 ROOT . "public/images" . DS);

		// Second level, application directories
		define("CONFIG_PATH",     APP_PATH . "config" . DS);
		define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
		define("MODEL_PATH", 	  APP_PATH . "models" . DS);
		define("VIEW_PATH", 	  APP_PATH . "views" . DS);

		// Second level, framework directories
		define("CORE_PATH",   FRAMEWORK_PATH . "core" . DS);
		define("DB_PATH", 	  FRAMEWORK_PATH . "db" . DS);
		define("LIB_PATH", 	  FRAMEWORK_PATH . "lib" . DS);
		define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);

		# Split the path by the 
		$request = ltrim($_SERVER['REQUEST_URI'], "/");

		// Check for added params
		$urlParams = split("/", $request);

		// Create the route
		$route['c'] = (isset($urlParams[0]) && $urlParams[0] !== "") ?  ucwords($urlParams[0]) : 'Default';
		$route['a'] = isset($urlParams[1]) ?  ucwords($urlParams[1]) : 'Index';
		$route['id'] = isset($urlParams[2]) ?  (int) ucwords($urlParams[2]) : NULL;

		// Define current request parameters
		define("CONTROLLER", $route['c']);	// Default controller is 'default'
		define("ACTION", 	 $route['a']);	// Default action is 'index'
		define("REQUEST_ID", $route['id']);

		// Preload core classes
		require CORE_PATH . "Controller.php";
		require CORE_PATH . "Loader.php";
		require DB_PATH . "Db.php";
		require CORE_PATH . "Model.php";

		// Load global config file
		$GLOBALS['config'] = require(CONFIG_PATH . "main.php");

		// Begin the session
		session_start();
	}

	/**
	 *	autoload()
	 *
	 *	Registers the autoloader
	 */
	private static function autoload()
	{
		spl_autoload_register([__CLASS__, 'load']);
	}

	/**
	 *	load()
	 *
	 *	Custom loading function for the application
	 *
	 *	@param $classname String
	 */
	private static function load($classname)
	{
		// Load app's controller and model classes
		if(substr($classname, -10) === "Controller")
		{
			// Controller class
			require_once(CONTROLLER_PATH . "$classname.php");
		}
		else if(substr($classname, -5) === "Model")
		{
			// Model class
			require_once(MODEL_PATH . "$classname.php");
		}
	}

	/**
	 *	dispatch()
	 *
	 *	Instantiates the required controller class and call the
	 *	corresponding action within it
	 */
	private static function dispatch()
	{
		$controllerName = CONTROLLER . "Controller";
		$actionName = "action" . ACTION;

		// Instantiate the chosen controller
		$controller = new $controllerName;

		try
		{
			// Call the chosen action function
			$controller->$actionName(REQUEST_ID);
		}
		catch(Exception $e)
		{
			// Error Handler
			echo "Error " . $e->getCode() . ": " . $e->getMessage();
			echo "<h4>Stack trace:</h4>";
			echo "<table>";
			$traceCount = 0;
			foreach($e->getTrace() as $trace)
			{
				echo "<tr>";
				echo "<td>#" . $traceCount . " " . $trace['file'] ."(" . $trace['line'] . "):</td>";
				echo "<td>". $trace['class'] . "->" . $trace['function'] ."(";
				
				if(count($trace['args'])): foreach($trace['args'] as $i => $arg):
					if(gettype($arg) === "string")
					{
						echo "'" . $arg . "'";
					}
					else 
					{
						echo $arg;
					}

					if(($i + 1) < count($trace['args']))
					{
						echo ", ";
					}
				endforeach; endif;

				echo ")</td>";
				echo "</tr>";
				$traceCount++;
			}
			echo "</table>";
		}
	}
}