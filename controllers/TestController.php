<?php

class TestController extends Controller
{
	public function actionTest()
	{
		$this->view->display("Test", "1");
	}
}