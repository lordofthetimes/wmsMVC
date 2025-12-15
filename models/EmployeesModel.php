<?php
class EmployeesModel extends BaseModel{
	public function __construct(){
		parent::__construct();
	}

    public function getEmployees(){
		return $this->db->query("SELECT * FROM employees ORDER BY surname");
	}

	public function addEmployee($firstName,$lastName,$position,$phoneNumber,$email,$birthDate,$address){
		$query = $this->db->prepare("INSERT INTO employees (name, surname, `position`, phoneNumber, email, birthDate,address) VALUES (?,?,?,?,?,?,?)");
		$query->bind_param("sssssss",$firstName,$lastName,$position,$phoneNumber,$email,$birthDate,$address);
		$query->execute();
		$query->close();
	}

	
}
?>