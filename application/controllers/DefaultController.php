<?php

require(APP_PATH . "models/Message.php");

class DefaultController extends Controller
{
	public function actionIndex($page)
	{
		$model = new Message();

		$messages = $model->findAll();

		$this->render("default/index", [
			'messages' => $messages
		]);
	}
}
