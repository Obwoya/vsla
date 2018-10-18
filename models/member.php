
<?php 
require_once('database.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';

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
		$status = 'Your Username or Password is incorrect.';
		//session_start();
/*if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];}
		if(empty($username)) $username = $_REQUEST['username'];*/
		$username = isset($_POST['username']) ? $_POST['username'] : $username;
/*if(isset($_SESSION['username'])){
		$password = $_SESSION['password'];}*/
		/*if(empty($password)) $password = $_REQUEST['password'];*/
		$password = isset($_POST['password']) ? $_POST['password'] : $password;

		$sqlM = "SELECT count(*) as total from member where username='$username' and password='$password' and status='member'";

		$sqlS = "SELECT count(*) as total from member where username='$username' and password='$password' and status='staff'";

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
			$sql = "SELECT * FROM member where username = '$username'";
			$result = $this->database->execute($sql);
			foreach ($result as $id) {
					$id = $id['member_id'];		
			}

			$_SESSION['id'] = $id;
			header('location: ?page=Mprofile');
					}

		else if ($totalS==1) {
			# code...
			$this->logged_in = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['type'] = 'staff';
			header('location: ?page=Pstaff');
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
			$status = 'Your account is not registered, Please follow the link above to signup';
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
		$sql = "SELECT * FROM member where status = 'member' or status = 'waiting'";

		$result = $this->database->execute($sql);
		return $result;

	}
//testiii
	public function mloan(){
		$id = $_SESSION['id'];
		$sql = "SELECT count(*) as total FROM loan where member_id = $id";
		$result = $this->database->execute($sql);
		$total = $result[0]['total'];
		return $total;					
	}

	public function A_staff() {
		$sql = "SELECT * FROM member where status = 'staff'";
		$result = $this->database->execute($sql);

		return $result;
	}

	//admin remove member
	public function A_RMember($username) {
		$sql = "DELETE FROM member where username = '$username'";
		$result = $this->database->execute($sql);
		header('location: ?page=members');
	}

	//admin update member status to member
	public function A_AMember($username) {
		$sql = "UPDATE member set status = 'member' where username = '$username'";
		$result = $this->database->execute($sql);
		header('location: ?page=members');

	}

	//admin promote member to staff
	public function A_PMember($username) {
		$sql = "UPDATE member set status = 'staff' where username = '$username'";
		$result = $this->database->execute($sql);
		header('location: ?page=members');
	}

	//admin drop staff promotion
	public function A_DMember($username) {
		$sql = "UPDATE member set status = 'member' where username = '$username'";
		$result = $this->database->execute($sql);
	header('location: ?page=members');
	}

	public function A_profile($username) {
		$sql = "SELECT * FROM admin where username = '$username'";

		$result = $this->database->execute($sql);
		return $result;
	}

	


	// staff
	public function Pstaff($username) {
		$sql = "SELECT * FROM member where username = '$username'";

		$result = $this->database->execute($sql);
		return $result;
	}

	public function S_members() {
		$sql = "SELECT * FROM member where status = 'member'";

		$result = $this->database->execute($sql);
		return $result;

	}


	public function S_contributions() {
		$sql = "SELECT contribution.*, member.name FROM contribution inner join member on member.member_id = contribution.member_id";

		$result = $this->database->execute($sql);
		return $result;
	}

	public function S_contributionsReport() {
		$sql = "SELECT contribution.*, member.name FROM contribution inner join member on member.member_id = contribution.member_id where contribution.status = 'Approved'";

		$result = $this->database->execute($sql);
		return $result;

	}


		public function S_loans() {
		$sql = "SELECT loan.*, member.name FROM loan inner join member on member.member_id = loan.member_id";

		$result = $this->database->execute($sql);
		return $result;

	}

	public function S_loansReport() {
		$sql = "SELECT loan.*, member.name FROM loan inner join member on member.member_id = loan.member_id where loan.status = 'accepted' or loan.status = 'done'";

		$result = $this->database->execute($sql);
		return $result;

	}

	public function S_lpayment() {
		$sql = "SELECT ploan.*, member.name FROM ploan inner join member on member.member_id = ploan.member_id";
		$result = $this->database->execute($sql);
		return $result;
	}


	public function S_lpaymentReport() {
		$sql = "SELECT ploan.*, member.name FROM ploan inner join member on member.member_id = ploan.member_id where ploan.status='accepted' or ploan.status='done'";
		$result = $this->database->execute($sql);
		return $result;
	}

	// end of staff actions
	// 
	// 
	// -- start of member actions

