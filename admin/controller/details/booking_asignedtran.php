<?php
class ControllerDetailsBookingAsignedtran extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/booking_asignedtran');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/booking_asignedtran');
		
		$this->getList();
    }
    public function delete() {
			$this->load->language('details/booking_asignedtran');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/booking_asignedtran');
    
		if (isset($this->request->post['selected']))
            {
			foreach ($this->request->post['selected'] as $id) {
				//$this->model_details_booking_asignedtran->delete($id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_address'])) {
				$url .= '&filter_address=' . $this->request->get['filter_address'];
			}
            
            if (isset($this->request->get['filter_number'])) {
				$url .= '&filter_number=' . $this->request->get['filter_number'];
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

			$this->response->redirect($this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}
            

	public function add() {
       
		$this->load->language('details/booking_asignedtran');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/booking_asignedtran');
           


		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if($this->request->server['REQUEST_METHOD'] == 'POST' )
             {
               $data['abc']=$this->model_details_booking_asignedtran->addDriver($this->request->post);
               $this->session->data['success'] = $this->language->get('text_success');
               $this->session->data['success'] = $this->language->get('text_success');
            
			$url = '';  

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}


			if (isset($this->request->get['filter_address'])) {
				$url .= '&filter_address=' . $this->request->get['filter_address'];
			}
            if (isset($this->request->get['filter_number'])) {
				$url .= '&filter_number=' . $this->request->get['filter_number'];
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

			$this->response->redirect($this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'] . $url, 'SSL'));

           
           }
        else{
        
         $this->getFormadd();
        
        }
    
	}
    public function edit() {

		        $this->load->language('telecallerbooking/assigned_telecaller');
        $data['booking_id']=$this->request->get['id'];
        $this->session->data['booking']=$data['booking_id'];
if($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate())
{
    $vehicle_no=$this->request->post['vehicleno'];
     $this->load->model('telecallerbooking/assigned_telecaller');
                  $booking_id=$this->session->data['booking'];
 $this->model_telecallerbooking_assigned_telecaller->edit($booking_id,$this->request->post,$vehicle_no);
     
    			$this->response->redirect($this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'], 'SSL'));
    //$this->getList();
        
}
   
         
        else{
        
         $this->getFormadd();
        
        }
}
  
public function view() {
     $booking_customer=array();
		$this->load->model('details/booking_asignedtran');
        if (isset($this->request->get['id'])) {
            $id = $this->request->get['id'];
            
		} else {
			$id = 0;
		}
   // echo $id;die;
    	$this->load->model('telecallerbooking/total_booking');
        $view_details=$this->model_details_booking_asignedtran->viewdata($id);
       $data['total_amount']=$this->model_telecallerbooking_total_booking->amountcal($id);
        $data['payment_details']=$this->model_details_booking_asignedtran->viewpayment($id);
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
				'mobile_no' => $view_detail['mobile_no'],
                'customer_mobile_no' => $view_detail['customer_mobile_no'],
                'licence_no'  => $view_detail['licence_no'],
                'labour'  => $view_detail['labour'],
                'labour_count' => $view_detail['labour_count'],
                'amount_cal' => $view_detail['amount_calc'],
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
             'href'          => $this->url->link('telecallerbooking/assigned_transporter/add', 'token=' . $this->session->data['token'] . '&order_id=' . $view_detail['booking_status_id'] .'&deliver_time=' . $view_detail['delivering_time'] .'&customer_name=' . $view_detail['firstname'], 'SSL'),
             'update'          => $this->url->link('telecallerbooking/total_booking/info', 'token=' . $this->session->data['token'] . '&order_id=' . $view_detail['booking_status_id'], 'SSL'),
            'payment'        => $this->url->link('telecallerbooking/total_booking/delete', 'token=' . $this->session->data['token'] . '&order_id=' . $view_detail['booking_status_id'], 'SSL')
                
			);
	  
		}


        $this->load->language('details/booking_asignedtran');

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
			$data['tarnspoter'] = $this->language->get('tarnspoter');
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
            $data['vehicle_type'] = $this->language->get('vehicle_type');

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
            $data['column_amount'] = $this->language->get('column_amount');
            $data['column_paid'] = $this->language->get('column_paid');
            $data['column_balance'] = $this->language->get('column_balance');

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
			$data['Vehicle_no'] = $this->language->get('Vehicle_no');

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
       if (isset($this->request->get['assigned_to_transporter'])) {
			$data['assigned_to_transporter'] = $this->request->get['assigned_to_transporter'];
		} else {
			$data['assigned_to_transporter'] = '';
		}

			$data['token'] = $this->session->data['token'];

			
			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'], 'SSL')
			);
          	$data['invoice'] = $this->url->link('details/booking_asignedtran/invoice', 'token=' . $this->session->data['token'] . '&order_id=' . (int)$this->request->get['id'], 'SSL');
        $data['cancel'] = $this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'], 'SSL');
           $data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
		
			$this->response->setOutput($this->load->view('details/bookingassigntran_view.tpl',$data));
		
}
                
    
	protected function getList() {
        
      if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}


		if (isset($this->request->get['filter_address'])) {
			$filter_address = $this->request->get['filter_address'];
		} else {
			$filter_address = null;
		}
        
        if (isset($this->request->get['filter_number'])) {
			$filter_number = $this->request->get['filter_number'];
		} else {
			$filter_number = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'dm.name';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'dm.address';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'dm.number';
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

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

        
		if (isset($this->request->get['filter_address'])) {
			$url .= '&filter_address=' . urlencode(html_entity_decode($this->request->get['filter_address'], ENT_QUOTES, 'UTF-8'));
		}
        
        if (isset($this->request->get['filter_number'])) {
			$url .= '&filter_number=' . urlencode(html_entity_decode($this->request->get['filter_number'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('details/booking_asignedtran/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
	
		$data['delete'] = $this->url->link('details/booking_asignedtran/delete', 'token=' . $this->session->data['token'] . $url, 'SSL'); 

		$data['asigned_total_list']=array();
		$data['asined_list ']=array();
		$data['car_make_list_data']=array();
		$data['asigned_list']=array();
        $filter_data = array(
			'filter_name'	  => $filter_name,
            'filter_address'  => $filter_address,
            'filter_number'  =>  $filter_number,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

       
		$this->load->model('details/booking_asignedtran'); 
        $user_id=$this->user->getId();
        $asigned_total =$this->model_details_booking_asignedtran->getAllAsignedList($filter_data,$user_id);
        //print_r($asigned_total);die;
        
        $asigned_total_list=$this->model_details_booking_asignedtran->getTotalList($filter_data,$user_id);
   
	    foreach ($asigned_total as $result) {
			
		$data['asined_list'][] = array(
				'id'	  =>$result['booking_status_id'],
		        'booking_id'    => $result['booking_status_id'],
		        'driver_name'    => $result['driver_name'],
		        'vehicle_no'    => $result['vehicle_no'],
		        'name'    => $result['name'],
				'telecaller' => $result['vendor_name'],
                'customer'  => $result['firstname'],
                'mobile_no'  => $result['mobile_no'],
              'view'   => $this->url->link('details/booking_asignedtran/view', 'token=' . $this->session->data['token'] . '&id=' . $result['booking_status_id'] .'&name=' . $result['driver_name'] .'&number=' . $result['vehicle_no'] .'&address=' . $result['name'] . $url, 'SSL'),
                'edit'   => $this->url->link('details/booking_asignedtran/edit', 'token=' . $this->session->data['token']  .'&id=' . $result['booking_status_id'] . '&vehicle_type=' . $result['vehicle'] . '&area=' . $result['area'] . '&subarea=' . $result['subarea'] . '&vehicle_no=' . $result['vehicle_no'] . '&driver=' . $result['driver_name'] . '&transport=' . $result['transporter_id']. '&licence_no=' . $result['licence_no'] . '&mobile_no=' . $result['mobile_no'] . '&city=' . $result['city'].'&make=' . $result['make'].'&model=' . $result['model'] . '&lorry=' . $result['lorry'] .'&insurance_date=' . $result['insurance_due_date'] . $url, 'SSL')
                
			);
	  
		}

		
$data['service_center'] = $this->language->get('service_center');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
        $data['column_address'] = $this->language->get('column_address');
        $data['column_number'] = $this->language->get('column_number');
        $data['text_list'] = $this->language->get('text_list');
		$data['text_confirm'] = $this->language->get('text_confirm');
        $data['label_filter_name'] = $this->language->get('label_filter_name');
        $data['column_asign'] = $this->language->get('column_asign');
        $data['label_filter_address'] = $this->language->get('label_filter_address');
        $data['label_filter_number'] = $this->language->get('label_filter_number');
		$data['column_image'] = $this->language->get('column_image');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_action'] = $this->language->get('column_action');
       $data['entry_name'] = $this->language->get('entry_name');
       $data['column_status'] = $this->language->get('column_status');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['entry_quantity'] = $this->language->get('entry_quantity');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['column_driver'] = $this->language->get('column_driver');
        $data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
          $data['button_change_password'] = $this->language->get('button_change_password');
         $data['text_no_results'] = $this->language->get('text_no_results');
         $data['column_vehicle'] = $this->language->get('column_vehicle');
         $data['column_model'] = $this->language->get('column_model');

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

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
   	if (isset($this->request->get['filter_address'])) {
			$url .= '&filter_address=' . $this->request->get['filter_address'];
		}
        	if (isset($this->request->get['filter_number'])) {
			$url .= '&filter_number=' . $this->request->get['filter_number'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'] . '&sort=dm.driver_name' . $url, 'SSL');
       $data['sort_address'] = $this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'] . '&sort=dm.driver_address' . $url, 'SSL');
        $data['sort_number'] = $this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'] . '&sort=dm.driver_number' . $url, 'SSL');
	
		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_address'])) {
			$url .= '&filter_address=' . $this->request->get['filter_address'];
		}
      
        if (isset($this->request->get['filter_number'])) {
			$url .= '&filter_number=' . $this->request->get['filter_number'];
		}

	   if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $asigned_total_list;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($asigned_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($asigned_total_list - $this->config->get('config_limit_admin'))) ? $asigned_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $asigned_total_list, ceil($asigned_total_list / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_address'] = $filter_address;
        $data['filter_number'] = $filter_number;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		

		$this->response->setOutput($this->load->view('details/asignedtran_list.tpl', $data)); 
       
	}

	
    protected function getFormadd() {
   		$this->load->model('order/assign_telecaller');
        $data['bookings'] = $this->model_order_assign_telecaller->getBookingId();
        
		$this->load->language('telecallerbooking/assigned_telecaller');

		$this->load->model('telecallerbooking/assigned_telecaller');
		$data['transporter_names']=$this->model_telecallerbooking_assigned_telecaller->getAllTransporters();
        $data['vehicle_types']=$this->model_telecallerbooking_assigned_telecaller->getVehicleTypes();
        $data['all_areas']=$this->model_telecallerbooking_assigned_telecaller->getAllAreas();
         $data['all_makes']=$this->model_telecallerbooking_assigned_telecaller->getAllMakes();
         $data['all_models']=$this->model_telecallerbooking_assigned_telecaller->getAllModels();
         $data['all_subareas']=$this->model_telecallerbooking_assigned_telecaller->getAllSubAreas($this->request->get['area']);
	   $data['vehicle_type'] = $this->language->get('column_name');
          $data['transport_name'] = $this->language->get('transport_name');
          $data['area_name'] = $this->language->get('area_name');
        $data['entry_make'] = $this->language->get('entry_make');
        $data['entry_model'] = $this->language->get('entry_model');
		$data['vehicle_number'] = $this->language->get('column_vehicle_number');
        $data['subarea'] = $this->language->get('column_subarea');
        $data['driver_name'] = $this->language->get('column_driver_name');
        $data['licence_no'] = $this->language->get('column_driver_licence_number');
        $data['mobile_no'] = $this->language->get('column_mobile_number');
        $data['vehicle_type'] = $this->language->get('column_vehicle_type');
        $data['address'] = $this->language->get('column_transport_address');
        $data['city'] = $this->language->get('column_city');
        $data['area'] = $this->language->get('column_area');
         $data['sub_area'] = $this->language->get('column_sub_area');
         $data['lorry'] = $this->language->get('column_lorry');
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
			'href' => $this->url->link('telecallerbooking/assigned_telecaller', 'token=' . $this->session->data['token'], 'SSL')
		);
        $data['cancel'] = $this->url->link('telecallerbooking/total_booking/', 'token=' . $this->session->data['token'], 'SSL');

        $data['token']= $this->session->data['token'];
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

        
        if(isset($this->request->get['id']))
        {
            $data['booking_id']=$this->request->get['id'];
        }
        else
              $data['booking_id']="";
             if(isset($this->request->get['vehicle_no']))
        {
            $data['vehicle_no']=$this->request->get['vehicle_no'];
        }
        else
              $data['vehicle_no']="";
        
                 if(isset($this->request->get['vehicle_type']))
        {
            $data['type']=$this->request->get['vehicle_type'];
        }
        else
              $data['type']="";
        if(isset($this->request->get['area']))
        {
           $data['area']=$this->request->get['area'];
        }
        else
              $data['area']="";
            if(isset($this->request->get['subarea']))
        {
            $data['sub']=$this->request->get['subarea'];
        }
        else
              $data['sub']="";
     
                if(isset($this->request->get['driver']))
        {
            $data['driver']=$this->request->get['driver'];
        }
        else
              $data['driver']="";
                  if(isset($this->request->get['licence_no']))
        {
            $data['licence']=$this->request->get['licence_no'];
        }
        else
              $data['licence']="";
           if(isset($this->request->get['transport']))
        {
            $data['transport']=$this->request->get['transport'];
        }
        else
              $data['transport']="";
            if(isset($this->request->get['make']))
        {
            $data['make']=$this->request->get['make'];
        }
        else
              $data['make']="";
            if(isset($this->request->get['model']))
        {
            $data['model']=$this->request->get['model'];
        }
        else
              $data['model']="";
    
                if(isset($this->request->get['mobile_no']))
        {
            $data['mobile']=$this->request->get['mobile_no'];
        }
        else
              $data['mobile']="";
                        if(isset($this->request->get['city']))
        {
            $data['city_name']=$this->request->get['city'];
        }
                        if(isset($this->request->get['lorry']))
        {
            $data['lorry']=$this->request->get['lorry'];
        }
                        if(isset($this->request->get['licence_no']))
        {
            $data['licence_no']=$this->request->get['licence_no'];
        }
                          if(isset($this->request->get['insurance_date']))
        {
            $data['insurance_due_date']=$this->request->get['insurance_date'];
        }
        else
              $data['city_name']="";
          if(isset($this->request->post['vehicle_type_id']))
        {
        $data['type']=$this->request->post['vehicle_type_id'];
        }
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
        $data['type']=$this->request->post['vehicle_type_id'];
        }

                 $data['action'] = $this->url->link('details/booking_asignedtran/edit', '&id='.$this->request->get['id'] .'&token=' . $this->session->data['token'], 'SSL');
          $data['cancel'] = $this->url->link('details/booking_asignedtran' .'&token=' . $this->session->data['token'], 'SSL');
		
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('telecallerbooking/edit_assigned_transporter.tpl', $data));
        
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
  
