<?php

class Car{
	public $name;
	public $color;

	public function setValue($name, $color){
		$this->name = $name;
		$this->color = $color;
	}

	public function echoValue(){
		echo $this->name. " ". $this->color;
	}
}

class CarClear extends Car{
	public function resetValue(){
		$this->name = "";
		$this->color = "";
	}
}

$car1 = new Car();
$car1->setValue("prius", "white");
$car1->echoValue();

$car2 = new CarClear();
$car2->setValue("vezel", "black");
$car2->echoValue();
$car2->resetValue();
$car2->echoValue();