<?php

	class HomeController {
		public function home() {
			$tests = test::all();
			$testo = dataQuery::register();
			require_once('views/home/home.php');
		}

		public function error() {
			require_once('views/home/error.php');
		}
	}

?>