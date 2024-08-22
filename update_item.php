<?php
include 'db_connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "UPDATE items SET name='$name', quantity=$quantity, price=$price WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Item updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
?>
