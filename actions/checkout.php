<?php
include("../config/db.php");

if (!isset($_SESSION['user_id'])) { 
    header("Location: ../welcome.php"); 
    exit(); 
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT movie_id FROM cart WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$items = $stmt->get_result();

if ($items->num_rows > 0) {
    while ($row = $items->fetch_assoc()) {
        $movie_id = $row['movie_id'];
        
        $insert = $conn->prepare("INSERT INTO purchases (user_id, movie_id) VALUES (?, ?)");
        $insert->bind_param("ii", $user_id, $movie_id);
        $insert->execute();
    }
    
    $delete = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
    $delete->bind_param("i", $user_id);
    $delete->execute();
    
    header("Location: ../profile.php");
} else {
    header("Location: ../cart.php");
}
exit();
?>