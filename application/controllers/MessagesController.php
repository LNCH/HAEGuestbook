<?php

require(APP_PATH . "models/Message.php");

class MessagesController extends Controller
{
	public function actionDelete($id)
	{
		$model = new Message();
		$result = 'none';

		if($model->deleteOne($id))
		{
			$result = 'success';
		}

		if($this->isAjaxRequest())
		{
			header('Content-Type: application/json');
			echo json_encode(['result' => $result]);
		}
		else 
		{
			$this->redirect("/");
		}
	}
}