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

	public function A_staff() {
		return $this->tests->A_staff();
	}

	public function A_profile(&$username) {
		return $this->tests->A_profile($username);
	}

	public function M_profile(&$username) {
		return $this->tests->M_profile($username);
	}


	//start of actions
	
	public function A_RMember(&$username) {
		return $this->tests->A_RMember($username);
	}

	public function A_AMember(&$username) {
		return $this->tests->A_AMember($username);
	}

	public function A_PMember(&$username) {
		return $this->tests->A_PMember($username);
	}

	public function A_DMember(&$username) {
		return $this->tests->A_DMember($username);
	}

	//=== end of actions

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