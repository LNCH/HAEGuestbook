<?php

require(APP_PATH . "models/User.php");

class UsersController extends Controller
{
	public function actionLogin()
	{
		$errors = [];

		if(isset($_POST['username']))
		{
			$model = new User();
			
			$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

			if($model->login($username, $password))
			{
				// Successful login
				$this->redirect("/");
			}

			$errors = $_SESSION['login_errors'];
		}

		$this->render("users/login", ['errors' => $errors]);
	}

	public function actionLogout()
	{
		session_destroy();
		$this->redirect("/");
	}
}