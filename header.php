<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a> | 
    <a href="category.php?type=action">Action</a> | 
    <a href="category.php?type=drama">Drama</a> | 
    <?php if(isset($_SESSION['user_id'])): ?>
        <a href="cart.php">My Cart</a> | 
        <a href="profile.php">Profile</a> | 
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="welcome.php">Login/Register</a>
    <?php endif; ?>
</nav>
<hr>
