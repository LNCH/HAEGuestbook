<?php

require(APP_PATH . "models/Message.php");

class MessagesController extends Controller
{
	public function actionNew()
	{
		// Check for a posted messages
		if(isset($_POST['message-author']))
		{
			$author = filter_var($_POST['message-author'], FILTER_SANITIZE_STRING);
			$content = filter_var($_POST['message-content'], FILTER_SANITIZE_STRING);

			$message = new Message();

			$data = [
				'author_name'	=> $author,
				'date_posted'	=> gmdate("Y-m-d H:i:s"),
				'message' 		=> $content
			];

			$message->save($data);

			if($this->isAjaxRequest())
			{
				echo json_encode(['result' => 'success']);
				return true;
			}	
			else 
			{
				$this->redirect("/");
			}
		}

		if($this->isAjaxRequest())
		{
			echo $this->renderAjax("messages/new");
		}	
		else 
		{
			$this->render("messages/new");
		}	
	}

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