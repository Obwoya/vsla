<?php 

class ViewController {
	public function menu() {
		if ($_GET['amenu']=='admin') {
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


else if ($_GET['amenu']=='user') {
			# code...
		?>

		<div class="column col-sm-2 col-xs-1" id="sidebar">
					  
											   
						<ul class="nav">
							<li><a href="#featured">Welcome</a></li>
							<li><a href="#stories">Members</a></li>
							<li><a href="#fd">Contributions</a></li>
							<li><a href="index.php">Loans</a></li>
						</ul>
					  
						<!-- tiny only nav-->
					 					  
					</div>
<?php 
	}
}


public function Body() {
	
	?>
	<div class="col-xs-12 col-md-12">
                  <div class="panel panel-default">
                        <div class="panel-heading text-center"><h3>Title </h3>
                              
                        </div>
                        <div class="panel-body bodyPanel">
                            <!-- Internal Data -->

                            <?php 
            $View = isset($_GET['view']) ? $_GET['view'] : '';
                            switch ($View) {
                            	case 'members':
                            		# code...
                            		 ViewController::Members();
                            		break;
                            	
                            	default:
                            		# code...
                            		 ViewController::Members();
                            		break;
                            }
                            ?>
                            <!-- end of Internal Data -->
                        </div>
                  </div>
            </div>
<?php
}



private function Members() {
$members = dataQuery::members();
	?>
	 <table class="table table-striped">
                                   
                                   <tr class="default">
                                    <th>
                                       Name 
                                   </th>
                             <th>
                                       Username 
                                   </th>
                             <th>
                                       Gender
                                   </th></tr>
                                     	<?php 
                                   	if (isset($members)) {
                                   		# code...
                                 
                                   	foreach ($members as $member) {?>
                                   <tr>
                                 
                                   	<td><?php echo $member->member_id;?></td>  
                                   	<td><?php echo $member->name;?></td>
                                   	<td><?php echo $member->gender;?></td>
                                                                  
                                   </tr>	<?php } } else {
                                   		echo "<td> no Members Yet</td>";
                                   		echo $members; }?> 
                             </table> <?php }



} ?>