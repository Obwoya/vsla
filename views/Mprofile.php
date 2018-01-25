
<?php foreach ($profile as $profile) {?>
<h1> Hello <?php echo $profile['name']; ?> ! </h1>

<section>
                
        <p>E-mail Address:<?php echo $profile['email']; ?> </p>        
        <p>Username: <?php echo $profile['username']; ?></p>
        
        <p>Names: <?php echo $profile['name']; ?></p>
        
        <p>Gender: <?php echo $profile['gender']; ?></p>
         <p>Birth Date: <?php echo $profile['bdate']; ?></p>
          <p>Telephone: <?php echo $profile['phone']; ?></p>
        
        <p>Address: <?php echo $profile['address']; ?></p>
      </section><?php } ?>
