<?php 

namespace App\Controller;

use App\MVC\Controller;
use App\Model\Product\ProductRepository;

class Home extends Controller{
    private $product;

    public function __construct(ProductRepository $productRepository){
        parent::__construct();
        $this->product = $productRepository;
    }

    public function index(){
		$this->view->render('home');
	}
}