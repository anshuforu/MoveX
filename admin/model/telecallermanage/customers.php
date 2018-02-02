<?php
class ModelOrderCustomers extends Model {
    public function getServiceCenterId($user_id) {
		$query = $this->db->query("SELECT id FROM " . DB_PREFIX . "service_center WHERE user_id='$user_id'");

		return $query->row['id'];
	}
    public function getTotalCustomers($service_center_id) {
		$query = $this->db->query("SELECT COUNT(customer_id) as total FROM " . DB_PREFIX . "car_servicing WHERE servicing_center_id='$service_center_id'");

		return $query->row['total'];
	}

}