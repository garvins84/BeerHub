<?php include 'connection.php'; ?>
<?php 
    $getBeer = mysqli_query($connection, "INSERT INTO user_cart (UserId, ItemId, Quantity) VALUES ('" . $_POST['userId'] . "', '" . $_POST['itemId'] . "', 1)");
?>
