<?php
class Main extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->loadModel("Stock");
	}

	public function get(){
		$this->view->user = $this->checkSession();
		$this->view->render("main/get");
	}
}
?>
