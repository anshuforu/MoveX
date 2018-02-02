<?php
class ControllerDetailsTelecallerVendor extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/telecaller_vendor');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/telecaller_vendor');
		
		$this->getList();
    }
   
	public function info() {
        $transport_details=array();
        $this->load->model('details/vendor');
        if (isset($this->request->get['id'])) {
			$transport_id = $this->request->get['id'];
            
		} else {
			$transport_id = 0;
		}

		
        $data['total_vehicles'] = $this->model_details_vendor->totalVehicles($transport_id);
       // print_r($order_info);die;
$data['transport_info'] = $this->model_details_vendor->getTransportDetails($transport_id);
        $transport = $this->model_details_vendor->getVehicleDetails($transport_id);
      
      // print_r($transport);die;
        foreach($transport as $transports)
                {
       // print_r($transports['vehicle_no']);
        $data['transport_details'][] = array(
				
                'vehicle_no'	  =>$transports['vehicle_no'],
                'vehicle_type'	  =>$transports['vehicle_type'],
                'make'	          =>$transports['carmake_name'],
                'model'	          =>$transports['carmodel_name'],
                'area'	          =>$transports['area_name'],
                'subarea'	          =>$transports['subarea_name'],
                'city'	          =>$transports['city_name'],
                'lorry'	          =>$transports['lorry'],
                'driver_name'	  =>$transports['driver_name'],
                'mobile_no'	  =>$transports['mobile_no'],
                'licence_no'	  =>$transports['licence_no'],
                'labour'	  =>$transports['labour'],
            'insurance_date'  =>$transports['insurance_due_date'],
               );
            
    }
       
        $this->load->language('details/vendor');

			$this->document->setTitle($this->language->get('heading_title'));

			$data['heading_title'] = $this->language->get('heading_title');

			$data['transport_id'] = $this->language->get('text_transport_id');
            $data['transport_name'] = $this->language->get('text_transport_name');
         $data['email_id'] = $this->language->get('text_email_id');
            $data['mobile_number'] = $this->language->get('text_mobile_number');
			  $data['company_name'] = $this->language->get('text_company_name');
          $data['margin'] = $this->language->get('text_margin');
         $data['vehicle_no'] = $this->language->get('text_vehicle_no');
         $data['vehicle_area'] = $this->language->get('text_vehicle_area');
         $data['vehicle_subarea'] = $this->language->get('text_vehicle_subarea');
        $data['vehicle_city'] = $this->language->get('text_vehicle_city');
          $data['vehicle_lorry'] = $this->language->get('text_vehicle_lorry');
         $data['vehicle_type'] = $this->language->get('text_vehicle_type');
          $data['vehicle_make'] = $this->language->get('text_vehicle_make');
         $data['vehicle_model'] = $this->language->get('text_vehicle_model');
          $data['driver_name'] = $this->language->get('text_driver_name');
          $data['driver_mobile_number'] = $this->language->get('text_driver_mobile_no');
            $data['licence_no'] = $this->language->get('text_licence_no');
               $data['labour'] = $this->language->get('entry_labour');
          $data['insurance_date'] = $this->language->get('text_insurance_date');
 $data['tab_transport_details'] = $this->language->get('tab_transport');
          $data['tab_vehicle_details'] = $this->language->get('tab_vehicle_details');
          $data['no_of_vehicles'] = $this->language->get('no_of_vehicles');
         $data['vehicle_insurance']= $this->language->get('vehicle_insurance');

        $data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('sale/coupon_order', 'token=' . $this->session->data['token'], 'SSL')
			);
        
        $data['tab_order'] = $this->language->get('tab_order');
			$data['tab_payment'] = $this->language->get('tab_payment');

