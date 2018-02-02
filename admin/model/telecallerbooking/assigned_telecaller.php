<?php
class ModelTelecallerBookingAssignedTelecaller extends Model {
	public function getAllTransporters() {
	
		$qry = $this->db->query("SELECT * FROM " . DB_PREFIX . "vendor");

		
			return $qry->rows;
		
	}
       public function getAllMakes() {
	
		$qry = $this->db->query("SELECT * FROM " . DB_PREFIX . "carmake");

		
			return $qry->rows;
		
	}
       public function getAllModels() {
	
		$qry = $this->db->query("SELECT * FROM " . DB_PREFIX . "carmodel");

		
			return $qry->rows;
		
	}
    public function getAllAreas() {
	
		$qry = $this->db->query("SELECT * FROM " . DB_PREFIX . "area");

		
			return $qry->rows;
		
	}
     public function getAllSubAreas($area_id) {
	
		$qry = $this->db->query("SELECT * FROM " . DB_PREFIX . "subarea WHERE area_id=".$area_id);

		
			return $qry->rows;
		
	}
    public function getVehicleTypes() {
	
		$qry = $this->db->query("SELECT * FROM " . DB_PREFIX . "vehicle_type");

		
			return $qry->rows;
		
	}
public function getTransporter($id) {
	
		$qry = $this->db->query("SELECT vendor_id,vendor_name FROM " . DB_PREFIX . "vehicle_description vd," . DB_PREFIX . "vendor v where vehicle_type='$id' AND vd.transport_id=v.vendor_id");

		
			return $qry->rows;
		
	}
      
    /*public function getAllTransporters() {
	
		$qry = $this->db->query("SELECT * FROM " . DB_PREFIX . "vendor");

		
			return $qry->rows;
		
	}*/
	public function getVehicles($id) {
		$qry = $this->db->query("SELECT DISTINCT(v.vendor_name),v.vendor_id FROM " . DB_PREFIX . "vehicle_description vd," . DB_PREFIX . "vendor v WHERE vd.transport_id=v.vendor_id AND vd.vehicle_type=".$id);

		
			return $qry->rows;
		
	}
    public function getAreas($id) {
		$qry = $this->db->query("SELECT DISTINCT(a.area_name),a.area_id FROM " . DB_PREFIX . "vehicle_description vd," . DB_PREFIX . "area a WHERE vd.area=a.area_id AND vd.vehicle_type=".$id);

		
			return $qry->rows;
		
	}
     public function getSubAreas($id) {
		$qry = $this->db->query("SELECT DISTINCT(s.subarea_name),s.subarea_id FROM " . DB_PREFIX . "area a," . DB_PREFIX . "subarea s WHERE a.area_id=s.area_id AND a.area_id=".$id);

		
			return $qry->rows;
		
	}
    
    	public function getVehicleNumbers($area_id,$subarea_id,$transport_id) {
		$qry = $this->db->query("SELECT vd.vehicle_no FROM " . DB_PREFIX . "vehicle_description vd," . DB_PREFIX . "vendor v WHERE vd.transport_id=v.vendor_id AND vd.area='".$area_id."' AND vd.sub_area='".$subarea_id."' AND vd.transport_id=".$transport_id);

		
			return $qry->rows;
		
	}
    public function getTransportNames($subarea_id,$area_id) {
		$qry = $this->db->query("SELECT DISTINCT(v.vendor_name),v.vendor_id FROM " . DB_PREFIX . "vehicle_description vd," . DB_PREFIX . "vendor v," . DB_PREFIX . "vehicle_type vt," . DB_PREFIX . "area a," . DB_PREFIX . "subarea s WHERE vd.vehicle_type=vt.vehicle_type_id AND v.vendor_id=vd.transport_id AND vd.area=a.area_id AND vd.sub_area=s.subarea_id AND vd.area='".$area_id."' AND vd.sub_area='".$subarea_id."'");

		
			return $qry->rows;
		
	}
    public function getVehicleDetails($vehicle_no) {
		$qry = $this->db->query("SELECT * FROM " . DB_PREFIX . "vehicle_description vd," . DB_PREFIX . "vendor v," . DB_PREFIX . "city c," . DB_PREFIX . "carmake m," . DB_PREFIX . "carmodel mo WHERE vd.transport_id=v.vendor_id AND c.city_id=vd.city AND m.carmake_id=vd.make AND mo.carmodel_id=vd.model AND vd.vehicle_no='$vehicle_no'");

		
			return $qry->rows;
		
	}
    
