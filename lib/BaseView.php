<?php
class BaseView{
	public function __construct(){

	}
	
	public function render($name){
		require_once "views/layout/header.php";
		require_once "views/layout/nav.php";
		require_once "views/$name.php";
		require_once "views/layout/footer.php";
	}

	public function renderLogin($name){
		require_once "views/layout/header.php";
		require_once "views/$name.php";
	}

	public function isAdmin($user){
		return $user['role'] == "admin";
	}
}

