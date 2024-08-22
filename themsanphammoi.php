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

<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category'];
    $status = $_POST['status'];

    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = uploadImage($_FILES['image']);
    }

    $sql = "INSERT INTO products (name, description, price, image, category_id, status) VALUES ('$name', '$description', '$price', '$image', '$category_id', '$status')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="css/qlsp.css">
</head>
<body>

        <div class="container">
            <h1>Thêm Sản Phẩm</h1>
        </div>

    <main class="container">
        <section id="add-product-section">
            <h2>Thêm Sản Phẩm Mới</h2>
            <form id="add-product-form" method="POST" action="add-product.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product-name">Tên Sản Phẩm:</label>
                    <input type="text" id="product-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="product-description">Mô Tả:</label>
                    <textarea id="product-description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="product-price">Giá:</label>
                    <input type="number" id="product-price" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="product-image">Hình Ảnh:</label>
                    <input type="file" id="product-image" name="image" required>
                </div>
                <div class="form-group">
                    <label for="product-category">Danh Mục:</label>
                    <select id="product-category" name="category" required>
                        <?php
                        $categories = getCategories($conn);
                        foreach ($categories as $category) {
                            echo "<option value='{$category['id']}'>{$category['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product-status">Trạng Thái:</label>
                    <select id="product-status" name="status">
                        <option value="in-stock">Còn Hàng</option>
                        <option value="out-of-stock">Hết Hàng</option>
                    </select>
                </div>
                <button type="submit">Thêm Sản Phẩm</button>
            </form>
        </section>
    </main>
</body>
</html>
