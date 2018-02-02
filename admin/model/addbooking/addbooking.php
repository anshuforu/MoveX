<?php
class ModelAddbookingAddbooking extends Model {
       public function insertBooking($status,$notify,$comment,$booking_id)
    {
        
        echo $status;
        echo $status;
        echo $notify;
        echo $comment;
        echo $booking_id;
        $this->db->query("INSERT INTO `" . DB_PREFIX . "booking_history` SET booking_id = '$booking_id', booking_status_id = '$status', notify ='$notify', comment = '$comment', date_added =now()");
       	$this->db->query("UPDATE `" . DB_PREFIX . "booking_status` SET status = '$status' WHERE booking_status_id = '$booking_id'");

    }
		public function getOrder($id) {
      //  echo "SELECT *, (SELECT CONCAT(c.firstname, ' ', c.lastname) FROM " . DB_PREFIX . "customer c WHERE c.customer_id = o.customer_id) AS customer FROM `" . DB_PREFIX . "coupon_order` o WHERE o.order_id = '" . (int)$order_id . "'";die;
		$order_query = $this->db->query("SELECT * FROM hl_booking_status bs,hl_customer c,hl_order_status os WHERE c.customer_id=bs.customer_id AND bs.status=os.order_status_id AND bs.booking_status_id = '" . (int)$id . "'");
    // print_r($order_query);die;
    return $order_query->row;
        }
    public function getTotalHistory($id) {
		//$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "booking_history`");
		//$query = $this->db->query("SELECT *,os.name FROM `" . DB_PREFIX . "booking_history bs,`" . DB_PREFIX . "order_status os WHERE bs.booking_status_id=os.order_status_id");
               $query = $this->db->query("SELECT  *,os.name FROM " . DB_PREFIX . "booking_history bs," . DB_PREFIX . "order_status os where bs.booking_status_id=os.order_status_id AND booking_id='$id'");
        //print_r($query);die;
        return $query->rows;
      }
       
public function getOrderStatuses($data = array()) {
	$booking_status =$this->db->query("SELECT order_status_id,name FROM " . DB_PREFIX . "order_status");
    return $booking_status->rows;
}
    public function getAllCustDet($id) {
               
    $booking_status =$this->db->query("SELECT customer_id FROM " . DB_PREFIX . "booking_status where booking_status_id='$id'");
    $data=$booking_status->row;
    $cust_id=$data['customer_id'];
        $customer=$this->db->query("SELECT * FROM " . DB_PREFIX . "customer where customer_id='$cust_id'");
        
        return $customer->row;
} 
    public function getAllBookDet($id) {
        //echo $id;die;
	$booking_status =$this->db->query("SELECT * FROM " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "vehicle_type vt," . DB_PREFIX . "order_status os  where booking_status_id='$id' And bs.vehicle=vt.vehicle_type_id AND bs.status=os.order_status_id");
    //print_r($booking_status);die; 
     return $booking_status->row;
}   
    public function getAlltransporter($id) {
	$booking_status =$this->db->query("SELECT assigned_to_transporter FROM " . DB_PREFIX . "booking_status where booking_status_id='$id'");
    $data=$booking_status->row;
    $tran_id=$data['assigned_to_transporter'];
        if($tran_id=="")
        {
           $tran_id=0; 
        }
	$vendor=$this->db->query("SELECT vendor_name FROM " . DB_PREFIX . "vendor where vendor_id='$tran_id'");
     return $vendor->row;
}   
    public function getAlltelecaller($id) {
	$booking_status =$this->db->query("SELECT assigned_to_telecaller FROM " . DB_PREFIX . "booking_status where booking_status_id='$id'");
    $data=$booking_status->row;
    $tran_id=$data['assigned_to_telecaller'];
          if($tran_id=="")
        {
           $tran_id=0; 
        }
	$vendor=$this->db->query("SELECT telecaller_name FROM " . DB_PREFIX . "telecaller where telecaller_id='$tran_id'");
     return $vendor->row;
}

