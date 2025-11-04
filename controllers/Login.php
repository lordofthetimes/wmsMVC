<?php
class Login extends BaseController{
	public function __construct(){
		parent::__construct();
		$this->loadModel("Login");
	}
	
	public function get(){
		if(isset($_POST['submit'])){
			unset($_POST['submit']);

			$login = $_POST["login"];
    		$password = $_POST["password"];
    		if(empty($login) || empty($password)){
        		echo "Please fill in both fields";
        		exit;
			}
			
        	$result = $this->model->getUserByLogin($login,$password);

        	if($result && $result->num_rows > 0){
            	$_SESSION["userID"] = $result->fetch_assoc()["userID"];
            	header("location: ".BASE_URL."stock");
            	exit;
        	}
        	else{
            	echo "Login or password is not correct";
        	}
		}
		else{
			$this->view->renderLogin('login/get');
		}
	}

	public function logout(){
    	unset($_SESSION["userID"]);
    	header("location: ".BASE_URL."login");
	}
}
?>
 