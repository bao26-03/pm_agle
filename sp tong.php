<!DOCTYPE html>
<html>
<head>
  <title>Sản Phẩm coffe</title>
  <style>
    /* CSS styles go here */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 20px;
    }

    .product-item {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }

    .cart-container {
      margin-top: 20px;
      padding: 20px;
      background-color: #f1f1f1;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tfoot td {
      font-weight: bold;
    }

    .quantity-btn, .remove-btn, .checkout-btn {
      padding: 5px 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .remove-btn {
      background-color: #f44336;
    }

    .checkout-btn {
      background-color: #008CBA;
    }
  </style>
</head>
<body>
  <section class="product-section">
    <h2>Sản phẩm café</h2>
    <div class="product-grid">
      <div class="product-item">
        <img src="cafe1.jpg" alt="Cafe 1">
        <h3>Cafe Phin</h3>
        <p>Cafe phin truyền thống Việt Nam</p>
        <p class="price">25.000 ₫</p>
        <button class="add-to-cart" onclick="addToCart('Cafe Phin', 25000)">Thêm vào giỏ</button>
      </div>
      <div class="product-item">
        <img src="cafe2.jpg" alt="Cafe 2">
        <h3>Cafe Sữa</h3>
        <p>Cafe với sữa đặc trưng</p>
        <p class="price">30.000 ₫</p>
        <button class="add-to-cart" onclick="addToCart('Cafe Sữa', 30000)">Thêm vào giỏ</button>
      </div>
      <div class="product-item">
        <img src="cafe2.jpg" alt="Cafe 2">
        <h3>Cafe olong</h3>
        <p class="price">35.000 ₫</p>
        <button class="add-to-cart" onclick="addToCart('Cafe olong', 35000)">Thêm vào giỏ</button>
      </div>
    </div>
    <h2>Sản phẩm Trà</h2>
    <div class="product-grid">
      <div class="product-item">
        <img src="tra1.jpg" alt="tra 1">
        <h3>Trà đào chanh xả</h3>
        <p></p>
        <p class="price">30.000 ₫</p>
        <button class="add-to-cart" onclick="addToCart('Trà đào chanh xả', 30000)">Thêm vào giỏ</button>
      </div>
      <div class="product-item">
        <img src="cafe2.jpg" alt="Cafe 2">
        <h3>Trà Lipton</h3>
        <p class="price">30.000 ₫</p>
        <button class="add-to-cart" onclick="addToCart('Trà Lipton', 30000)">Thêm vào giỏ</button>
      </div>
      <div class="product-item">
        <img src="tea3.jpg" alt="Cafe 2">
        <h3>Trà dào</h3>
        <p class="price">20.000 ₫</p>
        <button class="add-to-cart" onclick="addToCart('Trà đào', 20000)">Thêm vào giỏ</button>
      </div>
    </div>
  </section>

  <div id="cart-container" class="cart-container">
    <h2>Giỏ hàng</h2>
    <table id="cart-table">
      <thead>
        <tr>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Giá</th>
          <th>Thành tiền</th>
          <th>Thao tác</th>
          <th>Hoá đơn</th>
        </tr>
      </thead>
      <tbody id="cart-items"></tbody>
      <tfoot>
        <tr>
          <td colspan="3">Tổng cộng:</td>
          <td id="total-price">0 ₫</td>
          <td><button class="checkout-btn" onclick="checkout()">Thanh toán</button></td>
          <td><button class="checkout-btn" onclick="printInvoice()">Xuất hóa đơn</button></td>        
        </tr>
      </tfoot>
    </table>
  </div>

  <script>
    let cart = [];

    function addToCart(name, price) {
      let existingItem = cart.find(item => item.name === name);
      if (existingItem) {
        existingItem.quantity++;
      } else {
        cart.push({ name, price, quantity: 1 });
      }
      updateCartDisplay();
    }

    function removeFromCart(index) {
      cart.splice(index, 1);
      updateCartDisplay();
    }

    function updateQuantity(index, change) {
      let item = cart[index];
      item.quantity += change;
      if (item.quantity <= 0) {
        removeFromCart(index);
      } else {
        document.getElementById(`quantity-${index}`).textContent = item.quantity;
        updateCartDisplay();
      }
    }

    function updateCartDisplay() {
      let cartItemsElement = document.getElementById("cart-items");
      cartItemsElement.innerHTML = "";

      let totalPrice = 0;
      for (let i = 0; i < cart.length; i++) {
        let item = cart[i];
        let tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${item.name}</td>
          <td>
            <button class="quantity-btn" onclick="updateQuantity(${i}, -1)">-</button>
            <span id="quantity-${i}">${item.quantity}</span>
            <button class="quantity-btn" onclick="updateQuantity(${i}, 1)">+</button>
          </td>
          <td>${item.price.toLocaleString()} ₫</td>
          <td>${(item.price * item.quantity).toLocaleString()} ₫</td>
          <td><button class="remove-btn" onclick="removeFromCart(${i})">Xóa</button></td>
        `;
        cartItemsElement.appendChild(tr);
        totalPrice += item.price * item.quantity;
      }

      document.getElementById("total-price").textContent = totalPrice.toLocaleString() + " ₫";
    }

    function checkout() {
      if (cart.length > 0) {
        alert(`Quét mã để thanh toán! ${document.getElementById("total-price").textContent}`);
        cart = [];
        updateCartDisplay();
              window.location.href = 'qr.jpg'
      } else {
        alert("Giỏ hàng trống, không thể thanh toán.");
      }
    }
    function printInvoice() {
  if (cart.length > 0) {
    let invoiceContent = `
      <h1>Hóa đơn</h1>
      <h2>Cafe random <br> Nguyen Huu Tho.Tan Kien. Quan 7. TP.HCM</h2>
      <table>
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
    `;

    let totalPrice = 0;
    for (let i = 0; i < cart.length; i++) {
      let item = cart[i];
      invoiceContent += `
        <tr>
          <td>${item.name}</td>
          <td>${item.quantity}</td>
          <td>${item.price.toLocaleString()} ₫</td>
          <td>${(item.price * item.quantity).toLocaleString()} ₫</td>
        </tr>
      `;
      totalPrice += item.price * item.quantity;
    }

    invoiceContent += `
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3">Tổng cộng:</td>
            <td>${totalPrice.toLocaleString()} ₫</td>
          </tr>
        </tfoot>
      </table>
    `;

    // Mở cửa sổ in ấn với nội dung hóa đơn
    let printWindow = window.open('', 'Invoice', 'width=800,height=600');
    printWindow.document.write(invoiceContent);
    printWindow.document.close();
    printWindow.print();
    printWindow.close();
  } else {
    alert("Giỏ hàng trống, không thể xuất hóa đơn.");
  }
}
  </script>
</body>
</html>
