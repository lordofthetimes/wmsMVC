<?php
class Items extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->loadModel("Items");
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
			
        	$name = $_POST['name'];
    		$typeID = $_POST['typeID'];

			$this->model->addItem($name,$typeID);
			header("Location: ".BASE_URL."items");
		}
		else{
			$this->view->types = $this->model->getTypes();
			$this->view->render('items/add');
		}
		
	}

	public function change(){
		$this->view->user = $this->checkSession();
		if(isset($_POST['submit'])){
			unset($_POST['submit']);

			$name = $_POST['name'];
   			$typeID = $_POST['typeID'];
			$itemID = $_POST['itemID'];

			$this->model->changeItem($name,$typeID,$itemID);
			header("Location: ".BASE_URL."items");
		}
		else{
			$this->view->item = $this->model->getItems($_GET['id']);
			$this->view->types = $this->model->getTypes();
			$this->view->render('items/change');
		}
	}

	public function delete(){
		$this->view->user = $this->checkSession();
		if(isset($_GET['id'])){
			$this->model->deleteItem($_GET['id']);
		}
		header("Location: ".BASE_URL."items");
	}


	public function get(){
		$this->view->user = $this->checkSession();
		$this->view->items = $this->model->getItems();
		$this->view->render('items/get');
	}

}
?>
