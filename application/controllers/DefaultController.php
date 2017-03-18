<?php

require(APP_PATH . "models/Message.php");

class DefaultController extends Controller
{
	public function actionIndex($page)
	{
		$model = new Message();

		$page = ($page) ? $page : 1;
		$perPage = 8;
		$pagination = $model->paginate($page, $perPage);

		$messages = $model->findAll();

		$this->render("default/index", [
			'messages' => $messages,
			'pagination' => $pagination
		]);
	}
}