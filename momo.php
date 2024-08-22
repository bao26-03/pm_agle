<?php
header('Content-Type: text/html; charset=UTF-8');

// Kết nối với MySQL bằng XAMPP
$servername = "localhost";
$username = "root"; 
$password = "";   
$dbname = "thanhtoan";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }
        .payment-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .qr-code img {
            width: 400px;
            height: 450px;
        }
        .instructions {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        .btn-back, .btn-confirm, .btn-delete, .btn-add {
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover, .btn-confirm:hover, .btn-delete:hover, .btn-add:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="payment-container">
        <h2>Quét Mã Để Thanh Toán MoMo</h2>
        <div class="instructions">
            <p>Người nhận: Hồ Nguyễn Thành Danh - 0359971440</p>
            <p>Ghi chú chuyển tiền bạn ghi mã đơn hàng:</p>
        </div>
        <div class="qr-code">
            <img src="image/momo.jpg" alt="MoMo QR Code">
        </div>
        <a href="camon.php" class="btn-confirm">Đặt hàng</a>
        <a href="#" class="btn-back">Trở lại mua sắm</a>
    </div>

</body>
</html>
