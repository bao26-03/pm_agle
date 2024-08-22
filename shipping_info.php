<?php
include 'db_connection.php';

$order_id = $_POST['order_id'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$postal_code = $_POST['postal_code'];
$country = $_POST['country'];

$sql = "INSERT INTO shipping_info (order_id, address, city, state, postal_code, country)
VALUES ($order_id, '$address', '$city', '$state', '$postal_code', '$country')";

if ($conn->query($sql) === TRUE) {
    echo "Shipping information saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: index.php");
?>
