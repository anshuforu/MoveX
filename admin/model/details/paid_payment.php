<?php
class ModelDetailsPaidPayment extends Model {
	

	public function getAllDriverList($data = array()) {
      //echo "hello";die;
		$sql ="SELECT p.paid_payment,p.balance_payment,p.booking_id,vendor_name,vendor_id from " . DB_PREFIX . "payment p," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "vendor v WHERE p.booking_id=bs.booking_status_id And bs.transporter_id=v.vendor_id";

		if (!empty($data['filter_booking_id'])) {
			$sql .= " And p.booking_id LIKE '%" . $this->db->escape($data['filter_booking_id']) . "%'";
		}

			if (!empty($data['filter_transpoter'])) {
			$sql .= " And vendor_name LIKE '%" . $this->db->escape($data['filter_transpoter']) . "%'";
		}
        
         	if (!empty($data['filter_paid_payment'])) {
			$sql .= " And p.paid_payment LIKE '%" . $this->db->escape($data['filter_booking_id']) . "%'";
		}
        	if (!empty($data['filter_balance_amount'])) {
			$sql .= " And p.balance_payment LIKE '%" . $this->db->escape($data['filter_balance_amount']) . "%'";
		}
		$sort_data = array(
			'p.booking_id',
			'vendor_name',
            'p.paid_payment',
            'p.balance_payment',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY p.booking_id";
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
			$sql ="SELECT count(payment_id) as total from " . DB_PREFIX . "payment p," . DB_PREFIX . "booking_status bs," . DB_PREFIX . "vendor v WHERE p.booking_id=bs.booking_status_id And bs.transporter_id=v.vendor_id";
           
			if (!empty($data['filter_booking_id'])) {
			$sql .= " AND p.booking_id LIKE '%" . $this->db->escape($data['filter_booking_id']) . "%'";
		}

			if (!empty($data['filter_transpoter'])) {
			$sql .= " AND vendor_name LIKE '%" . $this->db->escape($data['filter_transpoter']) . "%'";
		}
        
         	if (!empty($data['filter_paid_payment'])) {
			$sql .= " AND p.paid_payment LIKE '%" . $this->db->escape($data['filter_booking_id']) . "%'";
		}
        	if (!empty($data['filter_balance_amount'])) {
			$sql .= " AND p.balance_payment LIKE '%" . $this->db->escape($data['filter_balance_amount']) . "%'";
		}
         //print_r($sql);die;
		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	
}