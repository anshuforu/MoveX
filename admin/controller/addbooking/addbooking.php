<?php class ControllerAddbookingAddbooking extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('addbooking/addbooking');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('addbooking/addbooking');
		
		$this->getList();
    }

    public function delete() {
			$this->load->language('addbooking/addbooking');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('addbooking/addbooking');
    
		if (isset($this->request->post['selected']))
            {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_addbooking_addbooking->delete($id);
			}

			$this->session->data['success'] = "Booking deleted successfully";

			
			$this->response->redirect($this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->getList();
	}
 public function view() {
     $this->load->language('details/booking_asignedtran');
        $booking_customer=array();
        $this->load->model('addbooking/addbooking');
        if (isset($this->request->get['id'])) {
			$id = $this->request->get['id'];
            
		} else {
			$id = 0;
		}
     //echo $id;die;
		$order_info = $this->model_addbooking_addbooking->getOrder($id);
     $this->load->model('telecallerbooking/total_booking');
     $this->load->model('details/booking_asignedtran');
        $view_details=$this->model_details_booking_asignedtran->viewdata($id);
       $data['total_amount']=$this->model_telecallerbooking_total_booking->amountcal($id);
        $data['payment_details']=$this->model_details_booking_asignedtran->viewpayment($id);
      $this->load->model('details/notbooking_asigned'); 
         $data['telecallers']=$this->model_details_notbooking_asigned->getTelecallers();
        foreach ($view_details as $view_detail) {
			
		$data['view'][] = array(
				'id'	  =>$view_detail['booking_status_id'],
		        'name'    => $view_detail['customer_id'],
		        'from_address'    => $view_detail['form_address'],
		        'to_address'    => $view_detail['to_address'],
		        'vendor_name'    => $view_detail['vendor_name'],
				'vehicle_no' => $view_detail['vehicle_no'],
                'area_name'  => $view_detail['area_name'],
                'subarea_name'  => $view_detail['subarea_name'],
                'city'  => $view_detail['driver_city'],
                'lorry'    => $view_detail['lorry'],
				'vehicle_type_name' => $view_detail['vehicle_type_name'],
                'make'  => $view_detail['make'],
                'model'  => $view_detail['model'],
                'driver_name'    => $view_detail['driver_name'],
                'device'    => $view_detail['device_name'],
				'mobile_no' => $view_detail['mobile_no'],
                'customer_mobile_no' => $view_detail['customer_mobile_no'],
                'licence_no'  => $view_detail['licence_no'],
                'labour'  => $view_detail['labour'],
                'labour_count' => $view_detail['labour_count'],
                'amount_cal' => $view_detail['amount_calc'],
                'assigned_to_telecaller' => $view_detail['assigned_to_telecaller'],
                'assigned_to_transporter' => $view_detail['assigned_to_transporter'],
                'booking_time' => $view_detail['booking_time'],
                'departure_time' => $view_detail['delivering_time'],
                'customer_name' => $view_detail['customer_name'],
                'booking_city'        => $view_detail['city'],
                'state'        => $view_detail['state'],
                'status'        => $view_detail['status'],
                'address'        => $view_detail['exact_address'],
                'pincode'        => $view_detail['pin'],
                'distance'        => $view_detail['distance'],
                'distance_price'        => $view_detail['distance_price'],
                'booking_vehicle'  => $view_detail['vehicle_type_name'],
                
			);
	  
		}
       
        $this->load->language('addbooking/addbooking');

			$this->document->setTitle($this->language->get('heading_title'));

			$data['heading_title'] = $this->language->get('heading_title');

			$data['text_order_id'] = $this->language->get('text_order_id');
			$data['head_view'] = $this->language->get('head_view');
			$data['booking_d'] = $this->language->get('booking_d');
			$data['text_status'] = $this->language->get('text_status');
			$data['text_invoice_no'] = $this->language->get('text_invoice_no');
			$data['vehicle_licence '] = $this->language->get('vehicle_licence');
			$data['vehicle_provide_labour'] = $this->language->get('vehicle_licence ');
			$data['text_invoice_date'] = $this->language->get('text_invoice_date');
			$data['text_store_name'] = $this->language->get('text_store_name');
			$data['vehicle_model'] = $this->language->get('vehicle_model');
			$data['text_store_url'] = $this->language->get('text_store_url');
			$data['vehicle_driver_no'] = $this->language->get('vehicle_driver_no');
			$data['vehicl_li'] = $this->language->get('vehicl_li');
			$data['vehicle_p_labour'] = $this->language->get('vehicle_p_labour');
			$data['vehicle_type'] = $this->language->get('vehicle_type');
			$data['vehicle_driver'] = $this->language->get('vehicle_driver');
            $data['Vehicle_no'] = $this->language->get('Vehicle_no');
			$data['Licence'] = $this->language->get('Licence');
			$data['vehicle_lorry'] = $this->language->get('vehicle_lorry');
			$data['vehicle_make'] = $this->language->get('vehicle_make');
			$data['vehicle_city'] = $this->language->get('vehicle_city');
			$data['text_customer'] = $this->language->get('text_customer');
			$data['exact_pickup'] = $this->language->get('exact_pickup');
			$data['vehicle_area'] = $this->language->get('vehicle_area');
			$data['vehicle_subarea'] = $this->language->get('vehicle_subarea');
			$data['text_comment'] = $this->language->get('text_comment');
			$data['text_customer_group'] = $this->language->get('text_customer_group');
			$data['text_email'] = $this->language->get('text_email');
			$data['text_notify'] = $this->language->get('text_notify');
			$data['text_status'] = $this->language->get('text_status');
			$data['text_telephone'] = $this->language->get('text_telephone');
			$data['text_date'] = $this->language->get('text_date');
			$data['text_fax'] = $this->language->get('text_fax');
			$data['text_total'] = $this->language->get('text_total');
			$data['text_reward'] = $this->language->get('text_reward');
			$data['text_order_status'] = $this->language->get('text_order_status');
			$data['text_comment'] = $this->language->get('text_comment');
			$data['text_affiliate'] = $this->language->get('text_affiliate');
			$data['text_commission'] = $this->language->get('text_commission');
			$data['text_ip'] = $this->language->get('text_ip');
			$data['text_forwarded_ip'] = $this->language->get('text_forwarded_ip');
			$data['text_user_agent'] = $this->language->get('text_user_agent');
			$data['text_address'] = $this->language->get('text_address');
			$data['text_accept_language'] = $this->language->get('text_accept_language');
			$data['text_date_added'] = $this->language->get('text_date_added');
			$data['text_date_modified'] = $this->language->get('text_date_modified');
			$data['text_firstname'] = $this->language->get('text_firstname');
			$data['text_lastname'] = $this->language->get('text_lastname');
			$data['text_company'] = $this->language->get('text_company');
			$data['text_address_1'] = $this->language->get('text_address_1');
			$data['text_address_2'] = $this->language->get('text_address_2');
			$data['text_city'] = $this->language->get('text_city');
			$data['text_postcode'] = $this->language->get('text_postcode');
			$data['text_zone'] = $this->language->get('text_zone');
			$data['text_zone_code'] = $this->language->get('text_zone_code');
			$data['text_country'] = $this->language->get('text_country');
			$data['text_shipping_method'] = $this->language->get('text_shipping_method');
			$data['text_payment_method'] = $this->language->get('text_payment_method');
			$data['text_history'] = $this->language->get('text_history');
			$data['text_country_match'] = $this->language->get('text_country_match');
			$data['text_country_code'] = $this->language->get('text_country_code');
			$data['text_high_risk_country'] = $this->language->get('text_high_risk_country');
			$data['text_distance'] = $this->language->get('text_distance');
			$data['text_ip_region'] = $this->language->get('text_ip_region');
			$data['text_ip_city'] = $this->language->get('text_ip_city');
			$data['text_ip_latitude'] = $this->language->get('text_ip_latitude');
			$data['text_ip_longitude'] = $this->language->get('text_ip_longitude');
			$data['text_ip_isp'] = $this->language->get('text_ip_isp');
			$data['text_ip_org'] = $this->language->get('text_ip_org');
			$data['text_ip_asnum'] = $this->language->get('text_ip_asnum');
			$data['text_ip_user_type'] = $this->language->get('text_ip_user_type');
			$data['text_ip_country_confidence'] = $this->language->get('text_ip_country_confidence');
			$data['text_ip_region_confidence'] = $this->language->get('text_ip_region_confidence');
			$data['text_ip_city_confidence'] = $this->language->get('text_ip_city_confidence');
			$data['text_ip_postal_confidence'] = $this->language->get('text_ip_postal_confidence');
			$data['text_ip_postal_code'] = $this->language->get('text_ip_postal_code');
			$data['text_ip_accuracy_radius'] = $this->language->get('text_ip_accuracy_radius');
			$data['text_ip_net_speed_cell'] = $this->language->get('text_ip_net_speed_cell');
			$data['text_ip_metro_code'] = $this->language->get('text_ip_metro_code');
			$data['text_ip_area_code'] = $this->language->get('text_ip_area_code');
			$data['text_ip_time_zone'] = $this->language->get('text_ip_time_zone');
			$data['text_ip_region_name'] = $this->language->get('text_ip_region_name');
			$data['text_ip_domain'] = $this->language->get('text_ip_domain');
			$data['text_ip_country_name'] = $this->language->get('text_ip_country_name');
			$data['text_ip_continent_code'] = $this->language->get('text_ip_continent_code');
			$data['text_ip_corporate_proxy'] = $this->language->get('text_ip_corporate_proxy');
			$data['text_anonymous_proxy'] = $this->language->get('text_anonymous_proxy');
			$data['text_proxy_score'] = $this->language->get('text_proxy_score');
			$data['text_is_trans_proxy'] = $this->language->get('text_is_trans_proxy');
			$data['text_free_mail'] = $this->language->get('text_free_mail');
			$data['text_carder_email'] = $this->language->get('text_carder_email');
			$data['text_high_risk_username'] = $this->language->get('text_high_risk_username');
			$data['Tarnspoter'] = $this->language->get('Tarnspoter');
			$data['text_high_risk_password'] = $this->language->get('text_high_risk_password');
			$data['to_address'] = $this->language->get('to_address');
			$data['text_bin_match'] = $this->language->get('text_bin_match');
			$data['text_bin_country'] = $this->language->get('text_bin_country');
			$data['text_bin_name_match'] = $this->language->get('text_bin_name_match');
			$data['text_bin_name'] = $this->language->get('text_bin_name');
			$data['text_bin_phone_match'] = $this->language->get('text_bin_phone_match');
			$data['text_bin_phone'] = $this->language->get('text_bin_phone');
			$data['form_address'] = $this->language->get('form_address');
			$data['text_customer_phone_in_billing_location'] = $this->language->get('text_customer_phone_in_billing_location');
			$data['text_ship_forward'] = $this->language->get('text_ship_forward');
			$data['text_city_postal_match'] = $this->language->get('text_city_postal_match');
			$data['text_ship_city_postal_match'] = $this->language->get('text_ship_city_postal_match');
			$data['text_score'] = $this->language->get('text_score');
			$data['text_explanation'] = $this->language->get('text_explanation');
			$data['text_risk_score'] = $this->language->get('text_risk_score');
			$data['text_queries_remaining'] = $this->language->get('text_queries_remaining');
			$data['text_maxmind_id'] = $this->language->get('text_maxmind_id');
			$data['text_error'] = $this->language->get('text_error');
			$data['text_loading'] = $this->language->get('text_loading');
			$data['booking_id'] = $this->language->get('booking_id');
			$data['customer'] = $this->language->get('customer');
            $data['customer_mobile_no'] = $this->language->get('customer_mobile_no');
            $data['booking_time'] = $this->language->get('booking_time');
            $data['departure_time'] = $this->language->get('departure_time');
            $data['city'] = $this->language->get('city');
            $data['state'] = $this->language->get('state');
            $data['pincode'] = $this->language->get('pincode');
            $data['exact_address'] = $this->language->get('exact_address');
            $data['distance'] = $this->language->get('distance');
            $data['distance_price'] = $this->language->get('distance_price');
          $data['device'] = $this->language->get('device');
            $data['vehicle_type'] = $this->language->get('vehicle_type');
      $data['column_amount'] = $this->language->get('column_amount');
            $data['column_paid'] = $this->language->get('column_paid');
            $data['column_balance'] = $this->language->get('column_balance');


			$data['help_country_match'] = $this->language->get('help_country_match');
			$data['help_country_code'] = $this->language->get('help_country_code');
			$data['help_high_risk_country'] = $this->language->get('help_high_risk_country');
			$data['help_distance'] = $this->language->get('help_distance');
			$data['help_ip_region'] = $this->language->get('help_ip_region');
			$data['help_ip_city'] = $this->language->get('help_ip_city');
			$data['help_ip_latitude'] = $this->language->get('help_ip_latitude');
			$data['help_ip_longitude'] = $this->language->get('help_ip_longitude');
			$data['help_ip_isp'] = $this->language->get('help_ip_isp');
			$data['help_ip_org'] = $this->language->get('help_ip_org');
			$data['help_ip_asnum'] = $this->language->get('help_ip_asnum');
			$data['help_ip_user_type'] = $this->language->get('help_ip_user_type');
			$data['help_ip_country_confidence'] = $this->language->get('help_ip_country_confidence');
			$data['help_ip_region_confidence'] = $this->language->get('help_ip_region_confidence');
			$data['help_ip_city_confidence'] = $this->language->get('help_ip_city_confidence');
			$data['help_ip_postal_confidence'] = $this->language->get('help_ip_postal_confidence');
			$data['help_ip_postal_code'] = $this->language->get('help_ip_postal_code');
			$data['help_ip_accuracy_radius'] = $this->language->get('help_ip_accuracy_radius');
			$data['help_ip_net_speed_cell'] = $this->language->get('help_ip_net_speed_cell');
			$data['help_ip_metro_code'] = $this->language->get('help_ip_metro_code');
			$data['help_ip_area_code'] = $this->language->get('help_ip_area_code');
			$data['help_ip_time_zone'] = $this->language->get('help_ip_time_zone');
			$data['help_ip_region_name'] = $this->language->get('help_ip_region_name');
			$data['help_ip_domain'] = $this->language->get('help_ip_domain');
			$data['help_ip_country_name'] = $this->language->get('help_ip_country_name');
			$data['help_ip_continent_code'] = $this->language->get('help_ip_continent_code');
			$data['help_ip_corporate_proxy'] = $this->language->get('help_ip_corporate_proxy');
			$data['help_anonymous_proxy'] = $this->language->get('help_anonymous_proxy');
			$data['help_proxy_score'] = $this->language->get('help_proxy_score');
			$data['help_is_trans_proxy'] = $this->language->get('help_is_trans_proxy');
			$data['help_free_mail'] = $this->language->get('help_free_mail');
			$data['help_carder_email'] = $this->language->get('help_carder_email');
			$data['help_high_risk_username'] = $this->language->get('help_high_risk_username');
			$data['help_high_risk_password'] = $this->language->get('help_high_risk_password');
			$data['help_bin_match'] = $this->language->get('help_bin_match');
			$data['help_bin_country'] = $this->language->get('help_bin_country');
			$data['help_bin_name_match'] = $this->language->get('help_bin_name_match');
			$data['help_bin_name'] = $this->language->get('help_bin_name');
			$data['help_bin_phone_match'] = $this->language->get('help_bin_phone_match');
			$data['help_bin_phone'] = $this->language->get('help_bin_phone');
			$data['help_customer_phone_in_billing_location'] = $this->language->get('help_customer_phone_in_billing_location');
			$data['help_ship_forward'] = $this->language->get('help_ship_forward');
			$data['help_city_postal_match'] = $this->language->get('help_city_postal_match');
			$data['help_ship_city_postal_match'] = $this->language->get('help_ship_city_postal_match');
			$data['help_score'] = $this->language->get('help_score');
			$data['help_explanation'] = $this->language->get('help_explanation');
			$data['help_risk_score'] = $this->language->get('help_risk_score');
			$data['help_queries_remaining'] = $this->language->get('help_queries_remaining');
			$data['help_maxmind_id'] = $this->language->get('help_maxmind_id');
			$data['help_error'] = $this->language->get('help_error');

			$data['column_product'] = $this->language->get('column_product');
			$data['column_model'] = $this->language->get('column_model');
			$data['column_quantity'] = $this->language->get('column_quantity');
			$data['column_price'] = $this->language->get('column_price');
			$data['column_total'] = $this->language->get('column_total');

			$data['entry_order_status'] = $this->language->get('entry_order_status');
			$data['entry_notify'] = $this->language->get('entry_notify');
			$data['text_booking'] = $this->language->get('text_booking');
			$data['entry_comment'] = $this->language->get('entry_comment');
			$data['text_form'] = $this->language->get('text_form');
			$data['text_to'] = $this->language->get('text_to');
			$data['delivering_time'] = $this->language->get('delivering_time');

			$data['button_invoice_print'] = $this->language->get('button_invoice_print');
			$data['button_shipping_print'] = $this->language->get('button_shipping_print');
			$data['button_edit'] = $this->language->get('button_edit');
			$data['button_cancel'] = $this->language->get('button_cancel');
			$data['button_generate'] = $this->language->get('button_generate');
			$data['button_reward_add'] = $this->language->get('button_reward_add');
			$data['button_reward_remove'] = $this->language->get('button_reward_remove');
			$data['button_commission_add'] = $this->language->get('button_commission_add');
			$data['button_commission_remove'] = $this->language->get('button_commission_remove');
			$data['button_history_add'] = $this->language->get('button_history_add');
			$data['text_disprice'] = $this->language->get('text_disprice');

			$data['tab_order'] = $this->language->get('tab_order');
			$data['text_totdisprice'] = $this->language->get('text_totdisprice');
			$data['total_price'] = $this->language->get('total_price');
			$data['text_labour'] = $this->language->get('text_labour');
			$data['change_status'] = $this->language->get('change_status');
			$data['tab_data'] = $this->language->get('tab_data');
			$data['tab_payment'] = $this->language->get('tab_payment');
			$data['text_vehicle'] = $this->language->get('text_vehicle');
			$data['text_distance'] = $this->language->get('text_distance');
			$data['tab_shipping'] = $this->language->get('tab_shipping');
			$data['text_labour_price'] = $this->language->get('text_labour_price');
			$data['tab_product'] = $this->language->get('tab_product');
			$data['tab_history'] = $this->language->get('tab_history');
			$data['tab_fraud'] = $this->language->get('tab_fraud');
			$data['tab_action'] = $this->language->get('tab_action');

			$data['token'] = $this->session->data['token'];

			
			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'], 'SSL')
			);
          	$data['invoice'] = $this->url->link('addbooking/addbooking/invoice', 'token=' . $this->session->data['token'] . '&order_id=' . (int)$this->request->get['id'], 'SSL');
        $data['cancel'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'], 'SSL');
           $data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
		
			$this->response->setOutput($this->load->view('addbooking/coupon_order_info.tpl',$data));
		
	}
  public function insert() {
$status=$_POST['first'];
$notify=$_POST['second'];
$comment=$_POST['third'];
$booking_id=$_GET['booking'];
$this->load->model('addbooking/addbooking'); 
$insert = $this->model_addbooking_addbooking->insertBooking($status,$notify,$comment,$booking_id);
} 
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

	public function add() {
		$this->load->language('addbooking/addbooking');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('addbooking/addbooking');
           


		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   //if($this->request->server['REQUEST_METHOD'] == 'POST')
             //{
               //print_r($this->request->post);die;
                    $rnd=rand(111111,999999);
               $abc=$this->model_addbooking_addbooking->addDriver($this->request->post,$rnd);
               $this->session->data['success'] = "Booking #<a href=".$this->url->link('addbooking/addbooking/view', 'token=' . $this->session->data['token'].'&id='.$abc, 'SSL').">".$abc."</a> is successfully booked";
            
			
			$this->response->redirect($this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'], 'SSL'));

           
           }
        else{
        
         $this->getFormadd();
        
        }
    
	}
     public function validate() {
	
       if(isset($this->request->post['customer_name']))
            {
            if ($this->request->post['customer_name'] == '') {
			$this->error['customer_name'] = $this->language->get('error_name');
		    }
            }   
         if(isset($this->request->post['mobile']))
            {
            if ($this->request->post['mobile'] == '') {
			$this->error['customer_number'] = $this->language->get('error_number_ph');
		    }
            } 
         if(isset($this->request->post['state']))
            {
            if ($this->request->post['state'] == '') {
			$this->error['state'] = $this->language->get('error_state_name');
		    }
            }
       if(isset($this->request->post['vehicle_name']))
            {
            if ($this->request->post['vehicle_name'] == '0') {
			$this->error['vehicle_name'] = $this->language->get('error_vehicle');
		    }
            }
             if(isset($this->request->post['service_type']))
            {
            if ($this->request->post['service_type'] == '0') {
			$this->error['service_type'] = $this->language->get('error_service_type');
		    }
            }
        if(isset($this->request->post['form']))
            {
            if ($this->request->post['form'] == '') {
			$this->error['from'] = $this->language->get('error_from');
		    }
            }   
         if(isset($this->request->post['to']))
            {
            if ($this->request->post['to'] == '') {
			$this->error['to'] = $this->language->get('error_to');
		    }
            }
         if(isset($this->request->post['distance']))
            {
            if ($this->request->post['distance'] == '') {
			$this->error['distance'] = $this->language->get('error_distance');
		    }
            }
         if(isset($this->request->post['price']))
            {
            if ($this->request->post['price'] == '') {
			$this->error['price'] = $this->language->get('error_price');
		    }
            }
         if(isset($this->request->post['deliver_time']))
            {
            if ($this->request->post['deliver_time'] == '') {
			$this->error['deliver_time'] = $this->language->get('error_deliver_time');
		    }
            }
         if(isset($this->request->post['city']))
            {
            if ($this->request->post['city'] == '') {
			$this->error['city'] = $this->language->get('error_city');
		    }
            } 
         if(isset($this->request->post['pin']))
            {
            if ($this->request->post['pin'] == '') {
			$this->error['pin'] = $this->language->get('error_pin');
		    }
            }
         if(isset($this->request->post['add']))
            {
            if ($this->request->post['add'] == '') {
			$this->error['add'] = $this->language->get('error_add');
		    }
            }
         if(($this->request->post['customer_name'])=='' || ($this->request->post['mobile'])=='' || ($this->request->post['state'])=='' || ($this->request->post['vehicle_name'])=='' || ($this->request->post['service_type'])=='' || ($this->request->post['form'])=='' || ($this->request->post['to'])=='' || ($this->request->post['distance'])=='' || ($this->request->post['price'])=='' || ($this->request->post['deliver_time'])=='' || ($this->request->post['city'])=='' || ($this->request->post['pin'])=='' || ($this->request->post['add'])=='')
            {
                $this->error['common'] = $this->language->get('error_common');
            }

       
    return !$this->error;

		
	}
  
public function edit() {
    
		$this->load->language('addbooking/addbooking');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('addbooking/addbooking');

		
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
              // echo $this->request->get['book_id'];die;
            $this->model_addbooking_addbooking->editDriver($this->request->post,$this->request->get['id'],$this->request->get['book_id']);
            $this->session->data['success'] = "Your Booking #".$this->request->get['book_id']." is upadated successfully";

			

			$this->response->redirect($this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'], 'SSL'));
	 }
         
        else{
        
         $this->getFormadd();
        
        }
}

                
    
	protected function getList() {
      if (isset($this->request->get['filter_customer'])) {
			$filter_customer = $this->request->get['filter_customer'];
		} else {
			$filter_customer = null;
		}
      if (isset($this->request->get['filter_distance'])) {
			$filter_distance = $this->request->get['filter_distance'];
		} else {
			$filter_distance = null;
		}
        
        if (isset($this->request->get['filter_form'])) {
			$filter_form = $this->request->get['filter_form'];
		} else {
			$filter_form = null;
		}  
        if (isset($this->request->get['filter_price'])) {
			$filter_price = $this->request->get['filter_price'];
		} else {
			$filter_price = null;
		} 
        if (isset($this->request->get['filter_to'])) {
			$filter_to = $this->request->get['filter_to'];
		} else {
			$filter_to = null;
		} 
        if (isset($this->request->get['filter_deliver'])) {
			$filter_deliver = $this->request->get['filter_deliver'];
		} else {
			$filter_deliver = null;
		} 
        if (isset($this->request->get['filter_booking_id'])) {
			$filter_booking_id = $this->request->get['filter_booking_id'];
		} else {
			$filter_booking_id = null;
		}
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'c.firstname';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bs.distance';
		}   
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bs.distance';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bs.to_address';
		} 
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bs.delivering_time';
		}


		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
        if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}
       
		$url = '';

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

        
		if (isset($this->request->get['filter_distance'])) {
			$url .= '&filter_distance=' . urlencode(html_entity_decode($this->request->get['filter_distance'], ENT_QUOTES, 'UTF-8'));
		}
        
        if (isset($this->request->get['filter_form'])) {
			$url .= '&filter_form=' . urlencode(html_entity_decode($this->request->get['filter_form'], ENT_QUOTES, 'UTF-8'));
		}  
        if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . urlencode(html_entity_decode($this->request->get['filter_price'], ENT_QUOTES, 'UTF-8'));
		} 
        if (isset($this->request->get['filter_to'])) {
			$url .= '&filter_to=' . urlencode(html_entity_decode($this->request->get['filter_to'], ENT_QUOTES, 'UTF-8'));
		}
        if (isset($this->request->get['filter_deliver'])) {
			$url .= '&filter_deliver=' . urlencode(html_entity_decode($this->request->get['filter_deliver'], ENT_QUOTES, 'UTF-8'));
		}
        if (isset($this->request->get['filter_booking_id'])) {
			$url .= '&filter_booking_id=' . urlencode(html_entity_decode($this->request->get['filter_booking_id'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		} 
        
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('addbooking/addbooking/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
	
		$data['delete'] = $this->url->link('addbooking/addbooking/delete', 'token=' . $this->session->data['token'] . $url, 'SSL'); 

		$data['driver_total_list']=array();
		$data['car_make_list_data']=array();
		$data['driver_list']=array();
        $filter_data = array(
			'filter_customer'	  => $filter_customer,
            'filter_distance'  => $filter_distance,
            'filter_form'  =>  $filter_form,
            'filter_price'  =>  $filter_price,
            'filter_to'  =>  $filter_to,
            'filter_deliver'  => $filter_deliver,
            'filter_booking_id'  => $filter_booking_id,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

       
		$this->load->model('addbooking/addbooking'); 
        $driver_total =$this->model_addbooking_addbooking->getAllDriverList($filter_data);
       // print_r($driver_total);die;
        $driver_total_list=$this->model_addbooking_addbooking->getTotalList($filter_data);
        $this->load->model('details/notbooking_asigned'); 
         $data['telecallers']=$this->model_details_notbooking_asigned->getTelecallers();
	    foreach ($driver_total as $result) {
			//print_r($result);die;
		$data['driver_list'][] = array(
				'id'	  =>$result['booking_status_id'],
		        'name'    => $result['firstname'],
                'customer_name'    => $result['customer_name'],
		        'city'    => $result['city'],
		        'state'    => $result['state'],
		        'vehicle'    => $result['vehicle'],
		        'pin'    => $result['pin'],
		        'add'    => $result['exact_address'],
		        'status'    => $result['name'],
				'form' => $result['form_address'],
				'customer_mobile_no' => $result['customer_mobile_no'],
                'to'  => $result['to_address'],
                'distance'  => $result['distance'],
                'price'  => $result['distance_price'],
                'booking_date'  => $result['booking_time'],
                'deliver_date'  => $result['delivering_time'],
                'assigned_to_telecaller'  => $result['assigned_to_telecaller'],
                 'edit'   => $this->url->link('addbooking/addbooking/edit', 'token=' . $this->session->data['token'] . '&customer_id=' . $result['customer_id'].'&book_id=' . $result['booking_status_id']. '&vehicle_id=' . $result['vehicle']. '&service_type=' . $result['service_type']. '&exact_address=' . $result['exact_address']. '&state=' . $result['state']. '&pin=' . $result['pin']. '&city=' . $result['city'] .'&id=' . $result['booking_status_id'] .'&customer=' . $result['customer_name'] .'&form=' . $result['form_address'].'&custname=' . $result['firstname'].'&username=' . $result['username'] .'&to=' . $result['to_address'].'&customer_mobile_no=' . $result['customer_mobile_no'].'&distance=' . $result['distance'].'&price=' . $result['distance_price'].'&deliver_date=' . $result['delivering_time'], 'SSL'),
               'view'   => $this->url->link('addbooking/addbooking/view', 'token=' . $this->session->data['token'] . '&id=' . $result['booking_status_id'], 'SSL'),
            'assign'   => $this->url->link('telecallerbooking/assigned_transporter/add', 'token=' . $this->session->data['token']. '&order_id=' . $result['booking_status_id'].'&deliver_time='.$result['delivering_time'].'&customer_name='.$result['firstname'], 'SSL')
                
			);
	  
		}

		
$data['service_center'] = $this->language->get('service_center');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
        $data['column_address'] = $this->language->get('column_address');
        $data['booking_id'] = $this->language->get('booking_id');
        $data['column_number'] = $this->language->get('column_number');
        $data['text_list'] = $this->language->get('text_list');
        $data['column_device'] = $this->language->get('text_device');
		$data['text_confirm'] = $this->language->get('text_confirm');
        $data['label_filter_name'] = $this->language->get('label_filter_name');
        $data['label_distance'] = $this->language->get('label_distance');
        $data['label_filter_address'] = $this->language->get('label_filter_address');
        $data['label_filter_number'] = $this->language->get('label_filter_number');
		$data['column_image'] = $this->language->get('column_image');
		$data['label_price'] = $this->language->get('label_price');
		$data['column_deliver'] = $this->language->get('column_deliver');
        $data['column_booking'] = $this->language->get('column_booking');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_action'] = $this->language->get('column_action');
		$data['column_distance'] = $this->language->get('column_distance');
		$data['distanceprice'] = $this->language->get('distanceprice');
       $data['entry_name'] = $this->language->get('entry_name');
       $data['label_deliver'] = $this->language->get('label_deliver');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['column_telephone'] = $this->language->get('column_telephone');
		$data['entry_quantity'] = $this->language->get('entry_quantity');
		$data['entry_status'] = $this->language->get('entry_status');
        $data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_view'] = $this->language->get('button_view');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['column_status'] = $this->language->get('column_status');
		$data['button_filter'] = $this->language->get('button_filter');
          $data['button_change_password'] = $this->language->get('button_change_password');
         $data['text_no_results'] = $this->language->get('text_no_results');
         $data['label_filter_booking'] = $this->language->get('label_filter_booking');

		$data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
        if (isset($this->error['price'])) {
			$data['error_price'] = $this->error['price'];
		} 
         if (isset($this->error['car_'])) {
			$data['error_name'] = $this->error['name'];
		} 

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';
		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

        
		if (isset($this->request->get['filter_distance'])) {
			$url .= '&filter_distance=' . urlencode(html_entity_decode($this->request->get['filter_distance'], ENT_QUOTES, 'UTF-8'));
		}
        
        if (isset($this->request->get['filter_form'])) {
			$url .= '&filter_form=' . urlencode(html_entity_decode($this->request->get['filter_form'], ENT_QUOTES, 'UTF-8'));
		}  
        if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . urlencode(html_entity_decode($this->request->get['filter_price'], ENT_QUOTES, 'UTF-8'));
		} 
        if (isset($this->request->get['filter_to'])) {
			$url .= '&filter_to=' . urlencode(html_entity_decode($this->request->get['filter_to'], ENT_QUOTES, 'UTF-8'));
		}
        if (isset($this->request->get['filter_deliver'])) {
			$url .= '&filter_deliver=' . urlencode(html_entity_decode($this->request->get['filter_deliver'], ENT_QUOTES, 'UTF-8'));
		}
      if (isset($this->request->get['filter_booking_id'])) {
			$url .= '&filter_booking_id=' . urlencode(html_entity_decode($this->request->get['filter_booking_id'], ENT_QUOTES, 'UTF-8'));
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}	
   $data['sort_customer'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . '&sort=c.firstname' . $url, 'SSL');
       $data['sort_distance'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . '&sort=bs.distance' . $url, 'SSL');
        $data['sort_form'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . '&sort=bs.form_address' . $url, 'SSL');  
        $data['sort_price'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . '&sort=bs.distance_price' . $url, 'SSL');
        $data['sort_to'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . '&sort=bs.to_address' . $url, 'SSL');
         $data['sort_booking'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . '&sort=bs.booking_time' . $url, 'SSL');
        $data['sort_deliver'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . '&sort=bs.delivering_time' . $url, 'SSL');
	
		$url = '';

if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

        
		if (isset($this->request->get['filter_distance'])) {
			$url .= '&filter_distance=' . urlencode(html_entity_decode($this->request->get['filter_distance'], ENT_QUOTES, 'UTF-8'));
		}
        
        if (isset($this->request->get['filter_form'])) {
			$url .= '&filter_form=' . urlencode(html_entity_decode($this->request->get['filter_form'], ENT_QUOTES, 'UTF-8'));
		}  
        if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . urlencode(html_entity_decode($this->request->get['filter_price'], ENT_QUOTES, 'UTF-8'));
		} 
        if (isset($this->request->get['filter_to'])) {
			$url .= '&filter_to=' . urlencode(html_entity_decode($this->request->get['filter_to'], ENT_QUOTES, 'UTF-8'));
		}
        if (isset($this->request->get['filter_deliver'])) {
			$url .= '&filter_deliver=' . urlencode(html_entity_decode($this->request->get['filter_deliver'], ENT_QUOTES, 'UTF-8'));
		}
        if (isset($this->request->get['filter_booking_id'])) {
			$url .= '&filter_booking_id=' . urlencode(html_entity_decode($this->request->get['filter_booking_id'], ENT_QUOTES, 'UTF-8'));
		}


	   if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $driver_total_list;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($driver_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($driver_total_list - $this->config->get('config_limit_admin'))) ? $driver_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $driver_total_list, ceil($driver_total_list / $this->config->get('config_limit_admin')));

		$data['filter_customer'] = $filter_customer;
		$data['filter_distance'] = $filter_distance;
        $data['filter_form'] = $filter_form;
        $data['filter_distance'] = $filter_distance;
        $data['filter_form'] = $filter_form;
        $data['filter_price'] = $filter_price;
        $data['filter_to'] = $filter_to;
        $data['filter_deliver'] = $filter_deliver;
        $data['filter_booking_id'] = $filter_booking_id;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		

		$this->response->setOutput($this->load->view('addbooking/addbooking_list.tpl', $data)); 
       
	}

	
    protected function getFormadd() {
   
		$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('addbooking/addbooking');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_pin'] = $this->language->get('entry_pin');
		$data['entry_city'] = $this->language->get('entry_city');
		$data['entry_address'] = $this->language->get('entry_address');
        $data['entry_number'] = $this->language->get('entry_number');
        $data['service_type'] = $this->language->get('service_type');
        $data['entry_mobile_number'] = $this->language->get('entry_mobile_number');
        $data['distanceprice'] = $this->language->get('distanceprice');
        $data['entry_customer_number'] = $this->language->get('entry_customer_number');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_state'] = $this->language->get('entry_state');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['delivertime'] = $this->language->get('delivertime');
		$data['vehicle'] = $this->language->get('vehicle');
		$data['button_save'] = $this->language->get('button_save');
		$data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_attribute_add'] = $this->language->get('button_attribute_add');
		$data['entry_add'] = $this->language->get('entry_add');
		$data['button_option_add'] = $this->language->get('button_option_add');
		$data['button_option_value_add'] = $this->language->get('button_option_value_add');
		$data['button_discount_add'] = $this->language->get('button_discount_add');
		$data['button_special_add'] = $this->language->get('button_special_add');
		$data['button_image_add'] = $this->language->get('button_image_add');
		$data['button_remove'] = $this->language->get('button_remove');
		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
        if (isset($this->error['customer_name'])) {
			$data['error_name'] = $this->error['customer_name'];
		} else {
			$data['error_name'] = '';
		}   
        if (isset($this->error['customer_number'])) {
			$data['error_number_ph'] = $this->error['customer_number'];
		} else {
			$data['error_number_ph'] = '';
		} 
        if (isset($this->error['state'])) {
			$data['error_state_name'] = $this->error['state'];
		} else {
			$data['error_state_name'] = '';
		} 
        if (isset($this->error['vehicle_name'])) {
			$data['error_vehicle'] = $this->error['vehicle_name'];
		} else {
			$data['error_vehicle'] = '';
		} 
          if (isset($this->error['service_type'])) {
			$data['error_service_type'] = $this->error['service_type'];
		} else {
			$data['error_service_type'] = '';
		} 
        
        if (isset($this->error['from'])) {
			$data['error_from'] = $this->error['from'];
		} else {
			$data['error_from'] = '';
		} 
        if (isset($this->error['to'])) {
			$data['error_to'] = $this->error['to'];
		} else {
			$data['error_to'] = '';
		} 
        if (isset($this->error['distance'])) {
			$data['error_distance'] = $this->error['distance'];
		} else {
			$data['error_distance'] = '';
		}  
        if (isset($this->error['price'])) {
			$data['error_price'] = $this->error['price'];
		} else {
			$data['error_price'] = '';
		} 
        if (isset($this->error['deliver_time'])) {
			$data['error_deliver_time'] = $this->error['deliver_time'];
		} else {
			$data['error_deliver_time'] = '';
		} 
        if (isset($this->error['city'])) {
			$data['error_city'] = $this->error['city'];
		} else {
			$data['error_city'] = '';
		} 
          if (isset($this->error['common'])) {
			$data['error_common'] = $this->error['common'];
		} else {
			$data['error_common'] = '';
		} 
        if (isset($this->error['pin'])) {
			$data['error_pin'] = $this->error['pin'];
		} else {
			$data['error_pin'] = '';
		}
  if (isset($this->error['add'])) {
			$data['error_add'] = $this->error['add'];
		} else {
			$data['error_add'] = '';
		}
        if (isset($this->error['state'])) {
			$data['error_state'] = $this->error['state'];
		} else {
			$data['error_state'] = '';
		}
         if (isset($this->request->get['customer'])) {
			$data['custname'] = $this->request->get['customer'];
		} else {
			$data['customer'] = '';
		}
           if (isset($this->request->get['vehicle_id'])) {
			$data['vehicle_id'] = $this->request->get['vehicle_id'];
		} else {
			$data['vehicle_id'] = '';
		}
           if (isset($this->request->get['form'])) {
			$data['from'] = $this->request->get['form'];
		} else {
			$data['from'] = '';
		}
           if (isset($this->request->get['to'])) {
			$data['to'] = $this->request->get['to'];
		} else {
			$data['to'] = '';
		}
           if (isset($this->request->get['username'])) {
			$data['username'] = $this->request->get['username'];
		} else {
			$data['username'] = '';
		}
          if (isset($this->request->get['price'])) {
			$data['price'] = $this->request->get['price'];
		} else {
			$data['price'] = '';
		}
          if (isset($this->request->get['deliver_date'])) {
			$data['deliver_date'] = $this->request->get['deliver_date'];
		} else {
			$data['deliver_date'] = '';
		}
            if (isset($this->request->get['customer_mobile_no'])) {
			$data['customer_mobile_no'] = $this->request->get['customer_mobile_no'];
		} else {
			$data['customer_mobile_no'] = '';
		}
            if (isset($this->request->get['distance'])) {
			$data['distance'] = $this->request->get['distance'];
		} else {
			$data['distance'] = '';
		}
            if (isset($this->request->get['exact_address'])) {
			$data['address'] = $this->request->get['exact_address'];
		} else {
			$data['address'] = '';
		}
             if (isset($this->request->get['service_type'])) {
			$data['service_id'] = $this->request->get['service_type'];
		} else {
			$data['service_id'] = '';
		}
          if (isset($this->request->get['pin'])) {
			$data['pin'] = $this->request->get['pin'];
		} else {
			$data['pin'] = '';
		}
        if(isset($this->request->post['service_type']))
        {
        $data['service_id']=$this->request->post['service_type'];
        }
         if(isset($this->request->post['vehicle_name']))
        {
        $data['vehicle_id']=$this->request->post['vehicle_name'];
        }
         if(isset($this->request->post['customer_name']))
        {
        $data['custname']=$this->request->post['customer_name'];
        }
        if(isset($this->request->post['deliver_time']))
        {
        $data['deliver_date']=$this->request->post['deliver_time'];
        }
        
         if(isset($this->request->post['mobile']))
        {
        $data['customer_mobile_no']=$this->request->post['mobile'];
        }
        
         if(isset($this->request->post['distance']))
        {
        $data['distance']=$this->request->post['distance'];
        }
        
         if(isset($this->request->post['price']))
        {
        $data['price']=$this->request->post['price'];
        }
        
         if(isset($this->request->post['add']))
        {
        $data['address']=$this->request->post['add'];
        }
        
         if(isset($this->request->post['pin']))
        {
        $data['pin']=$this->request->post['pin'];
        }
        
         if(isset($this->request->post['form']))
        {
        $data['from']=$this->request->post['form'];
        }
        
         if(isset($this->request->post['to']))
        {
        $data['to']=$this->request->post['to'];
        }

	

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'], 'SSL')
		);

         
        
        if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('addbooking/addbooking/add', 'token=' . $this->session->data['token'], 'SSL');
            $data['id']="";
		} else {
            $data['action'] = $this->url->link('addbooking/addbooking/edit', 'token=' . $this->session->data['token'] .'&id='.$this->request->get['id'].'&customer='.$this->request->get['customer'].'&form='.$this->request->get['form'].'&to='.$this->request->get['to'].'&distance='.$this->request->get['distance'].'&price='.$this->request->get['price'].'&deliver_date='.$this->request->get['deliver_date'].'&book_id='.$this->request->get['book_id'], 'SSL');
            
        $data['id']=$this->request->get['id'];
       
                    
		}

        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'], 'SSL')
		);

      
        
        $data['cancel'] = $this->url->link('addbooking/addbooking', 'token=' . $this->session->data['token'], 'SSL');
        
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['total_customer'] =$this->model_addbooking_addbooking->getAllCustomer();
        $data['total_vehicle'] =$this->model_addbooking_addbooking->getAllVehicle();
        $data['total_service'] =$this->model_addbooking_addbooking->getAllService();
        $this->response->setOutput($this->load->view('addbooking/addbooking_form.tpl', $data));
        
    }
                }
  