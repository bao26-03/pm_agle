<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "QuanLyCafe";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Truy vấn để lấy dữ liệu khách hàng
$sql = "SELECT * FROM KhachHang";
$result = $conn->query($sql);

// Hiển thị dữ liệu khách hàng
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Khách Hàng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Danh Sách Khách Hàng</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Ngày Tạo</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["ten"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["so_dien_thoai"] . "</td>
                    <td>" . $row["dia_chi"] . "</td>
                    <td>" . $row["ngay_tao"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có dữ liệu";
    }

    $conn->close();
    ?>
</body>
</html>
