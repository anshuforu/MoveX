<?php
class ControllerTelecallermanageTelecallermanage extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('telecallermanage/telecallermanage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallermanage/telecallermanage');

		$this->getList();
	}
public function edit() {

		$this->load->language('telecallermanage/telecallermanage');
       $this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallermanage/telecallermanage');
         
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate_new()){
    
            $this->model_telecallermanage_telecallermanage->editTelecaller($this->request->post,$this->request->get['telecaller_id'],$this->request->get['username']);
            $this->session->data['success'] = $this->language->get('text_edit_text');

			$this->response->redirect($this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL'));
	 }else{
       
         $this->getFormadd();
        
        }
}
public function insert() {
$status=$_POST['first'];
$notify=$_POST['second'];
$comment=$_POST['third'];
$booking_id=$_GET['booking'];
$this->load->model('order/coupon_order'); 
$insert = $this->model_order_coupon_order->insertBooking($status,$notify,$comment,$booking_id);
}
	public function add() {
       
		$this->load->language('telecallermanage/telecallermanage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallermanage/telecallermanage');
           
  

		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if(($this->request->server['REQUEST_METHOD'] == 'POST' ) && $this->validate())
             {
                //echo $this->user->getGroupId;
            //print_r($this->request->post);die;
               $data['abc']=$this->model_telecallermanage_telecallermanage->addTelecaller($this->request->post);
               $this->session->data['success'] = $this->language->get('text_success');


			$this->response->redirect($this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL'));

           
           }
        else{
        
         $this->getFormadd();
        
        }
    
	}
        public function change_password()
    {
        $this->load->language('telecallermanage/telecallermanage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallermanage/telecallermanage');

		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validatePassword()){
				
			//$this->model_service_center_carmake->editServiceCenter($this->request->post,$this->request->get['username']);
          $user_id=$this->model_telecallermanage_telecallermanage->getUserId($this->request->get['username']);
            $this->model_telecallermanage_telecallermanage->editLogin($this->request->post,$user_id);
				

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL'));
		}

        $this->getFormPassword();
        
     
    }
    protected function getFormadd() {
   
		$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('telecallermanage/telecallermanage');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_address'] = $this->language->get('entry_address');
        $data['entry_number'] = $this->language->get('entry_number');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_ph_no'] = $this->language->get('entry_ph_no');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_email'] = $this->language->get('entry_email');
        $data['entry_username'] = $this->language->get('entry_username');
        $data['entry_password'] = $this->language->get('entry_password');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_attribute_add'] = $this->language->get('button_attribute_add');
		$data['button_option_add'] = $this->language->get('button_option_add');
		$data['button_option_value_add'] = $this->language->get('button_option_value_add');
		$data['button_discount_add'] = $this->language->get('button_discount_add');
		$data['button_special_add'] = $this->language->get('button_special_add');
		$data['button_image_add'] = $this->language->get('button_image_add');
		$data['button_remove'] = $this->language->get('button_remove');
          $data['button_change_password'] = $this->language->get('button_change_password');

		
		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
        
        if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}
         if (isset($this->error['address'])) {
			$data['error_address'] = $this->error['address'];
		} else {
			$data['error_address'] = '';
		}
    
         if (isset($this->error['mobile'])) {
			$data['error_mobile'] = $this->error['mobile'];
		} else {
			$data['error_mobile'] = '';
		}
    
         if (isset($this->error['username'])) {
			$data['error_username'] = $this->error['username'];
		} else {
			$data['error_username'] = '';
		}
    
         if (isset($this->error['password'])) {
			$data['error_password'] = $this->error['password'];
		} else {
			$data['error_password'] = '';
		}
    
    
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL')
		);

         
        
        if (!isset($this->request->get['telecaller_id'])) {
			$data['action'] = $this->url->link('telecallermanage/telecallermanage/add', 'token=' . $this->session->data['token'], 'SSL');
            $data['id']="";
		} else{
            
			$data['action'] = $this->url->link('telecallermanage/telecallermanage/edit', 'token=' . $this->session->data['token'] .'&telecaller_id='.$this->request->get['telecaller_id'].'&username='.$this->request->get['username'], 'SSL');
            
        $data['id']=$this->request->get['telecaller_id'];
            
          $data['change_password'] = $this->url->link('telecallermanage/telecallermanage/change_password', 'token=' . $this->session->data['token']. '&username='.$this->request->get['username'],'SSL');
                    
                    
		}
        if(isset($this->request->get['id']))
        {
             $data['id']=$this->request->get['id'];
        }

           
        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL')
		);

      
        
        $data['cancel'] = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL');
    
        if (isset($this->request->get['username'])) {
			$data['username'] = $this->request->get['username'];
		} else {
			$data['username'] = '';
		}
          if (isset($this->request->get['telecaller_name'])) {
			$data['name'] = $this->request->get['telecaller_name'];
		} else {
			$data['name'] = '';
		}
           if (isset($this->request->get['telecaller_address'])) {
			$data['address'] = $this->request->get['telecaller_address'];
		} else {
			$data['address'] = '';
		}
           if (isset($this->request->get['telecaller_email'])) {
			$data['email'] = $this->request->get['telecaller_email'];
		} else {
			$data['email'] = '';
		}
           if (isset($this->request->get['telecaller_ph_no'])) {
			$data['ph_no'] = $this->request->get['telecaller_ph_no'];
		} else {
			$data['ph_no'] = '';
		}
        
            if(isset($this->request->post['name']))
        {
        $data['name']=$this->request->post['name'];
              
        }
             if(isset($this->request->post['address']))
        {
        $data['address']=$this->request->post['address'];
        }
             if(isset($this->request->post['email']))
        {
        $data['email']=$this->request->post['email'];
        }
             if(isset($this->request->post['ph_no']))
        {
        $data['ph_no']=$this->request->post['ph_no'];
        }
             if(isset($this->request->post['username']))
        {
        $data['username']=$this->request->post['username'];
        }
              if(isset($this->request->post['password']))
        {
        $data['password']=$this->request->post['password'];
        }
         // $this->session->data['success'] = $this->language->get('text_success');
        
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('telecallermanage/telecaller_form.tpl', $data));
        
    }
    
        protected function getFormPassword(){
         $this->load->language('telecallermanage/telecallermanage');
        
        
        
        //$this->response->redirect($this->url->link('service_center/servicing_price', 'token=' . $this->session->data['token'] . $url, 'SSL'));

               
       
         $data['heading_title'] = $this->language->get('heading_title');
        //$data['entry_old_password'] = $this->language->get('entry_old_password');
         $data['entry_new_password'] = $this->language->get('entry_new_password');
          $data['entry_confirm_password'] = $this->language->get('entry_confirm_password');
              $data['password_edit'] = $this->language->get('text_password_edit');
        $data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_filter'] = $this->language->get('button_filter');
        
       $data['username']=$this->request->get['username'];
        //$data['old_password']=$this->request->get['password'];
        $data['text_form'] = isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
       
        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL')
		);
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        $data['change_password'] = $this->url->link('telecallermanage/telecallermanage/change_password', 'token=' . $this->session->data['token'].'&username='.$this->request->get['username'],'SSL');
        $data['cancel'] = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL');
         if (isset($this->error['new_password'])) {
			$data['error_new_password'] = $this->error['new_password'];
		} else {
			$data['error_new_password'] = '';
		}
        if (isset($this->error['confirm_password'])) {
			$data['error_confirm_password'] = $this->error['confirm_password'];
		} else {
			$data['error_confirm_password'] = '';
		}
         if (isset($this->error['password_match'])) {
			$data['error_password_match'] = $this->error['password_match'];
		} else {
			$data['error_password_match'] = '';
		}
        $this->response->setOutput($this->load->view('telecallermanage/change_password_form.tpl', $data));
        
    }
	
 public function delete() {
   	$this->load->language('telecallermanage/telecallermanage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('telecallermanage/telecallermanage');
    
		if (isset($this->request->post['selected']))
            {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_telecallermanage_telecallermanage->delete($id);
			}

			$this->session->data['success'] = $this->language->get('text_delete_text');

			$this->response->redirect($this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->getList();
	}

	public function delete1() {
		$this->load->language('order/coupon_order');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('order/coupon_order');

		unset($this->session->data['cookie']);

		if (isset($this->request->get['order_id']) && $this->validate()) {
			// API
			$this->load->model('user/api');

			$api_info = $this->model_user_api->getApi($this->config->get('config_api_id'));

			if ($api_info) {
				$curl = curl_init();

				// Set SSL if required
				if (substr(HTTPS_CATALOG, 0, 5) == 'https') {
					curl_setopt($curl, CURLOPT_PORT, 443);
				}

				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLINFO_HEADER_OUT, true);
				curl_setopt($curl, CURLOPT_USERAGENT, $this->request->server['HTTP_USER_AGENT']);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_FORBID_REUSE, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_URL, HTTPS_CATALOG . 'index.php?route=api/login');
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($api_info));

				$json = curl_exec($curl);

				if (!$json) {
					$this->error['warning'] = sprintf($this->language->get('error_curl'), curl_error($curl), curl_errno($curl));
				} else {
					$response = json_decode($json, true);

					if (isset($response['cookie'])) {
						$this->session->data['cookie'] = $response['cookie'];
					}

					curl_close($curl);
				}
			}
		}

		if (isset($this->session->data['cookie'])) {
			$curl = curl_init();

			// Set SSL if required
			if (substr(HTTPS_CATALOG, 0, 5) == 'https') {
				curl_setopt($curl, CURLOPT_PORT, 443);
			}

			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLINFO_HEADER_OUT, true);
			curl_setopt($curl, CURLOPT_USERAGENT, $this->request->server['HTTP_USER_AGENT']);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_FORBID_REUSE, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_URL, HTTPS_CATALOG . 'index.php?route=api/order/delete&order_id=' . $this->request->get['order_id']);
			curl_setopt($curl, CURLOPT_COOKIE, session_name() . '=' . $this->session->data['cookie'] . ';');

			$json = curl_exec($curl);

			if (!$json) {
				$this->error['warning'] = sprintf($this->language->get('error_curl'), curl_error($curl), curl_errno($curl));
			} else {
				$response = json_decode($json, true);

				curl_close($curl);

				if (isset($response['error'])) {
					$this->error['warning'] = $response['error'];
				}
			}
		}

		if (isset($response['error'])) {
			$this->error['warning'] = $response['error'];
		}

		if (isset($response['success'])) {
			$this->session->data['success'] = $response['success'];

			
			$this->response->redirect($this->url->link('order/coupon_order', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['label_filter_name'])) {
			$label_filter_name = $this->request->get['label_filter_name'];
		} else {
			$label_filter_name = null;
		}

		if (isset($this->request->get['label_filter_num'])) {
			$label_filter_num = $this->request->get['label_filter_num'];
		} else {
			$label_filter_num = null;
		}

		if (isset($this->request->get['label_filter_email'])) {
			$label_filter_email = $this->request->get['label_filter_email'];
		} else {
			$label_filter_email = null;
		}

		if (isset($this->request->get['label_filter_address'])) {
			$label_filter_address = $this->request->get['label_filter_address'];
		} else {
			$label_filter_address = null;
		}

		
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 't.telecaller_id';
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

		if (isset($this->request->get['label_filter_name'])) {
			$url .= '&label_filter_name=' . $this->request->get['label_filter_name'];
		}

		if (isset($this->request->get['label_filter_num'])) {
			$url .= '&label_filter_num=' . urlencode(html_entity_decode($this->request->get['label_filter_num'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['label_filter_email'])) {
			$url .= '&label_filter_email=' . $this->request->get['label_filter_email'];
		}	
        
        if (isset($this->request->get['label_filter_address'])) {
			$url .= '&label_filter_address=' . $this->request->get['label_filter_address'];
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
			'href' => $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['invoice'] = $this->url->link('order/coupon_order/invoice', 'token=' . $this->session->data['token'], 'SSL');
		$data['shipping'] = $this->url->link('order/coupon_order/shipping', 'token=' . $this->session->data['token'], 'SSL');
		$data['add'] = $this->url->link('telecallermanage/telecallermanage/add', 'token=' . $this->session->data['token'], 'SSL');
        		$data['delete'] = $this->url->link('telecallermanage/telecallermanage/delete', 'token=' . $this->session->data['token'] . $url, 'SSL'); 

		$data['orders'] = array();
        
		$filter_data = array(
			'filter_name'      => $label_filter_name,
            'filter_number'      => $label_filter_num,
			'filter_email'	   => $label_filter_email,
			'filter_address'  => $label_filter_address,
          'sort'                 => $sort,
			'order'                => $order,
			'start'                => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'                => $this->config->get('config_limit_admin')
		);
      
       $order_total = $this->model_telecallermanage_telecallermanage->getTotalTelecallers($filter_data);

		$results = $this->model_telecallermanage_telecallermanage->getAllTelecallers($filter_data);
        //print_r($results);die;
       foreach ($results as $result) {
			$data['orders'][] = array(
				'telecaller_id'      => $result['telecaller_id'],
				'telecaller_name'          => $result['telecaller_name'],
				'telecaller_address'        => $result['telecaller_address'],
                'telecaller_ph_no'        => $result['telecaller_ph_no'],
				'telecaller_email'         => $result['telecaller_email'],
          'view'          => $this->url->link('telecallermanage/telecallermanage/info', 'token=' . $this->session->data['token'] . '&order_id=' . $result['telecaller_id'] . $url, 'SSL'),
			
				'delete'        => $this->url->link('telecallermanage/telecallermanage/delete', 'token=' . $this->session->data['token'] . '&id=' . $result['telecaller_id'] . $url, 'SSL'),
                 'edit'   => $this->url->link('telecallermanage/telecallermanage/edit', 'token=' . $this->session->data['token'] . '&telecaller_id=' . $result['telecaller_id'] .'&telecaller_name=' . $result['telecaller_name'].'&telecaller_email=' . $result['telecaller_email']  .'&telecaller_ph_no=' . $result['telecaller_ph_no'] .'&telecaller_address=' . $result['telecaller_address'] .'&username='.$this->model_telecallermanage_telecallermanage->getUsername($result['user_id']). $url, 'SSL')
                
		
			);
		}

		$data['heading_title'] = $this->language->get('heading_title');
        $data['entry_name_id'] = $this->language->get('entry_name_id');
        $data['entry_address'] = $this->language->get('entry_address');
        $data['entry_booking_date'] = $this->language->get('entry_booking_date');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_distance'] = $this->language->get('entry_distance');
        $data['entry_vehicle'] = $this->language->get('entry_vehicle');
        $data['label_filter_address'] = $this->language->get('label_filter_address');
        $data['label_filter_num'] = $this->language->get('label_filter_num');
        $data['label_filter_email'] = $this->language->get('label_filter_email');
        $data['label_filter_number '] = $this->language->get('label_filter_number ');
		
		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['text_missing'] = $this->language->get('text_missing');
		$data['entry_price'] = $this->language->get('entry_price');

		$data['column_order_id'] = $this->language->get('column_order_id');
		$data['column_customer'] = $this->language->get('column_customer');
		$data['label_filter_name'] = $this->language->get('label_filter_name');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_total'] = $this->language->get('column_total');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_date_modified'] = $this->language->get('column_date_modified');
		$data['column_action'] = $this->language->get('column_action');
		$data['column_action'] = $this->language->get('column_action');

		$data['entry_return_id'] = $this->language->get('entry_return_id');
		$data['entry_order_id'] = $this->language->get('entry_order_id');
		$data['entry_customer'] = $this->language->get('entry_customer');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['label_name'] = $this->language->get('label_name');
		$data['label_address'] = $this->language->get('label_address');
		$data['label_num'] = $this->language->get('label_num');
		$data['label_email'] = $this->language->get('label_email');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_form_address'] = $this->language->get('entry_form_address');
		$data['entry_date_added'] = $this->language->get('entry_date_added');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['entry_to_address'] = $this->language->get('entry_to_address');
		$data['entry_vehicle'] = $this->language->get('entry_vehicle');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_form_address'] = $this->language->get('entry_form_address');
		$data['text_customer'] = $this->language->get('text_customer');
		$data['entry_to_address'] = $this->language->get('entry_to_address');
		$data['entry_distance'] = $this->language->get('entry_distance');
		$data['entry_date_modified'] = $this->language->get('entry_date_modified');
		$data['entry_delivering_date'] = $this->language->get('entry_delivering_date');

		$data['button_invoice_print'] = $this->language->get('button_invoice_print');
		$data['button_shipping_print'] = $this->language->get('button_shipping_print');
		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
		$data['button_view'] = $this->language->get('button_view');
         $data['button_change_password'] = $this->language->get('button_change_password');

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

     if (isset($this->request->get['label_filter_name'])) {
			$url .= '&label_filter_name=' . urlencode(html_entity_decode($this->request->get['label_filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['label_filter_num'])) {
			$url .= '&label_filter_num=' . $this->request->get['label_filter_num'];
		}

		if (isset($this->request->get['label_filter_email'])) {
			$url .= '&label_filter_email=' . $this->request->get['label_filter_email'];
		}

		if (isset($this->request->get['label_filter_address'])) {
			$url .= '&label_filter_address=' . $this->request->get['label_filter_address'];
		}
     	if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_order'] = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'] . '&sort=t.telecaller_id' . $url, 'SSL');
		$data['sort_name'] = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'] . '&sort=t.telecaller_name' . $url, 'SSL');
		$data['sort_email'] = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'] . '&sort=t.telecaller_email' . $url, 'SSL');
		$data['sort_number'] = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'] . '&sort=t.telecaller_ph_no' . $url, 'SSL');
        $data['sort_address'] = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'] . '&sort=t.telecaller_address' . $url, 'SSL');


		$url = '';
  if (isset($this->request->get['label_filter_name'])) {
			$url .= '&label_filter_name=' . urlencode(html_entity_decode($this->request->get['label_filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['label_filter_num'])) {
			$url .= '&label_filter_num=' . $this->request->get['label_filter_num'];
		}

		if (isset($this->request->get['label_filter_email'])) {
			$url .= '&label_filter_email=' . $this->request->get['label_filter_email'];
		}

		if (isset($this->request->get['label_filter_address'])) {
			$url .= '&label_filter_address=' . $this->request->get['label_filter_address'];
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
		$pagination->url = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($order_total - $this->config->get('config_limit_admin'))) ? $order_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $order_total, ceil($order_total / $this->config->get('config_limit_admin')));
  
		$data['label_filter_name'] = $label_filter_name;
		$data['label_filter_num'] = $label_filter_num;
		$data['label_filter_email'] = $label_filter_email;
		$data['label_filter_address'] = $label_filter_address;
		
		$this->load->model('localisation/order_status');

	//	$data['vehicle'] = $this->model_telecallermanage_telecallermanage->getVehicle();
          
		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('telecallermanage/telecaller_list.tpl', $data));
	}

	public function getForm() {
		$this->load->model('order/coupon_order');

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_form'] = !isset($this->request->get['order_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_default'] = $this->language->get('text_default');
		$data['text_select'] = $this->language->get('text_select');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_loading'] = $this->language->get('text_loading');
		$data['text_product'] = $this->language->get('text_product');
		$data['text_voucher'] = $this->language->get('text_voucher');
		$data['text_order'] = $this->language->get('text_order');

		$data['entry_store'] = $this->language->get('entry_store');
		$data['entry_customer'] = $this->language->get('entry_customer');
		$data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$data['entry_firstname'] = $this->language->get('entry_firstname');
		$data['entry_lastname'] = $this->language->get('entry_lastname');
		$data['entry_email'] = $this->language->get('entry_email');
		$data['entry_telephone'] = $this->language->get('entry_telephone');
		$data['entry_fax'] = $this->language->get('entry_fax');
		$data['entry_comment'] = $this->language->get('entry_comment');
		$data['entry_affiliate'] = $this->language->get('entry_affiliate');
		$data['entry_address'] = $this->language->get('entry_address');
		$data['entry_company'] = $this->language->get('entry_company');
		$data['entry_address_1'] = $this->language->get('entry_address_1');
		$data['entry_address_2'] = $this->language->get('entry_address_2');
		$data['entry_city'] = $this->language->get('entry_city');
		$data['entry_postcode'] = $this->language->get('entry_postcode');
		$data['entry_zone'] = $this->language->get('entry_zone');
		$data['entry_zone_code'] = $this->language->get('entry_zone_code');
		$data['entry_country'] = $this->language->get('entry_country');
		$data['entry_product'] = $this->language->get('entry_product');
		$data['entry_option'] = $this->language->get('entry_option');
		$data['entry_quantity'] = $this->language->get('entry_quantity');
		$data['entry_to_name'] = $this->language->get('entry_to_name');
		$data['entry_to_email'] = $this->language->get('entry_to_email');
		$data['entry_from_name'] = $this->language->get('entry_from_name');
		$data['entry_from_email'] = $this->language->get('entry_from_email');
		$data['entry_theme'] = $this->language->get('entry_theme');
		$data['entry_message'] = $this->language->get('entry_message');
		$data['entry_amount'] = $this->language->get('entry_amount');
		$data['entry_shipping_method'] = $this->language->get('entry_shipping_method');
		$data['entry_payment_method'] = $this->language->get('entry_payment_method');
		$data['entry_coupon'] = $this->language->get('entry_coupon');
		$data['entry_voucher'] = $this->language->get('entry_voucher');
		$data['entry_reward'] = $this->language->get('entry_reward');
		$data['entry_order_status'] = $this->language->get('entry_order_status');

		$data['column_product'] = $this->language->get('column_product');
		$data['column_model'] = $this->language->get('column_model');
		$data['column_quantity'] = $this->language->get('column_quantity');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_total'] = $this->language->get('column_total');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_continue'] = $this->language->get('button_continue');
		$data['button_back'] = $this->language->get('button_back');
		$data['button_product_add'] = $this->language->get('button_product_add');
		$data['button_voucher_add'] = $this->language->get('button_voucher_add');

		$data['button_payment'] = $this->language->get('button_payment');
		$data['button_shipping'] = $this->language->get('button_shipping');
		$data['button_coupon'] = $this->language->get('button_coupon');
		$data['button_voucher'] = $this->language->get('button_voucher');
		$data['button_reward'] = $this->language->get('button_reward');
		$data['button_upload'] = $this->language->get('button_upload');
		$data['button_remove'] = $this->language->get('button_remove');
        $data['button_change_password'] = $this->language->get('button_change_password');

		$data['tab_order'] = $this->language->get('tab_order');
		$data['tab_customer'] = $this->language->get('tab_customer');
		$data['tab_payment'] = $this->language->get('tab_payment');
		$data['tab_shipping'] = $this->language->get('tab_shipping');
		$data['tab_product'] = $this->language->get('tab_product');
		$data['tab_voucher'] = $this->language->get('tab_voucher');
		$data['tab_total'] = $this->language->get('tab_total');

		$data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

	

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('order/coupon_order', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['cancel'] = $this->url->link('order/coupon_order', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->get['order_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$order_info = $this->model_sale_coupon_order->getOrder($this->request->get['order_id']);
			$data['order_infor'] = $this->model_sale_coupon_order->getOrder($this->request->get['order_id']);
		}

		if (!empty($order_info)) {
			$data['order_id'] = $this->request->get['order_id'];
			$data['store_id'] = $order_info['store_id'];

			$data['customer'] = $order_info['customer'];
			$data['customer_id'] = $order_info['customer_id'];
			$data['customer_group_id'] = $order_info['customer_group_id'];
			$data['firstname'] = $order_info['firstname'];
			$data['lastname'] = $order_info['lastname'];
			$data['email'] = $order_info['email'];
			$data['telephone'] = $order_info['telephone'];
			$data['fax'] = $order_info['fax'];
			$data['account_custom_field'] = $order_info['custom_field'];

			$this->load->model('order/customer');

			$data['addresses'] = $this->model_sale_customer->getAddresses($order_info['customer_id']);

			$data['payment_firstname'] = $order_info['payment_firstname'];
			$data['payment_lastname'] = $order_info['payment_lastname'];
			$data['payment_company'] = $order_info['payment_company'];
			$data['payment_address_1'] = $order_info['payment_address_1'];
			$data['payment_address_2'] = $order_info['payment_address_2'];
			$data['payment_city'] = $order_info['payment_city'];
			$data['payment_postcode'] = $order_info['payment_postcode'];
			$data['payment_country_id'] = $order_info['payment_country_id'];
			$data['payment_zone_id'] = $order_info['payment_zone_id'];
			$data['payment_custom_field'] = $order_info['payment_custom_field'];
			$data['payment_method'] = $order_info['payment_method'];
			$data['payment_code'] = $order_info['payment_code'];

			$data['shipping_firstname'] = $order_info['shipping_firstname'];
			$data['shipping_lastname'] = $order_info['shipping_lastname'];
			$data['shipping_company'] = $order_info['shipping_company'];
			$data['shipping_address_1'] = $order_info['shipping_address_1'];
			$data['shipping_address_2'] = $order_info['shipping_address_2'];
			$data['shipping_city'] = $order_info['shipping_city'];
			$data['shipping_postcode'] = $order_info['shipping_postcode'];
			$data['shipping_country_id'] = $order_info['shipping_country_id'];
			$data['shipping_zone_id'] = $order_info['shipping_zone_id'];
			$data['shipping_custom_field'] = $order_info['shipping_custom_field'];
			$data['shipping_method'] = $order_info['shipping_method'];
			$data['shipping_code'] = $order_info['shipping_code'];

			// Add products to the API
			$data['products'] = array();
			
			$products = $this->model_order_coupon_order->getOrderProducts($this->request->get['order_id']);

			foreach ($products as $product) {
				$data['order_products'][] = array(
					'product_id' => $product['product_id'],
					'name'       => $product['name'],
					'model'      => $product['model'],
					'option'     => $this->model_order_coupon_order->getOrderOptions($this->request->get['order_id'], $product['order_product_id']),
					'quantity'   => $product['quantity'],
					'price'      => $product['price'],
					'total'      => $product['total'],
					'reward'     => $product['reward']
				);
			}

			// Add vouchers to the API
			$data['order_vouchers'] = $this->model_order_coupon_order->getOrderVouchers($this->request->get['order_id']);

			$data['coupon'] = '';
			$data['voucher'] = '';
			$data['reward'] = '';

			$data['order_totals'] = array();

			$order_totals = $this->model_order_coupon_order->getOrderTotals($this->request->get['order_id']);

			foreach ($order_totals as $order_total) {
				// If coupon, voucher or reward points
				$start = strpos($order_total['title'], '(') + 1;
				$end = strrpos($order_total['title'], ')');

				if ($start && $end) {
					if ($order_total['code'] == 'coupon') {
						$data['coupon'] = substr($order_total['title'], $start, $end - $start);
					}

					if ($order_total['code'] == 'voucher') {
						$data['voucher'] = substr($order_total['title'], $start, $end - $start);
					}

					if ($order_total['code'] == 'reward') {
						$data['reward'] = substr($order_total['title'], $start, $end - $start);
					}
				}
			}

			$data['order_status_id'] = $order_info['order_status_id'];
			$data['comment'] = $order_info['comment'];
			$data['affiliate_id'] = $order_info['affiliate_id'];
			$data['affiliate'] = $order_info['affiliate_firstname'] . ' ' . $order_info['affiliate_lastname'];
		} else {
			$data['order_id'] = 0;
			$data['store_id'] = '';
			$data['customer'] = '';
			$data['customer_id'] = '';
			$data['customer_group_id'] = $this->config->get('config_customer_group_id');
			$data['firstname'] = '';
			$data['lastname'] = '';
			$data['email'] = '';
			$data['telephone'] = '';
			$data['fax'] = '';
			$data['customer_custom_field'] = array();

			$data['addresses'] = array();

			$data['payment_firstname'] = '';
			$data['payment_lastname'] = '';
			$data['payment_company'] = '';
			$data['payment_address_1'] = '';
			$data['payment_address_2'] = '';
			$data['payment_city'] = '';
			$data['payment_postcode'] = '';
			$data['payment_country_id'] = '';
			$data['payment_zone_id'] = '';
			$data['payment_custom_field'] = array();
			$data['payment_method'] = '';
			$data['payment_code'] = '';

			$data['shipping_firstname'] = '';
			$data['shipping_lastname'] = '';
			$data['shipping_company'] = '';
			$data['shipping_address_1'] = '';
			$data['shipping_address_2'] = '';
			$data['shipping_city'] = '';
			$data['shipping_postcode'] = '';
			$data['shipping_country_id'] = '';
			$data['shipping_zone_id'] = '';
			$data['shipping_custom_field'] = array();
			$data['shipping_method'] = '';
			$data['shipping_code'] = '';

			$data['order_products'] = array();
			$data['order_vouchers'] = array();
			$data['order_totals'] = array();

			$data['order_status_id'] = $this->config->get('config_order_status_id');

			$data['comment'] = '';
			$data['affiliate_id'] = '';
			$data['affiliate'] = '';

			$data['coupon'] = '';
			$data['voucher'] = '';
			$data['reward'] = '';
		}

		// Stores
		$this->load->model('setting/store');

		$data['stores'] = $this->model_setting_store->getStores();

		// Customer Groups
		$this->load->model('order/customer_group');

		$data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();

		// Custom Fields
		$this->load->model('order/custom_field');

		$data['custom_fields'] = array();

		$custom_fields = $this->model_order_custom_field->getCustomFields();

		foreach ($custom_fields as $custom_field) {
			$data['custom_fields'][] = array(
				'custom_field_id'    => $custom_field['custom_field_id'],
				'custom_field_value' => $this->model_sale_custom_field->getCustomFieldValues($custom_field['custom_field_id']),
				'name'               => $custom_field['name'],
				'value'              => $custom_field['value'],
				'type'               => $custom_field['type'],
				'location'           => $custom_field['location']
			);
		}

		$this->load->model('order/order_status');

		$data['order_statuses'] = $this->model_order_coupon_order->getOrderStatuses();

		$this->load->model('localisation/country');

		$data['countries'] = $this->model_localisation_country->getCountries();

		$data['voucher_min'] = $this->config->get('config_voucher_min');

		$this->load->model('order/voucher_theme');

		$data['voucher_themes'] = $this->model_sale_voucher_theme->getVoucherThemes();

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('order/coupon_order_form.tpl', $data));
	}

	public function info() {
        $booking_customer=array();
        $this->load->model('telecallermanage/telecallermanage');
        if (isset($this->request->get['order_id'])) {
			$order_id = $this->request->get['order_id'];
            
		} else {
			$order_id = 0;
		}
		$data['order_info'] = $this->model_telecallermanage_telecallermanage->getOrder($order_id);
		$data['booking_info'] = $this->model_telecallermanage_telecallermanage->getBooking($order_id);
        
        $this->load->language('telecallermanage/telecallermanage');

			$this->document->setTitle($this->language->get('heading_title'));

			$data['heading_title'] = $this->language->get('heading_title');
			$data['tab_telecaller'] = $this->language->get('tab_telecaller');
			$data['tab_booking'] = $this->language->get('tab_booking');

			$data['text_order_id'] = $this->language->get('text_order_id');
			$data['text_invoice_no'] = $this->language->get('text_invoice_no');
			$data['text_invoice_date'] = $this->language->get('text_invoice_date');
			$data['text_store_name'] = $this->language->get('text_store_name');
			$data['text_store_url'] = $this->language->get('text_store_url');
			$data['text_customer'] = $this->language->get('text_customer');
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
			$data['text_high_risk_password'] = $this->language->get('text_high_risk_password');
			$data['text_bin_match'] = $this->language->get('text_bin_match');
			$data['text_bin_country'] = $this->language->get('text_bin_country');
			$data['text_bin_name_match'] = $this->language->get('text_bin_name_match');
			$data['text_bin_name'] = $this->language->get('text_bin_name');
			$data['text_bin_phone_match'] = $this->language->get('text_bin_phone_match');
			$data['text_bin_phone'] = $this->language->get('text_bin_phone');
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
			$data['label_filter_name'] = $this->language->get('label_filter_name');

			$data['entry_order_status'] = $this->language->get('entry_order_status');
			$data['entry_notify'] = $this->language->get('entry_notify');
			$data['entry_comment'] = $this->language->get('entry_comment');

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

			$data['tab_order'] = $this->language->get('tab_order');
			$data['tab_payment'] = $this->language->get('tab_payment');
			$data['tab_shipping'] = $this->language->get('tab_shipping');
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
				'href' => $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL')
			);
        //  	$data['invoice'] = $this->url->link('order/coupon_order/invoice', 'token=' . $this->session->data['token'] . '&order_id=' . (int)$this->request->get['order_id'], 'SSL');
        $data['cancel'] = $this->url->link('telecallermanage/telecallermanage', 'token=' . $this->session->data['token'], 'SSL');
           $data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			$this->response->setOutput($this->load->view('telecallermanage/coupon_order_info.tpl',$data));
		
	}

	protected function validate() {
		/*if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}*/
if ($this->request->post['name'] == '') {
			$this->error['name'] = $this->language->get('error_name');
		}
	
    
    if ($this->request->post['address'] == '') {
			$this->error['address'] = $this->language->get('error_address');
		
	}
    
      if ($this->request->post['ph_no'] == '') {
			$this->error['mobile'] = $this->language->get('error_mobile');
		}
    
       if ($this->request->post['username'] == '') {
			$this->error['username'] = $this->language->get('error_username');
		}
        
          if ($this->request->post['password'] == '') {
			$this->error['password'] = $this->language->get('error_password');
		}
		return !$this->error;
	}
    	protected function validate_new() {
		/*if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}*/
if ($this->request->post['name'] == '') {
			$this->error['name'] = $this->language->get('error_name');
		}
	
    
    if ($this->request->post['address'] == '') {
			$this->error['address'] = $this->language->get('error_address');
		
	}
    
      if ($this->request->post['ph_no'] == '') {
			$this->error['mobile'] = $this->language->get('error_mobile');
		}
    
       if ($this->request->post['username'] == '') {
			$this->error['username'] = $this->language->get('error_username');
		}
        
		return !$this->error;
	}

     public function validatePassword() {

		 if ($this->request->post['new_password'] == '') {
			$this->error['new_password'] = $this->language->get('error_new_password');
		}
         if ($this->request->post['confirm_password'] == '') {
			$this->error['confirm_password'] = $this->language->get('error_confirm_password');
		}
        if ($this->request->post['new_password'] != $this->request->post['confirm_password']) {
			$this->error['password_match'] = $this->language->get('error_password_match');
		}
        return !$this->error;
	}
	public function createInvoiceNo() {
		$this->load->language('sale/coupon_order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$json['error'] = $this->language->get('error_permission');
		} elseif (isset($this->request->get['order_id'])) {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/coupon_order');

			$invoice_no = $this->model_sale_coupon_order->createInvoiceNo($order_id);

			if ($invoice_no) {
				$json['invoice_no'] = $invoice_no;
			} else {
				$json['error'] = $this->language->get('error_action');
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function addReward() {
		$this->load->language('sale/coupon_order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/coupon_order');

			$order_info = $this->model_sale_coupon_order->getOrder($order_id);

			if ($order_info && $order_info['customer_id'] && ($order_info['reward'] > 0)) {
				$this->load->model('sale/customer');

				$reward_total = $this->model_sale_customer->getTotalCustomerRewardsByOrderId($order_id);

				if (!$reward_total) {
					$this->model_sale_customer->addReward($order_info['customer_id'], $this->language->get('text_order_id') . ' #' . $order_id, $order_info['reward'], $order_id);
				}
			}

			$json['success'] = $this->language->get('text_reward_added');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function removeReward() {
		$this->load->language('sale/coupon_order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/coupon_order');

			$order_info = $this->model_sale_coupon_order->getOrder($order_id);

			if ($order_info) {
				$this->load->model('sale/customer');

				$this->model_sale_customer->deleteReward($order_id);
			}

			$json['success'] = $this->language->get('text_reward_removed');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function addCommission() {
		$this->load->language('sale/coupon_order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/coupon_order');

			$order_info = $this->model_sale_coupon_order->getOrder($order_id);

			if ($order_info) {
				$this->load->model('marketing/affiliate');

				$affiliate_total = $this->model_marketing_affiliate->getTotalTransactionsByOrderId($order_id);

				if (!$affiliate_total) {
					$this->model_marketing_affiliate->addTransaction($order_info['affiliate_id'], $this->language->get('text_order_id') . ' #' . $order_id, $order_info['commission'], $order_id);
				}
			}

			$json['success'] = $this->language->get('text_commission_added');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function removeCommission() {
		$this->load->language('sale/coupon_order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/coupon_order');

			$order_info = $this->model_sale_coupon_order->getOrder($order_id);

			if ($order_info) {
				$this->load->model('marketing/affiliate');

				$this->model_marketing_affiliate->deleteTransaction($order_id);
			}

			$json['success'] = $this->language->get('text_commission_removed');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function country() {
		$json = array();

		$this->load->model('localisation/country');

		$country_info = $this->model_localisation_country->getCountry($this->request->get['country_id']);

		if ($country_info) {
			$this->load->model('localisation/zone');

			$json = array(
				'country_id'        => $country_info['country_id'],
				'name'              => $country_info['name'],
				'iso_code_2'        => $country_info['iso_code_2'],
				'iso_code_3'        => $country_info['iso_code_3'],
				'address_format'    => $country_info['address_format'],
				'postcode_required' => $country_info['postcode_required'],
				'zone'              => $this->model_localisation_zone->getZonesByCountryId($this->request->get['country_id']),
				'status'            => $country_info['status']
			);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function history() {
		$this->load->language('order/coupon_order');

		$data['text_no_results'] = $this->language->get('text_no_results');

		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_notify'] = $this->language->get('column_notify');
		$data['column_comment'] = $this->language->get('column_comment');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data['histories'] = array();

		$this->load->model('order/coupon_order');

		$results = $this->model_order_coupon_order->getOrderHistories($this->request->get['order_id'], ($page - 1) * 10, 10);

		foreach ($results as $result) {
			$data['histories'][] = array(
				'notify'     => $result['notify'] ? $this->language->get('text_yes') : $this->language->get('text_no'),
				'status'     => $result['status'],
				'comment'    => nl2br($result['comment']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}

		$history_total = $this->model_order_coupon_order->getTotalOrderHistories($this->request->get['order_id']);

		$pagination = new Pagination();
		$pagination->total = $history_total;
		$pagination->page = $page;
		$pagination->limit = 10;
		$pagination->url = $this->url->link('order/coupon_order/history', 'token=' . $this->session->data['token'] . '&order_id=' . $this->request->get['order_id'] . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($history_total) ? (($page - 1) * 10) + 1 : 0, ((($page - 1) * 10) > ($history_total - 10)) ? $history_total : ((($page - 1) * 10) + 10), $history_total, ceil($history_total / 10));

		$this->response->setOutput($this->load->view('order/coupon_order_history.tpl', $data));
	}

	public function invoice() {
		$this->load->language('order/coupon_order');

		$data['title'] = $this->language->get('text_invoice');

		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$data['direction'] = $this->language->get('direction');
		$data['lang'] = $this->language->get('code');

		$data['text_invoice'] = $this->language->get('text_invoice');
		$data['column_tax'] = $this->language->get('column_tax');
		$data['text_order_detail'] = $this->language->get('text_order_detail');
		$data['text_order_id'] = $this->language->get('text_order_id');
		$data['text_invoice_no'] = $this->language->get('text_invoice_no');
		$data['text_invoice_date'] = $this->language->get('text_invoice_date');
		$data['text_date_added'] = $this->language->get('text_date_added');
		$data['text_telephone'] = $this->language->get('text_telephone');
		$data['text_fax'] = $this->language->get('text_fax');
		$data['text_email'] = $this->language->get('text_email');
		$data['text_website'] = $this->language->get('text_website');
		$data['text_to'] = $this->language->get('text_to');
		$data['text_ship_to'] = $this->language->get('text_ship_to');
		$data['text_payment_method'] = $this->language->get('text_payment_method');
		$data['text_shipping_method'] = $this->language->get('text_shipping_method');

		$data['column_product'] = $this->language->get('column_product');
		$data['column_model'] = $this->language->get('column_model');
		$data['column_model1'] = $this->language->get('column_model1');
		$data['column_quantity'] = $this->language->get('column_quantity');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_total'] = $this->language->get('column_total');
		$data['column_comment'] = $this->language->get('column_comment');
  
		$this->load->model('order/coupon_order');

		$this->load->model('setting/setting');

		$data['orders'] = array();

		$orders = array();

		if (isset($this->request->post['selected'])) {
			$orders = $this->request->post['selected'];
		} elseif (isset($this->request->get['order_id'])) {
			$orders[] = $this->request->get['order_id'];
		}

		foreach ($orders as $order_id) {
			$order_info = $this->model_order_coupon_order->getOrder($order_id);
			$data['order_infor'] = $this->model_order_coupon_order->getInvoice($order_id);
            if ($order_info) {
				$store_info = $this->model_setting_setting->getSetting('config', $order_info['store_id']);
               if ($store_info) {
					$store_address = $store_info['config_address'];
					$store_email = $store_info['config_email'];
					$store_telephone = $store_info['config_telephone'];
					$store_fax = $store_info['config_fax'];
				} else {
					$store_address = $this->config->get('config_address');
					$store_email = $this->config->get('config_email');
					$store_telephone = $this->config->get('config_telephone');
					$store_fax = $this->config->get('config_fax');
				}

				if ($order_info['invoice']) {
					$invoice_no = $order_info['invoice_prefix'] . $order_info['invoice'];
				} else {
					$invoice_no = '';
				}
                
               $add_id=$order_info['address_id'];
            $data['get_add']= $this->model_order_coupon_order->getCustomerAddress($add_id);
                //print_r($get_add);die;
            } }
        
		$this->response->setOutput($this->load->view('order/coupon_order_invoice.tpl', $data));
    }


	public function shipping() {
		$this->load->language('sale/coupon_order');

		$data['title'] = $this->language->get('text_shipping');

		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$data['direction'] = $this->language->get('direction');
		$data['lang'] = $this->language->get('code');

		$data['text_shipping'] = $this->language->get('text_shipping');
		$data['text_picklist'] = $this->language->get('text_picklist');
		$data['text_order_detail'] = $this->language->get('text_order_detail');
		$data['text_order_id'] = $this->language->get('text_order_id');
		$data['text_invoice_no'] = $this->language->get('text_invoice_no');
		$data['text_invoice_date'] = $this->language->get('text_invoice_date');
		$data['text_date_added'] = $this->language->get('text_date_added');
		$data['text_telephone'] = $this->language->get('text_telephone');
		$data['text_fax'] = $this->language->get('text_fax');
		$data['text_email'] = $this->language->get('text_email');
		$data['text_website'] = $this->language->get('text_website');
		$data['text_contact'] = $this->language->get('text_contact');
		$data['text_from'] = $this->language->get('text_from');
		$data['text_to'] = $this->language->get('text_to');
		$data['text_shipping_method'] = $this->language->get('text_shipping_method');
		$data['text_sku'] = $this->language->get('text_sku');
		$data['text_upc'] = $this->language->get('text_upc');
		$data['text_ean'] = $this->language->get('text_ean');
		$data['text_jan'] = $this->language->get('text_jan');
		$data['text_isbn'] = $this->language->get('text_isbn');
		$data['text_mpn'] = $this->language->get('text_mpn');

		$data['column_location'] = $this->language->get('column_location');
		$data['column_reference'] = $this->language->get('column_reference');
		$data['column_product'] = $this->language->get('column_product');
		$data['column_weight'] = $this->language->get('column_weight');
		$data['column_model'] = $this->language->get('column_model');
		$data['column_quantity'] = $this->language->get('column_quantity');
		$data['column_comment'] = $this->language->get('column_comment');

		$this->load->model('sale/coupon_order');

		$this->load->model('catalog/product');

		$this->load->model('setting/setting');

		$data['orders'] = array();

		$orders = array();

		if (isset($this->request->post['selected'])) {
			$orders = $this->request->post['selected'];
		} elseif (isset($this->request->get['order_id'])) {
			$orders[] = $this->request->get['order_id'];
		}

		foreach ($orders as $order_id) {
			$order_info = $this->model_sale_coupon_order->getOrder($order_id);

			// Make sure there is a shipping method
			if ($order_info && $order_info['shipping_code']) {
				$store_info = $this->model_setting_setting->getSetting('config', $order_info['store_id']);

				if ($store_info) {
					$store_address = $store_info['config_address'];
					$store_email = $store_info['config_email'];
					$store_telephone = $store_info['config_telephone'];
					$store_fax = $store_info['config_fax'];
				} else {
					$store_address = $this->config->get('config_address');
					$store_email = $this->config->get('config_email');
					$store_telephone = $this->config->get('config_telephone');
					$store_fax = $this->config->get('config_fax');
				}

				if ($order_info['invoice_no']) {
					$invoice_no = $order_info['invoice_prefix'] . $order_info['invoice_no'];
				} else {
					$invoice_no = '';
				}

				if ($order_info['shipping_address_format']) {
					$format = $order_info['shipping_address_format'];
				} else {
					$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{address_2}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
				}

				$find = array(
					'{firstname}',
					'{lastname}',
					'{company}',
					'{address_1}',
					'{address_2}',
					'{city}',
					'{postcode}',
					'{zone}',
					'{zone_code}',
					'{country}'
				);

				$replace = array(
					'firstname' => $order_info['shipping_firstname'],
					'lastname'  => $order_info['shipping_lastname'],
					'company'   => $order_info['shipping_company'],
					'address_1' => $order_info['shipping_address_1'],
					'address_2' => $order_info['shipping_address_2'],
					'city'      => $order_info['shipping_city'],
					'postcode'  => $order_info['shipping_postcode'],
					'zone'      => $order_info['shipping_zone'],
					'zone_code' => $order_info['shipping_zone_code'],
					'country'   => $order_info['shipping_country']
				);

				$shipping_address = str_replace(array("\r\n", "\r", "\n"), '<br />', preg_replace(array("/\s\s+/", "/\r\r+/", "/\n\n+/"), '<br />', trim(str_replace($find, $replace, $format))));

				$this->load->model('tool/upload');

				$product_data = array();

				$products = $this->model_sale_coupon_order->getOrderProducts($order_id);

				foreach ($products as $product) {
					$product_info = $this->model_catalog_product->getProduct($product['product_id']);

					$option_data = array();

					$options = $this->model_sale_coupon_order->getOrderOptions($order_id, $product['order_product_id']);

					foreach ($options as $option) {
						if ($option['type'] != 'file') {
							$value = $option['value'];
						} else {
							$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

							if ($upload_info) {
								$value = $upload_info['name'];
							} else {
								$value = '';
							}
						}

						$option_data[] = array(
							'name'  => $option['name'],
							'value' => $value
						);
					}

					$product_data[] = array(
						'name'     => $product_info['name'],
						'model'    => $product_info['model'],
						'option'   => $option_data,
						'quantity' => $product['quantity'],
						'location' => $product_info['location'],
						'sku'      => $product_info['sku'],
						'upc'      => $product_info['upc'],
						'ean'      => $product_info['ean'],
						'jan'      => $product_info['jan'],
						'isbn'     => $product_info['isbn'],
						'mpn'      => $product_info['mpn'],
						'weight'   => $this->weight->format($product_info['weight'], $this->config->get('config_weight_class_id'), $this->language->get('decimal_point'), $this->language->get('thousand_point'))
					);
				}

				$data['orders'][] = array(
					'order_id'	         => $order_id,
					'invoice_no'         => $invoice_no,
					'date_added'         => date($this->language->get('date_format_short'), strtotime($order_info['date_added'])),
					'store_name'         => $order_info['store_name'],
					'store_url'          => rtrim($order_info['store_url'], '/'),
					'store_address'      => nl2br($store_address),
					'store_email'        => $store_email,
					'store_telephone'    => $store_telephone,
					'store_fax'          => $store_fax,
					'email'              => $order_info['email'],
					'telephone'          => $order_info['telephone'],
					'shipping_address'   => $shipping_address,
					'shipping_method'    => $order_info['shipping_method'],
					'product'            => $product_data,
					'comment'            => nl2br($order_info['comment'])
				);
			}
		}

		$this->response->setOutput($this->load->view('sale/coupon_order_shipping.tpl', $data));
	}

		public function api() {
		$json = array();

		// Store
		if (isset($this->request->get['store_id'])) {
			$store_id = $this->request->get['store_id'];
		} else {
			$store_id = 0;
		}

		$this->load->model('setting/store');

		$store_info = $this->model_setting_store->getStore($store_id);

		if ($store_info) {
			$url = $store_info['ssl'];
		} else {
			$url = HTTPS_CATALOG;
		}

		if (isset($this->session->data['cookie']) && isset($this->request->get['api'])) {
			// Include any URL perameters
			$url_data = array();

			foreach ($this->request->get as $key => $value) {
				if ($key != 'route' && $key != 'token' && $key != 'store_id') {
					$url_data[$key] = $value;
				}
			}

			$curl = curl_init();

			// Set SSL if required
			if (substr($url, 0, 5) == 'https') {
				curl_setopt($curl, CURLOPT_PORT, 443);
			}

			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLINFO_HEADER_OUT, true);
			curl_setopt($curl, CURLOPT_USERAGENT, $this->request->server['HTTP_USER_AGENT']);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_FORBID_REUSE, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_URL, $url . 'index.php?route=' . $this->request->get['api'] . ($url_data ? '&' . http_build_query($url_data) : ''));

			if ($this->request->post) {
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($this->request->post));
			}

			curl_setopt($curl, CURLOPT_COOKIE, session_name() . '=' . $this->session->data['cookie'] . ';');

			$json = curl_exec($curl);

			curl_close($curl);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput($json);
	}
}