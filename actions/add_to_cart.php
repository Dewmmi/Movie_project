<?php
include("../config/db.php");

if (!isset($_SESSION['user_id'])) { 
    header("Location: ../welcome.php"); 
    exit(); 
}

$user_id  = $_SESSION['user_id'];
$movie_id = $_GET['id'];


$stmt = $conn->prepare("INSERT INTO cart (user_id, movie_id) VALUES (?, ?)");
$stmt->bind_param("ii", $user_id, $movie_id);

if ($stmt->execute()) {
    header("Location: ../cart.php");
} else {
    echo "Error adding to cart.";
}

$stmt->close();
?>