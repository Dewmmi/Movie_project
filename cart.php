<?php 
include("config/db.php"); 
include("header.php"); 

if (!isset($_SESSION['user_id'])) { 
    header("Location: welcome.php"); 
    exit(); 
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT movies.title, movies.price, cart.id 
                        FROM cart 
                        JOIN movies ON cart.movie_id = movies.id 
                        WHERE cart.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
?>

<h1>Your Cart</h1>

<div class="movie-details">
    <?php while($row = $result->fetch_assoc()): ?>
        <p class="help">
            <?php echo $row['title']; ?> - <?php echo $row['price']; ?>€ 
            <a href="actions/remove_cart.php?id=<?php echo $row['id']; ?>">[X]</a>
        </p>
        <?php $total += $row['price']; ?>
    <?php endwhile; ?>

    <h3>Total: <?php echo $total; ?>€</h3>
</div>

<div class="cart">
    <a href="actions/checkout.php" class="btn">Checkout</a>
</div>