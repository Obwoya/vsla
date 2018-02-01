<div> 
  <div class="panel">
    <div class="panel-heading panel-black text-center">
      <h2> Contributions</h2>
      <div class="text-right">
      <a href="?page=New_contribution" class="btn btn-primary">New Contribution</a>
    </div>
    </div>
  <table class="table table-hover">
    <thead>
      <th>Amount</th>
      <th>Bankslip</th>
      <th>Cont_date</th>
      <th>Status</th>
      
     <!-- <th>Action</th>-->
    </thead>
    <tbody>

 
<?php
        foreach ($tests as $data) {

      ?>
      <tr>
        <td><?php echo $data['amount'];?></td>
        <td><?php echo $data['bankslip'];?></td>
        <td><?php echo $data['cont_date'];?></td>
         <td><?php echo $data['status'];?></td>
      <?php } ?>

      </tr>
    </tbody>
  </table>
  </div>
</div>