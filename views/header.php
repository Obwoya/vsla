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

    <?php 
    define('interest', 12)
    ?>
    <!-- header section -->
        <section class="header-section">
      <div class="container">
        <div class="row">
          <!-- logo -->
          <div class="col-sm-12 col-xs-12">
            
              <a class="col-md-6" href="?controller=account&action=index"><h1 style="color: white; font-size: 16px">VILLAGE SAVINGS AND LOANS ASSOCIATION (VSLA)</h1></a>
              <?php if(!isset($_SESSION['type'])){ ?>
<div class="text-right" style="font-size: 20px; margin-top: 10px;">
<a style="color: white; padding-right: 20px" href="?page=signup">Sign-Up</a>
<a style="color: white;" href="?controller=account&action=index">Login</a>
</div>
<?php } else {} ?>

          </div>
          <!-- logo -->
          <!-- log in -->
          <div class="col-sm-7 col-sm-offset-1 col-xs-12">


          </div>
          <!-- log in -->
        </div>
      </div>
    </section>
    <section>
      <div class="container-fluid">