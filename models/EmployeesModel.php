<?php
class EmployeesModel extends BaseModel{
	public function __construct(){
		parent::__construct();
	}

    public function getEmployees(){
		return $this->db->query("SELECT * FROM employees ORDER BY surname");
	}
}
?>