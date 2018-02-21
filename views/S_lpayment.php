<div> 
  <div class="panel">
    <div class="panel-heading panel-black text-center">
      <h2> Loans Payment</h2>
    </div>
  <table class="table table-hover">
    <thead>
      <th>Member</th>
      <th>Amount</th>
      <th>Rest Amount</th>
      <th>Payment Date</th>
      <th>Status</th>
       <?php  if(isset($data) and $data['status']=='waiting') {?> <th>Actions</th><?php } ?>
           <!-- <th>Action</th>-->
    </thead>
    <tbody>

 
<?php
        foreach ($tests as $data) {

      ?>
      <tr>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['amount'];?></td>
        <td><?php echo $data['rem_amount'];?></td>
        <td><?php echo $data['payment_date'];?></td>

        <td><?php echo $data['status'];?></td>
          <td><?php if($data['status']=='waiting' and $_SESSION['type']!='admin'){?>
          <a href="?page=S_PLaccept&id=<?php echo $data['loan_id'];?>" class="btn btn-primary">Accept</a><a class="btn btn-danger" href="?page=S_PLignore&id=<?php echo $data['loan_id'];?>">Ignore</a><?php } ?>
              </td>
        
      </tr><?php } ?>
    </tbody>
  </table>
  </div>
</div>

