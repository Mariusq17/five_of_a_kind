var userBMR = 0;

if(userGender === "1") userBMR = 66 + (13.7 * userWeight) + (5 * userHeight) - (6.8 * userAge);
    else userBMR = 655 + (9.6 * userWeight) + (1.8 * userHeight) - (4.7 * userAge);

if(userActivity == 0) userBMR *= 1.2;
else if(userActivity == 1) userBMR *= 1.375;
else if(userActivity == 2) userBMR *= 1.55;
else if(userActivity == 3) userBMR *= 1.725;
else if(userActivity == 4) userBMR *= 1.9;

userBMR = parseInt(userBMR);
document.getElementById("final-stats").innerText = userBMR + " kcal";