    	public function update($booking_id,$data,$vehicle_no,$deliver_time,$customer_name) {
            
            $transport_id=$data['transport_id'];
              $driver_name=$data['driver'];
              $licence_no=$data['licence_no'];
              $mobile_no=$data['mobile_no'];
             // $address=$data['address'];
             $vehicle_type=$data['vehicle_type_id'];
             $area_id=$data['area_id'];
               $subarea_id=$data['subarea'];
                $city=$data['city'];
               $lorry=$data['lorry'];
               $labour=$data['labour'];
             $make=$data['make'];
             $model=$data['model'];
                 $date=$data['insurance_date'];
	
		   $this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET transporter_id = '$transport_id',status=3,vehicle_no='$vehicle_no',vehicle_type='$vehicle_type',area='$area_id',subarea='$subarea_id',assigned_to_transporter='1' WHERE booking_status_id = '$booking_id'");
            
            $this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET driver_name = '$driver_name',licence_no='$licence_no',mobile_no='$mobile_no',driver_city='$city',lorry='$lorry',labour='$labour',make='$make',model='$model',insurance_due_date='$date' WHERE booking_status_id = '$booking_id'");

	
    $transporter=$this->db->query("SELECT vendor_name from " . DB_PREFIX . "vendor where vendor_id='".$transport_id."'");
    $vendor_name=$transporter->row['vendor_name'];
               $deliver_time=date('d-m-Y H:m:s A',strtotime($deliver_time));
   $sms="Dear ".$vendor_name." a booking (id ".$booking_id.") of ".$customer_name." (contact no. ".$mobile_no.") has been assigned to you from HireLorry at ".$deliver_time."";
            $request =""; //initialise the request variable
            $param['loginid'] = "hirelorry";
            $param['password'] = "QELZtYMY7";
            $param['send_to'] = ($mobile_no);
            $param['method']= "sendMessage";
            $param['msg'] = ($sms);
            $param['v'] = "1.1";
            $param['msg_type'] = "TEXT"; //Can be "FLASH./"UNICODE_TEXT"/.BINARY.
            foreach($param as $key=>$val) {
            $request.= $key."=".urlencode($val);
            $request.= "&";
            }
            $request = substr($request, 0, strlen($request)-1);
            $url ="http://Smwebsolution.msg4all.com/GatewayAPI/rest?".$request;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
    
 	}   
		public function edit($booking_id,$data,$vehicle_no) {
            
            $transport_id=$data['transport_id'];
              $driver_name=$data['driver'];
              $licence_no=$data['licence_no'];
              $mobile_no=$data['mobile_no'];
             // $address=$data['address'];
             $vehicle_type=$data['vehicle_type_id'];
             $area_id=$data['area_id'];
               $subarea_id=$data['subarea'];
                $city=$data['city'];
               $lorry=$data['lorry'];
             $make=$data['make'];
             $model=$data['model'];
	
		   $this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET transporter_id = '$transport_id',status=3,vehicle_no='$vehicle_no',vehicle_type='$vehicle_type',area='$area_id',subarea='$subarea_id',assigned_to_transporter='1' WHERE booking_status_id = '$booking_id'");
            
            $this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET driver_name = '$driver_name',licence_no='$licence_no',mobile_no='$mobile_no',city='$city',lorry='$lorry',make='$make',model='$model' WHERE booking_status_id = '$booking_id'");

	
    
 	}  
}