<?php
include 'db.php'; // Include the database connection

// Fetch order history
$sql = "SELECT d.id, d.ngay_dat, d.tong_tien, k.ten AS ten_khach_hang
        FROM DonHang d
        JOIN KhachHang k ON d.khach_hang_id = k.id
        ORDER BY d.ngay_dat DESC";
$result = $conn->query($sql);

$orderHistory = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $orderHistory[] = $row;
    }
}

// Output as HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Order History</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Customer Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderHistory as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['id']); ?></td>
                    <td><?php echo htmlspecialchars($order['ngay_dat']); ?></td>
                    <td><?php echo htmlspecialchars($order['tong_tien']); ?></td>
                    <td><?php echo htmlspecialchars($order['ten_khach_hang']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
