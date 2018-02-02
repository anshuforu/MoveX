<?php
class ModelDetailsTransporterVehicle extends Model {
	

	public function getAllDriverList($data = array()) {
      //echo "hello";die;
		$sql ="SELECT * FROM hl_vehicle_description vd,hl_vendor v,hl_vehicle_type vt,hl_zone where vd.transport_id=v.vendor_id And vd.vehicle_type=vt.vehicle_type_id And hl_zone.zone_id=vd.city";

	/*	if (!empty($data['filter_name'])) {
			$sql .= " WHERE dm.driver_name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " WHERE dm.driver_address LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " WHERE dm.driver_number LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}
		$sort_data = array(
			'dm.driver_name',
			'dm.driver_address',
            'dm.driver_number',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY dm.	driver_name";
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
		} */

		$query = $this->db->query($sql);
         
		return $query->rows;
	}
	
	
	public function getTotalList($data = array()) {
			$sql ="SELECT COUNT(driver_id) AS total FROM `" . DB_PREFIX . "driver_management` dm";
           
		if (!empty($data['filter_name'])) {
			$sql .= " where dm.driver_name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

        if (!empty($data['filter_address'])) {
			$sql .= " where dm.driver_address LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
       if (!empty($data['filter_number'])) {
			$sql .= " where dm.driver_number LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	public function addDriver($data) {
      $this->db->query("INSERT INTO " . DB_PREFIX . "driver_management SET driver_name='".$data['name']."',driver_address='".$data['address']."',driver_number=".$data['number']);
		
    }
    
 public function editDriver($data,$id) {
      $name=$data['name'];
      $address=$data['address'];
      $number=$data['number'];
         $query = $this->db->query("UPDATE  " . DB_PREFIX . "driver_management SET driver_name='$name',driver_address='$address',driver_number='$number' WHERE driver_id='$id'");
}
	
	public function delete($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "driver_management WHERE driver_id = '" . (int)$id . "'");
		
	}
}