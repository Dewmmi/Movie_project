<?php 
include("config/db.php"); 
include("header.php"); 

if (!isset($_SESSION['user_id'])) { 
    header("Location: welcome.php"); 
    exit(); 
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT movies.title 
                        FROM purchases 
                        JOIN movies ON purchases.movie_id = movies.id 
                        WHERE purchases.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<h1>Profile: <?php echo htmlspecialchars($_SESSION['username']); ?></h1>

<h2>Purchased Movies:</h2>
<div class="purchases">
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li><?php echo htmlspecialchars($row['title']); ?></li>
        <?php endwhile; ?>
    </ul>
</div>

<hr>

<form action="actions/change_password.php" method="POST" class="form-change">
    <input type="password" name="new_pass" placeholder="New Password" required>
    <button type="submit" class="btn-change">Change Password</button>
</form>