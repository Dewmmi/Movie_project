<?php include("config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome - IMDB Shop</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body style="text-align:center; padding:50px;">
    <h1>Welcome to Internet Movies Database & Co.</h1>
    <p>Please login or create an account to start buying movies.</p>
    <div style="margin-top:20px;">
        <a href="login.php" class="btn-new">Login</a>
        <a href="register.php" class="btn-new" style="background:green;">Register</a>
    </div>
    <p class="btn-new" style="margin-top:10px; background-color: purple;"><a href="index.php" >Continue as Guest</a></p>
</body>
</html>