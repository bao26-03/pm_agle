<?php
include 'db_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM items WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Item deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: indexQLDH.php");
?>
