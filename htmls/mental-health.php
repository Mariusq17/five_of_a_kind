<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
	$id = $user_data['user_id'];
	$php_var = $user_data['user_name'];
	$php_var_gender = $user_data['sex'];
	$php_var_height = $user_data['height'];
	$php_var_weight = $user_data['weight'];
	$php_var_activity = $user_data['activity'];
	$php_var_age = $user_data['age'];
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$php_var_text = $_POST['my-journal'];
    $php_var_title = $_POST['title'];
        if ($php_var_text)
        {
            $jurnal_id = random_num(20);
            $query = "insert into jurnal (jurnal_id, user_id, jurnalentry, title) values ('$jurnal_id', '$id', '$php_var_text', '$php_var_title');";
            mysqli_query($con, $query);
            header("Location: mental-health.php");
            header("Location: mental-health.php");
        }
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../style-folder/mental-health.css" />
    <link rel="stylesheet" href="../style-folder/nav-bar.css" />
    <script src="../nav-bar.js" defer></script>
  </head>
  <body>
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
    <main>
      <section class="descp">
        <div class="text">
          <h1>Mental Health</h1>
          <p>
            Feel free to use our online journal as a way of keeping track of
            your goals, sorting out your thoughts and make advancing forward
            easier.
          </p>
        </div>
        <img src="../images/brains.png" alt="" />
      </section>
      <section class="journal">
        <form action="" method="post">
          <input type="text" name="title" placeholder="Title..." />
          <textarea
            name="my-journal"
            id="journal"
            cols="30"
            rows="5"
            placeholder="Write your thoughts here..."
          ></textarea>
          <button type="submit">Save</button>
        </form>
      </section>
    </main>
  </body>
</html>
