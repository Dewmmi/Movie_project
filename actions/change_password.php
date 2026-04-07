<?php
include("../config/db.php");

// 1. Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// 2. Check if the form was actually submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['new_pass'])) {
    
    $user_id = $_SESSION['user_id'];
    // 3. Hash the new password immediately
    $new_password_hashed = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);

    // 4. Update the database
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $new_password_hashed, $user_id);

    if ($stmt->execute()) {
        // Success! Send them back to profile with a message
        header("Location: ../profile.php?success=1");
    } else {
        echo "Error updating password.";
    }

    $stmt->close();
} else {
    // If they accessed this page without typing a password
    header("Location: ../profile.php");
}
exit();
?>