<?php
class ModelDetailsBookingAsignedtran extends Model {
	

	public function getAllAsignedList($data = array(),$user_id) {
      //$data['customer_id'];
		$sql ="SELECT ba.booking_id,booking_status_id,vendor_name,firstname,vehicle_no,driver_name,licence_no,city,name,mobile_no,vehicle,area,subarea,transporter_id,make,model,lorry,insurance_due_date FROM " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "customer c," . DB_PREFIX . "vendor v," . DB_PREFIX . "order_status os," . DB_PREFIX . "booking_assigned ba," . DB_PREFIX . "telecaller t where ba.booking_id=bs.booking_status_id AND bs.customer_id=c.customer_id And bs.transporter_id=v.vendor_id AND bs.status=os.order_status_id AND bs.status!=5 AND ba.telecaller_id=t.telecaller_id AND t.user_id=".$user_id;
      // $query=$this->db->query("SELECT firstname FROM " . DB_PREFIX . "customer where customer_id='$id'");

	if (!empty($data['filter_name'])) {
			$sql .= " And booking_status_id  LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " And v.vendor_name LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " And c.firstname LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}
		$sort_data = array(
			'ta.asigned_customer',
			'v.vendor_name',
            'c.firstname',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY booking_status_id";
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
	
	
	public function getTotalList($data = array(),$user_id) {
		$sql ="SELECT count(t.telecaller_id) as total FROM " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "booking_assigned ba," . DB_PREFIX . "telecaller t where bs.booking_status_id=ba.booking_id AND t.telecaller_id=ba.telecaller_id AND bs.assigned_to_transporter!=0 AND bs.status!=5 AND t.user_id=".$user_id;
      // $query=$this->db->query("SELECT firstname FROM " . DB_PREFIX . "customer where customer_id='$id'");

	if (!empty($data['filter_name'])) {
			$sql .= " And booking_status_id LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " And v.vendor_name LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " And c.firstname LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}
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
    public function viewdata($id) {
        //echo $id;die;

		$query=$this->db->query("SELECT d.device_name, bs.booking_status_id,bs.labour,bs.customer_id,bs.customer_name,bs.form_address,bs.to_address,v.vendor_name,vt.vehicle_type_name,bs.vehicle_no,bs.distance,bs.distance_price,bs.state,bs.city,bs.pin,bs.exact_address,a.area_name,bs.labour_count,sa.subarea_name,bs.driver_city,bs.lorry,vt.vehicle_type_name,bs.make,bs.model,bs.driver_name,bs.mobile_no,bs.customer_mobile_no,bs.licence_no,bs.amount_calc,bs.assigned_to_telecaller,bs.assigned_to_transporter,bs.booking_time,bs.delivering_time,c.firstname,bs.status FROM " . DB_PREFIX . "booking_status bs LEFT JOIN  " . DB_PREFIX . "vendor v on bs.transporter_id=v.vendor_id LEFT JOIN " . DB_PREFIX . "area a on a.area_id=bs.area LEFT JOIN " . DB_PREFIX . "subarea sa on sa.subarea_id=bs.subarea LEFT JOIN " . DB_PREFIX . "vehicle_type vt ON bs.vehicle=vt.vehicle_type_id LEFT JOIN " . DB_PREFIX . "customer c  ON c.customer_id=bs.customer_id LEFT JOIN " . DB_PREFIX . "device d ON bs.device=d.id where bs.booking_status_id='$id'");
		return $query->rows;
	}
       public function viewpayment($id) {
        //echo $id;die;
		$query=$this->db->query("SELECT *,sum(paid_payment) as total FROM " .DB_PREFIX . "payment where booking_id='$id'");
		return $query->row;
	}
}