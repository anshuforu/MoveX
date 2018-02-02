<?php
class ModelDetailsBookingAsigned extends Model {
	

	public function getAllAsignedList($data = array()) {
      //$data['customer_id'];
		$sql ="SELECT booking_assigned_id as asigned_id,booking_id as asigned_customer,telecaller_name,firstname FROM " . DB_PREFIX . "booking_assigned ta," . DB_PREFIX . "telecaller t," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "customer c where ta.telecaller_id=t.telecaller_id And ta.booking_id=bs.booking_status_id AND bs.customer_id=c.customer_id";
      // $query=$this->db->query("SELECT firstname FROM " . DB_PREFIX . "customer where customer_id='$id'");

	if (!empty($data['filter_name'])) {
			$sql .= " And booking_id LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " And telecaller_name LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " And firstname LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}
		$sort_data = array(
			'booking_id',
			'telecaller_name',
            'firstname',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY booking_assigned_id";
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
      //print_r($sql);die;

		$query = $this->db->query($sql);
         
		return $query->rows;
	}
	
	
	public function getTotalList($data = array()) {
				$sql ="SELECT count(booking_assigned_id) as total FROM " . DB_PREFIX . "booking_assigned ta," . DB_PREFIX . "telecaller t," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "customer c where ta.telecaller_id=t.telecaller_id And ta.booking_id=bs.booking_status_id AND bs.customer_id=c.customer_id";
           
if (!empty($data['filter_name'])) {
			$sql .= " And booking_id LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

        if (!empty($data['filter_address'])) {
			$sql .= " And t.telecaller_name LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
       if (!empty($data['filter_number'])) {
			$sql .= " And c.firstname LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		} 
        //print_r($sql);die;
		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	public function addDriver($data) {
      $this->db->query("INSERT INTO " . DB_PREFIX . "driver_management SET driver_name='".$data['name']."',driver_address='".$data['address']."',driver_number=".$data['number']);
		
    }
    public function getCustomerName($id)
    {
        $query=$this->db->query("SELECT firstname FROM " . DB_PREFIX . "customer where customer_id='$id'");
        return $query->row['firstname'];
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