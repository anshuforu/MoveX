<?php
class ModelDetailsArea extends Model {
	
   public function addArea($data) {
        $query = $this->db->query("INSERT INTO  " . DB_PREFIX . "area(area_name) VALUES('".$data['name']."')");
    }

   public function getAreas($data = array()) {
		
		$sql ="SELECT  * FROM " . DB_PREFIX . "area";
 if (!empty($data['filter_name'])) {
			$sql .= " WHERE area_name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}
        
		$sort_data = array(
			'area_name',
			//'cmodel.car_model_name',
			//'csp.price',
		);
       

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY area_name";
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
      public function updateArea($data,$id) {
        $query = $this->db->query("UPDATE  " . DB_PREFIX . "area SET area_name='".$data['name']."' WHERE area_id='$id'");
    }
	 public function deleteArea($id) {
        $query = $this->db->query("DELETE FROM " . DB_PREFIX . "area WHERE area_id='$id'");
    }
    public function getTotalArea() {
		$query = $this->db->query("SELECT  count(*) as total FROM " . DB_PREFIX . "area");

		return $query->row['total'];
	}

}