<!DOCTYPE html>
<html>
<head>
  <title>Quản lý bán cafe</title>
  <style>
    /* Định dạng CSS */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #333;
      color: #fff;
      padding: 20px;
    }
    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
    nav li {
      margin-right: 20px;
      position: relative;
    }
    nav a {
      color: #fff;
      text-decoration: none;
      display: block;
      padding: 10px;
    }
    nav li ul {
      display: none;
      position: absolute;
      background-color: #333;
      width: 200px;
      z-index: 1;
    }
    nav li:hover > ul {
      display: block;
    }
    nav li ul li {
      margin: 0;
    }
    nav li ul li a {
      padding: 10px;
    }
    main {
      display: flex;
      padding: 20px;
    }
    aside {
      width: 200px;
      background-color: #f1f1f1;
      padding: 20px;
    }
    aside h2 {
      margin-top: 0;
    }
    aside ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    aside li {
      margin-bottom: 10px;
    }
    section {
      flex-grow: 1;
      padding: 0 20px;
    }
    section h2 {
      margin-top: 0;
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <h1>Cafe Random</h1>
      <ul>
        <li><a href="#">Lương</a>
          <ul>
            <li><a href="#">Thưởng</a></li>
            <li><a href="#">Thuế cá nhân</a></li>
            <li><a href="#">Lương tháng</a></li>
            <li><a href="#">Phạt</a></li>
          </ul>
        </li>
        <li><a href="#">Doanh thu</a>
          <ul>
            <li><a href="#">Doanh thu của Ngày</a></li>
            <li><a href="#">Doanh thu của Tháng</a></li>
            <li><a href="#">Doanh thu của Năm</a></li>
          </ul>
        </li>
        <li><a href="sp tong.php">Sản phẩm</a>
        </li>
        <li><a href="indexQLDH.php">Quản lý đơn hàng</a></li>
        <li><a href="#">Sự kiện</a></li>
        <li><a href="indexQLKH.html">Khách hàng</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <aside>
      <h2>Lương</h2>
      <ul>
        <li>Thưởng</li>
        <li>Thuế cá nhân</li>
        <li>Lương tháng</li>
        <li>Phạt</li>
      </ul>
      <h2>Doanh thu</h2>
      <ul>
        <li>Doanh thu của Ngày</li>
        <li>Doanh thu của Tháng</li>
        <li>Doanh thu của Năm</li>
      </ul>
    <section>
      <h2>Sản phẩm</h2>
      <ul>
        <li>Cafe phin</li>
        <li>Trà</li>
        <li>Bánh ngọt</li>
        <li>Nước ngọt</li>
        <li>Nước trái cây</li>
        <li>Sinh tố</li>
      </ul>
      <h2>QLDH</h2>
      <ul>
      </ul>
    </section>
  </main>
</aside>
</body>
</html>