<?php
class ModelDetailsVendor extends Model {
	

	public function getAllVendorList($data = array()) {
      //echo "hello";die;
		$sql ="SELECT * FROM `" . DB_PREFIX . "vendor` v";

		if (!empty($data['filter_name'])) {
			$sql .= " WHERE v.vendor_name LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (isset($data['filter_address']) && !is_null($data['filter_address'])) {
			$sql .= " WHERE v.vendor_address LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
          if (isset($data['filter_number']) && !is_null($data['filter_number'])) {
          $sql .= " WHERE v.vendor_number LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}
		$sort_data = array(
            'v.vendor_name',
			'v.vendor_name',
			'v.vendor_address',
            'v.vendor_number',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY v.vendor_id";
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
	
	
	public function getTotalList($data = array()) {
			$sql ="SELECT COUNT(vendor_id) AS total FROM `" . DB_PREFIX . "vendor` v";
           
		if (!empty($data['filter_name'])) {
			$sql .= " where v.vendor_name LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

        if (!empty($data['filter_address'])) {
			$sql .= " where v.vendor_address LIKE '" . $this->db->escape($data['filter_address']) . "%'";
		}
        
       if (!empty($data['filter_number'])) {
			$sql .= " where v.vendor_number LIKE '" . $this->db->escape($data['filter_number']) . "%'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	public function addVendor($data) {
     //   print_r($data);die;
      $this->db->query("INSERT INTO " . DB_PREFIX . "vendor SET vendor_name='".$data['name']."',vendor_address='".$data['address']."',email_id='".$data['email']."',company_name='".$data['company_name']."',vendor_number='".$data['number'] ."',alternate_number='".$data['alternate_number'] ."',margin='" .$data['margin'] ."'");
      
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
    
    
    public function getMargin($transport_id) {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "vendor` WHERE vendor_id=".(int)$transport_id);
        return $query->row;
    }
    public function getDefaultMargin() {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "config_margin`");
        return $query->row;
    }
     public function getSubArea($area_id) {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "subarea` WHERE area_id=".$area_id);
		return $query->rows;
    }
    
     public function getModel($make_id) {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "carmodel` WHERE carmake_id=".$make_id);
		return $query->row;
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
    $alternate_number=$data['alternate_number'];
     $margin=$data['margin'];
         $query = $this->db->query("UPDATE  " . DB_PREFIX . "vendor SET vendor_name='$name',vendor_address='$address',vendor_number='$number',alternate_number='$alternate_number',email_id='$email_id',company_name='$company_name',margin='$margin' WHERE vendor_id='$id'");
}
    
      public function getVehicles($transport_id) {
      $query=$this->db->query("SELECT * FROM `" . DB_PREFIX . "vehicle_description` WHERE transport_id=".$transport_id);
		return $query->rows;
    }
	
	public function delete($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "vendor WHERE vendor_id = '" . (int)$id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "vehicle_description WHERE transport_id = '" . (int)$id . "'");
		
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
    public function getTransportDetails($transport_id) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "vendor v WHERE vendor_id=".$transport_id);
 

			
		return ($query->row);
    }
    public function getVehicleDetails($transport_id) {
			$query = $this->db->query("SELECT vd.vehicle_no,vd.labour,vt.vehicle_type_name as vehicle_type,a.area_name,s.subarea_name,c.carmake_name,m.carmodel_name,vd.driver_name,vd.mobile_no,vd.licence_no,a.area_name,ci.city_name,vd.lorry,vd.insurance_due_date FROM  " . DB_PREFIX . "vehicle_description vd LEFT JOIN  " . DB_PREFIX . "area a ON vd.area=a.area_id LEFT JOIN  " . DB_PREFIX . "subarea s ON s.subarea_id=vd.sub_area LEFT JOIN  " . DB_PREFIX . "carmake c ON c.carmake_id=vd.make LEFT JOIN  " . DB_PREFIX . "carmodel m ON m.carmodel_id=vd.model LEFT JOIN  " . DB_PREFIX . "vehicle_type vt ON vt.vehicle_type_id=vd.vehicle_type LEFT JOIN ". DB_PREFIX . "city ci ON ci.city_id=vd.city  WHERE vd.transport_id=".$transport_id);

$transport = $query->rows;

			
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