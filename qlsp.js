// Lấy các phần tử từ DOM
const addProductForm = document.getElementById('add-product-form');
const manageProductsSection = document.getElementById('manage-products-section');
const addProductSection = document.getElementById('add-product-section');
const searchName = document.getElementById('search-name');
const sortBy = document.getElementById('sort-by');
const productsGrid = document.getElementById('products');

// Chuyển đổi giữa các phần
document.getElementById('add-product-btn').addEventListener('click', () => {
    addProductSection.style.display = 'block';
    manageProductsSection.style.display = 'none';
});

document.getElementById('manage-products-btn').addEventListener('click', () => {
    addProductSection.style.display = 'none';
    manageProductsSection.style.display = 'block';
});

// Lấy sản phẩm từ LocalStorage
function getProducts() {
    const products = localStorage.getItem('products');
    return products ? JSON.parse(products) : [];
}

// Lưu sản phẩm vào LocalStorage
function saveProducts(products) {
    localStorage.setItem('products', JSON.stringify(products));
}

// Hiển thị sản phẩm lên giao diện
function renderProducts(products) {
    productsGrid.innerHTML = '';
    products.forEach(product => {
        const productItem = document.createElement('div');
        productItem.classList.add('product-item');
        productItem.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <h3>${product.name}</h3>
            <p>${product.description}</p>
            <p>Giá: $${product.price.toFixed(2)}</p>
            <p>Danh Mục: ${product.category}</p>
            <p class="${product.status === 'in-stock' ? 'status-in-stock' : 'status-out-of-stock'}">
                Trạng Thái: ${product.status === 'in-stock' ? 'Còn Hàng' : 'Hết Hàng'}
            </p>
        `;
        productsGrid.appendChild(productItem);
    });
}

// Thêm sản phẩm mới
addProductForm.addEventListener('submit', (event) => {
    event.preventDefault();
    
    const name = document.getElementById('product-name').value;
    const description = document.getElementById('product-description').value;
    const price = parseFloat(document.getElementById('product-price').value);
    const image = document.getElementById('product-image').value;
    const category = document.getElementById('product-category').value;
    const status = document.getElementById('product-status').value;
    
    const products = getProducts();
    products.push({ name, description, price, image, category, status });
    saveProducts(products);
    
    addProductForm.reset();
    alert('Sản phẩm đã được thêm thành công!');
});

// Tìm kiếm và sắp xếp sản phẩm
function updateProductList() {
    const products = getProducts();
    let filteredProducts = products;

    // Tìm kiếm
    const searchValue = searchName.value.toLowerCase();
    filteredProducts = filteredProducts.filter(product => 
        product.name.toLowerCase().includes(searchValue) ||
        product.category.toLowerCase().includes(searchValue)
    );

    // Sắp xếp
    const sortByValue = sortBy.value;
    if (sortByValue === 'price-asc') {
        filteredProducts.sort((a, b) => a.price - b.price);
    } else if (sortByValue === 'price-desc') {
        filteredProducts.sort((a, b) => b.price - a.price);
    } else if (sortByValue === 'name') {
        filteredProducts.sort((a, b) => a.name.localeCompare(b.name));
    }

    renderProducts(filteredProducts);
}

// Sự kiện tìm kiếm và sắp xếp
searchName.addEventListener('input', updateProductList);
sortBy.addEventListener('change', updateProductList);

// Khi tải trang, hiển thị sản phẩm
document.addEventListener('DOMContentLoaded', updateProductList);
