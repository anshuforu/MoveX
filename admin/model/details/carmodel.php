<?php
class ModelDetailsCarmodel extends Model {
	
   public function addCarmodel($data) {
    
       
         if (isset($data['carmodel'])) {
            
			foreach ($data['carmodel'] as $carmodel) {

         $this->db->query("INSERT INTO  " . DB_PREFIX . "carmodel(carmodel_name,carmake_id) VALUES('".$carmodel['car_model']."','".$data['carmake']."')");

    }
        }
    }
    
    public function getTotalModelCount($make_id,$model) {
	
		$qry = $this->db->query("SELECT count(*) as count FROM `" . DB_PREFIX . "carmodel` WHERE carmake_id='$make_id' AND carmodel_name='$model'");

		
			return $qry->row['count'];
		
	}

   public function getCarmodels($data = array()) {
		
		$sql ="SELECT  * FROM " . DB_PREFIX . "carmodel cmo LEFT JOIN " . DB_PREFIX . "carmake cm on cmo.carmake_id=cm.carmake_id";
       $sort_data = array(
			'carmodel_name',
			//'cmodel.car_model_name',
			//'csp.price',
		);
       
            if (!empty($data['filter_model'])) {
			$sql .= " WHERE carmodel_name LIKE '%" . $this->db->escape($data['filter_model']) . "%'";
		}
       if (!empty($data['filter_make'])) {
			$sql .= " WHERE carmake_name LIKE '%" . $this->db->escape($data['filter_make']) . "%'";
		}
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY carmodel_name";
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
      public function updateCarmodel($data,$id) {
   
        $query = $this->db->query("UPDATE  " . DB_PREFIX . "carmodel SET carmodel_name='".$data['subarea']."' WHERE carmodel_id='$id'");
    }
	public function deleteCarmodel($id) {
        $query = $this->db->query("DELETE FROM " . DB_PREFIX . "carmodel WHERE carmodel_id='$id'");
    }
     public function getTotalCarmodel() {
		$sql=("SELECT  count(*) as total FROM " . DB_PREFIX . "carmodel");
            	if (!empty($data['filter_model'])) {
			$sql .= " WHERE carmodel_name LIKE '%" . $this->db->escape($data['filter_model']) . "%'";
		}
         
		$query = $this->db->query($sql);

		return $query->row['total'];

	}
     public function getCarmakes() {
		
		$sql ="SELECT  * FROM " . DB_PREFIX . "carmake";
       
		$query = $this->db->query($sql);

		return $query->rows;
	}
    

}