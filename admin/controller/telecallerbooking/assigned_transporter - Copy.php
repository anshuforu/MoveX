<?php
class ControllerTelecallerBookingAssignedTransporter extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('telecallerbooking/assigned_telecaller');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallerbooking/assigned_telecaller');
		
		//$this->getList();
	
     
		
	}
    public function abc()
    {
    $this->load->language('telecallerbooking/assigned_telecaller');
    $this->load->model('telecallerbooking/assigned_telecaller');
    $id=$this->request->post['id'];
    $vehicle_no=$this->model_telecallerbooking_assigned_telecaller->getVehicleno($id);

    }
    
public function test() {
    $this->load->language('telecallerbooking/assigned_telecaller');
    $this->load->model('telecallerbooking/assigned_telecaller');
    $id=$this->request->post['id'];
    $asigned_trans=$this->model_telecallerbooking_assigned_telecaller->getTransporter($id);

      ?>   
        <select class="form-control" onchange="my(this.value)">
                     <option value=0>Select Transpoter</option>
                <?php 
foreach ($asigned_trans as $transporter) { ?>
                       
                          <option value="<?php echo $transporter['vendor_id']; ?>"><?php echo $transporter['vendor_name']; ?></option>
                          <?php } ?>    
                        
                 
                     </select>
         <?php

     }
	public function add() {
        $data['booking_id']=$this->request->get['order_id'];
        $this->session->data['booking']=$data['booking_id'];
         

if($this->request->server['REQUEST_METHOD'] == 'POST' )
{

      
     $this->load->model('telecallerbooking/assigned_telecaller');
                  $booking_id=$this->session->data['booking'];
 $this->model_telecallerbooking_assigned_telecaller->update($booking_id,$this->request->post);
        



    
    
         
    
}
        	$this->getForm();
	}
	protected function getForm() {
		
		$this->load->model('order/assign_telecaller');
        $data['bookings'] = $this->model_order_assign_telecaller->getBookingId();
        
		$this->load->language('telecallerbooking/assigned_telecaller');

		$this->load->model('telecallerbooking/assigned_telecaller');
		//$data['transporter_names']=$this->model_telecallerbooking_assigned_telecaller->getAllTransporters();
		//$data['vehicle_number_da']=$this->model_telecallerbooking_assigned_telecaller->getAllVehicle();
        
		//$data['all_vehicle']=$this->model_telecallerbooking_assigned_telecaller->getVehicles();
        $data['transporter_name'] = $this->language->get('column_name');
		$data['vehicle_number'] = $this->language->get('column_vehicle_number');
        $data['driver_name'] = $this->language->get('column_driver_name');
        $data['licence_no'] = $this->language->get('column_driver_licence_number');
        $data['mobile_no'] = $this->language->get('column_mobile_number');
        $data['vehicle_type'] = $this->language->get('column_vehicle_type');
        $data['column_vehicle'] = $this->language->get('column_vehicle');
        $data['vehicle_no'] = $this->language->get('vehicle_no');
        $data['address'] = $this->language->get('column_transport_address');
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
			'href' => $this->url->link('telecallerbooking/assigned_telecaller', 'token=' . $this->session->data['token'], 'SSL')
		);
        $data['cancel'] = $this->url->link('telecallerbooking/total_booking/', 'token=' . $this->session->data['token'], 'SSL');

        $data['token']= $this->session->data['token'];
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['action'] = $this->url->link('telecallerbooking/assigned_transporter/add', '&order_id='.$this->session->data['booking'].'&token=' . $this->session->data['token'], 'SSL');
         $data['booking_id']=$this->request->get['order_id'];

		$this->response->setOutput($this->load->view('telecallerbooking/assigned_transporter.tpl', $data));
	}
   
public function vehicle() {
$transport_id=$this->request->get['transport_id'];
		$json = array();

		$this->load->model('telecallerbooking/assigned_telecaller');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				//'vehicle'    => $this->model_telecallerbooking_assigned_telecaller->getVehicles($transport_id),
			);
   //print_r($json);         

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
		
	
}