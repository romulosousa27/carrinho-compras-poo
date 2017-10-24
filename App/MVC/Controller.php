<?php 

namespace App\MVC;

abstract class Controller{
	
	protected $view;

	public function __construct(){
		$this->view = new view();
	}
}

