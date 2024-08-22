<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $status = $_POST['status'];

    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = uploadImage($_FILES['image']);
    }

    $sql = "INSERT INTO products (name, description, price, image, category, status) VALUES ('$name', '$description', '$price', '$image', '$category', '$status')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Thêm sản phẩm mới</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Mô tả sản phẩm:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="price">Giá sản phẩm:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="image">Hình ảnh sản phẩm:</label>
        <input type="file" id="image" name="image">

        <label for="category">Danh mục sản phẩm:</label>
        <input type="text" id="category" name="category" required>

        <label for="status">Trạng thái sản phẩm:</label>
        <select id="status" name="status" required>
            <option value="In Stock">Còn hàng</option>
            <option value="Out of Stock">Hết hàng</option>
        </select>

        <button type="submit">Thêm sản phẩm</button>
    </form>
    <a href="index.php">Quay lại</a>
</body>
</html>

<?php
$conn->close();
?>
