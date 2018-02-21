<?php 
require_once('header.php');

if (!isset($_SESSION['username'])) {
	# code...
	
}
?>


 <div class="container-fluid account">
			<div>
				<div class="row">

					<div class="column col-sm-2 col-xs-1" id="sidebar">
					  
											   
						<ul class="nav">
							<li><a href="?page=Mprofile">Profile</a></li>
							
							<li><a href="?page=M_contributions">Contributions</a></li>
							<li><a href="?page=M_loans">Loans</a></li>


							<?php 
				if ($total>0) { ?>
							<ul style="padding-left: 5px;"><li><a href="?page=pay_loan">Pay Loan</a></li> <a href="?page=payed_loans">Payed Loans</a></li></ul><?php } else {}  ?>
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
					<?php if ($_SESSION['type']=='member') {
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