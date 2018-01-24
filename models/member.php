
<?php 
require_once('database.php');
class Member {
	

	protected $database;
	protected $name;
	protected $username;
	protected $password;
	protected $id;
	protected $logged_in;

	public function __construct()
	{
		$this->database = new Db();
		$this->database->connect();
	}

	public function set($username, $password){
	//	$this->name = $name;
		$this->username = $username;
		$this->password = $password;
		//$this->$id = $id;
	}

	public function index() {
		$sql = "SELECT * FROM member";

		$result = $this->database->execute($sql);
		return $result;
	}

	public function register(&$error){
		if(empty($_REQUEST['action'])) $status = "Fill the form to register";

		else if($_REQUEST['action'] == 'sub') {
			$error = array();
			//if(empty($_REQUEST['name'])) $error['name']='empty';

			if (empty($_REQUEST['username'])) $error['username']='empty';
			else {
				$sql = "SELECT count(*) as total from member where username = '{$_REQUEST['username']}'";
				$result = $this->database->execute($sql);
				$total = $result[0]['total'];

				if ($total) $error['username']= 'This username has been taken.'; 
							}

			if(empty($_REQUEST['email'])) $error['email'] = 'empty';
			if(empty($_REQUEST['lname'])) $error['lname'] = 'empty';
			if(empty($_REQUEST['fname'])) $error['fname'] = 'empty';
			if(empty($_REQUEST['bdate'])) $error['bdate'] = 'empty';
			if(empty($_REQUEST['phone'])) $error['phone'] = 'empty';
			if(empty($_REQUEST['address'])) $error['address'] = 'empty';




			if (empty($error)) {
				# code...
				$name = $_POST['fname'].' '.$_POST['lname'];
				$bdate = $_POST['bdate'];
				$phone = $_POST['phone'];
				$address = $_POST['address'];
				$email = $_POST['email'];
				$gender = $_POST['gender'];
				$this->set($_REQUEST['username'], $_REQUEST['password']);


				$sql = "INSERT into member (name,username,password,email,address,phone,bdate,gender,status,type) values ('$name', '{$this->username}', '{$this->password}','$email','$address','$phone','$bdate','$gender','waiting','member')";

				$this->database->execute($sql);

				$status = "Thank you for registering with us, now you can login";
			}
			else $status = "fail";
		}

		return $status;
	}


	public function login(&$error) {
		$username='';
		$password = '';
		//session_start();
/*if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];}
		if(empty($username)) $username = $_REQUEST['username'];*/
		$username = isset($_POST['username']) ? $_POST['username'] : $username;
/*if(isset($_SESSION['username'])){
		$password = $_SESSION['password'];}*/
		/*if(empty($password)) $password = $_REQUEST['password'];*/
		$password = isset($_POST['password']) ? $_POST['password'] : $password;

		$sqlM = "SELECT count(*) as total from member where username='$username' and password='$password' and type='member' and status='accepted'";

		$sqlS = "SELECT count(*) as total from member where username='$username' and password='$password' and type='staff'";

		$sqlA = "SELECT count(*) as total from admin where username='$username' and password='$password'";

		$resultM = $this->database->execute($sqlM);
		$resultS = $this->database->execute($sqlS);
		$resultA = $this->database->execute($sqlA);

		$totalM = $resultM[0]['total'];
		$totalS = $resultS[0]['total'];
		$totalA = $resultA[0]['total'];


		if ($totalM==1) {
			# code...
			$this->logged_in = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['type'] = 'member';
			header('location: ?page=Mprofile');
					}

		else if ($totalS==1) {
			# code...
			$this->logged_in = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['type'] = 'staff';
					}

		else if ($totalA==1) {
			# code...
			$this->logged_in = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['type'] = 'admin';
			header('location: ?page=Aprofile');
					}

		else {
			$this->logged_in = false;
			session_destroy();
		}

		return $this->logged_in;
	}

	public function logout() {
		session_start();
		session_destroy();
		$this->logged_in=false;
		header('location: index.php');
	}

	public function M_list() {
		$sql = "SELECT * FROM member";

		$result = $this->database->execute($sql);
		return $result;

	}
}

?>