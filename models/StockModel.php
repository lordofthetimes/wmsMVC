<?php
class StockModel extends BaseModel{
	public function __construct(){
		parent::__construct();
	}

	// public function addCourse($course){
	// 	ksort($course);
	// 	$columns = implode(',', array_keys($course));
    //             $values = ':' . implode(', :', array_keys($course));

	// 	$stmt = $this->db->prepare("INSERT INTO przedmioty($columns) VALUES($values);");
	// 	foreach($course as $key=>$value){
	// 		$stmt->bindValue(":$key", $value);
	// 	}

	// 	$stmt->execute();

	// 	return $this->db->lastInsertId();
	// }

	// public function getCourses(){
	// 	return $this->db->query("SELECT przedmiot_id, nazwa, opis FROM przedmioty;")->fetchAll(PDO::FETCH_ASSOC);
	// }
	public function addStock($itemID,$locationID,$quantity){
		$query = $this->db->prepare("INSERT INTO storeditems(locationID,itemID,quantity) VALUES(?,?,?)");
        $query->bind_param("iii", $locationID,$itemID,$quantity);
		$query->execute();
	}

	public function removeStock($storedID){
		$query = $this->db->prepare("DELETE FROM storeditems WHERE storedID = ?");
        $query->bind_param("i", $storedID);
		$query->execute();
	}
	
	public function editStock($quantity, $storedID){
		$query = $this->db->prepare("UPDATE storeditems SET quantity = ? WHERE storedID = ?");
        $query->bind_param("ii", $quantity, $storedID);
		$query->execute();
	}
	public function getLocations(){
		$results = $this->db->query("SELECT b.address, l.locationID, l.row, l.shelf FROM building b JOIN location l ON b.buildingID = l.buildingID ORDER BY b.address ASC, l.row ASC;")->fetch_all(MYSQLI_ASSOC);

    	$locationsGroup = [];
    	foreach($results as $location){
        	$address = $location['address'];
        	$locationID = $location['locationID'];
        	$row = $location['row'];
        	$shelf = $location['shelf'];

        	if (!isset($locationsGroup[$address])) {
            	$locationsGroup[$address] = [];
        	}

        	$locationsGroup[$address][] = [
            	'locationID' => $locationID,
            	'row' => $row,
            	'shelf' => $shelf
        	];
    	}
		return $locationsGroup;
	}
	
	public function getItems(){
		return $this->db->query("SELECT * FROM item")->fetch_all(MYSQLI_ASSOC);
	}

	public function getRecord($id){
		$query = $this->db->prepare("SELECT * FROM storeditems where storedID = ? LIMIT 1");
        	$query->bind_param("i", $id);
			$query->execute();
			return $query->get_result()->fetch_assoc();
	}

    public function getStock($id=null){
		return $this->db->query("SELECT si.quantity,si.storedID, i.itemName,iT.itemType, b.address, l.row,l.shelf 
		FROM item i JOIN storeditems si ON i.itemID = si.itemID JOIN location l ON si.locationID=l.locationID 
		JOIN itemtypes iT on i.itemType = iT.typeID JOIN building b ON b.buildingID = l.buildingID ");
	}

}
?>