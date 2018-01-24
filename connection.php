<?php 

define("host", "localhost");
define("database", "ikimina");
define("user", "karenzi");
define("pass", "karenzi");

class Db {
	private static $instance = null;

	private function __construct() {}

	private function __clone() {}

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
}