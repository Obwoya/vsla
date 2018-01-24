<?php 
	class data {
		public $id;
		public $name;
		public $email;

		public function _construct($id, $name, $email) {
			$this->id = $id;
			$this->name = $name;
			$this->email = $email;
		}

		public static function alli() {
			$list = [];
			$db = Db::getInstance();
			$sql = $db->query('SELECT * FROM admin');
		}
	}


class dataQuery {
	public $member_id;
	public $name;
	public $username;
	public $password;
	public $telephone;
	public $address;
	public $email;
	public $gender;
	public $status;

	public function __construct($member_id,$name){
		$this->member_id = $member_id;
		$this->name = $name;
	}

	public static function members() {
		$Mlist = [];
		$db = Db::getInstance();
		$sql = $db->query('SELECT * FROM member');

		while ($row=$sql->fetch_assoc()) {
			# code...
			$Mlist[] = new dataQuery($row['member_id'], $row['name'], $row['username'], $row['gender']);
		}
		return $Mlist;
	}

	public static function register() {
		require_once('./views/layout.php');
		if (isset($_POST['submit'])) {
			# code...
			$name = $_POST['password'];
		     $username = $_POST['username'];
		     echo $name.' This is your username: '.$username;
}
		
			}
}

	class test {
		public $id;
		public $name;

		public function __construct($id,$name){
			$this->id = $id;
			$this->name = $name;
		}

		public static function all() {
			$list = [];
			$db = Db::getInstance();
			$sql = $db->query('SELECT * from users');

			while ($row=$sql->fetch_assoc()) {
				# code...
				$list[] = new test($row['id'], $row['name']);
			}
			return $list;
		}
	}

	?>