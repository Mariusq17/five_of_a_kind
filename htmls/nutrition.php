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
		$user_name = $_POST['username'];
		$query = "update users set user_name = '$user_name' where user_id = '$id'";
		mysqli_query($con, $query);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Nutrition</title>
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"
    />
    <link rel="stylesheet" href="../style-folder/nav-bar.css" />
    <link rel="stylesheet" href="../style-folder/nutrition-style.css" />
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
      <section class="slide calories-first-slide">
        <img src="../images/platou-main.png" alt="" />
        <div class="descp-calories">
          <h2>Calories</h2>
          <span class="qout">"You always fear what you don't understand"</span>
        </div>
      </section>
      <section class="slide calories-second-slide">
        <h2>Understanding Calories</h2>
        <div class="descp-understanding">
          <p>
            We should't be afraid of <span class="pop">calories</span>, instead
            we should understand that they are just an unit of mesaurement for
            <span class="pop">energy</span>.
          </p>
          <img src="../images/fructe-banana.png" alt="" />
        </div>
      </section>
      <section class="slide calories-third-slide">
        <h2>How do we use calories?</h2>
        <div class="descp-how-to">
          <img src="../images/burugr.jpg" alt="" />
          <div class="text-descp-how-to">
            <p>
              Our bodies use the calories we get from food to fuel our basal
              metabolic rate, digestion, and physical activity. When the number
              of calories we consume <span class="pop">matches</span> the number
              of calories you <span class="pop">burn</span>, your weight will
              remain stable.
            </p>
            <span
              ><span class="pop">Weight lose</span> - eat fewer calories than
              you burn
            </span>
            <span
              ><span class="pop">Weight gain</span> - eat more calories than you
              burn</span
            >
          </div>
        </div>
      </section>
      <section class="slide calories-forth-slide">
        <div class="text-wrapper">
        <h2>With all of these in mind...</h2>
        <div class="descp-calories-intake">
          <p>
            This is an estimate of your daily caloric intake based on the
            information from your profile :
          </p>
          <p style="color:#197672; font-size:5rem; text-align:center;" id="final-stats"></p>
          </div>
          </div>
          <script type="text/javascript">
		        const userGender = "<?php echo $php_var_gender; ?>";
            const userHeight = "<?php echo $php_var_height; ?>";
            const userWeight = "<?php echo $php_var_weight; ?>";
            const userAge = "<?php echo $php_var_age; ?>";
            const userActivity = "<?php echo $php_var_activity; ?>"
        </script>
        <script src="../nutrition.js"></script> 
          <img src="../images/oat-meal.jpg" alt="" />
        </div>
      </section>
      <section class="slide macros-first-slide">
        <img src="../images/macro-first-img.jpg" alt="" />
        <div class="macros-generic-descp">
          <h2>MacroNutrients</h2>
          <p>
            Macronutrients are nutrients that your body needs in large amounts
            to function optimally. The three main macronutrients are
            carbohydrates, protein, and fat.
          </p>
        </div>
      </section>
      <section class="slide macros-second-slide">
        <img src="../images/protein.gif" alt="" />
        <div class="protein-generic-descp">
          <h2>Protein</h2>
          <p>
            Protein is a <span class="pop"> macronutrient</span> that is
            essential for the growth and maitenance of our cells and tissues.
          </p>
          <span
            >Two grams of protein per kg of body weight is a good start</span
          >
        </div>
      </section>
      <section class="slide macros-third-slide">
        <div class="carb-generic-descp">
          <h2>Carbohydrates</h2>
          <p>
            Foods high in carbohydrates are an important part of a healthy diet.
            Carbohydrates provide the body with glucose, which is converted to
            energy used to support bodily functions and physical activity.
          </p>
          <p>
            <span class="pop">Healthy Carbs</span>: minimally processed whole
            grains, vegetables and fruits
          </p>
        </div>
        <img src="../images/carb.gif" alt="" />
      </section>
      <section class="slide macros-forth-slide">
        <img src="../images/fat.gif" alt="" />
        <div class="fat-generic-descp">
          <h2>Fats</h2>
          <p>
            Fats are an important part of your diet but some types are healthier
            than others.Fats have 9 calories per gram, more than 2 times the
            number of calories in carbohydrates and protein, which each have 4
            calories per gram.
          </p>
          <span
            ><span class="pop">Healthy Fats</span>: vegetable oils, nuts, seeds,
            and fish</span
          >
        </div>
      </section>
      <section class="slide micros-first-slide">
        <img src="../images/micro.gif" alt="" />
        <div class="micros-generic-descp">
          <h2>MicroNutrients</h2>
          <p>
            Micronutrients are one of the major groups of nutrients your body
            needs. They include vitamins and minerals. Vitamins are necessary
            for energy production, immune function, blood clotting and other
            functions. Meanwhile, minerals play an important role in growth,
            bone health, fluid balance and several other processes.
          </p>
        </div>
      </section>
    </main>
  </body>
</html>
