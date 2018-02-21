<div> 
  <div class="panel">
    <div class="panel-heading panel-black text-center">
      <h2> Contributions</h2>
    </div>
  <table class="table table-hover">
    <thead>
      <th>Member</th>
      <th>Amount</th>
      <th>Bank Slip</th>
      <th>Contribution Date</th>
      <th>Status</th>
     <?php  if(isset($data) and $data['status']=='waiting') {?> <th>Actions</th><?php } ?>
           <!-- <th>Action</th>-->
    </thead>
    <tbody>

 
<?php
        foreach ($tests as $data) {

      ?>
      <tr>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['amount'];?></td>
        <td><?php echo $data['bankslip'];?></td>
        <td><?php echo $data['cont_date'];?></td>
        <td><?php echo $data['status'];?></td>
        <td><?php if($data['status']=='waiting'){?>
          <a class="btn btn-primary" href="?page=S_approve&id=<?php echo $data['contribution_id'];?>">Approve</a><a class="btn btn-danger" href="?page=S_Cignore&id=<?php echo $data['contribution_id'];?>">Ignore</a><?php } ?>
                <?php } ?></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>