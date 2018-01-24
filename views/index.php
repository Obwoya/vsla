

<?php 
//session_start();
require_once('header.php');
if (isset($_SESSION['type'])) {
  # code...

if ($_SESSION['type']=='admin') {
  # code...
  header('location: ?page=Aprofile');
}

else if($_SESSION['type']=='member'){
  header('location: ?page=Mprofile');
} }
else{


?>



    <section>

              <div class="row">
                <div class="col-sm-3">
                  
                </div>
        <div class="col-sm-7">
          <div class="col-sm-10" style="padding-top: 10%;">
            <h2 class="text-center">Sign Up</h2>
            <p class="text-center text-muted"><?php if($status != 'fail')echo $status; ?></p><br><br>

            <form role="form" method="post">
                
                <div class="col-sm-6 col-xs-6 ">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="First name" name='fname'>
                </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Last name" name="lname">
                </div>
                </div>
                
                <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="email">
                </div></div>
                <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                	<input type="text" class="form-control" placeholder="username" name="username">
                </div>
            </div>

                <div class="col-sm-6 col-xs-6">
                 <div class="form-group">
                	<input type="text" class="form-control" placeholder="Password" name="password">
                </div>
            </div>
            <div class="row">

              <div class="col-sm-12 col-xs-12">
                <div class="form-group">
                	<span class="text-muted"> ex: kicukiro/kicukiro/kagina</span>
                  <input type="text" class="form-control" placeholder="Address" name="address">
                </div></div>

                 <div class="col-sm-6 col-xs-6">
                <div class="form-group">
                	<input type="date" class="form-control" name="bdate">
                </div>
            </div>

                <div class="col-sm-6 col-xs-6">
                 <div class="form-group">
                	<input type="text" class="form-control" placeholder="Telephone" name="phone">
                </div>
            </div>

            <div class="col-sm-6 col-xs-6">
                <label class="radio-inline"><input type="radio" name="gender" value="M">Male</label>
                <label class="radio-inline"><input type="radio" name="gender" value="F">Female</label>
            </div>



                

                <div class="text-right">
                	<input type="hidden" name="action" value="sub">
                <input type="submit" class="btn btn-primary" value="Sign Up"></div></div>
                               </form>

          </div>
        </div>
        </div>
      
    </section>
    <div style="padding: 2%;"></div>

    <?php }
require_once('footer.php');
?>