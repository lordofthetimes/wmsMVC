<?php
class Employees extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->loadModel("Employees");
	}
	
	public function get(){
		$this->view->user = $this->checkSession();
		$this->view->render('employees/get');
	}

	public function getEmployeesData(){
		$this->checkSession();
		header('Content-Type: application/json');
		echo json_encode($this->model->getEmployees()->fetch_all(MYSQLI_ASSOC));
	}
}
?>
