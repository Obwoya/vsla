<div> 
  <div class="panel">
    <div class="panel-heading panel-black text-center">
      <h2> Contributions</h2>
      <div class="text-right">
      <a class="btn btn-primary">New Contribution</a>
    </div>
    </div>
  <table class="table table-hover">
    <thead>
      <th>Names</th>
      <th>Username</th>
      <th>Birth Date</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Gender</th>
      <th>Email</th>
      <th>Status</th>
     <!-- <th>Action</th>-->
    </thead>
    <tbody>

 
<?php
        foreach ($tests as $data) {

      ?>
      <tr>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['username'];?></td>
        <td><?php echo $data['bdate'];?></td>
        <td><?php echo $data['address'];?></td>
        <td><?php echo $data['phone'];?></td>
        <td><?php echo $data['gender'];?></td>
        <td><?php echo $data['email'];?></td>
         <td><?php echo $data['status'];?></td>
        <!--<td><?php if($data['status']!='member') {?><a href="?page=A_AMember&username=<?php echo $data['username']; ?>" class="btn btn-primary">Accept</a><?php } else {?><a href="?page=A_RMember&username=<?php echo $data['username']; ?>" class="btn btn-danger">Remove</a><a href="?page=A_PMember&username=<?php echo $data['username'];?>" class="btn btn-primary">Promote</a></td>--><?php } ?>
      </tr><?php } ?>
    </tbody>
  </table>
  </div>
</div>