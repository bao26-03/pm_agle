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

$ten = $_POST['ten'];
$email = $_POST['email'];
$so_dien_thoai = $_POST['so_dien_thoai'];
$dia_chi = $_POST['dia_chi'];

// Câu lệnh SQL để thêm khách hàng
$sql = "INSERT INTO KhachHang (ten, email, so_dien_thoai, dia_chi) VALUES ('$ten', '$email', '$so_dien_thoai', '$dia_chi')";

if ($conn->query($sql) === TRUE) {
    // Thêm thành công, chuyển hướng đến trang hiển thị danh sách khách hàng
    header("Location: hien_thi_khach_hang.php");
    exit(); // Đảm bảo rằng không có mã nào khác được thực hiện sau khi chuyển hướng
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
