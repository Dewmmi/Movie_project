<?php 
include("config/db.php"); 
include("header.php"); 
?>
<h1>Movie Shop</h1>
<div class="search-container">
    <form action="search.php" method="GET">
        <input type="text" name="q" class="search-input" placeholder="Search for movies or directors...">
        <button type="submit" class="search-button">SEARCH</button>
    </form>
</div>

<h2>Featured Movies</h2>
<div class="movie-container">
<?php
$result = $conn->query("SELECT * FROM movies LIMIT 10");
while($row = $result->fetch_assoc()) {
    echo "<div class='movie-card'>";
    echo "<h3>".$row['title']."</h3>";
    echo "<p>Price: ".$row['price']."€</p>";
    echo "<a href='movie.php?id=".$row['id']."'>Details</a>";
    echo "</div>";
}
?>
</div>
</body></html>