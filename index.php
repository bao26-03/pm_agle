<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Cafe Management System</h1>

    <!-- Form to Add New Item -->
    <form action="add_item.php" method="post">
        <h2>Add New Item</h2>
        <input type="text" name="name" placeholder="Item Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <button type="submit">Add Item</button>
    </form>

    <!-- Display List of Items -->
    <h2>Items List</h2>
    <?php include 'view_items.php'; ?>

    <!-- Form to Add Shipping Information -->
    <h2>Shipping Information</h2>
    <form action="shipping_info.php" method="post">
        <input type="number" name="order_id" placeholder="Order ID" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="city" placeholder="City" required>
        <input type="text" name="state" placeholder="State" required>
        <input type="text" name="postal_code" placeholder="Postal Code" required>
        <input type="text" name="country" placeholder="Country" required>
        <button type="submit">Save Shipping Info</button>
    </form>
</body>
</html>
