<?php
// Đọc dữ liệu từ file JSON
$users = json_decode(file_get_contents('users.json'), true);

// Lấy thông tin đăng nhập từ yêu cầu POST
$username = $_POST['username'];
$password = $_POST['password'];

// Kiểm tra thông tin đăng nhập
$userFound = false;
foreach ($users as $user) {
  if ($user['username'] === $username && $user['password'] === $password) {
    $userFound = true;
    break;
  }
}

// Trả về kết quả
if ($userFound) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false]);
}