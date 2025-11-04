<?php
class Employees extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->loadModel("Employees");
	}
	
	public function get(){
		$this->view->user = $this->checkSession();
		$this->view->employees = $this->model->getEmployees();
		$this->view->render('employees/get');
	}
}
?>