public function M_profile($username) {
		$sql = "SELECT * FROM member where username = '$username'";

		$result = $this->database->execute($sql);
		return $result;
	}

public function M_contributions() {
	
		//$sql = "SELECT * FROM contribution where username = '$username'";
	if (isset($_SESSION['username'])) {
		# code...
		$username = $_SESSION['username'];
	}
		$sql = "SELECT c.amount, c.bankslip, c.cont_date, c.status from contribution as c RIGHT JOIN member on member.member_id = c.member_id where member.username = '$username'";

		$result = $this->database->execute($sql);
		return $result;

		/*SELECT Orders.OrderID, Employees.LastName, Employees.FirstName
FROM Orders
RIGHT JOIN Employees ON Orders.EmployeeID = Employees.EmployeeID
ORDER BY Orders.OrderID;*/

	}

		public function M_loans() {
			if (isset($_SESSION['username'])) {
		# code...
		$username = $_SESSION['username'];
	}
		$sql = "SELECT l.amount, l.amount_interest, l.payment_date, l.request_date, l.status from loan as l RIGHT JOIN member on member.member_id = l.member_id where member.username = '$username'";

		$result = $this->database->execute($sql);
		return $result;

	}


	public function payed_loans() {
			if (isset($_SESSION['username'])) {
		# code...
		$username = $_SESSION['username'];
	}
		$sql = "SELECT l.bankslip, l.amount, l.rem_amount, l.payment_date, l.status from ploan as l RIGHT JOIN member on member.member_id = l.member_id where member.username = '$username'";

		$result = $this->database->execute($sql);
		return $result;

	}

	public function contribute(&$error){
		if(empty($_REQUEST['action'])) $status = "Fill the form to contribute";

		else if($_REQUEST['action'] == 'sub') {
			$error = array();
			//if(empty($_REQUEST['name'])) $error['name']='empty';

			if (empty($_REQUEST['bankslip'])) $error['bankslip']='empty';
			else {
				$sql = "SELECT count(*) as total from contribution where bankslip = '{$_REQUEST['bankslip']}'";
				$result = $this->database->execute($sql);
				$total = $result[0]['total'];

				if ($total) $error['bankslip']= 'The Bank Slip you are providing was submitted before'; 
							}

			if(empty($_REQUEST['amount'])) $error['amount'] = 'empty';




			if (empty($error)) {
				# code...
			
			$id = $this->M_profile($_SESSION['username']);	
			foreach ($id as $id) {
						$id = $id['member_id'];
						# code...
					}		
				$bankslip = $_POST['bankslip'];
				$amount = $_POST['amount'];
				$date = date('Y-m-d');
				//$this->set($_REQUEST['username'], $_REQUEST['password']);


				$sql = "INSERT into contribution (member_id,bankslip,amount,status,cont_date) values ('$id','$bankslip','$amount','waiting','$date')";

				$this->database->execute($sql);

				$status = "Thank you for contributing.";
			}
			else $status = "fail";
		}

		return $status;
	}

