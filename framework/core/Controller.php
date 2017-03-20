<?php

class Controller
{
	protected $loader;

	public function __construct()
	{
		$this->loader = new Loader();
	}

	public function redirect($url, $message, $delay = 0)
	{
		if($delay === 0)
		{
			header("Location: $url");
		}
		else
		{
			include(VIEW_PATH . "message.php"); 
		}

		exit;
	}

	public function render($view = NULL, $data = [])
	{
		if($view)
		{
			ob_start();
			include(VIEW_PATH . $view . ".php");
			$content = ob_get_clean();
		}

		require(PUBLIC_PATH . "layouts/main.php");
	}

	public function renderAjax($view = NULL, $data = [])
	{
		if($view)
		{
			ob_start();
			include(VIEW_PATH . $view . ".php");
			$content = ob_get_clean();
		}

		return $content;
	}

	public function isAjaxRequest()
	{
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
			&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			return true;
		}
		return false;
	}
}