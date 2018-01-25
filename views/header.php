<?php 
//ini_set('display_errors', 'off');?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KARENZI</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
  <body class="hm-body">
    <!-- header section -->
        <section class="header-section">
      <div class="container">
        <div class="row">
          <!-- logo -->
          <div class="col-sm-3 col-sm-offset-1 col-xs-12">
            
              <a href="?controller=account&action=index"><h1 style="color: white;">VSLA</h1></a>

          </div>
          <!-- logo -->
          <!-- log in -->
          <div class="col-sm-7 col-sm-offset-1 col-xs-12">
             <?php

if ($logged_in==false) {
  # code...
?>

            <div class="login">
              <!-- ================ -->
             
              <form class="form-inline" method="post">
                
                <div class="form-group">
                  <label class="" for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username">
                  <!--<label>_</label>-->
                </div>

                <div class="form-group">
                  <label class="" for="Password">Password</label>
                  <input type="password" class="form-control" id="Password" name="password">
                 <!-- <label><a href="#">forgot your password</a></label>-->
                </div>

                <button type="submit" class="btn" name="submit">log in</button><br>
                  
              </form>

              <!-- ============= -->
            </div>
<?php }

              else { }?>

          </div>
          <!-- log in -->
        </div>
      </div>
    </section>
    <section>
      <div class="container-fluid">