<?php
include 'includes/db.php';
include 'includes/functions.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name';
$category_id = isset($_GET['category']) ? $_GET['category'] : '';

$sql = "SELECT * FROM products WHERE name LIKE '%$search%'";

if ($category_id) {
    $sql .= " AND category_id = $category_id";
}

switch ($sort) {
    case 'price-asc':
        $sql .= " ORDER BY price ASC";
        break;
    case 'price-desc':
        $sql .= " ORDER BY price DESC";
        break;
    default:
        $sql .= " ORDER BY name";
        break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="css/qlsp.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Quản Lý Sản Phẩm</h1>
            <nav>
                <ul>
                    <li><a href="add-product.php">Thêm Sản Phẩm</a></li>
                    <li><a href="manage-products.php">Quản Lý Sản Phẩm</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <section id="manage-products-section">
            <h2>Danh Sách Sản Phẩm</h2>
            <div id="search-sort">
                <form method="GET" action="manage-products.php">
                    <input type="text" id="search-name" name="search" placeholder="Tìm kiếm theo tên hoặc mã sản phẩm..." value="<?php echo htmlspecialchars($search); ?>">
                    <select id="sort-by" name="sort">
                        <option value="name" <?php if ($sort == 'name') echo 'selected'; ?>>Sắp xếp theo tên</option>
                        <option value="price-asc" <?php if ($sort == 'price-asc') echo 'selected'; ?>>Sắp xếp theo giá (tăng dần)</option>
                        <option value="price-desc" <?php if ($sort == 'price-desc') echo 'selected'; ?>>Sắp xếp theo giá (giảm dần)</option>
                    </select>
                    <select id="filter-category" name="category">
                        <option value="">Tất cả danh mục</option>
                        <?php
                        $categories = getCategories($conn);
                        foreach ($categories as $category) {
                            echo "<option value='{$category['id']}'" . ($category_id == $category['id'] ? ' selected' : '') . ">{$category['name']}</option>";
                        }
                        ?>
                    </select>
                    <button type="submit">Tìm kiếm và Sắp xếp</button>
                </form>
            </div>
            <div id="products" class="product-grid">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='product-item'>
                            <img src='{$row['image']}' alt='Image' width='100'>
                            <h3>{$row['name']}</h3>
                            <p>{$row['description']}</p>
                            <p>Giá: {$row['price']}</p>
                            <p>Danh mục: " . htmlspecialchars($row['category_id']) . "</p>
                            <p>Trạng thái: {$row['status']}</p>
                        </div>";
                    }
                } else {
                    echo "<p>Không có sản phẩm nào.</p>";
                }
                ?>
            </div>
        </section>
    </main>
</body>
</html>

<?php
$conn->close();
?>
