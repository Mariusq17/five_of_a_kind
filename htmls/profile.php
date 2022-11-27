<?php 
session_start();

	include("connection.php");
	include("functions.php");

  $i = 1;
  $j = 0;
  $query = "select * from jurnal";
  $result = mysqli_query($con, $query);
  $n = mysqli_num_rows($result);
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
    $user_name = $_POST['username'];
    $php_var_height = $_POST['height'];
    $php_var_weight = $_POST['weight'];
    $php_var_age = $_POST['age'];
    $query = "update users set user_name = '$user_name', age = '$php_var_age', height = '$php_var_height',  weight = '$php_var_weight' where user_id = '$id'";
    mysqli_query($con, $query);
    header("Location: profile.php");
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Page</title>
    <link rel="stylesheet" href="../style-folder/nav-bar.css" />
    <link rel="stylesheet" href="../style-folder/profile.css" />
    <script src="../nav-bar.js" defer></script>
    <script src="../profile.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap"
      rel="stylesheet"
    />
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
    <main class="center">
      <div class="profile-container center">
        <div class="content center">
          <form method="post">
            <section class="profile-infos center">
              <div class="profile-picture">
                <div class="profile-pic-background"></div>
                <div class="profile-pic"></div>
              </div>
              <div class="profile-descr">
                <h1>Welcome, <?php echo $php_var?></h1>
                <h2>You are looking great today! ;)</h2>
              </div>
              <button type="submit" class="submit-button">Save</button>
            </section>
            <section class="user-dates center">
              <div class="field center">
                <h3>Username :</h3>
                <input type="text" name="username" value="<?php echo $php_var?>" />
              </div>
              <div class="field center">
                <h3>Age :</h3>
                <input type="number" name="age" value="<?php echo $php_var_age?>" />
              </div>
              <div class="field center">
                <h3>Height :</h3>
                <input type="number" name="height" value="<?php echo $php_var_height?>" />
              </div>
              <div class="field center">
                <h3>Weight :</h3>
                <input type="number" name="weight" value="<?php echo $php_var_weight?>" />
              </div>
              <a href="logout.php"> Log out </a>
            </section>
          </form>
        </div>
      </div>
      <div class="diary-container center">
        <h2 class="diary-wrapper-title">Here are all your journal entries:</h2>
        <div class="diary-post-wrapper center">

            <script type="text/javascript">
              const m = "<?php echo $n?>"
              console.log(m);
              for(var j = 0; j < m; j++){
                <?php 
                  $offset_value = $i - 1;
                  $query = "select * from jurnal where user_id = '$id' limit 1 offset $offset_value";
                  $result = mysqli_query($con, $query);
                  $ceva = mysqli_fetch_assoc($result);
                  if ($ceva && $ceva['user_id'] == $id) 
                  {
                    $title = $ceva['title'];
                    $jurnal = $ceva['jurnalentry'];
                    $date = $ceva['date'];
                  }
                  $i++;
                ?>
                const title = "<?php echo $title; ?>";
                const context = "<?php echo $jurnal; ?>";
                const date = "<?php echo $date; ?>";
                const newDiv = document.createElement("div");
                newDiv.classList.add("diary-post");
                newDiv.classList.add("center");
                const h3 = document.createElement("h3");
                h3.innerHTML = title;

                newDiv.appendChild(h3);

                const span = document.createElement("span");
                span.innerHTML = date;

                newDiv.appendChild(span);

                const p = document.createElement("p");
                p.innerHTML = context;

                newDiv.appendChild(p);

                console.log(title, j, document.getElementsByClassName("1"), document.getElementsByClassName("1")[j]);
                
                
                document.getElementsByClassName("diary-post-wrapper")[0].appendChild(newDiv);
              }
            </script>
          </div>
          
        </div>
        <!-- <h2 class="diary-wrapper-title">Have a nice day &hearts;</h2> -->
      </div>
    </main>
  </body>
</html>
