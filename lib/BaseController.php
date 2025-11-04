<?php
abstract class BaseController{

	public function __construct(){
		$this->view = new BaseView();
	}

	public function loadModel($name) {

                $path = 'models/'.$name.'Model.php';

                if (file_exists($path)) {
                        require_once("models/".$name."Model.php");

                        $modelName = ucfirst($name)."Model";
                        $this->model = new $modelName();
                }
        }

        public function checkSession(){
                if(isset($_SESSION["userID"])){
                        $id = $_SESSION["userID"];

                        $result = $this->model->getUser($id);

                        if($result && mysqli_num_rows($result) > 0){
                                return $result->fetch_assoc();
                        }
                }
                else{
                        header("location: ".BASE_URL."login");
                }
        }
}
