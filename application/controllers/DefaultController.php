<?php

class DefaultController extends Controller
{
	public function actionIndex($page)
	{
		$this->render("default/index");
	}
}
