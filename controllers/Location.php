<?php
class Location extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->loadModel("Location");
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
		if(isset($_POST['submit'])&& $this->view->isAdmin($this->view->user)){
			unset($_POST['submit']);

			$buildingID = $_POST['buildingID'];
			$row = $_POST['row'];   
    		$shelf = $_POST['shelf'];

			$this->model->addLocation($buildingID,$row,$shelf);
			header("Location: ".BASE_URL."location?building=".$this->view->$buildingID);
		}
		else{
			$this->view->buildingSelected = $this->getSelectedBuilding();
			$this->view->render('location/add');
		}
	}

	public function change(){
		$this->view->user = $this->checkSession();
		if(isset($_POST['submit']) && $this->view->isAdmin($this->view->user)){
			unset($_POST['submit']);

   			$row = $_POST['row'];   
    		$shelf = $_POST['shelf'];
    		$locationID = $_POST['locationID'];

			$this->model->changeLocation($row,$shelf,$locationID);
			header("Location: ".BASE_URL."location?building=".$this->getSelectedBuilding());
		}
		else{
			$this->view->buildingSelected = $this->getSelectedBuilding();
			$this->view->location = $this->model->getLocation($_GET['id']);
			$this->view->render('location/change');
		}
	}

	public function delete(){
		$this->view->user = $this->checkSession();
		if(isset($_GET['id']) && $this->view->isAdmin($this->view->user)){
			$this->model->deleteLocation($_GET['id']);
		}
		header("Location: ".BASE_URL."location?building=".$this->getSelectedBuilding());
	}

	public function get(){
		$this->view->user = $this->checkSession();
		$this->view->buildingSelected = $this->getSelectedBuilding();
		$this->view->buildings = $this->model->getBuildings();
		$this->view->render('location/get');
	}

	public function getLocationsData(){
		$this->checkSession();
		header('Content-Type: application/json');
    	echo json_encode($this->model->getLocations($this->getSelectedBuilding()));
	}

	private function getSelectedBuilding(){
		$buildingSelected = 11;
		if(isset($_GET['building'])){
			$buildingSelected = $_GET['building'];
		}
		return $buildingSelected;
	}
}
?>