public function ploan(&$error){
		if(empty($_REQUEST['action'])) $status = "Fill the form to Pay";

		else if($_REQUEST['action'] == 'sub') {
			$error = array();
			//if(empty($_REQUEST['name'])) $error['name']='empty';

			if (empty($_REQUEST['bankslip'])) $error['bankslip']='empty';
			else {
				$sql = "SELECT count(*) as total from ploan where bankslip = '{$_REQUEST['bankslip']}'";
				$result = $this->database->execute($sql);
				$total = $result[0]['total'];

				if ($total) $error['bankslip']= 'The Bank Slip you are providing was submitted before'; 
							}

			if(empty($_REQUEST['amount'])) $error['amount'] = 'empty';




			if (empty($error)) {
				# code...
			$id = $this->M_profile($_SESSION['username']);	
			foreach ($id as $id) {
						$id = $id['member_id'];
						# code...
					}


			$sqlP = "SELECT * FROM ploan where member_id = $id";
			$resultP = $this->database->execute($sqlP);

			if($resultP == true){
				foreach ($resultP as $result) {
					$amount = $result['amount'];
					$rem_amount = $result['rem_amount'];
				}
				$amount=$amount+$_POST['amount'];
					# code...
					$rem_amount =$rem_amount-$_POST['amount'];
				$bankslip = $_POST['bankslip'];
				$date = date('Y-m-d');

				$sql = "INSERT into ploan (member_id,bankslip,amount,rem_amount,status,payment_date) values ('$id','$bankslip','$amount','$rem_amount','waiting','$date')";

				$this->database->execute($sql);

				$status = "Thank you for Paying.";

			}

			else if ($resultP == false){
			$sql1 = "SELECT * FROM loan where member_id = $id";
			$result1 = $this->database->execute($sql1);

			foreach ($result1 as $amount) {
				# code...
				$rem_amount = $amount['amount'];
			}

					
				$bankslip = $_POST['bankslip'];
				$amount = $_POST['amount'];
				$date = date('Y-m-d');
				$rem_amount = $rem_amount - $amount;
				//$this->set($_REQUEST['username'], $_REQUEST['password']);


				$sql = "INSERT into ploan (member_id,bankslip,amount,rem_amount,status,payment_date) values ('$id','$bankslip','$amount','$rem_amount','waiting','$date')";

				$this->database->execute($sql);

				$status = "Thank you for Paying.";
			}
		}
			else $status = "fail";
		}

		return $status;
	}

		public function R_loan(&$error){
		if(empty($_REQUEST['action'])) $status = "Fill the form to request a loan";


		else if($_REQUEST['action'] == 'sub') {
			$error = array();
			//if(empty($_REQUEST['name'])) $error['name']='empty';

			/*if (empty($_REQUEST[''])) $error['amount']='empty';
			else {
				$sql = "SELECT count(*) as total from contribution where bankslip = '{$_REQUEST['bankslip']}'";
				$result = $this->database->execute($sql);
				$total = $result[0]['total'];

				if ($total) $error['bankslip']= 'The Bank Slip you are providing was submitted before'; 
							}*/

			if(empty($_REQUEST['amount'])) $error['amount'] = 'empty';




			if (empty($error)) {
				# code...
			
			$id = $this->M_profile($_SESSION['username']);	
			foreach ($id as $id) {
						$id = $id['member_id'];
						# code...
					}		
				$amount = $_POST['amount'] + ($_POST['amount'] * 12)/100;
				$payment_date = $_POST['payment_date'];
				$date = date('Y-m-d');
				$interest = $_POST['interest'];
				//$this->set($_REQUEST['username'], $_REQUEST['password']);

				$sql1 = "select count(*) as total from loan where member_id = $id and status = 'waiting' or status = 'accepted'";
				$result1 = $this->database->execute($sql1);
				$total = $result1[0]['total'];
				if(!$total){
				$sql = "INSERT into loan (member_id,amount,amount_interest,status,payment_date,request_date) values ('$id','$amount','$interest','waiting','$payment_date','$date')";

				$this->database->execute($sql);

				$status = "Your request has been submitted.";
			}
			else {
				$status = "You still have a loan to pay";
			}
			}
			else $status = "fail";
		}

		return $status;
	}

	public function S_Laccept($id) {
		$sql = "UPDATE loan set status = 'accepted' where loan_id = '$id'";
		$result = $this->database->execute($sql);
	header('location: ?page=S_loans');
	}
public function S_Lignore($id) {
		$sql ="DELETE FROM loan where loan_id = '$id'";
		$result = $this->database->execute($sql);
	header('location: ?page=S_loans');
	}

	public function S_PLaccept($id,$amount,$member) {
		if ($amount>0) {
			# code...
			$sql = "UPDATE ploan set status = 'accepted' where loan_id = '$id'";
		$result = $this->database->execute($sql);
		}

		else if ($amount<=0){
			$sql = "UPDATE ploan set status = 'done' where loan_id = '$id'";
			$sql1 = "UPDATE loan set status = 'done' where member_id = '$member'";
		$result = $this->database->execute($sql);
		$result1 = $this->database->execute($sql1);

		}
		
	header('location: ?page=S_lpayment');
	}
