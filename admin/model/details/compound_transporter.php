<?php
class ModelDetailsCompoundTransporter extends Model {
	
public function getAllAsignedList($data = array()) {
      //$data['customer_id'];
	
        $sql="SELECT vendor_name,sum(price_of_transpoter) as price,booking_id,transporter_id,sum(paid_payment) as paid FROM " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "payment p," . DB_PREFIX . "vendor v WHERE p.booking_id=bs.booking_status_id And bs.transporter_id=v.vendor_id";
       if (!empty($data['filter_transporter_id'])) {
			$sql .= " And transporter_id LIKE '%" . $this->db->escape($data['filter_transporter_id']) . "%'";
		}
         if (!empty($data['filter_transporter_name'])) {
			$sql .= " And vendor_name LIKE '%" . $this->db->escape($data['filter_transporter_name']) . "%'";
		}
       if (isset($data['filter_total']) && !is_null($data['filter_total'])) {
          $sql .= " And sum(price_of_transpoter)='" . $this->db->escape($data['filter_total']) . "'";
		}  
        
        if (isset($data['filter_total_paid']) && !is_null($data['filter_total_paid'])) {
          $sql .= " And sum(paid_payment)='" . $this->db->escape($data['filter_total_paid']) . "'";
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
			$sql .=  $data['sort'];
		} else {
			$sql .= " group by transporter_id";
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
     public function getTransporter()
    {
             $sql="SELECT transporter_id,sum(amount_calc) as pay_amount FROM " . DB_PREFIX . "booking_status GROUP By `transporter_id` ";
        $query = $this->db->query($sql);
         //print_r($query);die;
		return $query->rows;
    }
	public function getTotalList($data = array()) {
				$sql ="SELECT count(payment_id) as total FROM " . DB_PREFIX . "payment p," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "vendor v WHERE p.booking_id=bs.booking_status_id And bs.transporter_id=v.vendor_id";
           
	          
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
   
    public function getPaymentSave($all_data)
    {
   // print_r($all_data);
       
        $balance=$all_data['balance'];
         $amount=$all_data['amount'];
        $final_balace=$balance-$amount;
       
        $this->db->query("INSERT INTO " . DB_PREFIX . "new_payment SET  transporter_id='".$all_data['id']."', transporter_name='".$all_data['name']."', payment_date='".$all_data['date']."', payment_amount='". $amount."', balnace_amount='".$final_balace."', collected_by='".$all_data['collected_by']."', comment='".$all_data['comment']."', Receit_no=".$all_data['receipt_no']);
    }
    public function getCustomerName($id)
    {
        $query=$this->db->query("SELECT firstname FROM " . DB_PREFIX . "customer where customer_id='$id'");
        return $query->row['firstname'];
    }
    public function getTotalAllPayments()
    {
        $query=$this->db->query("SELECT  transporter_id, sum(payment_amount) as total FROM  " . DB_PREFIX . "new_payment group by transporter_id");
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