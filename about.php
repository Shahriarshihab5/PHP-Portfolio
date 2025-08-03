<!DOCTYPE html>
<html>
<head>
  <title>About Me</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "header.php"; ?>
<main>
  <h2>About Me</h2>
  <p>I am Syed Shahriar Ahmed, a passionate web developer and student at DIU.</p>
  <p><strong>Fun Fact:</strong>
    <?php
      $facts = [
        "I love JS.",
        "I can DO php",
        "I learned HTML BEfore you.",
        "I like debugging more than writing new code."
      ];
      echo $facts[array_rand($facts)];
    ?>
  </p>
</main>
</body>
</html>
