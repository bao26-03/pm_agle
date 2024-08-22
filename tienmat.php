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

    <style id="woocommerce-inline-inline-css" type="text/css">
        .woocommerce form .form-row .required { visibility: visible; }
        
        /* Thêm CSS cho hai cột */
        body {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            flex-direction: column;
        }

        .column {
            flex: 1;
            padding: 10px;
            box-sizing: border-box;
        }

        .column:first-child {
            margin-right: 20px;
        }

        h1 {
            text-align: left;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="tel"], input[type="email"] {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 1em;
            width: 100%;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #8B4513;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 1em;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* CSS cho phần page title */
        .page-title-inner {
            background-color: #8B4513;
            padding: 10px;
            text-align: right;
            margin-bottom: 20px;
            width: 100%;
            color: white;
            box-sizing: border-box;
        }

        .page-title-inner h1 {
            margin: 0;
        }

        .page-title-inner nav {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="page-title-inner">
        <h1>Thanh toán</h1>
        <nav class="woocommerce-breadcrumb breadcrumbs uppercase">
            <a href="#">Trang chủ</a> 
            <span class="divider">/</span> Thanh toán
        </nav>
    </div>

    <div class="column">
        <h1>THÔNG TIN THANH TOÁN</h1>
        <form action="process_payment.php" method="POST">

            <label for="fullname">Họ và tên:</label>
            <span class="woocommerce-input-wrapper">
            <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="Nhập họ và tên" value=""></span>

            <label for="phone">Số điện thoại:</label>
            <span class="woocommerce-input-wrapper">
            <input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="Nhập số điện thoại" value="" autocomplete="tel"></span>

            <label for="email">Email:</label>
            <span class="woocommerce-input-wrapper">
            <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="Nhập địa chỉ email" value="" ></span>

            <label for="address">Địa chỉ:</label>
            <span class="woocommerce-input-wrapper">
            <input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Nhập địa chỉ cụ thể. Số nhà, tên đường..." value="" autocomplete="address-line1"></span>
        </form>
    </div>
    <div class="column">
        <label for="total">Tổng số tiền:</label>
        <strong><span class="woocommerce-Price-amount amount">
        <bdi>266.000<span class="woocommerce-Price-currencySymbol">VND</span></bdi></span></strong>

        <input type="submit" href="camon.php" value="Đặt Hàng">
    </div>
</body>
</html>
