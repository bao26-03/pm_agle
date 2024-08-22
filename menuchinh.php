<?php
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="qlsp.css">
    <script src="qlsp.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <h1>Quản Lý Sản Phẩm</h1>
            <nav>
                <ul>
                    <li><a href="themsanphammoi.php" id="themsanphammoi-btn">Thêm Sản Phẩm</a></li>
                    <li><a href="manage-products.php" id="manage-products-btn">Quản Lý Sản Phẩm</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <section id="themsanphammoi-section">
            <h2>Thêm Sản Phẩm Mới</h2>
            <form id="themsanphammoi-form" method="POST" action="themsanphammoi.php" enctype="multipart/form-data">
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
                    <input type="text" id="product-category" name="category" required>
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

        <section id="manage-products-section" style="display: none;">
            <h2>Quản Lý Sản Phẩm</h2>
            <div id="search-sort">
                <form method="GET" action="manage-products.php">
                    <input type="text" id="search-name" name="search" placeholder="Tìm kiếm theo tên hoặc mã sản phẩm...">
                    <select id="sort-by" name="sort">
                        <option value="name">Sắp xếp theo tên</option>
                        <option value="price-asc">Sắp xếp theo giá (tăng dần)</option>
                        <option value="price-desc">Sắp xếp theo giá (giảm dần)</option>
                    </select>
                    <button type="submit">Tìm kiếm và Sắp xếp</button>
                </form>
            </div>
            <div id="products" class="product-grid">
                <!-- Danh sách sản phẩm sẽ được thêm vào đây -->
            </div>
        </section>
    </main>

    <script src="qlsp.js"></script>
</body>
</html>
