<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">Home</a>
         <a href="addcamp.php">Add Camp</a>
         <a href="donordetails.php"> Donor Details </a>
         <a href="admin_users.php">Users</a>
         <a href="feedback.php">Messages</a>
      </nav>
   </div>

</header>