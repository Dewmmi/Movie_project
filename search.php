<?php 
include("config/db.php"); 
include("header.php"); 

$search_query = isset($_GET['q']) ? $_GET['q'] : '';
$search_param = "%" . $search_query . "%";

$stmt = $conn->prepare("SELECT * FROM movies WHERE title LIKE ? OR director LIKE ?");
$stmt->bind_param("ss", $search_param, $search_param);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Showing results for: "<?php echo htmlspecialchars($search_query); ?>"</h2>

<div class="movie-container">
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="movie-card">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p>Director: <?php echo htmlspecialchars($row['director']); ?></p>
                <a href="movie.php?id=<?php echo $row['id']; ?>" class="btn">Details</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No movies found matching that search.</p>
    <?php endif; ?>
</div>