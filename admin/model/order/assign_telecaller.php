<?php
class ModelOrderAssignTelecaller extends Model {
    	public function getBookingId() {
            
      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
		$query = $this->db->query("SELECT * from " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "customer c where bs.customer_id=c.customer_id");
            return $query->rows;

        }
    public function delete($id)
    {
       $this->db->query("DELETE FROM " . DB_PREFIX . "booking_assigned where booking_id='$id'");

         $this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET assigned_to_telecaller = 0 WHERE booking_status_id = '" . (int)$id . "'");

        
       //$this->db->query("UPDATE " . DB_PREFIX . "booking_status SET assigned_to_telecaller = 0 WHERE booking_status_id ='" . (int)$id . "'");

    }
    public function getTelecallers() {
            
      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "telecaller");
            return $query->rows;

        }
    public function insert($id,$telecaller_id,$date) {
    $da=date('Y-m-d',strtotime($date));
        $this->db->query("INSERT INTO " . DB_PREFIX . "booking_assigned SET booking_id=".$id.",date='".$da."',telecaller_id=".$telecaller_id);
            
        $this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET assigned_to_telecaller = 1,status='2' WHERE booking_status_id = '" . (int)$id . "'");
       // print_r($sql);die;
      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
	

        }
        public function update($id,$telecaller_id) {
$query = $this->db->query("UPDATE  " . DB_PREFIX . "booking_assigned SET telecaller_id=".$telecaller_id." WHERE booking_assigned_id='$id'");
            
        $this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET assigned_to_telecaller = 1 WHERE booking_status_id = '" . (int)$id . "'");
      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
	

        }
        public function bookingAssigned() {
      	$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "booking_assigned bs," . DB_PREFIX . "telecaller t WHERE bs.telecaller_id=t.telecaller_id");
            
             return $query->rows;


      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
	

        }
     public function getBookings($data = array()) {
		
		$sql ="SELECT  bst.status,t.telecaller_name,bs.booking_assigned_id,bst.form_address,bst.to_address,bst.customer_name,bst.assigned_to_transporter,bst.customer_mobile_no,bs.booking_id,t.telecaller_id FROM " . DB_PREFIX . "booking_assigned bs," . DB_PREFIX . "booking_status bst," . DB_PREFIX . "telecaller t," . DB_PREFIX . "customer c WHERE bs.telecaller_id=t.telecaller_id And bst.booking_status_id=bs.booking_id AND c.customer_id=bst.customer_id";

				$sort_data = array(
			't.telecaller_name',
			'bs.booking_assigned_id',
			//'csp.price',
		);
       	if (!empty($data['filter_name'])) {
			$sql .= " And t.telecaller_name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}
         
         if (!empty($data['filter_address'])) {
			$sql .= " And bs.booking_id LIKE '%" . $this->db->escape($data['filter_address']) . "%'";
		}

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY bs.booking_assigned_id";
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
       //  print_r($sql);die;
		$query = $this->db->query($sql);

		return $query->rows;
	}
}