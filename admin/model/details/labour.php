<?php
class ModelDetailsLabour extends Model {
	

	public function getAllLabourList($data = array()) {
      //echo "hello";die;
		$sql ="SELECT * FROM `" . DB_PREFIX . "labour` l";

		if (!empty($data['filter_name'])) {
			$sql .= " WHERE l.labour_name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " WHERE l.labour_address LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " WHERE l.labour_number LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}
		$sort_data = array(
			'l.labour_name',
			'l.labour_address',
            'l.labour_number',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY l.labour_name";
		}
       

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);
         
		return $query->rows;
	}
	
	
	public function getTotalList($data = array()) {
			$sql ="SELECT COUNT(labour_id) AS total FROM `" . DB_PREFIX . "labour` l";
           
		if (!empty($data['filter_name'])) {
			$sql .= " where l.labour_name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

        if (!empty($data['filter_address'])) {
			$sql .= " where l.labour_address LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
       if (!empty($data['filter_number'])) {
			$sql .= " where l.labour_number LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	public function addLabour($data) {
      $this->db->query("INSERT INTO " . DB_PREFIX . "labour SET labour_name='".$data['name']."',labour_address='".$data['address']."',labour_number=".$data['number']);
		
    }
    
 public function editLabour($data,$id) {
      $name=$data['name'];
      $address=$data['address'];
      $number=$data['number'];
         $query = $this->db->query("UPDATE  " . DB_PREFIX . "labour SET labour_name='$name',labour_address='$address',labour_number='$number' WHERE labour_id='$id'");
}
	
	public function delete($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "labour WHERE labour_id = '" . (int)$id . "'");
		
	}
}