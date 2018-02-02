<?php
class ModelBookingBooking extends Model {
	

	public function getAllAsignedList($data = array()) {
      //echo "hello";die;
		$sql ="SELECT asigned_id,asigned_telecaller,asigned_customer,bs.customer_id as customer_id,form_address,to_address,distance,total_price,delivering_time,telephone FROM " . DB_PREFIX . "telecaller_asigned ta," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "total_booking_price tbp," . DB_PREFIX . "customer c where ta.asigned_customer=bs.booking_status_id And ta.asigned_customer=tbp.order_id And c.customer_id=bs.customer_id";

		/*if (!empty($data['filter_name'])) {
			$sql .= " WHERE v.vendor_name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " WHERE v.vendor_address LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " WHERE v.vendor_number LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}
		$sort_data = array(
			'v.vendor_name',
			'v.vendor_address',
            'v.vendor_number',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY v.	vendor_name";
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
			$sql ="SELECT COUNT(vendor_id) AS total FROM " . DB_PREFIX . "telecaller_asigned ta," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "total_booking_price tbp," . DB_PREFIX . "customer c where ta.asigned_customer=bs.booking_status_id And ta.asigned_customer=tbp.order_id And c.customer_id=bs.customer_id";
           
	/*	if (!empty($data['filter_name'])) {
			$sql .= " where v.vendor_name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

        if (!empty($data['filter_address'])) {
			$sql .= " where v.vendor_address LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
       if (!empty($data['filter_number'])) {
			$sql .= " where v.vendor_number LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}*/

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	public function addVendor($data) {
      
      $this->db->query("INSERT INTO " . DB_PREFIX . "vendor SET vendor_name='".$data['name']."',vendor_address='".$data['address']."',email_id='".$data['email']."',vendor_number=".$data['number']);
          if (isset($data['vendor'])) {
			foreach ($data['vendor'] as $vendor) {
          $this->db->query("INSERT INTO " . DB_PREFIX . "vehicle_type SET licence='".$vendor['licence_no']."',vehicle_type_price=".$data['price']);
		
    }
        }
    }
    
 public function editVendor($data,$id) {
      $name=$data['name'];
      $address=$data['address'];
      $number=$data['number'];
         $query = $this->db->query("UPDATE  " . DB_PREFIX . "vendor SET vendor_name='$name',vendor_address='$address',vendor_number='$number' WHERE vendor_id='$id'");
}
	
	public function delete($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "vendor WHERE vendor_id = '" . (int)$id . "'");
		
	}
    	public function getZone() {

			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone");

			$zone_data = $query->rows;

			
		return $zone_data;
	}
}