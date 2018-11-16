<?php
class Shape
{
	public $fill_color;
	public $border_color;
	public $border_size;

	public function setParams($params)
	{
		$this->fill_color=$params['fill_color'];
		$this->border_color=$params['border_color'];
		$this->border_size=$params['border_size'];
		
	}

}

class Circle extends Shape
{
	public $radius;
	public function __construct($radius,$params)
	{
		$this->setParams($params);
		$this->radius=$radius;
	}
	public function draw()
	{
		//dummy method
		echo "Drawing Circle<br>";
	}
}

class Square extends Shape
{
	public $widthHeight;
	public function __construct($widthHeight,$params)
	{
		$this->setParams($params);
		$this->widthHeight=$widthHeight;
	}
	public function draw()
	{
		//dummy method
		echo "Drawing Square<br>";
	}
}