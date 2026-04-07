<?php
include("../config/db.php");

if (!isset($_SESSION['user_id'])) { 
    header("Location: ../welcome.php"); 
    exit(); 
}

$cart_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $cart_id, $user_id);

if ($stmt->execute()) {
    header("Location: ../cart.php");
} else {
    echo "Error removing item: " . $conn->error;
}

$stmt->close();
exit();
?>