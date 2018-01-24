<?php 


class Db {
	//private static $instance = null;
	//


protected $db_connection;

	public function __construct() {

		define("host", "localhost");
define("database", "ikimina");
define("user", "karenzi");
define("pass", "karenzi");

	}

	/*private function __clone() {}

	public static function getInstance() {
		if (!isset(self::$instance)) {
			# code...
			self::$instance = new mysqli(host,user,pass,database);

			if (self::$instance->connect_error) {
				# code...
				die("connection failed: ". self::$instance->connect_error);
			}
		}
		return self::$instance;
	}

	public function execute($sql){
		$this->getInstance();
		$query = self::$instance->query($sql);
		$result = array();

		if (preg_match("/^select/i", $sql)) {

			while ($row = $query->fetch_assoc()) {
				$result[] = $row;
			}
				}
				return $result;
	}
}*/

public function connect() {
	$this->db_connection = mysqli_connect(host,user,pass,database) or die(mysqli_error($this->db_connection));

}

public function execute($sql) {
	$query=mysqli_query($this->db_connection, $sql)  or die($sql.mysqli_error($this->db_connection));
		$result=array();
		if(preg_match("/^select/i", $sql)) { while($row=mysqli_fetch_assoc($query)) $result[]=$row; }
		return $result;
}
}

?>