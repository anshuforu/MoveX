<?php
class ModelDetailsVehicleDescription extends Model {
	

	public function getAllVehicleList($data = array()) {
      //echo "hello";die;
		$sql ="SELECT * FROM `" . DB_PREFIX . "vehicle_description` v,`" . DB_PREFIX . "vehicle_type` vt,`" . DB_PREFIX . "area` a,`" . DB_PREFIX . "subarea` s,`" . DB_PREFIX . "city` c,`" . DB_PREFIX . "carmake` ck,`" . DB_PREFIX . "carmodel` cm,`" . DB_PREFIX . "vendor` ve Where vt.vehicle_type_id=v.vehicle_type AND a.area_id=v.area AND s.subarea_id=v.sub_area AND c.city_id=v.city AND ck.carmake_id=v.make AND cm.carmodel_id=v.model AND ve.vendor_id=v.transport_id";
        	if (!empty($data['filter_name'])) {
			$sql .= " AND ve.vendor_name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}
        
        if (!empty($data['filter_vehicle_no'])) {
			$sql .= " AND v.vehicle_no LIKE '%" . $this->db->escape($data['filter_vehicle_no']) . "%'";
		}
        
        if (!empty($data['filter_vehicle_type'])) {
			$sql .= " AND vt.vehicle_type_name LIKE '%" . $this->db->escape($data['filter_vehicle_type']) . "%'";
		}
        
          if (!empty($data['filter_area'])) {
			$sql .= " AND a.area_name LIKE '%" . $this->db->escape($data['filter_area']) . "%'";
		}
        
          if (!empty($data['filter_subarea'])) {
			$sql .= " AND s.subarea_name LIKE '%" . $this->db->escape($data['filter_subarea']) . "%'";
		}
        
         if (!empty($data['filter_city'])) {
			$sql .= " AND c.city_name LIKE '%" . $this->db->escape($data['filter_city']) . "%'";
		}
        
          if (!empty($data['filter_make'])) {
			$sql .= " AND ck.carmake_name LIKE '%" . $this->db->escape($data['filter_make']) . "%'";
		}
          if (!empty($data['filter_model'])) {
			$sql .= " AND cm.carmodel_name LIKE '%" . $this->db->escape($data['filter_model']) . "%'";
		}
        
        $sort_data = array(
            'v.transport_id',
			've.vendor_name',
            'v.vehicle_no',
			'v.vehicle_type',
            'ck.carmake_name',
            'cm.carmodel_name',
            'a.area_name',
            's.subarea_name',
            'c.city_name'
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY v.vehicle_description_id";
		}
       

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " ASC";
		} else {
			$sql .= " DESC";
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
     public function getSub($id) {
		$qry = $this->db->query("SELECT DISTINCT(s.subarea_name),s.subarea_id FROM " . DB_PREFIX . "area a," . DB_PREFIX . "subarea s WHERE a.area_id=s.area_id AND a.area_id=".$id);

		
			return $qry->rows;
		
	}
     public function getMod($id) {
		$qry = $this->db->query("SELECT DISTINCT(c.carmodel_name),c.carmodel_id FROM " . DB_PREFIX . "carmake m," . DB_PREFIX . "carmodel c WHERE m.carmake_id=c.carmake_id AND m.carmake_id=".$id);

		
			return $qry->rows;
		
	}
	public function getTotalVehicleList() {
			$sql ="SELECT COUNT(vehicle_description_id) AS total FROM `" . DB_PREFIX . "vehicle_description` ";
           
		$query = $this->db->query($sql);

		return $query->row['total'];
	}
    public function delete($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "vehicle_description WHERE vehicle_description_id = '" . (int)$id . "'");
		
	}
	public function addVehicleDescription($data) {
     //  print_r($data);die;
              
          $query=$this->db->query("INSERT INTO " . DB_PREFIX . "vehicle_description SET area='".$data['area']."',insurance_due_date='".$data['insurance_due_date']."',sub_area='".$data['subarea']."',make='".$data['make']."',model='".$data['model']."',city='".$data['city']."',lorry='".$data['lorry']."',vehicle_no='".$data['vehicle_no']."',vehicle_type='".$data['vehicle_type']."',driver_name='".$data['driver_name']."',mobile_no=".$data['mobile_no'].",licence_no='".$data['licence_no']."',labour='".$data['labour']."',transport_id=".$data['transport_id']);
 }
    
    	public function editVehicleDescription($data,$description_id) {
      //print_r($description_id);die;
              
          $query = $this->db->query("UPDATE  " . DB_PREFIX . "vehicle_description SET transport_id='".$data['transport_id']."',vehicle_no='".$data['vehicle_no']."',vehicle_type='".$data['vehicle_type']."',make='".$data['make']."',model='".$data['model']."',labour='".$data['labour']."',city='".$data['city']."',area='".$data['area']."',sub_area='".$data['subarea']."',lorry='".$data['lorry']."',driver_name='".$data['driver_name']."',insurance_due_date='".$data['insurance_due_date']."',mobile_no='".$data['mobile_no']."',licence_no='".$data['licence_no']."' WHERE vehicle_description_id='$description_id'");
 }

    
     public function getVehicleType() {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "vehicle_type`");
		return $query->rows;
    }
      public function getMake() {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "carmake`");
		return $query->rows;
    }
      public function getModels() {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "carmodel`");
		return $query->rows;
    }
    
        public function getSubareas() {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "subarea`");
		return $query->rows;
    }
    
       public function getCities() {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "city`");
		return $query->rows;
    }
    
    
    public function getMargin() {
      $query=$this->db->query("SELECT margin FROM `" . DB_PREFIX . "config_margin`");
		return $query->row['margin'];
    }
     public function getSubArea($area_id) {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "subarea` WHERE area_id=".$area_id);
		return $query->rows;
    }
    
     public function getModel($make_id) {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "carmodel` WHERE carmake_id=".$make_id);
		return $query->rows;
    }
    public function getTotalVehicles($data) {
     
        $vehicle_no=isset($data['vendor'][0]['vehicle_no'])?$data['vendor'][0]['vehicle_no']:"";
         $carmake_id=isset($data['vendor'][0]['make'])?$data['vendor'][0]['make']:"";
         $carmodel_id=isset($data['vendor'][0]['model'])?$data['vendor'][0]['model']:"";
         $insurance_due_date=isset($data['vendor'][0]['insurance_due_date'])?$data['vendor'][0]['insurance_due_date']:"";
           $driver_name=isset($data['vendor'][0]['driver_name'])?$data['vendor'][0]['insurance_due_date']:"";
         $mobile_no=isset($data['vendor'][0]['mobile_no'])?$data['vendor'][0]['mobile_no']:"";
           $licence_no=isset($data['vendor'][0]['licence_no'])?$data['vendor'][0]['licence_no']:"";
                   $labour=isset($data['vendor'][0]['labour'])?$data['vendor'][0]['labour']:"";
         $area=isset($data['vendor'][0]['area'])?$data['vendor'][0]['area']:"";
              $subarea=isset($data['vendor'][0]['subarea'])?$data['vendor'][0]['subarea']:"";
         $city=isset($data['vendor'][0]['city'])?$data['vendor'][0]['city']:"";
         $type=isset($data['vendor'][0]['type'])?$data['vendor'][0]['type']:"";
        
       
	if($vehicle_no=="" || $carmake_id=="" || $carmodel_id=="" || $insurance_due_date=="" || $driver_name=="" || $mobile_no=="" || $licence_no=="" || $labour=="" || $area=="" || $subarea=="" || $city=="" || $type=="")
    {
        return 0;
    }
        else return 1;
        
		
	}
    
    
 public function editVendor($data,$id) {
      $name=$data['name'];
      $address=$data['address'];
      $number=$data['number'];
     $email_id=$data['email'];
     $company_name=$data['company_name'];
         $query = $this->db->query("UPDATE  " . DB_PREFIX . "vendor SET vendor_name='$name',vendor_address='$address',vendor_number='$number',email_id='$email_id',company_name='$company_name' WHERE vendor_id='$id'");
}
    
      public function getVehicles($transport_id) {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "vehicle_description` WHERE transport_id=".$transport_id);
		return $query->rows;
    }
	public function getdriver() {
		$query=$this->db->query("select * FROM " . DB_PREFIX . "driver_management");
		return $query->rows;
	}	
    public function getdriverdesc() {
		$query=$this->db->query("select * FROM " . DB_PREFIX . "driver_management");
		return $query->rows;
	}	
  
    	public function getZone() {

			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "city");

			$zone_data = $query->rows;

			
		return $zone_data;
	}
    public function getArea() {

			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "area");

			$area_data = $query->rows;

			
		return $area_data;
	}
        public function getVendor() {

			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "vendor");

			$area_data = $query->rows;

			
		return $area_data;
	}
    public function getTransportDetails($transport_id) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "vendor v WHERE vendor_id=".$transport_id);
 

			
		return ($query->row);
    }
    public function getVehicleDetails($description_id) {
			$query = $this->db->query("SELECT vd.vehicle_no,vd.labour,vt.vehicle_type_name as vehicle_type,vd.transport_id,a.area_name,s.subarea_name,c.carmake_name,m.carmodel_name,vd.driver_name,vd.mobile_no,vd.licence_no,a.area_name,ci.city_name,vd.lorry,vd.insurance_due_date FROM  " . DB_PREFIX . "vehicle_description vd LEFT JOIN  " . DB_PREFIX . "area a ON vd.area=a.area_id LEFT JOIN  " . DB_PREFIX . "subarea s ON s.subarea_id=vd.sub_area LEFT JOIN  " . DB_PREFIX . "carmake c ON c.carmake_id=vd.make LEFT JOIN  " . DB_PREFIX . "carmodel m ON m.carmodel_id=vd.model LEFT JOIN  " . DB_PREFIX . "vehicle_type vt ON vt.vehicle_type_id=vd.vehicle_type LEFT JOIN ". DB_PREFIX . "city ci ON ci.city_id=vd.city  WHERE vd.vehicle_description_id=".$description_id);

$transport = $query->row;

			
		return $transport;
		
	}
        public function totalVehicles($transport_id) {

			$query = $this->db->query("SELECT count(*) as total FROM "  . DB_PREFIX . "vehicle_description  WHERE transport_id=".$transport_id);
			$transport = $query->row['total'];

			
		return $transport;
	}
    public function getVendors($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "vendor v";

		if (!empty($data['filter_name'])) {
			$sql .= " AND v.name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		
		
		$sql .= " GROUP BY v.vendor_id";

		
		$query = $this->db->query($sql);

		return $query->rows;
	}
}