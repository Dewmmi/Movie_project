<?php 
include("config/db.php"); 
include("header.php"); 

$movie_id = isset($_GET['id']) ? $_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM movies WHERE id = ?");
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

if (!$movie) { 
    echo "<h2>Movie not found.</h2>"; 
    exit; 
}
?>

<div class="movie-detail-container">
    <div class="movie-info-card">
        
        <div class="movie-visual">
            <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt="Poster">
        </div>

        <div class="movie-text-content">
            <h1><?php echo htmlspecialchars($movie['title']); ?></h1>
            
            <div class="movie-details">
                <p class="director-link">
                    Director: <a href="search.php?q=<?php echo urlencode($movie['director']); ?>">
                        <?php echo htmlspecialchars($movie['director']); ?>
                    </a>
                </p>
                <p class="actors"><strong>Cast:</strong> <?php echo htmlspecialchars($movie['actors']); ?></p>
                <p class="price-tag"><?php echo $movie['price']; ?>€</p>
                <p class="description"><?php echo htmlspecialchars($movie['description']); ?></p>
            </div>

            <a href="actions/add_to_cart.php?id=<?php echo $movie['id']; ?>" class="btn">Add to Cart</a>
        </div>
        
    </div> 
</div> 
</body>
</html>