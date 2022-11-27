<?php 

session_start();

	include("connection.php");
	include("functions.php");

  if (isset($_SESSION['user_id']))
  {
    header("Location: hub.php");
    die;
  }
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
    $email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' and email = '$email' limit 1;";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: hub.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style-folder/style.css" />
    <title>Login Form Concept</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="container">
      <div
        class="login-image"
        style="background-image: url(../images/login-bg-image.jpg)"
      ></div>
      <div class="form-content center">
        <div class="form-logo"></div>
        <div class="center">
          <h1>Welcome back to our webpage!</h1>
          <h2>Enjoy it and sign in!</h2>
        </div>
        <form method = "post" class="center">
          <div class="field center">
            <label for="username">Username</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Username"
              required
            />
          </div>
          <div class="field center">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Email"
              required
            />
          </div>
          <div class="field center">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Password"
              required
            />
          </div>

          <button type="submit">Sign in</button>
          <h3>Don't have an account? <a href="sign-up.php">Sign up</a></h3>
        </form>
      </div>
    </div>
  </body>
</html>
