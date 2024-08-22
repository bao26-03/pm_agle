<?php
include 'db_connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM items WHERE id=$id";
$result = $conn->query($sql);
$item = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <h1>Edit Item</h1>
    <form action="update_item.php" method="post">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="text" name="name" value="<?php echo $item['name']; ?>" required>
        <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" required>
        <input type="number" step="0.01" name="price" value="<?php echo $item['price']; ?>" required>
        <button type="submit">Update Item</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
