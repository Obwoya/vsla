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

	


	//start of admin actions
	
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
	//
	//
	//----start of staff actions
	//
	public function Pstaff(&$username) {
		return $this->tests->Pstaff($username);
	}

	public function S_members() {
		return $this->tests->S_members();
	}

	public function S_contributions() {
		return $this->tests->S_contributions();
	}

	public function S_loans() {
		return $this->tests->S_loans();
	}

	//end of staff actions
	//
	//
/// start of member actions
/// 
public function M_profile(&$username) {
		return $this->tests->M_profile($username);
	}

public function M_contributions() {
		return $this->tests->M_contributions();
	}

	public function M_loans() {
		return $this->tests->M_loans();
	}

	public function contribute(&$error) {
		return $this->tests->contribute($error);
	}

	public function R_loan(&$error) {
		return $this->tests->R_loan($error);
	}




	//end of member actions

	public function logged_in() {
		return $this->member->logged_in();
	}

	public function logout() {
		return $this->tests->logout();
	}


	public function loan() {
		return $this->contLoan->loan();
	}
}

?>