![Tổng quan Request Lifecycle trong Laravel](https://images.viblo.asia/b4bce647-722e-4064-ac19-b7e9e0d0573e.png)

### Khởi động
Đầu tiên, client sẽ gửi request đến index.php, đây là đích của tất cả các request từ client

### HTTP/Console Kernel
Tiếp theo, request sẽ được gửi đến HTTP Kernel hoặc Console Kernel, tùy thuộc vào request được gửi từ đâu.

HTTP Kernel như một chiếc "hộp đen" của ứng dụng, hoạt động theo cơ chế đơn giản: nhận request và trả về response.

Bắt đầu từ những chốt chặn sau đều nằm trong chiếc "hộp đen" HTTP Kernel này.

### Service providers

Một trong những công việc quan trọng nhất của HTTP Kernel đó chính là load các service provider. Tất cả các service provider được cấu hình trong file config/app.php. Quá trình load các service provider sẽ trải qua hai quá trình:

    1. Đăng ký service provider (Register service provider)

    2. Khởi động service provider (Bootstrap service provider)
Các service provider khởi động nhiều thành phần khác nhau của framework như database, validation, router... Chính vì thế mà nó đóng vai trò thiết yếu trong quá trình chạy ứng dụng Laravel.

### Router
Sau khi hoàn tất load service provider, các request sẽ được gửi đến router.

Làm nhiệm vụ định tuyến, nếu request đã được định tuyến, sẽ có 2 hướng rẽ

    1. Route -> Middleware -> Controller/Action

    2. Route -> Controller/Action
Lựa chọn hướng rẽ nào tùy thuộc vào route có middleware hay không.

### Middleware
Thực hiện các ràng buộc của route. Chẳng hạn như có một request với đường dẫn là http://localhost:8000/login, một coder muốn ràng buộc rằng nếu tồn tại session/cookie đăng nhập của client thì khi vào request này sẽ chuyển về trang chủ, còn nếu không thì vẫn hiển thị form đăng nhập để client tiếp tục. Đây là lúc sử dụng middleware để ràng buộc.

### Phương thức xử lý (Handle method)
Trả về response sau khi xử lý xong request, theo cơ chế "hộp đen" của HTTP Kernel.

### Phương thức trả về (Return method)
Có 2 hình thức

    1. Trả về qua view
    
    2. Trả về không qua view