<!DOCTYPE html>
<html>
<head>
  <title>Projects</title>
  <link rel="stylesheet" href="Styles/style.css">
</head>
<body>
<?php include "Header.php"; ?>
<main>
  <h2>My Projects</h2>
  <div class="project-container">
    <?php
      $projects = [
        ["title" => "MY TUBE", "desc" => "A weather forecast site using OpenWeatherMap API."],
        ["title" => "To-Do List", "desc" => "A task manager with due dates and reminders."],
        ["title" => "Pet Adoption", "desc" => "Find and adopt pets through filters and search."]
      ];
      foreach ($projects as $project) {
        echo "<div class='card'>";
        echo "<h3>{$project['title']}</h3>";
        echo "<p>{$project['desc']}</p>";
        echo "</div>";
      }
    ?>
  </div>
</main>
