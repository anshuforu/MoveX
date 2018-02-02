<?php
class ModelOrderAssignTransporter extends Model {
    	public function getBookingId() {
            
      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "booking_status");
            return $query->rows;

        }
    public function getTelecallers() {
            
      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "telecaller");
            return $query->rows;

        }
    public function insert($id,$data) {
        $this->db->query("INSERT INTO " . DB_PREFIX . "booking_transporter_assigned SET booking_id=".$id.",transporter_id=".$data['transport_id'].",driver_name='".$data['driver']."',licence_no=".$data['licence_no'].",mobile_no=".$data['mobile_no'].",vehicle_type='".$data['vehicle_type']."',transporter_address='".$data['address']."'");
            
        $this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET assigned_to_transporter = 1 WHERE booking_status_id = '" . (int)$id . "'");
      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
	

        }
        public function bookingAssigned() {
      	$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "booking_assigned bs," . DB_PREFIX . "telecaller t WHERE bs.telecaller_id=t.telecaller_id");
             return $query->rows;


      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
	

        }
}