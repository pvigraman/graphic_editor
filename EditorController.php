<?php
require "Shape.php";
class EditorController
{
	public function setup()
	{
		$shapes=[
		["type"=>"circle","params"=>new Circle(50,["fill_color"=>"green","border_color"=>"black","border_size"=>"2"])],
		["type"=>"square","params"=>new Square(150,["fill_color"=>"green","border_color"=>"black","border_size"=>"2"])],
		];

		foreach ($shapes as $shape) {
			$shape["params"]->draw();
			//print_r($shape);

		}
	}
}