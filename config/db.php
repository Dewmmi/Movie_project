<?php
$host = "localhost";
$user = "root";
$pass = "c@x3Q77@EKW645x";
$db = "project-movies";

$conn = new mysqli($host, $user, $pass, $db);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>