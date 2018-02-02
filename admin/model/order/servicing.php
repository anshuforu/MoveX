<?php
class ModelOrderServicing extends Model {
    public function getServiceCenterId($user_id) {
		$query = $this->db->query("SELECT id FROM " . DB_PREFIX . "service_center WHERE user_id='$user_id'");

		return $query->row['id'];
	}
    public function getTotalServicing($service_center_id) {
		$query = $this->db->query("SELECT COUNT(car_servicing_id) as total FROM " . DB_PREFIX . "car_servicing WHERE servicing_center_id='$service_center_id'");

		return $query->row['total'];
	}

}