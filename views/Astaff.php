<div> 
  <div class="panel">
    <div class="panel-heading panel-black text-center">
      <h2> Members List</h2>
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
      <th>Action</th>
    </thead>
    <tbody>

 
<?php
        foreach ($staff as $data) {

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
        <td><a href="?page=A_DMember&username=<?php echo $data['username'];?>" class="btn btn-danger">Drop</a></td>
      </tr><?php } ?>
    </tbody>
  </table>
  </div>
</div>