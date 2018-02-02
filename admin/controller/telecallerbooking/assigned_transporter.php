<?php
class ControllerTelecallerBookingAssignedTransporter extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('telecallerbooking/assigned_transporter');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallerbooking/assigned_telecaller');
		
		//$this->getList();
	
     
		
	}
    

	public function add() {
                  //     $link_data=$_SERVER['HTTP_REFERER']; 

                    // echo $link_data;die;

        $this->load->language('telecallerbooking/assigned_transporter');
        $data['booking_id']=$this->request->get['order_id'];
        $this->session->data['booking']= $this->request->get['order_id'];
        if(isset($this->request->get['deliver_time']))
        {
        $deliver_time=$this->request->get['deliver_time'];
        $this->session->data['deliver_time']=$deliver_time;
        }
        if(isset($this->request->get['customer_name']))
        {
         $customer_name=$this->request->get['customer_name'];
           $this->session->data['customer_name']=$customer_name;
        }
        
if($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate())
{
       $deliver_time=$this->session->data['deliver_time'];
      $customer_name=$this->session->data['customer_name'];
    $vehicle_no=$this->request->post['vehicleno'];
     $this->load->model('telecallerbooking/assigned_telecaller');
                  $booking_id=$this->session->data['booking'];
    
 $this->model_telecallerbooking_assigned_telecaller->update($booking_id,$this->request->post,$vehicle_no,$deliver_time,$customer_name);
     
    			$this->response->redirect($this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'], 'SSL'));
    //$this->getList();
        
}
   
        else{
     
        	$this->getForm();
        }
     
	}
	protected function getForm() {
		
		$this->load->model('order/assign_telecaller');
        $data['bookings'] = $this->model_order_assign_telecaller->getBookingId();
        
		$this->load->language('telecallerbooking/assigned_transporter');

		$this->load->model('telecallerbooking/assigned_telecaller');
		$data['transporter_names']=$this->model_telecallerbooking_assigned_telecaller->getAllTransporters();
        $data['all_areas']=$this->model_telecallerbooking_assigned_telecaller->getAllAreas();
        $data['all_makes']=$this->model_telecallerbooking_assigned_telecaller->getAllMakes();
        $data['vehicle_types']=$this->model_telecallerbooking_assigned_telecaller->getVehicleTypes();
	   $data['vehicle_type'] = $this->language->get('column_name');
          $data['transport_name'] = $this->language->get('transport_name');
          $data['area_name'] = $this->language->get('area_name');
		$data['vehicle_number'] = $this->language->get('column_vehicle_number');
        $data['subarea'] = $this->language->get('column_subarea');
         $data['make'] = $this->language->get('column_make');
         $data['model'] = $this->language->get('column_model');
        $data['driver_name'] = $this->language->get('column_driver_name');
        $data['licence_no'] = $this->language->get('column_driver_licence_number');
        $data['mobile_no'] = $this->language->get('column_mobile_number');
        $data['vehicle_type'] = $this->language->get('column_vehicle_type');
        $data['address'] = $this->language->get('column_transport_address');
        $data['city'] = $this->language->get('column_city');
        $data['area'] = $this->language->get('column_area');
         $data['sub_area'] = $this->language->get('column_sub_area');
         $data['lorry'] = $this->language->get('column_lorry');
        $data['labour'] = $this->language->get('column_labour');
         $data['insurance_date'] = $this->language->get('column_insurance_date');
        $data['booking_id'] = $this->language->get('column_booking_id');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_plus'] = $this->language->get('text_plus');
		$data['text_minus'] = $this->language->get('text_minus');	
        $data['heading_title'] = $this->language->get('heading_title');	

         $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('telecallerbooking/assigned_transporter', 'token=' . $this->session->data['token'], 'SSL')
		);
        $data['cancel'] = $this->url->link('telecallerbooking/total_booking/', 'token=' . $this->session->data['token'], 'SSL');

        $data['token']= $this->session->data['token'];
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['action'] = $this->url->link('telecallerbooking/assigned_transporter/add', '&order_id='.$this->session->data['booking'].'&deliver_time='.$this->session->data['deliver_time'].'&customer_name='.$this->session->data['customer_name'].'&token=' . $this->session->data['token'], 'SSL');
         $data['booking_id']=$this->request->get['order_id'];
         $data['button_save']="Submit";
        $data['button_cancel']="Cancel";
        
         if (isset($this->error['vehicle_type'])) {
			$data['error_vehicle_type'] = $this->error['vehicle_type'];
		} else {
			$data['error_vehicle_type'] = '';
		}
        
          if (isset($this->error['transport'])) {
			$data['error_transport'] = $this->error['transport'];
		} else {
			$data['error_transport'] = '';
		}
        
           if (isset($this->error['vehicle'])) {
			$data['error_vehicle'] = $this->error['vehicle'];
		} else {
			$data['error_vehicle'] = '';
		}
        
        if (isset($this->error['area'])) {
			$data['error_area'] = $this->error['area'];
		} else {
			$data['error_area'] = '';
		}
        
          if (isset($this->error['subarea'])) {
			$data['error_subarea'] = $this->error['subarea'];
		} else {
			$data['error_subarea'] = '';
		}
         if(isset($this->request->post['vehicle_type_id']))
        {
        $data['vehicle_id']=$this->request->post['vehicle_type_id'];
        }
           if(isset($this->request->post['area_id']))
        {
        $data['area']=$this->request->post['area_id'];
        }
           if(isset($this->request->post['subarea']))
        {
        $data['subarea_id']=$this->request->post['subarea'];
        }
           if(isset($this->request->post['vehicle_no']))
        {
        $data['vehicle_no']=$this->request->post['vehicle_no'];
        }
       
		$this->response->setOutput($this->load->view('telecallerbooking/assigned_transporter.tpl', $data));
	}
    public function area() {
$vehicle_type_id=$this->request->get['vehicle_type_id'];
$this->session->data['vehicle_type_id']=$vehicle_type_id;
        
		$json = array();

		$this->load->model('telecallerbooking/assigned_telecaller');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'area'    => $this->model_telecallerbooking_assigned_telecaller->getAreas($vehicle_type_id),
			);
    //print_r($json);  die;       

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    
   
