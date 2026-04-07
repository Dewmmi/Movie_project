<?php 
include("config/db.php"); 
include("header.php"); 
$type = $_GET['type'];
$res = $conn->query("SELECT * FROM movies WHERE category='$type'");
?>
<h1>Category: <?php echo $type; ?></h1>
<div class="movie-container">
<?php while($row = $res->fetch_assoc()): ?>
    <div class="movie-card">
        <h3><?php echo $row['title']; ?></h3>
        <a href="movie.php?id=<?php echo $row['id']; ?>">Details</a>
    </div>
<?php endwhile; ?>
</div>