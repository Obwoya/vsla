<?php

function call($controller, $action) {
	require_once('controllers/' . $controller . '_controller.php');

	switch ($controller) {
		case 'home':
			# code...
			require_once('models/data.php');
			$controller = new HomeController();
			break;

		case 'account':
			# code...
			require_once('models/data.php');
			$controller = new AccountController();
			break;
	}

	$controller->{ $action }();
}

$controllers = array('home' => ['home', 'error'],
					 'account' => ['index', 'contribution','staff']);

if (array_key_exists($controller, $controllers)) {
	# code...
	if (in_array($action, $controllers[$controller])) {
		# code...
		call($controller, $action);
	}
	else {
		call('home', 'error');
	}

}

?>