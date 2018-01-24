<?php
require_once('models/model.php');
//session_start();

class Controller {

	protected $model;

	public function __construct() {
		$this->model = new Model();
	}

	public function index() {

		$tests = $this->model->index();
		$status = $this->model->register($error);
		if(!isset($_SESSION['type'])){
		$logged_in = $this->model->login($error);}
		require_once 'views/index.php';
	}

	public function register() {
		$status = $this->model->register($error);
		//require_once 'views/'
	}

	public function logout() {
		$status = $this->model->logout();
	}

	public function Mprofile() {
		$logged_in = $this->model;
		$content = "views/Mprofile.php";
		require_once 'views/member.php';
	}

	public function Aprofile() {
		$logged_in = $this->model;
		$content = "views/Aprofile.php";
		require_once 'views/admin.php';
	}

	public function members() {
		$logged_in = $this->model;
		$tests = $this->model->M_list();
		$content = "views/M_list.php";
		require_once 'views/admin.php';
	}
}


?>