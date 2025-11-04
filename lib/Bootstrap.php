<?php
class Bootstrap{

/*	public function __construct(){

		$url = $_GET['url'];
		$url = explode("/",$url);
*/	
		//should be logged
		//if a controller is not mentioned
/*		if(empty($url[0])){
			require_once("controllers/students.php");
			(new Students())->get();
			return false;
		}
*/



public function __construct() {
    // Get 'url' parameter safely (avoid undefined index notice)
    $url = $_GET['url'] ?? '';
    $url = explode("/", $url);

    // If no controller is mentioned, load the default controller/view
    if (empty($url[0])) {
        require_once("controllers/Stock.php");
        $controller = new Stock();
        $controller->get(); // default method
        return;
    }




		$ctName = ucfirst($url[0]);
		$fileName = "controllers/".$ctName.".php";

		//should be logged
		if(!file_exists($fileName)){
			//replace the message
			//redirect the user to a custom 404 page
			echo "File does not exist";
			return false;
		}

		require_once($fileName);
		$ctName = ucfirst($url[0]);
		$controller = new $ctName;

		if(empty($url[1])){
			$controller->get();
			return false;
		}
	
		$actionName  = isset($url[1]) ? $url[1]:NULL;

		if($actionName && method_exists($controller, $actionName)){
			if(empty($url[2])){
				$controller->{$url[1]}();
			}
			else{
				$controller->{$url[1]}($url[2]);
			}
		}
		else{
			//should be logged
			//replace the message
			//redirect the user to a custom 404 page		
			echo "Action does not exist";
			
		}

	}

}
