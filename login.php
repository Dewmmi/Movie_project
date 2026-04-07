<?php 
include("config/db.php"); 
include("header.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit();
    } else { 
        echo "Invalid Login"; 
    }
}
?>

<form method="POST" class="form-change">
    <input type="text" name="user" placeholder="Username" required><br>
    <input type="password" name="pass" placeholder="Password" required><br>
    <button type="submit" class="btn-new" style="margin-top: 15px;">Login</button>
</form>