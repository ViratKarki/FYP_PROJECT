<?php 
include 'config.php';

if(isset($_POST['submit'])){
   // $camp_id = $_POST['camp_id'];
   // $guide_name =mysqli_real_escape_string($db,$_POST['guide_name']);
   $time = $_POST['time'];
   $place = $_POST['place'];
   $information =$_POST['information'];
   // $price = $_POST['price'];
   // $image = $_FILES['image']['name'];
   // $image_size = $_FILES['image']['size'];
   // $image_tmp_name = $_FILES['image']['tmp_name'];
   // $image_folder = 'uploaded_img/'.$image;

   // $select_product_name = mysqli_query($db, "SELECT guide_name FROM `addcamp` WHERE guide_name = '$guide_name'") or die('query failed');

   // if(mysqli_num_rows($select_product_name) > 0){
   //    $message[] = 'product name already added';
   // }else{
      $add_product_query = mysqli_query($db, "INSERT INTO `donorcampinfo`(time,place,information) VALUES('$time', '$place','$information')") or die('query failed');

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($db, "DELETE FROM `donorcampinfo` WHERE camp_id = '$delete_id'") or die('query failed');
   header('location:addcamp.php');
}

if(isset($_POST['update_product'])){
    $update_camp_id = $_POST['update_camp_id'];
    $update_time = $_POST['update_time'];
    $update_place = $_POST['update_place'];
    $update_information = $_POST['update_information'];
   //  $update_description = $_POST['update_description'];
   //  $update_price = $_POST['update_price'];
 
   mysqli_query($db, "UPDATE `donorcampinfo` SET time = '$update_time', place = '$update_place',information ='$update_information' WHERE camp_id = '$update_camp_id'") or die('query failed');

   header('location:addcamp.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>

<?php include 'header.php'; ?>


<section class="add-products">

<form action="" method="post" enctype="multipart/form-data">
      <h3>Camp Details</h3>
      <input type="text" name="time" required placeholder="enter time" class="box">
      <input type="text" name="place" required placeholder="enter place" class="box">
      <textarea name="information" class="box" placeholder="enter information" id="" cols="30" rows="10"></textarea>
      
      <input type="submit" value="Post" name="submit" class="btn">
   </form>

</section>

<section class="show-products">

   <div class="box-container">

      <?php
         $select_jobs = mysqli_query($db, "SELECT * FROM `donorcampinfo`") or die('query failed');
         if(mysqli_num_rows($select_jobs) > 0){
            while($fetch_jobs = mysqli_fetch_assoc($select_jobs)){
               $id=$fetch_jobs['camp_id'];
      ?>
      <div class="box">
         <div class="name"><?php echo $fetch_jobs['camp_id']; ?></div>
         <div class="name"><?php echo $fetch_jobs['time']; ?></div>
         <div class="name"><?php echo $fetch_jobs['place']; ?></div>
         <div class="name"><?php echo $fetch_jobs['information']; ?></div>
         <a href="addcamp.php?update=<?php echo $fetch_jobs['camp_id']; ?>" class="option-btn">update</a>
         <a href="addcamp.php?delete=<?php echo $fetch_jobs['camp_id']; ?>" onclick="return confirm('delete this product?');" class="delete-btn">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section> 
<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($db, "SELECT * FROM `donorcampinfo` WHERE camp_id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_camp_id" value="<?php echo $fetch_update['camp_id']; ?>">
      <input type="text" name="update_time" value="<?php echo $fetch_update['time']; ?>" min="0" class="box" required placeholder="enter designation">
      <input type="text" name="update_place" value="<?php echo $fetch_update['place']; ?>" min="0" class="box" required placeholder="enter location">
      <input type="text" name="update_information" value="<?php echo $fetch_update['information']; ?>" min="0" class="box" required placeholder="enter information">
      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>
</body>
</html>
