<?php
class ModelDetailsCarmake extends Model {
	
   public function addCarmakes($data) {
        $query = $this->db->query("INSERT INTO  " . DB_PREFIX . "carmake(carmake_name) VALUES('".$data['name']."')");
    }
    
      public function getTotalMakeCount($make_name) {
	
		$qry = $this->db->query("SELECT count(*) as count FROM `" . DB_PREFIX . "carmake` WHERE carmake_name='$make_name'");

		
			return $qry->row['count'];
		
	}

   public function getCarmakes($data = array()) {
		
		$sql ="SELECT  * FROM " . DB_PREFIX . "carmake";

				$sort_data = array(
			'carmake_name',
			//'cmodel.car_model_name',
			//'csp.price',
		);
        if (!empty($data['filter_make'])) {
			$sql .= " WHERE carmake_name LIKE '%" . $this->db->escape($data['filter_make']) . "%'";
		}


		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY carmake_name";
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
      public function updateCarmake($data,$id) {
        $query = $this->db->query("UPDATE  " . DB_PREFIX . "carmake SET carmake_name='".$data['name']."' WHERE carmake_id='$id'");
    }
	 public function deleteCarmake($id) {
        $query = $this->db->query("DELETE FROM " . DB_PREFIX . "carmake WHERE carmake_id='$id'");
         $this->db->query("DELETE FROM " . DB_PREFIX . "carmodel WHERE carmake_id='$id'");
    }
    public function getTotalCarmake($data = array()) {
		$sql ="SELECT  count(carmake_id) as total FROM " . DB_PREFIX . "carmake";
           
		      	if (!empty($data['filter_make'])) {
			$sql .= " WHERE carmake_name LIKE '%" . $this->db->escape($data['filter_make']) . "%'";
		}
         
		$query = $this->db->query($sql);

		return $query->row['total'];
	}

}