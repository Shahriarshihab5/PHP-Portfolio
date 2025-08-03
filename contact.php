<?php
$name = $email = $phone = $subject = $message = "";
$nameErr = $emailErr = $phoneErr = $subjectErr = $messageErr = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required.";
  } elseif (!preg_match("/^[a-zA-Z ]{2,50}$/", $_POST["name"])) {
    $nameErr = "Only letters and spaces (2-50 characters).";
  } else {
    $name = htmlspecialchars($_POST["name"]);
  }

  // Email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required.";
  } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format.";
  } else {
    $email = htmlspecialchars($_POST["email"]);
  }

  // Phone
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required.";
  } elseif (!preg_match("/^01[0-9]{9}$/", $_POST["phone"])) {
    $phoneErr = "Must be 11 digits Bangladeshi number.";
  } else {
    $phone = htmlspecialchars($_POST["phone"]);
  }

  // Subject
  $allowedSubjects = ["Inquiry", "Feedback", "Support"];
  if (empty($_POST["subject"]) || !in_array($_POST["subject"], $allowedSubjects)) {
    $subjectErr = "Invalid subject selected.";
  } else {
    $subject = $_POST["subject"];
  }

  // Message
  if (empty($_POST["message"])) {
    $messageErr = "Message is required.";
  } elseif (strlen($_POST["message"]) < 30 || strlen($_POST["message"]) > 250) {
    $messageErr = "Message must be 30-250 characters.";
  } elseif (preg_match("/http|www/i", $_POST["message"])) {
    $messageErr = "URLs are not allowed.";
  } else {
    $message = htmlspecialchars($_POST["message"]);
  }

  // Success
  if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($subjectErr) && empty($messageErr)) {
    $success = true;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "header.php"; ?>
<main>
  <h2>Contact Me</h2>

  <?php if ($success): ?>
    <p class="success">Thank you, <?php echo $name; ?>! Your <?php echo $subject; ?> has been received.</p>
  <?php else: ?>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error"><?php echo $nameErr; ?></span><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?php echo $phone; ?>">
    <span class="error"><?php echo $phoneErr; ?></span><br><br>

    <label>Subject:</label><br>
    <select name="subject">
      <option value="">-- Select --</option>
      <?php foreach (["Inquiry", "Feedback", "Support"] as $option): ?>
        <option value="<?php echo $option; ?>" <?php if ($subject == $option) echo "selected"; ?>>
          <?php echo $option; ?>
        </option>
      <?php endforeach; ?>
    </select>
    <span class="error"><?php echo $subjectErr; ?></span><br><br>

    <label>Message:</label><br>
    <textarea name="message" rows="5" cols="40"><?php echo $message; ?></textarea>
    <span class="error"><?php echo $messageErr; ?></span><br><br>

    <input type="submit" value="Send Message">
  </form>
  <?php endif; ?>
</main>
</body>
</html>
