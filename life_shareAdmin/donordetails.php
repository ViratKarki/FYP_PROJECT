<?php

include 'config.php';


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($db, "DELETE FROM `donor` WHERE donor_id = '$delete_id'") or die('query failed');
   header('location:donordetails.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="orders">

   <h1 class="title">Donor details</h1>

   <div class="box-container">
      <?php
      $select_orders = mysqli_query($db, "SELECT * FROM `donor`") or die('query failed');
      if(mysqli_num_rows($select_orders) > 0){
         while($fetch_orders = mysqli_fetch_assoc($select_orders)){
            $id=$fetch_orders['donor_id'];
      ?>
      <div class="box">
         <p> Donor id : <span><?php echo $fetch_orders['donor_id']; ?></span> </p>
         <p> Name : <span><?php echo $fetch_orders['fullname']; ?></span> </p>
         <p> Blood Group : <span><?php echo $fetch_orders['bloodgroup']; ?></span> </p>
         <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> contact : <span><?php echo $fetch_orders['contactno']; ?></span> </p>
         <p> age : <span><?php echo $fetch_orders['age']; ?></span> </p>
         <a href="donordetails.php?delete=<?php echo $fetch_orders['donor_id']; ?>" onclick="return confirm('delete this donor?');" class="delete-btn">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no user register as donor yet!</p>';
      }
      ?>
   </div>

</section>










<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>