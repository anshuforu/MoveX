<?php
class ControllerTelecallerbookingTotalBooking extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('telecallerbooking/total_booking');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallerbooking/total_booking');

		$this->getList();
	}
    public function info()
    {
        $this->load->language('telecallerbooking/total_booking');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallerbooking/total_booking');
           


		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if($this->request->server['REQUEST_METHOD'] == 'POST' )
             {
             if(isset($this->request->get['order_id']))
             {
          $data['margin']=$this->model_telecallerbooking_total_booking->getMargin($this->request->get['order_id']);
          $data['customer']=$this->model_telecallerbooking_total_booking->getCust($this->request->get['order_id']);
              }
            $data['abc']=$this->model_telecallerbooking_total_booking->addPrice($this->request->post);
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

			$this->response->redirect($this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . $url, 'SSL'));
           }
        else{
        
         $this->formAdd();
        
        }
    
	}
    public function formAdd()    
    {
        $this->load->language('telecallerbooking/total_booking');
	$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('telecallerbooking/total_booking');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
        
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_eastimate'] = $this->language->get('entry_eastimate');
		$data['entry_margin'] = $this->language->get('entry_margin');
		$data['entry_address'] = $this->language->get('entry_address');
        $data['entry_number'] = $this->language->get('entry_number');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['text_margin'] = $this->language->get('text_margin');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['submit'] = $this->language->get('submit');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_trans'] = $this->language->get('text_trans');
		$data['button_save'] = $this->language->get('button_save');
		$data['entry_customer'] = $this->language->get('entry_customer');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['entry_b_id'] = $this->language->get('entry_b_id');
		$data['button_attribute_add'] = $this->language->get('button_attribute_add');
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
        
		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_service_center=' . urlencode(html_entity_decode($this->request->get['filter_service_center'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

         
        


        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'], 'SSL')
		);
        
        $data['cancel'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'], 'SSL');
        $data['action'] = $this->url->link('telecallerbooking/total_booking/info', 'token=' . $this->session->data['token'], 'SSL');
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        //$data['eastimate_price']=$this->model_telecallerbooking_total_booking->eastimateprice($this->request->get['order_id']);
        $data['margin']=$this->model_telecallerbooking_total_booking->getMargin($this->request->get['order_id']);
        $data['customer']=$this->model_telecallerbooking_total_booking->getCust($this->request->get['order_id']);
        $data['eastimate_price']=$this->model_telecallerbooking_total_booking->getDistancePrice($this->request->get['order_id']);
       // print_r($data['margin']);die;
        $this->response->setOutput($this->load->view('telecallerbooking/calculation_form.tpl', $data));
    }
  
   
    public function delete()
    {
         $this->load->language('telecallerbooking/total_booking');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallerbooking/total_booking');
           


		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if(($this->request->server['REQUEST_METHOD'] == 'POST' ) && $this->validate())
             {
           
            $data['abc']=$this->model_telecallerbooking_total_booking->updatePayment($this->request->post);
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

			$this->response->redirect($this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . $url, 'SSL'));
           }
        else{
        
         $this->getformAdd();
        
        }
    }
 public function getformAdd()    
    {
        $this->load->language('telecallerbooking/total_booking');
	$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('telecallerbooking/total_booking');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_data'] = !isset($this->request->get['id']) ? $this->language->get('text_data') : $this->language->get('text_edit');
        
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_eastimate'] = $this->language->get('entry_eastimate');
		$data['entry_margin'] = $this->language->get('entry_margin');
		$data['entry_address'] = $this->language->get('entry_address');
        $data['entry_number'] = $this->language->get('entry_number');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['text_margin'] = $this->language->get('text_margin');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['submit'] = $this->language->get('submit');
        $data['entry_customer'] = $this->language->get('entry_customer');
		$data['text_address'] = $this->language->get('text_address');
		$data['text_trans'] = $this->language->get('text_trans');
		$data['text_amount_bal'] = $this->language->get('text_amount_bal');
		$data['button_save'] = $this->language->get('button_save');
		$data['text_amount_pay'] = $this->language->get('text_amount_pay');
		$data['calcualted_amount_receive'] = $this->language->get('calcualted_amount_receive');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['entry_actual'] = $this->language->get('entry_actual');
		$data['button_attribute_add'] = $this->language->get('button_attribute_add');
		$data['button_option_add'] = $this->language->get('button_option_add');
		$data['button_option_value_add'] = $this->language->get('button_option_value_add');
		$data['button_discount_add'] = $this->language->get('button_discount_add');
		$data['button_special_add'] = $this->language->get('button_special_add');
		$data['button_image_add'] = $this->language->get('button_image_add');
		$data['button_remove'] = $this->language->get('button_remove');
				$data['entry_b_id'] = $this->language->get('entry_b_id');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
     
      
        
		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_service_center=' . urlencode(html_entity_decode($this->request->get['filter_service_center'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

         
        


        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'], 'SSL')
		);
     if (isset($this->error['number'])) {
			$data['error_number'] = $this->error['number'];
		} else {
			$data['error_number'] = '';
		}
      
      if (isset($this->error['balance'])) {
			$data['error_balance'] = $this->error['balance'];
		} else {
			$data['error_balance'] = '';
		}
      
        
        $data['cancel'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'], 'SSL');
        $data['action'] = $this->url->link('telecallerbooking/total_booking/delete', 'token=' . $this->session->data['token']. '&order_id='.$this->request->get['order_id'], 'SSL');
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        if(isset($this->request->get['order_id']))
        {
        //$data['eastimate_price']=$this->model_telecallerbooking_total_booking->eastimateprice($this->request->get['order_id']);
        $data['margin']=$this->model_telecallerbooking_total_booking->getMargin($this->request->get['order_id']);
        $data['amount_cal']=$this->model_telecallerbooking_total_booking->amountcal($this->request->get['order_id']);
    
        //$data['eas']=$this->model_telecallerbooking_total_booking->eastimate($this->request->get['order_id']);
        $data['total_payment']=$this->model_telecallerbooking_total_booking->payment($this->request->get['order_id']);
        $data['customer']=$this->model_telecallerbooking_total_booking->getCust($this->request->get['order_id']);
        $data['balance']=$this->model_telecallerbooking_total_booking->getBalance($this->request->get['order_id']);
        }
        $this->response->setOutput($this->load->view('telecallerbooking/payment_form.tpl', $data));
    }
  

	protected function getList() {
		if (isset($this->request->get['filter_name_id'])) {
			$filter_name_id = $this->request->get['filter_name_id'];
		} else {
			$filter_name_id = null;
		}	
        if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['filter_form_address'])) {
			$filter_form_address = $this->request->get['filter_form_address'];
		} else {
			$filter_form_address = null;
		}

		if (isset($this->request->get['filter_price1'])) {
			$filter_price1 = $this->request->get['filter_price1'];
		} else {
			$filter_price1 = null;
		}

		if (isset($this->request->get['filter_to_address'])) {
			$filter_to_address = $this->request->get['filter_to_address'];
		} else {
			$filter_to_address = null;
		}

		if (isset($this->request->get['filter_vehicle'])) {
			$filter_vehicle = $this->request->get['filter_vehicle'];
		} else {
			$filter_vehicle = null;
		}

		if (isset($this->request->get['filter_booking_date'])) {
			$filter_booking_date = $this->request->get['filter_booking_date'];
		} else {
			$filter_booking_date = null;
		}	
        if (isset($this->request->get['filter_delivering_date'])) {
			$filter_delivering_date = $this->request->get['filter_delivering_date'];
		} else {
			$filter_delivering_date = null;
		}	
        if (isset($this->request->get['filter_distance'])) {
			$filter_distance = $this->request->get['filter_distance'];
		} else {
			$filter_distance = null;
		}  
        if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bs.booking_status_id';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_name_id'])) {
			$url .= '&filter_name_id=' . $this->request->get['filter_name_id'];
		}

		if (isset($this->request->get['filter_form_address'])) {
			$url .= '&filter_form_address=' . urlencode(html_entity_decode($this->request->get['filter_form_address'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price1'])) {
			$url .= '&filter_price1=' . $this->request->get['filter_price1'];
		}	
        
        if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_to_address'])) {
			$url .= '&filter_to_address=' . $this->request->get['filter_to_address'];
		}

		if (isset($this->request->get['filter_vehicle'])) {
			$url .= '&filter_vehicle=' . $this->request->get['filter_vehicle'];
		}

		if (isset($this->request->get['filter_booking_date'])) {
			$url .= '&filter_booking_date=' . $this->request->get['filter_booking_date'];
		}	
        if (isset($this->request->get['filter_delivering_date'])) {
			$url .= '&filter_delivering_date=' . $this->request->get['filter_delivering_date'];
		}	
        if (isset($this->request->get['filter_distance'])) {
			$url .= '&filter_distance=' . $this->request->get['filter_distance'];
		}
        if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
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
			'href' => $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		//$data['invoice'] = $this->url->link('telecallerbooking/total_booking/invoice', 'token=' . $this->session->data['token'], 'SSL');
	
		$data['orders'] = array();

		$filter_data = array(
			'filter_form_address'      => $filter_form_address,
            'filter_to_address'      => $filter_to_address,
			'filter_name_id'	   => $filter_name_id,
			'filter_price1'  => $filter_price1,
			'filter_status'  => $filter_status,
			'filter_vehicle'         => $filter_vehicle,
			'filter_booking_date'    => $filter_booking_date,
			'filter_distance' => $filter_distance,
			'filter_status' => $filter_status,
            'filter_delivering_date'=>$filter_delivering_date,
			'sort'                 => $sort,
			'order'                => $order,
			'start'                => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'                => $this->config->get('config_limit_admin')
		);
    
        $data['action'] = $this->url->link('telecallerbooking/total_booking/info', 'token=' . $this->session->data['token'], 'SSL');
          $user_id=$this->user->getId();
        $order_total = $this->model_telecallerbooking_total_booking->getTotalOrders($filter_data,$user_id);
      
        $telecaller_id = $this->model_telecallerbooking_total_booking->getTelecallerId($user_id);
      
		$results = $this->model_telecallerbooking_total_booking->getCouponOrders($filter_data,$telecaller_id);
       
        if(isset($results)?$results:"")
    
       foreach ($results as $result) {
			$data['orders'][] = array(
				'order_id'      => $result['booking_status_id'],
				'name'          => $result['customer_name'],
				'status'        => $result['name'],
                'distance'        => $result['distance'],
				//'total'         => $result['total_price'],
				'form_address'  => $result['form_address'],
                'to_address'    => $result['to_address'],
               //'total_price'   => $result['total_price'],
               'assigned_to_transporter'=>$result['assigned_to_transporter'],
               'amount_cal'=>$result['amount_calc'],
                'booking_time'   =>$result['booking_time'],
                'deliver_time'   =>$result['delivering_time'],
                'status_id'       =>$result['status'],
				'view'          => $this->url->link('details/booking_asignedtran/view', 'token=' . $this->session->data['token'] . '&id=' . $result['booking_status_id'].'&assigned_to_transporter=' . $result['assigned_to_transporter'] . $url, 'SSL'),
                'update'          => $this->url->link('telecallerbooking/total_booking/info', 'token=' . $this->session->data['token'] . '&order_id=' . $result['booking_status_id'] . $url, 'SSL'),
				'edit'          => $this->url->link('telecallerbooking/total_booking/edit', 'token=' . $this->session->data['token'] . '&order_id=' . $result['booking_status_id'] . $url, 'SSL'),
                'href'          => $this->url->link('telecallerbooking/assigned_transporter/add', 'token=' . $this->session->data['token'] . '&order_id=' . $result['booking_status_id'] .'&deliver_time=' . $result['delivering_time'].'&customer_name=' . $result['customer_name']. $url, 'SSL'),
				'delete'        => $this->url->link('telecallerbooking/total_booking/delete', 'token=' . $this->session->data['token'] . '&order_id=' . $result['booking_status_id'] . $url, 'SSL')
			);
           
		}

		$data['heading_title'] = $this->language->get('heading_title');
        $data['entry_name_id'] = $this->language->get('entry_name_id');
        $data['entry_address'] = $this->language->get('entry_address');
        $data['entry_booking_date'] = $this->language->get('entry_booking_date');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_distance'] = $this->language->get('entry_distance');
        $data['entry_vehicle'] = $this->language->get('entry_vehicle');
		
		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['text_missing'] = $this->language->get('text_missing');
		$data['entry_price'] = $this->language->get('entry_price');

		$data['column_order_id'] = $this->language->get('column_order_id');
		$data['column_customer'] = $this->language->get('column_customer');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_total'] = $this->language->get('column_total');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_date_modified'] = $this->language->get('column_date_modified');
		$data['column_action'] = $this->language->get('column_action');
		$data['column_rcv'] = $this->language->get('column_rcv');
		$data['column_up'] = $this->language->get('column_up');
		$data['telecaller_id'] = $this->language->get('telecaller_id');

		$data['entry_return_id'] = $this->language->get('entry_return_id');
		$data['entry_order_id'] = $this->language->get('entry_order_id');
		$data['entry_customer'] = $this->language->get('entry_customer');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_form_address'] = $this->language->get('entry_form_address');
		$data['entry_date_added'] = $this->language->get('entry_date_added');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['entry_to_address'] = $this->language->get('entry_to_address');
		$data['entry_vehicle'] = $this->language->get('entry_vehicle');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_form_address'] = $this->language->get('entry_form_address');
		$data['entry_to_address'] = $this->language->get('entry_to_address');
		$data['asign_to'] = $this->language->get('asign_to');
		$data['payment'] = $this->language->get('payment');
		$data['entry_distance'] = $this->language->get('entry_distance');
		$data['entry_date_modified'] = $this->language->get('entry_date_modified');
		$data['entry_delivering_date'] = $this->language->get('entry_delivering_date');
		$data['update_amu'] = $this->language->get('update_amu');

		$data['button_invoice_print'] = $this->language->get('button_invoice_print');
		$data['button_shipping_print'] = $this->language->get('button_shipping_print');
		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
		$data['button_view'] = $this->language->get('button_view');

		$data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
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

     if (isset($this->request->get['filter_form_address'])) {
			$url .= '&filter_form_address=' . urlencode(html_entity_decode($this->request->get['filter_form_address'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_to_address'])) {
			$url .= '&filter_to_address=' . $this->request->get['filter_to_address'];
		}

		if (isset($this->request->get['filter_vehicle'])) {
			$url .= '&filter_vehicle=' . $this->request->get['filter_vehicle'];
		}

		if (isset($this->request->get['filter_booking_date'])) {
			$url .= '&filter_booking_date=' . $this->request->get['filter_booking_date'];
		}	
        if (isset($this->request->get['filter_delivering_date'])) {
			$url .= '&filter_delivering_date=' . $this->request->get['filter_delivering_date'];
		}	
        if (isset($this->request->get['filter_distance'])) {
			$url .= '&filter_distance=' . $this->request->get['filter_distance'];
		}
        if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_order'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=o.order_id' . $url, 'SSL');
		$data['sort_formaddress'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=bs.form_address' . $url, 'SSL');
		$data['sort_toaddress'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=bs.to_address' . $url, 'SSL');
		$data['sort_distance'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=bs.distance' . $url, 'SSL');
		$data['sort_customer'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=customer' . $url, 'SSL');
		$data['sort_vehicle'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=vt.vehicle_type_name' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
		$data['sort_ddate'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=bs.delivering_time' . $url, 'SSL');
		$data['sort_bdate'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=bs.booking_time' . $url, 'SSL');
		$data['sort_price'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=tbp.total_price' . $url, 'SSL');
		$data['sort_total'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=o.total' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=os.name' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=o.date_added' . $url, 'SSL');
		$data['sort_date_modified'] = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . '&sort=o.date_modified' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}

		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}
       if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $order_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('telecallerbooking/total_booking', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($order_total - $this->config->get('config_limit_admin'))) ? $order_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $order_total, ceil($order_total / $this->config->get('config_limit_admin')));
  
		$data['filter_name_id'] = $filter_name_id;
		$data['filter_form_address'] = $filter_form_address;
		$data['filter_status'] = $filter_status;
		$data['filter_price1'] = $filter_price1;
		$data['filter_to_address'] = $filter_to_address;
		$data['filter_vehicle'] = $filter_vehicle;
		$data['filter_booking_date'] = $filter_booking_date;
		$data['filter_delivering_date'] = $filter_delivering_date;
		$data['filter_distance'] = $filter_distance;

		$this->load->model('localisation/order_status');

		$data['vehicle'] = $this->model_telecallerbooking_total_booking->getVehicle();
          
		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('telecallerbooking/total_booking_list.tpl', $data));
	}
     protected function validate() {
		
          if ($this->request->post['number'] == '') {
			$this->error['number'] = $this->language->get('error_number');
		}
         
         if ($this->request->post['number'] > $this->request->post['balance']) {
			$this->error['balance'] = $this->language->get('error_balance');
		}


		return !$this->error;
	}

}
