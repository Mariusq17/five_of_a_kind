<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$height = $_POST['height'];
		$weight = $_POST['weight'];
		$activity = $_POST['activity-level'];

		$query = "select * from users where user_name = '$user_name' limit 1;";
		$result = mysqli_query($con, $query);

		$query = "select * from users where email = '$email' limit 1;";
		$result1 = mysqli_query($con, $query);

		if($result && mysqli_num_rows($result) > 0)
		{
			echo "Nume de utilizator deja luat";
		}
		else if($result1 && mysqli_num_rows($result1) > 0)
		{
			echo "Email deja luat";
		}
		else if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password,sex,age,height,weight,activity,email) values ('$user_id','$user_name','$password','$gender','$age','$height', '$weight', '$activity', '$email');";
			
			mysqli_query($con, $query);

			$_SESSION['user_id'] = $user_id;
			header("Location: hub.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
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
    <link rel="stylesheet" href="../style-folder/nav-bar.css" />
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
      <div class="login-image"></div>
      <div class="form-content center">
        <div class="center">
          <h1>Welcome to our page</h1>
          <h2>Enjoy it and sign up!</h2>
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
          <div class="field-v2 center">
            <div class="field-v2-item center">
              <label for="age">Age</label>
              <input type="number" min="16" id="age" name="age" required />
            </div>
            <div class="field-v2-item center">
              <label for="gender">Gender</label>
              <select name="gender" id="gender">
                <option value="1">Male</option>
                <option value="0">Female</option>
              </select>
            </div>
          </div>
          <div class="field-v2 center">
            <div class="field-v2-item center">
              <label for="height">Height</label>
              <input type="number" min="0" id="height" name="height" required />
            </div>
            <div class="field-v2-item center">
              <label for="weight">Weight</label>
              <input type="number" min="0" id="weight" name="weight" required />
            </div>
          </div>

          <div class="field center">
            <label for="activity-level">Activity-level</label>
            <select name="activity-level" id="activity-level">
              <option value="1">Light to no exercise</option>
              <option value="2">Light Exercise (walks, runs)</option>
              <option value="3">Moderate Exercise (sports)</option>
              <option value="4">
                Heavy Exercise (daily cosistent routine)
              </option>
              <option value="5">
                Extra Heavy Exercise (twice daily cosistent routine)
              </option>
            </select>
          </div>
          <button type="submit">Sign up</button>
          <h3>Already a member? <a href="login.php">Sign in</a></h3>
        </form>
      </div>
    </div>
  </body>
</html>
