<?php
class Stock extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->loadModel("Stock");
	}
	
	// public function add(){
		
	// 	if(isset($_POST['submit'])){
	// 		unset($_POST['submit']);
	// 		$this->view->id = $this->model->addCourse($_POST);
	// 	}

	// 	$this->view->render('courses/add');
	// }

	public function add(){
		$this->view->user = $this->checkSession();
		if(isset($_POST['submit'])){
			unset($_POST['submit']);
			
        	$itemID = $_POST['itemID'];
			$locationID = $_POST['locationID'];
        	$quantity = $_POST['quantity'];

			$this->view->id = $this->model->addStock($itemID,$locationID,$quantity);
			header("Location: ".BASE_URL."stock");
		}
		else{
			$this->view->items = $this->model->getItems();
			$this->view->locationsGroup= $this->model->getLocations();
			$this->view->render('stock/add');
		}
		
	}

	public function change(){
		$this->view->user = $this->checkSession();
		if(isset($_POST['submit'])){
			unset($_POST['submit']);
			
        	$storedID = $_POST['storedID'];
        	$quantity = $_POST['quantity'];
			if($quantity == 0){
				$this->view->id = $this->model->removeStock($storedID);
			}
			else{
				$this->view->id = $this->model->editStock($quantity, $storedID);
			}
			header("Location: ".BASE_URL."stock");
		}
		else{
			$this->view->stock = $this->model->getRecord($_GET['id']);
			$this->view->render('stock/change');
		}
	}

	public function get(){
		$this->view->user = $this->checkSession();
		$this->view->render('stock/get');
	}

	public function getStockData(){
		$this->checkSession();
		header('Content-Type: application/json');
    	echo json_encode($this->model->getStock()->fetch_all(MYSQLI_ASSOC));
	}

}
?>
