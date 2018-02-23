

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
  header('location: ?page=M_contributions');
} }
else{


?>



    <section>

              <div class="row">
                <div class="col-sm-3">
                  
                </div>
        <div class="col-sm-7">
          <div class="col-sm-10" style="padding-top: 18%;">
            <h2 class="text-center">Forgot Your Password</h2>
            <p class="text-center text-muted"><?php if($status != 'fail')echo $status; ?></p><br><br>

             <?php

if ($logged_in==false) {
  # code...
?>

            <div class="col-md-offset-2 col-md-8">
              <!-- ================ -->
             
              <form role='form' method="post">
                
                <div class="form-group">
                  <label class="" for="username">Email</label>
                  <input type="text" class="form-control" id="username" name="email">
                  <!--<label>_</label>-->
                </div>

                <button style="float: right;" type="submit" class="btn btn-primary" name="submit">Send</button><br>
                  
              </form>

              <!-- ============= -->
            
<?php }

              else { }?>

          </div>
        </div>
        </div>
      
    </section>
    <div style="padding: 8%;"></div>

    <?php }
require_once('footer.php');
?>