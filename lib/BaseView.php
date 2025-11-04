<?php
class BaseView{
	public function __construct(){

	}
	
	public function render($name){
		require_once "views/layout/header.php";
		require_once "views/layout/nav.php";
		require_once "views/$name.php";
		// require_once "views/layout/footer.php"; //add footer when implemented
	}
	public function renderLogin($name){
		require_once "views/layout/header.php";
		require_once "views/$name.php";
	}
}

