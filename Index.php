<!DOCTYPE html>
<html>
<head>
  <title>Home - Portfolio</title>
  <link rel="stylesheet" href="Styles/style.css">
</head>
<body>
<?php include "header.php"; ?>
<main>
  <div class="center flex">
    <img src="./IMG.jpg" alt="Profile Photo" class="profile-img">
    <h2>Welcome to my portfolio!</h2>
    <p>
      <?php
        date_default_timezone_set("Asia/Dhaka");
        $hour = date("H");
        if ($hour < 12) echo "Good morning!";
        elseif ($hour < 18) echo "Good afternoon!";
        else echo "Good evening!";
      ?>
    </p>
  </div>
</main>
</body>
</html>
