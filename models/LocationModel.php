<?php
class LocationModel extends BaseModel{
	public function __construct(){
		parent::__construct();
	}


	public function addLocation($buildingID,$row,$shelf){
		$query = $this->db->prepare("INSERT INTO location(buildingID,row,shelf) VALUES(?,?,?)");
        $query->bind_param("iss", $buildingID, $row, $shelf);
		$query->execute();
	}

	public function changeLocation($row,$shelf,$locationID){
		$query = $this->db->prepare("UPDATE location SET row = ?, shelf = ? WHERE locationID = ?");
        $query->bind_param("ssi", $row, $shelf, $locationID);
		$query->execute();
	}

	public function deleteLocation($locationID){
		 $query = $this->db->prepare("DELETE FROM location WHERE locationID = ?");
		 $query->bind_param("i", $locationID);
		 $query->execute();
	}

	public function getBuildings(){
		return $this->db->query("SELECT buildingID,address FROM building")->fetch_all(MYSQLI_ASSOC);
	}

	public function getLocation($id){
		$query = $this->db->prepare("SELECT * FROM location where locationID = ? LIMIT 1");
        $query->bind_param("i", $id);
		$query->execute();
		return $query->get_result()->fetch_assoc();
	}

	public function getLocations($building){
		$query = $this->db->prepare("SELECT * FROM location WHERE buildingID = ? ORDER BY row + 0 ASC, shelf + 0 ASC");
		$query->bind_param("i",$building);
		$query->execute();
		return $query->get_result()->fetch_all(MYSQLI_ASSOC);
	}

}
?>