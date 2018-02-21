<?php 
session_start();
//require_once('connection.php');
require_once('controllers/controller.php');
/*
if (isset($_GET['controller']) && isset($_GET['action'])) {
	# code...
	$controller = $_GET['controller'];
	$action = $_GET['action'];
}

else {
	$controller = 'home';
	$action = 'home';
}*/

$controller = new Controller();

if(empty($_REQUEST['page'])) $page='index';
else $page = $_REQUEST['page'];

$controller->$page();

//require_once('views/layout.php');

?>


<script type="text/javascript">
	
	history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});
</script>