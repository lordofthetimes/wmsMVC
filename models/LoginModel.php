<?php
class LoginModel extends BaseModel{
	public function __construct(){
		parent::__construct();
	}

    public function getUserByLogin($login,$password){
		$query = $this->db->prepare("SELECT * FROM users WHERE login=? AND password=? LIMIT 1");
        $query->bind_param("ss", $login, $password);
        $query->execute();
        return $query->get_result();
	}
}
?>