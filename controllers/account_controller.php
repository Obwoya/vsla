<?php 
require_once 'view_controller.php';
class AccountController extends ViewController {

	

	public function dashboard() {
		
	}

	public function index() {
		$members = dataQuery::members();
		require_once('views/account/index.php');
	}

	public function register() {
			}




}