public function S_PLignore($id) {
		$sql ="DELETE FROM ploan where loan_id = '$id'";
		$result = $this->database->execute($sql);
	header('location: ?page=S_lpayment');
	}


	public function S_approve($id) {
		$sql = "UPDATE contribution set status = 'Approved' where contribution_id = '$id'";
		$result = $this->database->execute($sql);
	header('location: ?page=S_contributions');
	}
public function S_Cignore($id) {
		$sql ="DELETE FROM contribution where contribution_id = '$id'";
		$result = $this->database->execute($sql);
	header('location: ?page=S_contributions');
	}




// Mailing stuff
// including Forget password
// 
// 
// 

public function forget(&$error) {
		$username='';
		$password = '';
		$status = 'The Email you entered is not registered.';
		if (isset($_POST['email'])) {
			# code...
			$email = $_POST['email'];
		

		$sqlM = "SELECT count(*) as total from member where email='$email'";

		$sqlS = "SELECT count(*) as total from member where email='$email'";

		$sqlA = "SELECT count(*) as total from admin where email='$email'";

		$resultM = $this->database->execute($sqlM);
		$resultS = $this->database->execute($sqlS);
		$resultA = $this->database->execute($sqlA);

		$totalM = $resultM[0]['total'];
		$totalS = $resultS[0]['total'];
		$totalA = $resultA[0]['total'];


		if ($totalM==1) {
			# code...
			$sql = "SELECT * FROM member where email = '$email'";
			$result = $this->database->execute($sql);
			foreach ($result as $id) {
					$password = $id['password'];	
					$name = $id['name'];	
			}
			$to = $email;
			$subject = "Forgoten Password";
			$message = "Your Password is : <h1>". $password ."</h1>";

			$mailsend = $this->sendmail($to,$subject,$message,$name);

			if ($mailsend == 1) {
				# code...
				$status = 'Your password has been sent to your email';
			}

			else {
				$status =  "There was some issue: ".$mailsend;
			}
			//header('location: ?page=Mprofile');
					}

		else if ($totalS==1) {
			# code...
				$sql = "SELECT * FROM staff where email = '$email'";
			$result = $this->database->execute($sql);
			foreach ($result as $id) {
					$password = $id['password'];	
					$name = $id['name'];	
			}
			$to = $email;
			$subject = "Forgoten Password";
			$message = "Your Password is : <h1>". $password ."</h1>";

			$mailsend = sendmail($to,$subject,$message,$name);

			if ($mailsend == 1) {
				# code...
				$status = 'Your password has been sent to your email ';
			}

			else {
				$status = "There was some issue: ".$mailsend;
			}
					}

		else if ($totalA==1) {
			# code...
				$sql = "SELECT * FROM member where email = '$email'";
			$result = $this->database->execute($sql);
			foreach ($result as $id) {
					$password = $id['password'];	
					$name = $id['name'];	
			}
			$to = $email;
			$subject = "Forgoten Password";
			$message = "Your Password is : <h1>". $password ."</h1>";

			$mailsend = sendmail($to,$subject,$message,$name);

			if ($mailsend == 1) {
				# code...
				$status = 'Your password has been sent to your email';
			}

			else {
				$status = "There was some issue: ".$mailsend;
			}
					}
				}

		else {
			//$this->logged_in = false;
			$status = 'Enter Your Email for us to send you the password.';
			//session_destroy();
		}


		return $status;
	}

function sendmail($to,$subject,$message,$name)
    {
                  $mail             = new PHPMailer();
                  $body             = $message;
                  $mail->IsSMTP();
                  $mail->SMTPAuth   = true;
                  $mail->Host       = "smtp.gmail.com";
                  $mail->Port       = 587;
                  $mail->Username   = "moses.karenzi1991@gmail.com";
                  $mail->Password   = "";
                  $mail->SMTPSecure = 'tls';
                  $mail->SetFrom('moses.karenzi1991@gmail.com', 'Village Savings and Loan Association');
                  $mail->AddReplyTo("moses.karenzi1991@gmail.com","KARENZI");
                  $mail->Subject    = $subject;
                  $mail->AltBody    = "Any message.";
                  $mail->MsgHTML($body);
                  $address = $to;
                  $mail->AddAddress($address, $name);
                  if(!$mail->Send()) {
                      return 0;
                  } else {
                        return 1;
                 }
}
}

?>
