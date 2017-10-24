<?php 

namespace App\Controller;

use App\MVC\Controller;

class Home extends Controller{

	public function index(){
		$this->view->render('home');
	}
}