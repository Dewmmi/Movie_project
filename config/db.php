<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "project-movies";

$conn = new mysqli($host, $user, $pass, $db);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
