<?php

class MainController extends Controller
{
	public function actionIndex()
	{
		$this->view->display("Main", "1");
	}
}