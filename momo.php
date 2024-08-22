<?php
header('Content-Type: text/html; charset=UTF-8');

// Kết nối với MySQL bằng XAMPP
$servername = "localhost";  // Tên máy chủ MySQL (thường là 'localhost' trên XAMPP)
$username = "root";         // Tên người dùng MySQL (thường là 'root' trên XAMPP)
$password = "";             // Mật khẩu MySQL (thường là trống trên XAMPP)
$dbname = "thanhtoan";  // Thay thế 'your_database' bằng tên cơ sở dữ liệu của bạn

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
        .btn-delete {
            background-color: #f44336;
        }
        .btn-delete:hover {
            background-color: #e53935;
        }
        .order-summary {
            text-align: left;
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .order-summary h3 {
            margin-top: 0;
        }
        .order-summary p {
            margin: 5px 0;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
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
        <div class="order-summary">
            <h3>Order Summary</h3>
            <div class="order-item">
                <p><strong>Sản phẩm:</strong> Coffee</p>
                <p><strong>Số lượng:</strong> 2</p>
                <p><strong>Giá:</strong> 200,000 VND</p>
                <a href="#" class="btn-delete">Xóa</a>
            </div>
            <div class="order-item">
                <p><strong>Sản phẩm:</strong> Tea</p>
                <p><strong>Số lượng:</strong> 1</p>
                <p><strong>Giá:</strong> 100,000 VND</p>
                <a href="#" class="btn-delete">Xóa</a>
            </div>
            <p><strong>Tổng tiền:</strong> 500,000 VND</p>
            <a href="#" class="btn-add">Thêm món</a>
        </div>
        <a href="#" class="btn-confirm">Đặt hàng</a>
        <a href="#" class="btn-back">Trở lại mua sắm</a>
    </div>

</body>
</html>
