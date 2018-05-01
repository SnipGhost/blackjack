<?php

include_once(ROOT.'models/DBModel.php');

class DBController extends Controller
{
	public function __construct()
	{
		$this->view = new View();
		$this->model = new DBModel();
	}

	public function actionIndex()
	{
		$page = array(
			'content' => 'db/IndexView.php',
			'title' => 'Таблицы',
		);
		$this->view->display($page);
	}

	public function actionInsert()
	{
		$values = array('username' => 'test', 'password' => 'pass');
		$data = $this->model->insert($values);
		$page = array(
			'content' => 'db/QueryView.php',
			'title' => 'Результат',
			'data' => $data,
		);
		$this->view->display($page);
	}

	public function actionInsertMany()
	{
		$keys = array('username', 'password');
		$values = array(
			array('test_1', 'pass_1'),
			array('test_2', 'pass_2'),
			array('test_3', 'pass_3'),
		);
		$data = $this->model->insertMany($keys, $values);
		$page = array(
			'content' => 'db/QueryView.php',
			'title' => 'Результат',
			'data' => $data,
		);
		$this->view->display($page);
	}
}