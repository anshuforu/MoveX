<?php
class ModelDetailsarea extends Model {
	
   public function addarea($data) {
        $query = $this->db->query("INSERT INTO  " . DB_PREFIX . "area(area_name) VALUES('".$data['name']."')");
    }
     public function getTotalAreaCount($area_name) {
	
		$qry = $this->db->query("SELECT count(*) as count FROM `" . DB_PREFIX . "area` WHERE area_name='$area_name'");

		
			return $qry->row['count'];
		
	}

   public function getareas($data = array()) {
		
		$sql ="SELECT  * FROM " . DB_PREFIX . "area";

				$sort_data = array(
			'area_name',
			//'cmodel.car_model_name',
			//'csp.price',
		);
       	if (!empty($data['filter_area'])) {
			$sql .= " WHERE area_name LIKE '%" . $this->db->escape($data['filter_area']) . "%'";
		}


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
    public function getTotalList($data = array()) {
		$sql ="SELECT  count(area_id) as total FROM " . DB_PREFIX . "area";
           
		      	if (!empty($data['filter_area'])) {
			$sql .= " WHERE area_name LIKE '%" . $this->db->escape($data['filter_area']) . "%'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
      public function updatearea($data,$id) {
        $query = $this->db->query("UPDATE  " . DB_PREFIX . "area SET area_name='".$data['name']."' WHERE area_id='$id'");
    }
	 public function deletearea($id) {
        $query = $this->db->query("DELETE FROM " . DB_PREFIX . "area WHERE area_id='$id'");
          $this->db->query("DELETE FROM " . DB_PREFIX . "subarea WHERE area_id='$id'");
    }
    public function getTotalarea() {
		$query = $this->db->query("SELECT  count(*) as total FROM " . DB_PREFIX . "area");

		return $query->row['total'];
	}

}