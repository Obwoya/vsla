<?php
require_once('models/model.php');
//session_start();

class Controller {
	

	protected $model;
	public $username;

	public function __construct() {
		$this->model = new Model();
	}

	public function index() {

		$tests = $this->model->index();
		if(!isset($_SESSION['type'])){
		$logged_in = $this->model->login($error);}
		require_once 'views/index.php';
	}

	public function signup() {
		$status = $this->model->register($error);
		$logged_in = $this->model->login($error);
		require_once 'views/signup.php';
	}

	public function forget(){
		$status = $this->model->forget($error);
		$logged_in = $this->model->login($error);
		require_once 'views/forget.php';
	}

	public function register() {
		$status = $this->model->register($error);
		//require_once 'views/'
	}

	public function logout() {
		$status = $this->model->logout();
	}

	

	public function A_staff() {
		$logged_in = $this->model;
		$staff = $this->model->A_staff();
		$content = "views/Astaff.php";
		require_once 'views/admin.php';
	}

	//start of actions
	
	public function A_RMember() {
		$logged_in = $this->model;
		if (isset($_GET['username'])) {
			# code...
			$username = $_GET['username'];
			$action = $this->model->A_RMember($username);
		}
			}

	public function A_AMember() {
		$logged_in = $this->model;
		if (isset($_GET['username'])) {
			# code...
			$username = $_GET['username'];
			$action = $this->model->A_AMember($username);
		}

	}

	public function A_PMember(&$username) {
		$logged_in = $this->model;
		if (isset($_GET['username'])) {
			# code...
			$username = $_GET['username'];
			$action = $this->model->A_PMember($username);
		}
	}

	public function A_DMember(&$username) {
		$logged_in = $this->model;
		if (isset($_GET['username'])) {
			# code...
			$username = $_GET['username'];
			$action = $this->model->A_DMember($username);
		}
	}

	public function A_contributions() {
		$logged_in = $this->model;
		$tests = $this->model->S_contributions();
		$content = "views/S_contributions.php";
		require_once 'views/admin.php';
	}

	public function A_loans() {
		$logged_in = $this->model;
		$tests = $this->model->S_loans();
		$content = "views/S_loans.php";
		require_once 'views/admin.php';
	}

	

	//=== end of actions

	public function Aprofile() {
		$logged_in = $this->model;
		if (isset($_SESSION['username'])) {
			# code...
			$username = $_SESSION['username'];
		$profile = $this->model->A_profile($username);
		}
		$content = "views/Aprofile.php";
		require_once 'views/admin.php';
	}

	public function members() {
		$logged_in = $this->model;
		$tests = $this->model->M_list();
		$content = "views/M_list.php";
		require_once 'views/admin.php';
	}


	// staff
	public function Pstaff() {
		$logged_in = $this->model;
		if (isset($_SESSION['username'])) {
			# code...
			$username = $_SESSION['username'];
		$profile = $this->model->Pstaff($username);
		}
		$content = "views/Pstaff.php";
		require_once 'views/staff.php';
	}

	public function S_members() {
		$logged_in = $this->model;
		$tests = $this->model->S_members();
		$content = "views/S_members.php";
		require_once 'views/staff.php';
	}

	public function S_contributions() {
		$logged_in = $this->model;
		$tests = $this->model->S_contributions();
		$content = "views/S_contributions.php";
		require_once 'views/staff.php';
	}

	public function S_contributionsReport() {
		$logged_in = $this->model;
		$tests = $this->model->S_contributionsReport();
		$content = "views/S_contributionsReport.php";
		require_once 'views/staff.php';
	}

	public function S_loans() {
		$logged_in = $this->model;
		$tests = $this->model->S_loans();
		$content = "views/S_loans.php";
		require_once 'views/staff.php';
	}

	public function S_loansReport() {
		$logged_in = $this->model;
		$tests = $this->model->S_loansReport();
		$content = "views/S_loansReport.php";
		require_once 'views/staff.php';
	}

	public function S_lpayment() {
		$logged_in = $this->model;
		$tests = $this->model->S_lpayment();
		$content = "views/S_lpayment.php";
		require_once 'views/staff.php';
	}


	public function S_lpaymentReport() {
		$logged_in = $this->model;
		$tests = $this->model->S_lpaymentReport();
		$content = "views/S_lpaymentReport.php";
		require_once 'views/staff.php';
	}


		public function S_Laccept(&$id) {
		$logged_in = $this->model;
		if (isset($_GET['id'])) {
			# code...
			$id = $_GET['id'];
			$action = $this->model->S_Laccept($id);
		}

	}

	public function S_Lignore(&$id) {
		$logged_in = $this->model;
		if (isset($_GET['id'])) {
			# code...
			$id = $_GET['id'];
			$action = $this->model->S_Lignore($id);
		}

	}


		public function S_PLaccept(&$id,&$amount,&$member) {
		$logged_in = $this->model;
		if (isset($_GET['id'])) {
			# code...
			$id = $_GET['id'];
			$amount = $_GET['amount'];
			$member = $_GET['member'];
			$action = $this->model->S_PLaccept($id,$amount,$member);
		}

	}

	public function S_PLignore(&$id) {
		$logged_in = $this->model;
		if (isset($_GET['id'])) {
			# code...
			$id = $_GET['id'];
			$action = $this->model->S_PLignore($id);
		}

	}

	public function S_approve(&$id) {
		$logged_in = $this->model;
		if (isset($_GET['id'])) {
			# code...
			$id = $_GET['id'];
			$action = $this->model->S_approve($id);
		}

	}

	public function S_Cignore(&$id) {
		$logged_in = $this->model;
		if (isset($_GET['id'])) {
			# code...
			$id = $_GET['id'];
			$action = $this->model->S_Cignore($id);
		}

	}



	//member
	//
	public function Mprofile() {
		$logged_in = $this->model;
			if (isset($_SESSION['username'])) {
			# code...
			$username = $_SESSION['username'];
		$profile = $this->model->M_profile($username);
		}
		$total = $this->model->mloan();
		$content = "views/Mprofile.php";
		require_once 'views/member.php';
	}

	public function M_contributions() {
		$logged_in = $this->model;
		$tests = $this->model->M_contributions();
		$total = $this->model->mloan();
		$content = "views/M_contributions.php";
		require_once 'views/member.php';
	}

	public function M_loans() {
		$logged_in = $this->model;
		$tests = $this->model->M_loans();
		$total = $this->model->mloan();
		$content = "views/M_loans.php";
		require_once 'views/member.php';
	}

	public function payed_loans() {
		$logged_in = $this->model;
		$tests = $this->model->payed_loans();
		$total = $this->model->mloan();
		$content = "views/payed_loans.php";
		require_once 'views/member.php';
	}



	public function New_contribution() {
		$status = $this->model->contribute($error);
		$logged_in = $this->model;
		$total = $this->model->mloan();
		$content = "views/New_contribution.php";
		require_once 'views/member.php';
	}

	public function pay_loan() {
		$total = $this->model->mloan();
		$status = $this->model->ploan($error);
		$logged_in = $this->model;
		$content = "views/pay_loan.php";
		require_once 'views/member.php';
	}

	public function Request_loan() {
		$status = $this->model->R_loan($error);
		$logged_in = $this->model;
		$total = $this->model->mloan();
		$content = "views/Request_loan.php";
		require_once 'views/member.php';
	}


public function contribute() {
		$total = $this->model->mloan();

		$status = $this->model->contribute($error);
		//require_once 'views/'
	}
}


?>