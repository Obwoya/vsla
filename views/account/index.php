    <div class="container-fluid account">
			<div>
				<div class="row">
					
					<!-- sidebar -->
					<?php 
					$menu = new AccountController();
					$menu->menu() ?>
									<!-- /sidebar -->
				  
					<!-- main right col -->
					<div class="column col-sm-10 col-xs-11" id="main">
						
						<!-- top nav -->
												<!-- /top nav -->
					  
						<div class="padding">
							<div class="full col-sm-9">
							  
								<!-- content -->
					<?php 
					$body = new AccountController();
					$body->Body() ?>                      
								
								  </div>
							   </div><!--/row-->
							  
							
							  
							</div><!-- /col-9 -->
						</div><!-- /padding -->
					</div>
					<!-- /main -->
				  
				</div>
			

		

