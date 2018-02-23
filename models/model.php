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

	public function forget(&$error) {
		return $this->tests->forget($error);
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

	public function S_contributionsReport() {
		return $this->tests->S_contributionsReport();
	}


	public function S_loans() {
		return $this->tests->S_loans();
	}

	public function S_loansReport() {
		return $this->tests->S_loansReport();
	}


	public function S_lpayment() {
		return $this->tests->S_lpayment();
	}

	public function S_lpaymentReport() {
		return $this->tests->S_lpaymentReport();
	}

	public function S_Laccept(&$id) {
		return $this->tests->S_Laccept($id);
	}

	public function S_Lignore(&$id) {
		return $this->tests->S_Lignore($id);
	}

	public function S_PLaccept(&$id,&$amount) {
		return $this->tests->S_PLaccept($id,$amount);
	}

	public function S_PLignore(&$id) {
		return $this->tests->S_PLignore($id);
	}

	public function S_approve(&$id) {
		return $this->tests->S_approve($id);
	}

	public function S_Cignore(&$id) {
		return $this->tests->S_Cignore($id);
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
	public function ploan(&$error) {
		return $this->tests->ploan($error);
	}

	public function R_loan(&$error) {
		return $this->tests->R_loan($error);
	}

	public function mloan() {
		return $this->tests->mloan();
	}

	public function payed_loans() {
		return $this->tests->payed_loans();
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