<?php 
include("config/db.php"); 
include("header.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Registration failed. Username or email might already be taken.";
    }
}
?>

<form method="POST" class="form-change">
    <input type="text" name="user" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="pass" placeholder="Password" required><br>
    <button type="submit" class="btn-new" style="margin-top: 15px; background-color: green;">Register</button>
</form>