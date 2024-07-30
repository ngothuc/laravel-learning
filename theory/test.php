<?php
class Tire {
    public $number;
    public function __construct($number) {
        $this->number = $number;
    }
    public function aboutNumberTire() {
        echo "This car has " . $this->number . " tires";
    }
}

class Car {
    public $tire;
    public function __construct($tire) {
        $this->tire = $tire;
    }
    public function info()
    {
        $this->tire->aboutNumberTire();
    }
}

$car = new Car(new Tire(6));
$car->info();
