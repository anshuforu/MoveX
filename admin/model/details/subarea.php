<?php
class ModelDetailsSubArea extends Model {
	
   public function addSubArea($data) {
    
      
         if (isset($data['subarea'])) {
            
			foreach ($data['subarea'] as $subarea) {

         $this->db->query("INSERT INTO  " . DB_PREFIX . "subarea(subarea_name,area_id) VALUES('".$subarea['sub_area']."','".$data['area']."')");

    }
        }
    }
    public function getTotalSubAreaCount($area_id,$subarea) {
	
		$qry = $this->db->query("SELECT count(*) as count FROM `" . DB_PREFIX . "subarea` WHERE area_id='$area_id' AND subarea_name='$subarea'");

		
			return $qry->row['count'];
		
	}

        public function getTotalList($data = array()) {
		$sql ="SELECT  count(subarea_id) as total FROM " . DB_PREFIX . "subarea";
           
		      	if (!empty($data['filter_subarea'])) {
			$sql .= " WHERE subarea_name LIKE '%" . $this->db->escape($data['filter_subarea']) . "%'";
		}
         
		$query = $this->db->query($sql);

		return $query->row['total'];
	}

   public function getSubAreas($data = array()) {
		
		$sql ="SELECT  * FROM " . DB_PREFIX . "subarea sa LEFT JOIN " . DB_PREFIX . "area a on sa.area_id=a.area_id";
       $sort_data = array(
			'subarea_name',
			//'cmodel.car_model_name',
			//'csp.price',
		);
           	if (!empty($data['filter_subarea'])) {
			$sql .= " WHERE subarea_name LIKE '%" . $this->db->escape($data['filter_subarea']) . "%'";
		}
        	if (!empty($data['filter_area'])) {
			$sql .= " WHERE area_name LIKE '%" . $this->db->escape($data['filter_area']) . "%'";
		}

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY subarea_name";
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
		//print_r($sql);die;
		$query = $this->db->query($sql);

		return $query->rows;
	}
      public function updateSubArea($data,$id) {
         // print_r($data);die;
        $query = $this->db->query("UPDATE  " . DB_PREFIX . "subarea SET subarea_name='".$data['subarea']."' WHERE subarea_id='$id'");
         // print_r($query);die;
    }
	public function deleteSubArea($id) {
        $query = $this->db->query("DELETE FROM " . DB_PREFIX . "subarea WHERE subarea_id='$id'");
    }
     public function getTotalSubArea() {
		$query = $this->db->query("SELECT  count(*) as total FROM " . DB_PREFIX . "subarea");

		return $query->row['total'];
	}
     public function getAreas() {
		
		$sql ="SELECT  * FROM " . DB_PREFIX . "area";
       
		$query = $this->db->query($sql);

		return $query->rows;
	}
  public function select($id)
  {
    $query = $this->db->query("SELECT count(*) as total FROM " . DB_PREFIX . "subarea where area_id='$id'");
    		return $query->row['total'];

  }
    

}