<?php 
session_start();

  include("connection.php");
  include("functions.php");

  $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../style-folder/hub.css" />
    <link rel="stylesheet" href="../style-folder/nav-bar.css" />
    <script src="../nav-bar.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="center">
    <header>
      <a href="landing.html" class="logo"></a>
      <div id="burgur-menu" class="burgur-menu"></div>
      <nav id="links">
        <ul>
          <li><a href="hub.php">Hub</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="profile.php">Profile</a></li>
        </ul>
      </nav>
    </header>

    <h1>The big trio of well-being</h1>
    <div class="card-wrapper center">
      <div class="card">
        <img src="../images/fitness-card-bg.jpg" alt="" />
        <div class="info">
          <h2>Fitness</h2>
          <p>
            Physical activities have a great impact in conserving our vitality.
          </p>
          <a href="./muschi.html">Read More</a>
        </div>
      </div>
      <div class="card">
        <img src="../images/nutrition-card-bg.jpg" alt="" />
        <div class="info">
          <h2>Nutrition</h2>
          <p>
            Eating healthy has been proven to improve life quality, so
            understanding which foods we should consume is mandatory.
          </p>
          <a href="../htmls/nutrition.php">Read More</a>
        </div>
      </div>
      <div class="card">
        <img src="../images/mental-health-bg.jpg" alt="" />
        <div class="info">
          <h2>Mental Health</h2>
          <p>
            Another important component of a healthy lifestlye is having your
            emotions in check.
          </p>
          <a href="./mental-health.php">Read More</a>
        </div>
      </div>
    </div>
  </body>
</html>
