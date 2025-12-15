<?php
#[\AllowDynamicProperties]
abstract class BaseModel{
	public function __construct(){
		$this->db = new mysqli(DB_HOST, DB_USR, DB_PWD, DB_NAME);
	}

	public function getUser($id){
        $query = $this->db->prepare("SELECT * FROM users WHERE userID = ? LIMIT 1");
        $query->bind_param("i", $id);
        $query->execute();
        return $query->get_result(); 
	}
}

