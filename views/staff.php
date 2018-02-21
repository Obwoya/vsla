<?php 

require_once('header.php');

?>


 <div class="container-fluid account">
			<div>
				<div class="row">

					<div class="column col-sm-2 col-xs-1" id="sidebar">
					  
											   
					<ul class="nav">
							<li><a href="?page=Aprofile">Profile</a></li>
							<li><a href="?page=S_members">Members</a></li>
							<li><a href="?page=S_loans">Loans</a></li>
							<ul style="padding-left: 5px;"><li><a href="?page=S_loans">Loans Payment</a></li>
								<li><a href="?page=S_loans">Loans Report</a></li>
								<li><a href="?page=S_loans">Payed Loans Report</a></li>

							</ul>
							<li><a href="?page=S_contributions">Contributions</a></li>
								<ul style="padding-left: 5px;"><li><a href="#">Contributions Report</a></li>
								
							</ul>
							<li><a href="?page=logout">Logout</a></li>
						</ul>
					  
						<!-- tiny only nav-->
					 					  
					</div>

					<!-- /sidebar -->
				  
					<!-- main right col -->
					<div class="column col-sm-10 col-xs-11" id="main">
						
						<!-- top nav -->
												<!-- /top nav -->
					  
						<div class="padding">
							<div class="full col-sm-9">
							  
								<!-- content -->
					<?php if ($_SESSION['type']=='staff') {
			# code...
		
					require $content; ?>                      
								
								  </div>
							   </div><!--/row-->
							  
							
							  
							</div><!-- /col-9 -->
						</div><!-- /padding -->
					</div>
					<!-- /main -->
				  
				</div>
				


 <?php 
require_once('footer.php');
}
else {
	header('location: index.php');
}
?>