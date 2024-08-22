document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const errorMessage = document.getElementById('error-message');

    // Ví dụ kiểm tra đơn giản
    if (username === 'user' && password === 'pass') {
        alert('Đăng nhập thành công!');
        errorMessage.textContent = '';
    } else {
        errorMessage.textContent = 'Tên người dùng hoặc mật khẩu không đúng.';
    }
});
