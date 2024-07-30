### Service Container
Ví dụ:
Giả sử bạn có một lớp PaymentService cần một đối tượng Logger:

```
class PaymentService {
    protected $logger;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function processPayment($amount) {
        // xử lý thanh toán
        $this->logger->log("Đã xử lý thanh toán $amount");
    }
}
```
Thay vì bạn phải tự khởi tạo Logger và PaymentService như sau:

```
$logger = new Logger();
$paymentService = new PaymentService($logger);
```

Bạn có thể để Service Container làm điều đó:
```
$paymentService = app()->make(PaymentService::class);
$paymentService->processPayment(100);
```
Laravel sẽ tự động hiểu và tạo ra các dependency cần thiết.

### Service Provider trong Laravel
Service Provider là nơi mà bạn sẽ khai báo các dịch vụ để Laravel Service Container có thể biết được cách khởi tạo và cấu hình chúng. Service Providers là trung tâm của việc cấu hình ứng dụng và các thành phần (components) khác.

Giả sử bạn muốn đăng ký một dịch vụ PaymentService vào trong Service Container, bạn có thể làm điều đó trong một Service Provider:
```
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PaymentService;
use App\Services\Logger;

class PaymentServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->singleton(PaymentService::class, function ($app) {
            return new PaymentService(new Logger());
        });
    }
}

```
Sau đó, bạn cần đăng ký Service Provider này trong file config/app.php:
```
'providers' => [
    // Các Service Providers khác
    App\Providers\PaymentServiceProvider::class,
],

```

### Dependency Injection
Dependency Injection (DI) là một kỹ thuật mà trong đó một đối tượng nhận các dependency của nó từ bên ngoài thay vì tự mình khởi tạo chúng. Điều này giúp mã dễ bảo trì và kiểm thử hơn.

```
class PaymentService {
    protected $logger;

    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function processPayment($amount) {
        // xử lý thanh toán
        $this->logger->log("Đã xử lý thanh toán $amount");
    }
}

```