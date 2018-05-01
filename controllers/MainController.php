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
		$page = array(
			'content' => 'main/IndexView.php',
			'data' => $data,
		);
		$this->view->display($page);
	}

	public function actionTables()
	{
		$data = $this->model->getTablesList();
		$page = array(
			'content' => 'main/TablesView.php',
			'data' => $data,
			'title' => 'Таблицы',
		);
		$this->view->display($page);
	}
}