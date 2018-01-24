<?php 
require_once('header.php');

?>


<?php if ($_SESSION['type']=='admin') {
			# code...
		?>

		<div class="column col-sm-2 col-xs-1" id="sidebar">
					  
						<ul class="nav">
							<li><a href="#featured">Welcome</a></li>
							<li><a href="#stories">Members</a></li>
							<li><a href="#fd">Staff</a></li>
							<li><a href="#fd">Loans</a></li>
							<li><a href="#fd">Contributions</a></li>

							<li><a href="index.php">Logout</a></li>
						</ul>
					  
					</div>
<?php 
	} 


else if ($_SESSION['type']=='member') {
			# code...
		?>

		<div class="column col-sm-2 col-xs-1" id="sidebar">
					  
											   
						<ul class="nav">
							<li><a href="#featured">Profile</a></li>
							
							<li><a href="#fd">Contributions</a></li>
							<li><a href="index.php">Loans</a></li>
						</ul>
					  
						<!-- tiny only nav-->
					 					  
					</div>
<?php 
	}
?>