public function vehicle() {
$vehicle_type_id=$this->request->get['vehicle_type_id'];
$this->session->data['vehicle_type_id']=$vehicle_type_id;
		$json = array();

		$this->load->model('telecallerbooking/assigned_telecaller');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'vehicle'    => $this->model_telecallerbooking_assigned_telecaller->getVehicles($vehicle_type_id),
			);
    //print_r($json);  die;       

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    
     public function subarea() {
$area_id=$this->request->get['area_id'];
         $this->session->data['area_id']=$area_id;
      
		$json = array();

		$this->load->model('telecallerbooking/assigned_telecaller');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'area'    => $this->model_telecallerbooking_assigned_telecaller->getSubAreas($area_id),
			);
    //print_r($json);  die;       

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    
     public function transporters() {
$subarea_id=$this->request->get['subarea_id'];
         
        
   
           $area_id=$this->session->data['area_id'];
         $this->session->data['subarea_id']=$subarea_id;
		$json = array();

		$this->load->model('telecallerbooking/assigned_telecaller');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'subarea'    => $this->model_telecallerbooking_assigned_telecaller->getTransportNames($subarea_id,$area_id),
			);
      // print_r($json);die;

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

    
    public function vehicleNumber() {
        $transport_id=$this->request->get['transport_id'];
         $area_id=$this->session->data['area_id'];
         $subarea_id=$this->session->data['subarea_id'];
      
		$json = array();

		$this->load->model('telecallerbooking/assigned_telecaller');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'transporter'    => $this->model_telecallerbooking_assigned_telecaller->getVehicleNumbers($area_id,$subarea_id,$transport_id),
			);
         

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

        public function details() {
        $vehicle_no=$this->request->get['vehicle_no'];
		$json = array();

		$this->load->model('telecallerbooking/assigned_telecaller');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'vehicle_details'    => $this->model_telecallerbooking_assigned_telecaller->getVehicleDetails($vehicle_no),
			);
      
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    
    protected function validate() {
		/*if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}*/
        if ($this->request->post['vehicle_type_id'] == 0) {
			$this->error['vehicle_type'] = $this->language->get('error_vehicle_type');
		}
        
         if ($this->request->post['area_id'] == 0) {
			$this->error['area'] = $this->language->get('error_area');
		}
         if ($this->request->post['subarea'] == 0) {
			$this->error['subarea'] = $this->language->get('error_subarea');
		}
    
         if ($this->request->post['transport_id'] == 0) {
			$this->error['transport'] = $this->language->get('error_transport');
		}
        
          if ($this->request->post['vehicleno']=='0') {
       
			$this->error['vehicle'] = $this->language->get('error_vehicle');
		}

		return !$this->error;
	}

}