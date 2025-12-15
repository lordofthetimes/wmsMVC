<?php
class Employees extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->loadModel("Employees");
	}
	
	public function get(){
		$this->view->user = $this->checkSession();
		if($this->view->isAdmin($this->view->user)){
			$this->view->render('employees/get');
		}
		else{
			header("location: ".BASE_URL."");
		}
	}

	public function add(){
		$this->view->user = $this->checkSession();
		if(!$this->view->isAdmin($this->view->user)) header("location: ".BASE_URL."");
		if(isset($_POST['submit'])){
			unset($_POST['submit']);

			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$position = $_POST['position'];
			$phoneNumber = $_POST['phoneNumber'];
			$email = $_POST['email'];
			$birthDate = $_POST['birthDate'];
			$address = $_POST['address'];
			$this->model->addEmployee($firstName,$lastName,$position,$phoneNumber,$email,$birthDate,$address);
			header("Location: ".BASE_URL."employees");
		}
		else{
			$this->view->render('employees/add');
		}
	}

	public function delete(){
		$this->view->user = $this->checkSession();
		if(!$this->view->isAdmin($this->view->user)) header("Location: ".BASE_URL."location?building=".$this->getSelectedBuilding());
		if(isset($_POST['ids'])){
			$ids = json_decode($_POST['ids'],true);
			foreach($ids as $id){
				$this->model->deleteEmployee($id);
			}
		}
	}

	public function getEmployeesData(){
		$this->checkSession();
		header('Content-Type: application/json');
		echo json_encode($this->model->getEmployees()->fetch_all(MYSQLI_ASSOC));
	}
}
?>