	public function getAllDriverList($data = array()) {
      //echo "hello";die;
		$sql ="SELECT bs.customer_id,d.device_name,booking_status_id,customer_mobile_no,name,vehicle,city,service_type,state,pin,exact_address,bs.customer_name,firstname,bs.mobile_no,username,form_address,to_address,distance,distance_price,booking_time,delivering_time,assigned_to_telecaller FROM " . DB_PREFIX . "booking_status bs LEFT JOIN " . DB_PREFIX . "customer c on bs.customer_id=c.customer_id LEFT JOIN " . DB_PREFIX . "order_status os on bs.status=os.order_status_id LEFT JOIN " . DB_PREFIX . "device d on  bs.device=d.id WHERE 1";

		if (!empty($data['filter_customer'])) {
			$sql .= " AND c.firstname LIKE '%" . $this->db->escape($data['filter_customer']) . "%'";
		}
       if (!empty($data['filter_booking_id'])) {
			$sql .= " AND bs.booking_status_id LIKE '%" . $this->db->escape($data['filter_booking_id']) . "%'";
		}

		if (isset($data['filter_distance']) && !is_null($data['filter_distance'])) {
			$sql .= " AND bs.distance LIKE '" . $this->db->escape($data['filter_distance']) . "%'";
		}
        
          if (isset($data['filter_form']) && !is_null($data['filter_form'])) {
          $sql .= " AND bs.form_address LIKE '" . $this->db->escape($data['filter_form']) . "%'";
		} 
        if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
          $sql .= " AND bs.distance_price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		} 
        if (isset($data['filter_to']) && !is_null($data['filter_to'])) {
          $sql .= " AND bs.to_address LIKE '" . $this->db->escape($data['filter_to']) . "%'";
		}  
        if (isset($data['filter_deliver']) && !is_null($data['filter_deliver'])) {
          $sql .= " AND bs.delivering_time LIKE '" . $this->db->escape($data['filter_deliver']) . "%'";
		}
		$sort_data = array(
			'c.firstname',
			'bs.distance',
            'bs.form_address',
            'bs.distance_price',
            'bs.to_address',
           //'bs.delivering_time',
             'bs.booking_status_id',
        );

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY bs.booking_status_id";
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
    //print_r($sql);die;
		$query = $this->db->query($sql);
         
		return $query->rows;
	}
	
	
	public function getTotalList($data = array()) {
			$sql ="SELECT COUNT(booking_status_id) AS total FROM " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "customer c WHERE bs.customer_id=c.customer_id";
           
		if (!empty($data['filter_customer'])) {
			$sql .= " AND c.firstname LIKE '%" . $this->db->escape($data['filter_customer']) . "%'";
		}

		if (isset($data['filter_distance']) && !is_null($data['filter_distance'])) {
			$sql .= " AND bs.distance LIKE '" . $this->db->escape($data['filter_distance']) . "%'";
		}
        
          if (isset($data['filter_form']) && !is_null($data['filter_form'])) {
          $sql .= " AND bs.form_address LIKE '" . $this->db->escape($data['filter_form']) . "%'";
		} 
        if (isset($data['filter_price']) && !is_null($data['filter_price'])) {
          $sql .= " AND bs.distance_price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		} 
        if (isset($data['filter_to']) && !is_null($data['filter_to'])) {
          $sql .= " AND bs.to_address LIKE '" . $this->db->escape($data['filter_to']) . "%'";
		}  
        if (isset($data['filter_deliver']) && !is_null($data['filter_deliver'])) {
          $sql .= " AND bs.delivering_time LIKE '" . $this->db->escape($data['filter_deliver']) . "%'";
		}
		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	public function addDriver($data,$rnd) {
      // print_r($data);die;
        $password_change=md5($rnd);
   $cust_name=$data['customer_name'];
        $service=$data['service_type'];
        $cust_no=$data['mobile'];
         $a=$data['to'];
        $deliver_date=$data['deliver_time'];
        $flag=0;
       
      //  echo "SELECT * FROM " . DB_PREFIX . "customer";
        $cust_data=$this->db->query("SELECT * FROM " . DB_PREFIX . "customer where username='$cust_no'");
        $cust_details=$cust_data->row;
        date_default_timezone_set('Asia/Calcutta');
        $booking_time=date('Y-m-d H:i:s');
        $cust_details_count=count($cust_data->rows);
        if($cust_details_count>0)
        {
                
            $dat="INSERT INTO " . DB_PREFIX . "booking_status SET status='1',service_type='$service', customer_id='".$cust_details['customer_id']."',vehicle='".$data['vehicle_name']."',state='".$data['state']."',city='".$data['city']."',pin='".$data['pin']."',exact_address='".$data['add']."',distance='".$data['distance']."',distance_price='".$data['price']."',delivering_time='".$deliver_date."',form_address='".$data['form']."',to_address='".$a."',customer_name='$cust_name',customer_mobile_no='$cust_no',booking_time='$booking_time',device=1";
            $booking = $this->db->getLastId();
             $this->db->query("UPDATE " . DB_PREFIX . "booking_status SET customer_name='$cust_name' where booking_status_id='".$booking."'");
        }
        else
        {
              
               $this->db->query("INSERT INTO " . DB_PREFIX . "customer(firstname,telephone,username,customer_group_id,password) VALUES('$cust_name','$cust_no','$cust_no','1','$password_change')");
                $last_id =$this->db->getLastId();
                $this->db->query("INSERT INTO " . DB_PREFIX . "original_password(username,password) VALUES('$cust_no','$rnd')");
         $dat="INSERT INTO " . DB_PREFIX . "booking_status SET status='1',service_type='$service', customer_id='$last_id',vehicle='".$data['vehicle_name']."',state='".$data['state']."',city='".$data['city']."',pin='".$data['pin']."',exact_address='".$data['add']."',distance='".$data['distance']."',distance_price='".$data['price']."',customer_name='$cust_name',customer_mobile_no='$cust_no',delivering_time='".$deliver_date."',form_address='".$data['form']."',to_address='".$a."',booking_time='$booking_time'";   
        }

$this->db->query($dat);
                $booking_id = $this->db->getLastId();
       // echo $booking_id;die;
  $query=$this->db->query("UPDATE " . DB_PREFIX . "booking_status SET customer_mobile_no = '$cust_no'  WHERE booking_status_id = '" . (int)$booking_id . "'");
return $booking_id;
    }
    
 public function editDriver($data,$id,$book_id) {
     //echo $book_id;die;
   // print_r($data);die;
      $customer=$data['customer_name'];
      $mobile=$data['mobile'];
      $form=$data['form'];
      $to=$data['to'];
      $distance=$data['distance'];
      $price=$data['price'];
      $deliver_time=$data['deliver_time'];
      $state=$data['state'];
      $city=$data['city'];
      $pin=$data['pin'];
      $add=$data['add'];
      $vehicle=$data['vehicle_name'];
    //$this->db->query("UPDATE " . DB_PREFIX . "customer SET firstname='$customer' where customer_id='$customer_id'");
       $query = $this->db->query("UPDATE  " . DB_PREFIX . "booking_status SET state='$state',city='$city',pin='$pin',exact_address='$add',form_address='$form',vehicle='$vehicle',to_address='$to',distance='$distance',distance_price='$price',delivering_time='$deliver_time',customer_mobile_no='$mobile',customer_name='$customer',device=1 WHERE booking_status_id='$book_id'");
     $customer_id=$this->db->query("select customer_id FROM " . DB_PREFIX . "booking_status WHERE booking_status_id=".$book_id);
    // $id=$customer_id->row['customer_id'];
    // $query = $this->db->query("UPDATE  " . DB_PREFIX . "customer SET firstname='$customer' WHERE customer_id='$id'");
}
	
	public function delete($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "booking_status WHERE booking_status_id = '" . (int)$id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "payment WHERE booking_id = '" . (int)$id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "booking_assigned WHERE booking_id = '" . (int)$id . "'");
		
	}
public function getAllCustomer() {
		$query=$this->db->query("select customer_id,firstname FROM " . DB_PREFIX . "customer");
		return $query->rows;
	}
public function getAllVehicle() {
		$query=$this->db->query("select * FROM " . DB_PREFIX . "vehicle_type");
		return $query->rows;
	}
    public function getAllService() {
		$query=$this->db->query("select * FROM " . DB_PREFIX . "service_type");
		return $query->rows;
	}
public function view($id) {
        //echo $id;die;
		$query=$this->db->query("select * FROM " . DB_PREFIX . "booking_status bs," . DB_PREFIX . "customer c," . DB_PREFIX . "vehicle_type vt WHERE bs.customer_id=c.customer_id And booking_status_id='$id'");
		return $query->row;
	}
}   