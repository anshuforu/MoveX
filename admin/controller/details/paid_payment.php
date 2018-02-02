<?php
class ControllerDetailsPaidPayment extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/paid_payment');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/paid_payment');
		
		$this->getList();
    }
   
    
	protected function getList() {
        
      if (isset($this->request->get['filter_booking_id'])) {
			$filter_booking_id = $this->request->get['filter_booking_id'];
		} else {
			$filter_booking_id = null;
		}


		if (isset($this->request->get['filter_balance_amount'])) {
			$filter_balance_amount = $this->request->get['filter_balance_amount'];
		} else {
			$filter_balance_amount = null;
		}
        
        if (isset($this->request->get['filter_paid_amount'])) {
			$filter_paid_amount = $this->request->get['filter_paid_amount'];
		} else {
			$filter_paid_amount= null;
		}     
        if (isset($this->request->get['filter_transpoter'])) {
			$filter_transpoter = $this->request->get['filter_transpoter'];
		} else {
			$filter_transpoter= null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.booking_id';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'vendor_name';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.paid_payment';
		}

        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.balance_payment';
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

		if (isset($this->request->get['filter_booking_id'])) {
			$url .= '&filter_booking_id=' . urlencode(html_entity_decode($this->request->get['filter_booking_id'], ENT_QUOTES, 'UTF-8'));
		}

        
		if (isset($this->request->get['filter_balance_amount'])) {
			$url .= '&filter_balance_amount=' . urlencode(html_entity_decode($this->request->get['filter_balance_amount'], ENT_QUOTES, 'UTF-8'));
		}
        
        if (isset($this->request->get['filter_paid_amount'])) {
			$url .= '&filter_paid_amount=' . urlencode(html_entity_decode($this->request->get['filter_paid_amount'], ENT_QUOTES, 'UTF-8'));
		}   
        if (isset($this->request->get['filter_transpoter'])) {
			$url .= '&filter_transpoter=' . urlencode(html_entity_decode($this->request->get['filter_transpoter'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('details/paid_payment', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('details/paid_payment/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
	
		$data['delete'] = $this->url->link('details/paid_payment/delete', 'token=' . $this->session->data['token'] . $url, 'SSL'); 

		$data['driver_total_list']=array();
		$data['car_make_list_data']=array();
		$data['driver_list']=array();
        $filter_data = array(
			'filter_booking_id'	  => $filter_booking_id,
            'filter_balance_amount'  => $filter_balance_amount,
            'filter_paid_amount'  =>  $filter_paid_amount,
            'filter_transpoter'  =>  $filter_transpoter,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

       
		$this->load->model('details/paid_payment'); 
    $driver_total =$this->model_details_paid_payment->getAllDriverList($filter_data);
        $driver_total_list=$this->model_details_paid_payment->getTotalList($filter_data);
	    foreach ($driver_total as $result) {
			
		$data['driver_list'][] = array(
				'booking_id'	  =>$result['booking_id'],
		        'vendor_name'    => $result['vendor_name'],
				'paid_payment' => $result['paid_payment'],
                'balance_payment'  => $result['balance_payment'],
              'new_link'   => $this->url->link('addbooking/addbooking/view', 'token=' . $this->session->data['token'] . '&id=' . $result['booking_id'] , 'SSL'),
             'view' =>$this->url->link('details/vendor/info', 'token=' . $this->session->data['token'] . '&id=' . $result['vendor_id'] . $url, 'SSL'),
                // 'edit'   => $this->url->link('details/paid_payment/edit', 'token=' . $this->session->data['token'] . '&id=' . $result['driver_id'] .'&name=' . $result['driver_name'] .'&number=' . $result['driver_number'] .'&address=' . $result['driver_address'] . $url, 'SSL')
                
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
        $data['column_balance'] = $this->language->get('column_balance');
        $data['label_trans'] = $this->language->get('label_trans');
        $data['column_paid'] = $this->language->get('column_paid');
        $data['column_transporter'] = $this->language->get('column_transporter');
        $data['booking_id'] = $this->language->get('booking_id');
        $data['label_filter_address'] = $this->language->get('label_filter_address');
        $data['label_filter_number'] = $this->language->get('label_filter_number');
		$data['column_image'] = $this->language->get('column_image');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_action'] = $this->language->get('column_action');
       $data['entry_name'] = $this->language->get('entry_name');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['entry_quantity'] = $this->language->get('entry_quantity');
		$data['entry_status'] = $this->language->get('entry_status');
        $data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
          $data['button_change_password'] = $this->language->get('button_change_password');
         $data['text_no_results'] = $this->language->get('text_no_results');

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

		if (isset($this->request->get['filter_transpoter'])) {
			$url .= '&filter_transpoter' . urlencode(html_entity_decode($this->request->get['filter_transpoter'], ENT_QUOTES, 'UTF-8'));
		}
   	if (isset($this->request->get['filter_booking_id'])) {
			$url .= '&filter_booking_id=' . $this->request->get['filter_booking_id'];
		}
        	if (isset($this->request->get['filter_paid_payment'])) {
			$url .= '&filter_paid_payment=' . $this->request->get['filter_paid_payment'];
		}
        if (isset($this->request->get['filter_balance_amount'])) {
			$url .= '&filter_balance_amount=' . $this->request->get['filter_balance_amount'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_booking'] = $this->url->link('details/paid_payment', 'token=' . $this->session->data['token'] . '&sort=p.booking_id' . $url, 'SSL');
       $data['sort_transpoter'] = $this->url->link('details/paid_payment', 'token=' . $this->session->data['token'] . '&sort=vendor_name' . $url, 'SSL');
        $data['sort_paid'] = $this->url->link('details/paid_payment', 'token=' . $this->session->data['token'] . '&sort=p.paid_payment' . $url, 'SSL');
        $data['sort_balance'] = $this->url->link('details/paid_payment', 'token=' . $this->session->data['token'] . '&sort=p.balance_payment' . $url, 'SSL');
	
		$url = '';

		if (isset($this->request->get['filter_booking_id'])) {
			$url .= '&filter_booking_id=' . urlencode(html_entity_decode($this->request->get['filter_booking_id'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_transpoter'])) {
			$url .= '&filter_transpoter=' . $this->request->get['filter_transpoter'];
		}
      
        if (isset($this->request->get['filter_paid_payment'])) {
			$url .= '&filter_paid_payment=' . $this->request->get['filter_paid_payment'];
		}   
        if (isset($this->request->get['filter_balance_amount'])) {
			$url .= '&filter_balance_amount=' . $this->request->get['filter_balance_amount'];
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
		$pagination->url = $this->url->link('details/paid_payment', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($driver_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($driver_total_list - $this->config->get('config_limit_admin'))) ? $driver_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $driver_total_list, ceil($driver_total_list / $this->config->get('config_limit_admin')));

		$data['filter_booking_id'] = $filter_booking_id;
		$data['filter_transpoter'] = $filter_transpoter;
		//$data['filter_paid_payment'] = filter_paid_payment;
     
        $data['filter_balance_amount'] = $filter_balance_amount;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		

		$this->response->setOutput($this->load->view('details/payment_list.tpl', $data)); 
       
	}

	
                }
  
