<?php
class ItemsModel extends BaseModel{
	public function __construct(){
		parent::__construct();
	}

	public function addItem($name,$typeID){
		$query = $this->db->prepare("INSERT INTO item(itemName,itemType) VALUES(?,?)");
        $query->bind_param("si",$name,$typeID);
		$query->execute();
	}

	public function changeItem($name,$typeID,$itemID){
		$query = $this->db->prepare("UPDATE item SET itemName = ?, itemType = ? WHERE itemID = ?");
        $query->bind_param("sii", $name, $typeID, $itemID);
		$query->execute();
	}

	public function deleteItem($itemID){
		$query = $this->db->prepare("DELETE FROM item WHERE itemID = ?");
    	$query->bind_param("i", $itemID);
		$query->execute();
	}
	public function getTypes(){
		return $this->db->query("SELECT * from itemtypes");
	}
	
	public function getItem($id){
		$query = $this->db->prepare("SELECT * FROM item where itemID = ? LIMIT 1");
        $query->bind_param("i", $id);
		$query->execute();
		return $query->get_result()->fetch_assoc();
	}

    public function getItems(){
		return $this->db->query("SELECT i.itemID,i.itemName,t.itemType 
		FROM item i join itemtypes t on i.itemType = t.typeID ORDER BY i.itemID")->fetch_all(MYSQLI_ASSOC);

	}
}
?>