$data['button_cancel'] = $this->language->get('button_cancel');
        $data['cancel'] = $this->url->link('details/vendor', 'token=' . $this->session->data['token'], 'SSL');
           $data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			$this->response->setOutput($this->load->view('order/telecaller_vendor_info.tpl',$data));
		
	}
        public function validate() {
	
/*		print_r($this->request->post);
        $drivers=$this->request->post['vendor'];
        
        foreach($drivers as $driver){
           if ($driver['vehicle_no'] == '') {
			$this->error['vehicle_no'] = $this->language->get('error_name');
		}  

        }*/
      
		if ($this->request->post['name'] == '') {
			$this->error['name'] = $this->language->get('error_name');
		}
            
            if ($this->request->post['address'] == '') {
			$this->error['address'] = $this->language->get('error_address');
		}
            
                if ($this->request->post['number'] == '') {
			$this->error['mobile'] = $this->language->get('error_mobile');
		}
            
            
                     if ($this->request->post['margin'] == '') {
			$this->error['margin'] = $this->language->get('error_margin');
		}

		

		return !$this->error;

		
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
         if (isset($this->request->get['filter_make'])) {
			$filter_make = $this->request->get['filter_make'];
		} else {
			$filter_make = null;
		}
         if (isset($this->request->get['filter_model'])) {
			$filter_model = $this->request->get['filter_model'];
		} else {
			$filter_model = null;
		}
         if (isset($this->request->get['filter_labour'])) {
			$filter_labour = $this->request->get['filter_labour'];
		} else {
			$filter_labour = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'v.name';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'v.address';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'v.number';
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
           if (isset($this->request->get['filter_make'])) {
			$url .= '&filter_make=' . urlencode(html_entity_decode($this->request->get['filter_make'], ENT_QUOTES, 'UTF-8'));
		}
           if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}
           if (isset($this->request->get['filter_labour'])) {
			$url .= '&filter_labour=' . urlencode(html_entity_decode($this->request->get['filter_labour'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);


		$data['vendor_total_list']=array();
		$data['car_make_list_data']=array();
		$data['vendor_list']=array();
        $filter_data = array(
			'filter_name'	  => $filter_name,
            'filter_address'  => $filter_address,
            'filter_number'  =>  $filter_number,
              'filter_make'  =>  $filter_make,
              'filter_model'  =>  $filter_model,
              'filter_labour'  =>  $filter_labour,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

       
		$this->load->model('details/telecaller_vendor'); 
        $vendor_total =$this->model_details_telecaller_vendor->getAllVehicleList($filter_data);
        $vendor_total_list=$this->model_details_telecaller_vendor->getTotalList($filter_data);
        $data['userid']=$this->user->getId();

	    foreach ($vendor_total as $result) {
		$data['vendor_list'][] = array(
				'id'	  =>$result['transport_id'],
            'area'	  =>$result['area_name'],
            'subarea'	  =>$result['subarea_name'],
            'city'	  =>$result['city_name'],
            'vehicle_type'	  =>$result['vehicle_type_name'],
            'vehicle_no'	  =>$result['vehicle_no'],
            'lorry'	  =>$result['lorry'],
            'make'	  =>$result['carmake_name'],
            'model'	  =>$result['carmodel_name'],
            'labour'	  =>$result['labour'],
            'driver_name'	  =>$result['driver_name'],
            'mobile_no'	  =>$result['mobile_no'],
            'licence_no'	  =>$result['licence_no'],
                 'view' =>$this->url->link('details/telecaller_vendor/info', 'token=' . $this->session->data['token'] . '&id=' . $result['transport_id'] . $url, 'SSL'),
        );
	  
		}

		
$data['service_center'] = $this->language->get('service_center');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
        $data['column_area'] = $this->language->get('column_area');
        $data['column_subarea'] = $this->language->get('column_subarea');
        $data['column_city'] = $this->language->get('column_city');
        $data['column_vehicle_type'] = $this->language->get('column_vehicle_type');
         $data['column_vehicle_no'] = $this->language->get('column_vehicle_no');
        $data['column_lorry'] = $this->language->get('column_lorry');
        $data['column_make'] = $this->language->get('column_make');
         $data['column_model'] = $this->language->get('column_model');
         $data['column_labour'] = $this->language->get('column_labour');
         $data['column_driver_name'] = $this->language->get('column_driver_name');
         $data['column_mobile_no'] = $this->language->get('column_mobile_no');
         $data['column_licence_no'] = $this->language->get('column_licence_no');
             $data['column_id'] = $this->language->get('column_id');
        $data['text_list'] = $this->language->get('text_list');
		$data['text_confirm'] = $this->language->get('text_confirm');
        $data['text_display'] = $this->language->get('text_display');
        $data['label_filter_name'] = $this->language->get('label_filter_name');
        $data['label_filter_area'] = $this->language->get('label_filter_area');
        $data['label_filter_subarea'] = $this->language->get('label_filter_subarea');
              $data['label_filter_vehicle_type'] = $this->language->get('label_filter_vehicle_type');
              $data['label_filter_make'] = $this->language->get('label_filter_make');
              $data['label_filter_model'] = $this->language->get('label_filter_model');
              $data['label_filter_labour'] = $this->language->get('label_filter_labour');
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
        $data['button_view'] = $this->language->get('button_view');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
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
        if (isset($this->session->data['update'])) {
			$data['update'] = $this->session->data['update'];

			unset($this->session->data['update']);
		} else {
			$data['update'] = '';
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
        	if (isset($this->request->get['filter_make'])) {
			$url .= '&filter_make=' . $this->request->get['filter_make'];
		}
        	if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . $this->request->get['filter_model'];
		}
        	if (isset($this->request->get['filter_labour'])) {
			$url .= '&filter_labour=' . $this->request->get['filter_labour'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
$data['sort_id'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=v.vendor_id' . $url, 'SSL');
		$data['sort_area'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=a.area_name' . $url, 'SSL');
       $data['sort_subarea'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=s.subarea_name' . $url, 'SSL');
        $data['sort_city'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=ci.city_name' . $url, 'SSL');
        $data['sort_vehicle_type'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=vt.vehicle_type_name' . $url, 'SSL');
        $data['sort_vehicle_no'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=vt.vehicle_no' . $url, 'SSL');
        $data['sort_lorry'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=v.lorry' . $url, 'SSL');
        $data['sort_make'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=c.carmake_name' . $url, 'SSL');
        $data['sort_model'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=m.carmodel_name' . $url, 'SSL');
        $data['sort_labour'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=v.labour' . $url, 'SSL');
        $data['sort_driver_name'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=v.driver_name' . $url, 'SSL');
        $data['sort_mobile_no'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=v.mobile_no' . $url, 'SSL');
        $data['sort_licence_no'] = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . '&sort=v.licence_no' . $url, 'SSL');
	
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
		$pagination->total = $vendor_total_list;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('details/telecaller_vendor', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($vendor_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($vendor_total_list - $this->config->get('config_limit_admin'))) ? $vendor_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $vendor_total_list, ceil($vendor_total_list / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_address'] = $filter_address;
        $data['filter_number'] = $filter_number;
           $data['filter_make'] = $filter_make;

           $data['filter_model'] = $filter_model;

           $data['filter_labour'] = $filter_labour;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
	if(isset($this->session->data['id']))	
    {
    $data['id']=$this->session->data['id'];
    }
		$this->response->setOutput($this->load->view('details/telecaller_vendor_list.tpl', $data)); 
       
	}
	
    
                }
  
