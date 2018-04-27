<?php

include_once(ROOT.'models/MainModel.php');

class MainController extends Controller
{
	public function __construct()
	{
		$this->view = new View();
		$this->model = new MainModel();
	}
	public function actionIndex()
	{
		$data = $this->model->getData();
		$this->view->display("default.php", "main/MainView.php", $data);
	}
	public function actionTables()
	{
		$data = $this->model->getTablesList();
		$meta = array('title' => 'Таблицы');
		$this->view->display("default.php", "main/MainView.php", $data, $meta);
	}
}