<?php
require_once ('member.php');


class Model {

	protected $member;
	protected $contLoan;
	protected $tests;
	
	public function __construct() {
		//$this->member = new Member();
		//$this->$contLoan = new ContLoan();
		$this->tests = new Member();
		
	}

	public function index() {
		return $this->tests->index();
	}

	public function register(&$error) {
		return $this->tests->register($error);
	}

	public function login(&$error) {
		return $this->tests->login($error);
	}

	public function M_list() {
		return $this->tests->M_list();
	}

	public function logged_in() {
		return $this->member->logged_in();
	}

	public function logout() {
		return $this->tests->logout();
	}

	public function contribute() {
		return $this->contLoan->contribute();
	}

	public function loan() {
		return $this->contLoan->loan();
	}
}

?>