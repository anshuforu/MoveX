<?php
class ModelDetailsNotbookingAsigned extends Model {
	

	public function getAllAsignedList($data = array()) {
      //$data['customer_id'];
		$sql ="SELECT booking_status_id,bs.customer_name,delivering_time,customer_mobile_no,form_address,to_address FROM " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "customer c where booking_status_id NOT IN(SELECT booking_id from " . DB_PREFIX . "booking_assigned) And bs.customer_id=c.customer_id";
      // $query=$this->db->query("SELECT firstname FROM " . DB_PREFIX . "customer where customer_id='$id'");

	if (!empty($data['filter_name'])) {
			$sql .= " And bs.booking_status_id LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " And c.firstname LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " And bs.delivering_time LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}
		$sort_data = array(
			'bs.booking_status_id',
			'c.firstname',
            'bs.delivering_time',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY bs.booking_status_id";
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
		$sql ="SELECT count(booking_status_id) as total FROM " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "customer c where booking_status_id NOT IN(SELECT booking_id from " . DB_PREFIX . "booking_assigned) And bs.customer_id=c.customer_id";
           
	if (!empty($data['filter_name'])) {
			$sql .= " And bs.booking_status_id LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " And c.firstname LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " And bs.delivering_time LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	public function addDriver($data) {
      $this->db->query("INSERT INTO " . DB_PREFIX . "driver_management SET driver_name='".$data['name']."',driver_address='".$data['address']."',driver_number=".$data['number']);
		
    }	
    public function AsignTelecaller($telecaller,$book_id) {
        $date=date('Y-m-d');
   $this->db->query("INSERT INTO " . DB_PREFIX . "booking_assigned SET telecaller_id='$telecaller',booking_id='$book_id',date='$date'");
   $this->db->query("UPDATE " . DB_PREFIX . "booking_status SET assigned_to_telecaller='1' where booking_status_id='$book_id'");
          $this->db->query("UPDATE " . DB_PREFIX . "booking_status SET status='2' where booking_status_id='$book_id'");
  }
    public function getCustomerName($id)
    {
        $query=$this->db->query("SELECT firstname FROM " . DB_PREFIX . "customer where customer_id='$id'");
        return $query->row['firstname'];
    }  
      public function getTelecallerName($id)
    {
        $query=$this->db->query("SELECT telecaller_name FROM " . DB_PREFIX . "telecaller where telecaller_id='$id'");
        return $query->row['telecaller_name'];
    }  
public function getTelecallers()
    {
        $query=$this->db->query("SELECT telecaller_id,telecaller_name FROM " . DB_PREFIX . "telecaller");
        return $query->rows;
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