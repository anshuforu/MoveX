<?php
class ModelDetailsVehicleType extends Model {
	
    	public function getTotalvehicle($name) {
	
		$qry = $this->db->query("SELECT count(*) as count FROM `" . DB_PREFIX . "vehicle_type` WHERE vehicle_type_name='$name'");

		
			return $qry->row['count'];
		
	}
   
	public function getAllVehicleList($data = array()) {
      //echo "hello";die;
		$sql ="SELECT * FROM `" . DB_PREFIX . "vehicle_type` vt";

		if (!empty($data['filter_name'])) {
			$sql .= " WHERE vt.vehicle_type_name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
			$sql .= " WHERE vt.vehicle_type_price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}
		$sort_data = array(
			'vt.vehicle_type_name',
			'vt.vehicle_type_price',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY vt.vehicle_type_name";
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
			$sql ="SELECT COUNT(vehicle_type_id) AS total FROM `" . DB_PREFIX . "vehicle_type` vt";
           
		if (!empty($data['filter_name'])) {
			$sql .= " where vt.vehicle_type_name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

        if (!empty($data['filter_price'])) {
			$sql .= " where vt.vehicle_type_price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	public function addVehicle($data) {
      $this->db->query("INSERT INTO " . DB_PREFIX . "vehicle_type SET vehicle_type_name='".$data['name']."',vehicle_type_price=".$data['price']);
		
    }
    	
 public function editvehicleType($data,$id) {
      $name=$data['name'];
      $price=$data['price'];
         $query = $this->db->query("UPDATE  " . DB_PREFIX . "vehicle_type SET vehicle_type_name='$name',vehicle_type_price='$price' WHERE vehicle_type_id='$id'");
}
	
	public function delete($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "vehicle_type WHERE vehicle_type_id = '" . (int)$id . "'");
		
	}
}