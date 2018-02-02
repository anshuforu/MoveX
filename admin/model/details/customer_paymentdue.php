<?php
class ModelDetailsCustomerPaymentdue extends Model {
	

	public function getAllAsignedList($data = array()) {
      //$data['customer_id'];
	//	$sql ="SELECT price_of_transpoter,amount_calc,paid_payment,balance_payment,booking_id FROM " . DB_PREFIX . "payment p," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "vendor v WHERE p.booking_id=bs.booking_status_id And bs.transporter_id=v.vendor_id";
      //  $sql="SELECT booking_id,price_of_transpoter,amount_calc,sum(paid_payment) as paid_payment,Min(p.balance_payment) as  balance_payment FROM " . DB_PREFIX . "payment p," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "vendor v WHERE p.booking_id=bs.booking_status_id And bs.transporter_id=v.vendor_id group by booking_id";
        $sql="SELECT booking_id,firstname,lastname,price_of_transpoter,amount_calc,sum(paid_payment) as paid_payment,Min(p.balance_payment) as  balance_payment FROM " . DB_PREFIX . "payment p," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "vendor v," . DB_PREFIX . "customer c WHERE p.booking_id=bs.booking_status_id And bs.transporter_id=v.vendor_id  AND bs.customer_id=c.customer_id ";
      // $query=$this->db->query("SELECT firstname FROM " . DB_PREFIX . "customer where customer_id='$id'");
  
       if (!empty($data['filter_booking_id'])) {
			$sql .= " And booking_id LIKE '%" . $this->db->escape($data['filter_booking_id']) . "%'";
		}
         
        
      if (isset($data['filter_customer_name']) && !is_null($data['filter_customer_name'])) {
          $sql .= " And firstname LIKE '" . $this->db->escape($data['filter_customer_name']) . "%'";
		} 

      if (isset($data['filter_total_balance']) && !is_null($data['filter_total_balance'])) {
          $sql .= " And balance_payment LIKE '" . $this->db->escape($data['filter_total_balance']) . "%'";
		}   
        if (isset($data['filter_total_amu']) && !is_null($data['filter_total_amu'])) {
          $sql .= " And price_of_transpoter LIKE '" . $this->db->escape($data['filter_total_amu']) . "%'";
		}   
        if (isset($data['filter_total_paid']) && !is_null($data['filter_total_paid'])) {
          $sql .= " And paid_payment LIKE '" . $this->db->escape($data['filter_total_paid']) . "%'";
		} 
        if (isset($data['filter_margin_amount']) && !is_null($data['filter_margin_amount'])) {
          $sql .= " And amount_calc LIKE '" . $this->db->escape($data['filter_margin_amount']) . "%'";
		}
		$sort_data = array(
			'booking_id',
			'balance_payment',
            'amount_calc',
            'paid_payment',
            'price_of_transpoter',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= "ORDER BY payment_id";
		} else {
			$sql .= "group by booking_id ORDER BY payment_id";
		}
       

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " ASC";
		} else {
			$sql .= " DESC";
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
         //print_r($query);die;
		return $query->rows;
	}
	
	
	public function getTotalList($data = array()) {
				$sql ="SELECT count(p.booking_id) as total FROM " . DB_PREFIX . "payment p," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "vendor v WHERE p.booking_id=bs.booking_status_id And bs.transporter_id=v.vendor_id";
           
	  if (!empty($data['filter_booking_id'])) {
			$sql .= " And booking_id LIKE '%" . $this->db->escape($data['filter_booking_id']) . "%'";
		}

      if (isset($data['filter_total_balance']) && !is_null($data['filter_total_balance'])) {
          $sql .= " And balance_payment LIKE '" . $this->db->escape($data['filter_total_balance']) . "%'";
		}   
        if (isset($data['filter_total_amu']) && !is_null($data['filter_total_amu'])) {
          $sql .= " And price_of_transpoter LIKE '" . $this->db->escape($data['filter_total_amu']) . "%'";
		}   
        if (isset($data['filter_total_paid']) && !is_null($data['filter_total_paid'])) {
          $sql .= " And paid_payment LIKE '" . $this->db->escape($data['filter_total_paid']) . "%'";
		} 
        if (isset($data['filter_margin_amount']) && !is_null($data['filter_margin_amount'])) {
          $sql .= " And amount_calc LIKE '" . $this->db->escape($data['filter_margin_amount']) . "%'";
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
}