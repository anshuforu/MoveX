<?php
class ControllerDetailsVehicleDescription extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/vehicle_description');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/vehicle_description');
		
		$this->getList();
    }
    public function delete() {
			$this->load->language('details/vehicle_description');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/vehicle_description');
    
		if (isset($this->request->post['selected']))
            {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_details_vehicle_description->delete($id);
			}

			$this->session->data['success'] = $this->language->get('text_delete');

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
            	if (isset($this->request->get['filter_area'])) {
				$url .= '&filter_area=' . urlencode(html_entity_decode($this->request->get['filter_area'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_subarea'])) {
				$url .= '&filter_subarea=' . $this->request->get['filter_subarea'];
			}
            
            if (isset($this->request->get['filter_city'])) {
				$url .= '&filter_city=' . $this->request->get['filter_city'];
			}
            
			if (isset($this->request->get['filter_make'])) {
				$url .= '&filter_make=' . $this->request->get['filter_make'];
			}
            
            if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . $this->request->get['filter_model'];
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

			$this->response->redirect($this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}
            

	public function add() {
		$this->load->language('details/vehicle_description');
        		$this->load->model('details/vehicle_description');
        $this->load->model('details/vehicle_description');
  
        
		$this->document->setTitle($this->language->get('heading_title'));
		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if(($this->request->server['REQUEST_METHOD'] == 'POST' ) && $this->validate()) //&& $this->validate())
             {
              //print_r($this->request->post);die;
               $data['abc']=$this->model_details_vehicle_description->addVehicleDescription($this->request->post);

               
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

			$this->response->redirect($this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . $url, 'SSL'));
           }
           
         $this->getFormadd();
        
        }
    	public function add_vehicle() {
		$this->load->language('details/vehicle_description');
        		$this->load->model('details/vehicle_description');
        $this->load->model('details/vehicle_description');
  
        
		$this->document->setTitle($this->language->get('heading_title'));
		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if(($this->request->server['REQUEST_METHOD'] == 'POST' ) && $this->validate()) //&& $this->validate())
             {
              //print_r($this->request->post);die;
               $data['abc']=$this->model_details_vehicle_description->addVehicleDescription($this->request->post);

               
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

			$this->response->redirect($this->url->link('details/vendor', 'token=' . $this->session->data['token'] . $url, 'SSL'));
           }
           
         $this->getFormvehicle();
        
        }
    
	public function info() {
        $transport_details=array();
        $this->load->model('details/vehicle_description');
        if (isset($this->request->get['id'])) {
			$description_id = $this->request->get['id'];
            
		} else {
			$description_id = 0;
		}

       // print_r($order_info);die;
        $data['vehicle_details'] = $this->model_details_vehicle_description->getVehicleDetails($description_id);
      //  print_r($vehicle_info);die;
      
      
       
        $this->load->language('details/vehicle_description');

			$this->document->setTitle($this->language->get('heading_title'));

			$data['heading_title'] = $this->language->get('heading_title');

			$data['transport_id'] = $this->language->get('text_transport_id');
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
        $data['cancel'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'], 'SSL');
           $data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			$this->response->setOutput($this->load->view('order/vehicle_info.tpl',$data));
		
	}
        public function validate() {
	
/*		print_r($this->request->post);
        $drivers=$this->request->post['vendor'];
        
        foreach($drivers as $driver){
           if ($driver['vehicle_no'] == '') {
			$this->error['vehicle_no'] = $this->language->get('error_name');
		}  

        }*/
            if ($this->request->post['transport_id'] == 0) {
			$this->error['transporter'] = $this->language->get('error_transporter');
		}
         
      
		if ($this->request->post['vehicle_no'] == '') {
			$this->error['vehicle_no'] = $this->language->get('error_vehicle_no');
		}
            	if ($this->request->post['vehicle_type'] == 0) {
			$this->error['vehicle_type'] = $this->language->get('error_vehicle_type');
		}
              	if ($this->request->post['insurance_due_date'] == '') {
			$this->error['insurance_due_date'] = $this->language->get('error_insurance_due_date');
		}
                  	if ($this->request->post['area'] == 0) {
			$this->error['area'] = $this->language->get('error_area');
		}
                  	if ($this->request->post['subarea'] == 0) {
			$this->error['subarea'] = $this->language->get('error_subarea');
		}
                  	if ($this->request->post['city'] == 0) {
			$this->error['city'] = $this->language->get('error_city');
		}
                    	if ($this->request->post['make'] == 0) {
			$this->error['make'] = $this->language->get('error_make');
		}
                    	if ($this->request->post['model'] == 0) {
			$this->error['model'] = $this->language->get('error_model');
		}
                        	/*if ($this->request->post['lorry'] == 0) {
			$this->error['lorry'] = $this->language->get('error_lorry');
		}*/
                        	if ($this->request->post['driver_name'] == '') {
			$this->error['driver_name'] = $this->language->get('error_driver_name');
		}
                        	/*if ($this->request->post['labour'] == 0) {
			$this->error['labour'] = $this->language->get('error_labour');
		}*/
                        	if ($this->request->post['mobile_no'] == 0) {
			$this->error['mobile_no'] = $this->language->get('error_mobile_no');
		}
                        	if ($this->request->post['licence_no'] == '') {
			$this->error['licence_no'] = $this->language->get('error_licence_no');
		}
              if(($this->request->post['transport_id'])==0 || ($this->request->post['vehicle_no'])=='' || ($this->request->post['vehicle_type'])==0 || ($this->request->post['insurance_due_date'])=='' || ($this->request->post['area'])==0 || ($this->request->post['subarea'])==0 || ($this->request->post['city'])==0 || ($this->request->post['make'])==0 || ($this->request->post['model'])==0 || ($this->request->post['driver_name'])=='' || ($this->request->post['mobile_no'])==0 || ($this->request->post['licence_no'])=='')
            {
                $this->error['common'] = $this->language->get('error_common');
            }

		

		return !$this->error;

		
	}

public function edit() {
    $this->load->language('details/vehicle_description');

		$this->document->setTitle($this->language->get('heading_title'));
    $this->load->model('details/vehicle_description');
  
   
         
	if ($this->request->server['REQUEST_METHOD'] == 'POST'  && $this->validate()){
       // print_r($this->request->post);die;
        //echo $this->request->get['id'];die;
            $this->model_details_vehicle_description->editVehicleDescription($this->request->post,$this->request->get['id']);   
            $this->session->data['update'] = $this->language->get('text_update');
             $this->session->data['id']= $this->request->get['id'];
            
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

			$this->response->redirect($this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . $url, 'SSL'));
	 }
         
        else{
        
         $this->getFormadd();
        
        }
}
          
    
    
	protected function getList() {
        
      if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}


		if (isset($this->request->get['filter_address'])) {
			$filter_vehicle_no = $this->request->get['filter_address'];
		} else {
			$filter_vehicle_no = null;
		}
        
        if (isset($this->request->get['filter_number'])) {
			$filter_vehicle_type = $this->request->get['filter_number'];
		} else {
			$filter_vehicle_type = null;
		}
        
        if (isset($this->request->get['filter_area'])) {
			$filter_area = $this->request->get['filter_area'];
		} else {
			$filter_area = null;
		}
        
        if (isset($this->request->get['filter_subarea'])) {
			$filter_subarea = $this->request->get['filter_subarea'];
		} else {
			$filter_subarea = null;
		}
        
        if (isset($this->request->get['filter_city'])) {
			$filter_city = $this->request->get['filter_city'];
		} else {
			$filter_city = null;
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
            if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'v.vehicle_type';
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
			'href' => $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('details/vehicle_description/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
	
		$data['delete'] = $this->url->link('details/vehicle_description/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
        if(isset($this->session->data['id']))
        {
        $data['id']=$this->session->data['id'];
        }
		$data['vendor_total_list']=array();
		$data['car_make_list_data']=array();
		$data['vendor_list']=array();
        $filter_data = array(
			'filter_name'	  => $filter_name,
            'filter_vehicle_no'  => $filter_vehicle_no,
            'filter_vehicle_type'  =>  $filter_vehicle_type,
             'filter_area'  =>  $filter_area,
            'filter_subarea'  =>  $filter_subarea,
            'filter_city'  =>  $filter_city,
            'filter_make'  =>  $filter_make,
            'filter_model'  =>  $filter_model,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

       
		$this->load->model('details/vehicle_description'); 
        $vehicle_description =$this->model_details_vehicle_description->getAllVehicleList($filter_data);
        $vehicle_total_list=$this->model_details_vehicle_description->getTotalVehicleList();
        $data['userid']=$this->user->getId();

	    foreach ($vehicle_description as $vehicle) {
		$data['vehicle_list'][] = array(
            'id'	  =>$vehicle['transport_id'],
            'name'	  =>$vehicle['vendor_name'],
             'vehicle_description_id'	  =>$vehicle['vehicle_description_id'],
            'vehicle_no'	  =>$vehicle['vehicle_no'],
            'vehicle_type'	  =>$vehicle['vehicle_type_name'],
            'make'	  =>$vehicle['carmake_name'],
            'model'	  =>$vehicle['carmodel_name'],
            'area'	  =>$vehicle['area_name'],
               'subarea'	  =>$vehicle['subarea_name'],
               'city'	  =>$vehicle['city_name'],
            'info'   => $this->url->link('details/vehicle_description/info', 'token=' . $this->session->data['token']. '&id=' . $vehicle['vehicle_description_id']. $url, 'SSL'),
            'view'   => $this->url->link('details/vendor/info', 'token=' . $this->session->data['token']. '&id=' . $vehicle['transport_id']. $url, 'SSL'),
                 'edit'   => $this->url->link('details/vehicle_description/edit', 'token=' . $this->session->data['token'] . '&vehicle_description_id=' . $vehicle['vehicle_description_id'].'&id=' . $vehicle['transport_id'].'&vehicle_no=' . $vehicle['vehicle_no'].'&vehicle_type=' . $vehicle['vehicle_type'].'&city=' . $vehicle['city_id'].'&area=' . $vehicle['area_id'].'&subarea=' . $vehicle['subarea_id'].'&date=' . $vehicle['insurance_due_date'] .'&make=' . $vehicle['carmake_id'].'&model=' . $vehicle['carmodel_id'].'&driver=' . $vehicle['driver_name'].'&mobile_no=' . $vehicle['mobile_no'].'&licence_no=' . $vehicle['licence_no'].'&lorry=' . $vehicle['lorry'].'&labour=' . $vehicle['labour']. $url, 'SSL')
                
			);
	  
		}

		
$data['service_center'] = $this->language->get('service_center');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
        $data['column_address'] = $this->language->get('column_address');
        $data['column_make'] = $this->language->get('column_make');
        $data['column_model'] = $this->language->get('column_model');
        $data['column_area'] = $this->language->get('column_area');
        $data['column_subarea'] = $this->language->get('column_subarea');
        $data['column_city'] = $this->language->get('column_city');
         $data['column_vehicle_no'] = $this->language->get('column_vehicle_no');
             $data['column_id'] = $this->language->get('column_id');
        $data['text_list'] = $this->language->get('text_list');
		$data['text_confirm'] = $this->language->get('text_confirm');
        $data['label_filter_name'] = $this->language->get('label_filter_name');
        $data['label_filter_vehicle_no'] = $this->language->get('label_filter_vehicle_no');
        $data['label_filter_vehicle_type'] = $this->language->get('label_filter_vehicle_type');
         $data['label_filter_area'] = $this->language->get('label_filter_area');
         $data['label_filter_subarea'] = $this->language->get('label_filter_subarea');
         $data['label_filter_city'] = $this->language->get('label_filter_city');
          $data['label_filter_make'] = $this->language->get('label_filter_make');
          $data['label_filter_model'] = $this->language->get('label_filter_model');
		$data['column_image'] = $this->language->get('column_image');
		$data['column_name'] = $this->language->get('column_name');
        $data['column_name_new'] = $this->language->get('column_name_new');
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
        if (isset($this->request->get['filter_area'])) {
			$url .= '&filter_area=' . $this->request->get['filter_area'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
$data['sort_id'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=v.transport_id' . $url, 'SSL');
		$data['sort_name'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=ve.vendor_name' . $url, 'SSL');
       $data['sort_address'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=v.vehicle_no' . $url, 'SSL');
        $data['sort_number'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=v.vehicle_no' . $url, 'SSL');
         $data['sort_vehicle_type'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=v.vehicle_type' . $url, 'SSL');
	 $data['sort_make'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=ck.carmake_name' . $url, 'SSL');
         $data['sort_model'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=cm.carmodel_name' . $url, 'SSL');
            $data['sort_area'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=a.area_name' . $url, 'SSL');
            $data['sort_subarea'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=s.subarea_name' . $url, 'SSL');
            $data['sort_city'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . '&sort=c.city_name' . $url, 'SSL');
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
        if (isset($this->request->get['filter_area'])) {
			$url .= '&filter_area=' . $this->request->get['filter_area'];
		}

	   if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $vehicle_total_list;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($vehicle_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($vehicle_total_list - $this->config->get('config_limit_admin'))) ? $vehicle_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $vehicle_total_list, ceil($vehicle_total_list / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_vehicle_no'] = $filter_vehicle_no;
       $data['filter_vehicle_type'] = $filter_vehicle_type;
         $data['filter_area'] = $filter_area;
         $data['filter_subarea'] = $filter_subarea;
         $data['filter_city'] = $filter_city;
         $data['filter_make'] = $filter_make;
         $data['filter_model'] = $filter_model;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		

		$this->response->setOutput($this->load->view('details/vehicle_description_list.tpl', $data)); 
       
	}
	
    protected function getFormadd() {
//         if($this->request->server['REQUEST_METHOD'] == 'POST' )
//        {
//        $data['vehicle_no']=$this->request->post['vehicle_no'];
//        }
        		$this->load->model('details/vehicle_description');
    
        //if(isset($this->request->get['id'])){
          //$data['vehicles']=$this->model_details_vendor->getVehicles($this->request->get['id']);
            //print_r($data['vehicles']);die;
        //}
          $data['all_vendors']=$this->model_details_vehicle_description->getVendor();
          //$data['all_vehicle']=$this->model_details_vehicle_description->getVehicle();
            $data['all_areas']=$this->model_details_vehicle_description->getArea();
            $data['all_zones']=$this->model_details_vehicle_description->getZone();
          $data['all_vehicles']=$this->model_details_vehicle_description->getVehicleType();
              $data['all_makes']=$this->model_details_vehicle_description->getMake();
                      $data['all_models']=$this->model_details_vehicle_description->getModels();
         $data['all_subareas']=$this->model_details_vehicle_description->getSubareas();
         $data['all_cities']=$this->model_details_vehicle_description->getCities();
         $data['all_driver']=$this->model_details_vehicle_description->getdriver();
         
        $data['margin']=$this->model_details_vehicle_description->getMargin();
         
		$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('details/vehicle_description');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
        	$data['entry_transporter'] = $this->language->get('entry_transporter');
		$data['entry_vehicle_no'] = $this->language->get('entry_vehicle_no');
		$data['entry_vehicle_type'] = $this->language->get('entry_vehicle_type');
        $data['entry_area'] = $this->language->get('entry_area');
        $data['entry_subarea'] = $this->language->get('entry_subarea');
        $data['entry_city'] = $this->language->get('entry_city');
        $data['entry_make'] = $this->language->get('entry_make');
        $data['entry_model'] = $this->language->get('entry_model');
        $data['entry_lorry'] = $this->language->get('entry_lorry');
        $data['entry_driver_name'] = $this->language->get('entry_driver_name');
           $data['entry_labour'] = $this->language->get('entry_labour');
        $data['entry_mobile_no'] = $this->language->get('entry_mobile_no');
        $data['entry_licence_no'] = $this->language->get('entry_licence_no');
        $data['entry_insurance_due_date'] = $this->language->get('entry_insurance_due_date');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_save'] = "Submit";
		$data['button_cancel'] = $this->language->get('button_cancel');
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
         if (isset($this->error['transporter'])) {
			$data['error_transporter'] = $this->error['transporter'];
		} else {
			$data['error_transporter'] = '';
		}
       
        if (isset($this->error['vehicle_no'])) {
			$data['error_vehicle_no'] = $this->error['vehicle_no'];
		} else {
			$data['error_vehicle_no'] = '';
		}
         if (isset($this->error['vehicle_type'])) {
			$data['error_vehicle_type'] = $this->error['vehicle_type'];
		} else {
			$data['error_vehicle_type'] = '';
		}
           if (isset($this->error['common'])) {
			$data['error_common'] = $this->error['common'];
		} else {
			$data['error_common'] = '';
		}
         if (isset($this->error['insurance_due_date'])) {
			$data['error_insurance_due_date'] = $this->error['insurance_due_date'];
		} else {
			$data['error_insurance_due_date'] = '';
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
        if (isset($this->error['city'])) {
			$data['error_city'] = $this->error['city'];
		} else {
			$data['error_city'] = '';
		}
         if (isset($this->error['make'])) {
			$data['error_make'] = $this->error['make'];
		} else {
			$data['error_make'] = '';
		}
         if (isset($this->error['model'])) {
			$data['error_model'] = $this->error['model'];
		} else {
			$data['error_model'] = '';
		}
           if (isset($this->error['labour'])) {
			$data['error_labour'] = $this->error['labour'];
		} else {
			$data['error_labour'] = '';
		}
           if (isset($this->error['driver_name'])) {
			$data['error_driver_name'] = $this->error['driver_name'];
		} else {
			$data['error_driver_name'] = '';
		}
           if (isset($this->error['lorry'])) {
			$data['error_lorry'] = $this->error['lorry'];
		} else {
			$data['error_lorry'] = '';
		}
           if (isset($this->error['mobile_no'])) {
			$data['error_mobile_no'] = $this->error['mobile_no'];
		} else {
			$data['error_mobile_no'] = '';
		}
           if (isset($this->error['licence_no'])) {
			$data['error_licence_no'] = $this->error['licence_no'];
		} else {
			$data['error_licence_no'] = '';
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
			'href' => $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);
         
        if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('details/vehicle_description/add', 'token=' . $this->session->data['token'], 'SSL');
            $data['id']="";
		} else {
            
			$data['action'] = $this->url->link('details/vehicle_description/edit', 'token=' . $this->session->data['token'] .'&id='.$this->request->get['vehicle_description_id'] . $url, 'SSL');
            
        $data['id']=$this->request->get['id'];
       
                    
		}
       
        if (isset($this->request->get['vehicle_no'])) {
              $data['vehicle_no']=$this->request->get['vehicle_no'];
		} else {
 
       $data['vehicle_no']="";
                    
		}
           if (isset($this->request->get['vehicle_type'])) {
              $data['vehicle_id']=$this->request->get['vehicle_type'];
		} else {
 
       $data['vehicle_id']="";
                    
		}
        
            if (isset($this->request->get['city'])) {
              $data['city']=$this->request->get['city'];
		} else {
 
       $data['city']="";
                    
		}
             if (isset($this->request->get['area'])) {
              $data['area']=$this->request->get['area'];
		} else {
 
       $data['area']="";
                    
		}
            if (isset($this->request->get['subarea'])) {
              $data['subarea']=$this->request->get['subarea'];
		} else {
 
       $data['subarea']="";
                    
		}
         if (isset($this->request->get['city'])) {
              $data['city']=$this->request->get['city'];
		} else {
 
       $data['city']="";
                    
		}
           if (isset($this->request->get['make'])) {
              $data['make']=$this->request->get['make'];
		} else {
 
       $data['make']="";
                    
		}
          if (isset($this->request->get['model'])) {
              $data['model']=$this->request->get['model'];
		} else {
 
       $data['model']="";
                    
		}
             if (isset($this->request->get['driver'])) {
              $data['driver_name']=$this->request->get['driver'];
		} else {
 
       $data['driver_name']="";
                    
		}
        
            if (isset($this->request->get['mobile_no'])) {
              $data['mobile_no']=$this->request->get['mobile_no'];
		} else {
 
       $data['mobile_no']="";
                    
		}
             if (isset($this->request->get['licence_no'])) {
              $data['licence_no']=$this->request->get['licence_no'];
		} else {
 
       $data['licence_no']="";
                    
		}
              if (isset($this->request->get['lorry'])) {
              $data['lorry']=$this->request->get['lorry'];
		} else {
 
       $data['lorry']="";
                    
		}
             if (isset($this->request->get['labour'])) {
              $data['labour']=$this->request->get['labour'];
		} else {
 
       $data['labour']="";
                    
		}
        
             if (isset($this->request->get['date'])) {
              $data['date']=$this->request->get['date'];
		} else {
 
       $data['date']="";
                    
		}

        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'], 'SSL')
		);

      
        
        $data['cancel'] = $this->url->link('details/vehicle_description', 'token=' . $this->session->data['token'], 'SSL');
         if(isset($this->request->get['name']))
        {
            $data['name']=$this->request->get['name'];
        
        }
          if(isset($this->request->get['vendor_id']))
        {
            $data['vendor_id']=$this->request->get['vendor_id'];
        
        }
        else
        {
            $data['name']="";
        }
        if(isset($this->request->get['address']))
        {
            $data['address']=$this->request->get['address'];
        
        }
        else
        {
            $data['address']="";
        }
        if(isset($this->request->get['company_name']))
        {
            $data['company_name']=$this->request->get['company_name'];
        
        }
        else
        {
            $data['company_name']="";
        }
         if(isset($this->request->get['number']))
        {
            $data['number']=$this->request->get['number'];
        
        }
        else
        {
            $data['number']="";
        }
          if(isset($this->request->get['email_id']))
        {
            $data['email_id']=$this->request->get['email_id'];
        
        }
        else
        {
            $data['email_id']="";
        }
        
          if(isset($this->request->get['vehicle_no']))
        {
            $data['vehicle_no']=$this->request->get['vehicle_no'];
        
        }
        else
        {
            $data['vehicle_no']="";
        }
             
        if(isset($this->request->post['vehicle_no']))
    {
        $data['vehicle_no']=$this->request->post['vehicle_no'];
    }
             if(isset($this->request->post['transport_id']))
    {
        $data['id']=$this->request->post['transport_id'];
    }
                if(isset($this->request->post['vehicle_type']))
    {
        $data['vehicle_id']=$this->request->post['vehicle_type'];
    }
                   if(isset($this->request->post['insurance_due_date']))
    {
        $data['date']=$this->request->post['insurance_due_date'];
    }
                        if(isset($this->request->post['area']))
    {
        $data['area']=$this->request->post['area'];
    }
                        if(isset($this->request->post['subarea']))
    {
        $data['subarea']=$this->request->post['subarea'];
    }
                        if(isset($this->request->post['city']))
    {
        $data['city']=$this->request->post['city'];
    }
                        if(isset($this->request->post['make']))
    {
        $data['make']=$this->request->post['make'];
    }
                               if(isset($this->request->post['model']))
    {
        $data['model']=$this->request->post['model'];
    }
                                       if(isset($this->request->post['lorry']))
    {
        $data['lorry']=$this->request->post['lorry'];
    }
    
                                       if(isset($this->request->post['driver_name']))
    {
        $data['driver_name']=$this->request->post['driver_name'];
    }
    
                                       if(isset($this->request->post['labour']))
    {
        $data['labour']=$this->request->post['labour'];
    }
    
                                       if(isset($this->request->post['mobile_no']))
    {
        $data['mobile_no']=$this->request->post['mobile_no'];
    }
                                            if(isset($this->request->post['licence_no']))
    {
        $data['licence_no']=$this->request->post['licence_no'];
    }
    
    
    
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('details/vehicle_description_form.tpl', $data));
        
    }
    
    protected function getFormvehicle() {
//         if($this->request->server['REQUEST_METHOD'] == 'POST' )
//        {
//        $data['vehicle_no']=$this->request->post['vehicle_no'];
//        }
        		$this->load->model('details/vehicle_description');
    
        //if(isset($this->request->get['id'])){
          //$data['vehicles']=$this->model_details_vendor->getVehicles($this->request->get['id']);
            //print_r($data['vehicles']);die;
        //}
          $data['all_vendors']=$this->model_details_vehicle_description->getVendor();
          //$data['all_vehicle']=$this->model_details_vehicle_description->getVehicle();
            $data['all_areas']=$this->model_details_vehicle_description->getArea();
            $data['all_zones']=$this->model_details_vehicle_description->getZone();
          $data['all_vehicles']=$this->model_details_vehicle_description->getVehicleType();
              $data['all_makes']=$this->model_details_vehicle_description->getMake();
                      $data['all_models']=$this->model_details_vehicle_description->getModels();
         $data['all_subareas']=$this->model_details_vehicle_description->getSubareas();
         $data['all_cities']=$this->model_details_vehicle_description->getCities();
         $data['all_driver']=$this->model_details_vehicle_description->getdriver();
         
        $data['margin']=$this->model_details_vehicle_description->getMargin();
         
		$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('details/vehicle_description');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
        	$data['entry_transporter'] = $this->language->get('entry_transporter');
		$data['entry_vehicle_no'] = $this->language->get('entry_vehicle_no');
		$data['entry_vehicle_type'] = $this->language->get('entry_vehicle_type');
        $data['entry_area'] = $this->language->get('entry_area');
        $data['entry_subarea'] = $this->language->get('entry_subarea');
        $data['entry_city'] = $this->language->get('entry_city');
        $data['entry_make'] = $this->language->get('entry_make');
        $data['entry_model'] = $this->language->get('entry_model');
        $data['entry_lorry'] = $this->language->get('entry_lorry');
        $data['entry_driver_name'] = $this->language->get('entry_driver_name');
           $data['entry_labour'] = $this->language->get('entry_labour');
        $data['entry_mobile_no'] = $this->language->get('entry_mobile_no');
        $data['entry_licence_no'] = $this->language->get('entry_licence_no');
        $data['entry_insurance_due_date'] = $this->language->get('entry_insurance_due_date');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_save'] = "Submit";
		$data['button_cancel'] = $this->language->get('button_cancel');
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
         if (isset($this->error['transporter'])) {
			$data['error_transporter'] = $this->error['transporter'];
		} else {
			$data['error_transporter'] = '';
		}
        if (isset($this->error['vehicle_no'])) {
			$data['error_vehicle_no'] = $this->error['vehicle_no'];
		} else {
			$data['error_vehicle_no'] = '';
		}
         if (isset($this->error['vehicle_type'])) {
			$data['error_vehicle_type'] = $this->error['vehicle_type'];
		} else {
			$data['error_vehicle_type'] = '';
		}
         if (isset($this->error['insurance_due_date'])) {
			$data['error_insurance_due_date'] = $this->error['insurance_due_date'];
		} else {
			$data['error_insurance_due_date'] = '';
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
         if (isset($this->error['make'])) {
			$data['error_make'] = $this->error['make'];
		} else {
			$data['error_make'] = '';
		}
         if (isset($this->error['model'])) {
			$data['error_model'] = $this->error['model'];
		} else {
			$data['error_model'] = '';
		}
           if (isset($this->error['labour'])) {
			$data['error_labour'] = $this->error['labour'];
		} else {
			$data['error_labour'] = '';
		}
           if (isset($this->error['driver_name'])) {
			$data['error_driver_name'] = $this->error['driver_name'];
		} else {
			$data['error_driver_name'] = '';
		}
           if (isset($this->error['lorry'])) {
			$data['error_lorry'] = $this->error['lorry'];
		} else {
			$data['error_lorry'] = '';
		}
           if (isset($this->error['mobile_no'])) {
			$data['error_mobile_no'] = $this->error['mobile_no'];
		} else {
			$data['error_mobile_no'] = '';
		}
           if (isset($this->error['licence_no'])) {
			$data['error_licence_no'] = $this->error['licence_no'];
		} else {
			$data['error_licence_no'] = '';
		}
        
		$url = '';


		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/vendor', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);
         
			$data['action'] = $this->url->link('details/vehicle_description/add_vehicle', 'token=' . $this->session->data['token'].'&vendor_id='.$this->request->get['vendor_id'], 'SSL');

        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/vendor', 'token=' . $this->session->data['token'], 'SSL')
		);
            if(isset($this->request->get['vendor_id']))
        {
            $data['vendor_id']=$this->request->get['vendor_id'];
        
        }
        else
        {
            $data['vendor_id']="";
        }
           if(isset($this->request->post['vehicle_no']))
    {
        $data['vehicle_no']=$this->request->post['vehicle_no'];
    }
             if(isset($this->request->post['transport_id']))
    {
        $data['id']=$this->request->post['transport_id'];
    }
                if(isset($this->request->post['vehicle_type']))
    {
        $data['vehicle_id']=$this->request->post['vehicle_type'];
    }
                   if(isset($this->request->post['insurance_due_date']))
    {
        $data['date']=$this->request->post['insurance_due_date'];
    }
                        if(isset($this->request->post['area']))
    {
        $data['area']=$this->request->post['area'];
    }
                        if(isset($this->request->post['subarea']))
    {
        $data['subarea']=$this->request->post['subarea'];
    }
                        if(isset($this->request->post['city']))
    {
        $data['city']=$this->request->post['city'];
    }
                        if(isset($this->request->post['make']))
    {
        $data['make']=$this->request->post['make'];
    }
                               if(isset($this->request->post['model']))
    {
        $data['model']=$this->request->post['model'];
    }
                                       if(isset($this->request->post['lorry']))
    {
        $data['lorry']=$this->request->post['lorry'];
    }
    
                                       if(isset($this->request->post['driver_name']))
    {
        $data['driver_name']=$this->request->post['driver_name'];
    }
    
                                       if(isset($this->request->post['labour']))
    {
        $data['labour']=$this->request->post['labour'];
    }
    
                                       if(isset($this->request->post['mobile_no']))
    {
        $data['mobile_no']=$this->request->post['mobile_no'];
    }
                                            if(isset($this->request->post['licence_no']))
    {
        $data['licence_no']=$this->request->post['licence_no'];
    }
    

        
      
        
        $data['cancel'] = $this->url->link('details/vendor', 'token=' . $this->session->data['token'], 'SSL');
    
    
    
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('details/vehicle_description_form.tpl', $data));
        
    }
         public function subdriver() {
            $driver_id=$this->request->get['driver_id'];
      
		$json = array();

		$this->load->model('details/vehicle_description');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'driver'    => $this->model_details_vehicle_description->getdriverdesc($driver_id),
			);
    //print_r($json);  die;       

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    public function subarea() {
            $area_id=$this->request->get['area_id'];
      
		$json = array();

		$this->load->model('details/vehicle_description');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'area'    => $this->model_details_vehicle_description->getSub($area_id),
			);
    //print_r($json);  die;       

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
     public function model() {
            $make_id=$this->request->get['make'];
      
		$json = array();

		$this->load->model('details/vehicle_description');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'make'    => $this->model_details_vehicle_description->getMod($make_id),
			);
    //print_r($json);  die;       

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    	public function autocomplete() {
		$json = array();
		if (isset($this->request->get['filter_name'])) {
			$this->load->model('details/vendor');
		

			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = '';
			}

			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];
			} else {
				$limit = 5;
			}

			$filter_data = array(
				'filter_name'  => $filter_name,
				'start'        => 0,
				'limit'        => $limit
			);

			$results = $this->model_details_vendor->getProducts($filter_data);

			foreach ($results as $result) {
				$option_data = array();

				$product_options = $this->model_catalog_product->getProductOptions($result['product_id']);

				foreach ($product_options as $product_option) {
					$option_info = $this->model_catalog_option->getOption($product_option['option_id']);

					if ($option_info) {
						$product_option_value_data = array();

						foreach ($product_option['product_option_value'] as $product_option_value) {
							$option_value_info = $this->model_catalog_option->getOptionValue($product_option_value['option_value_id']);

							if ($option_value_info) {
								$product_option_value_data[] = array(
									'product_option_value_id' => $product_option_value['product_option_value_id'],
									'option_value_id'         => $product_option_value['option_value_id'],
									'name'                    => $option_value_info['name'],
									'price'                   => (float)$product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
									'price_prefix'            => $product_option_value['price_prefix']
								);
							}
						}

						$option_data[] = array(
							'product_option_id'    => $product_option['product_option_id'],
							'product_option_value' => $product_option_value_data,
							'option_id'            => $product_option['option_id'],
							'name'                 => $option_info['name'],
							'type'                 => $option_info['type'],
							'value'                => $product_option['value'],
							'required'             => $product_option['required']
						);
					}
				}

				$json[] = array(
					'product_id' => $result['product_id'],
					'name'       => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
					'model'      => $result['model'],
					'option'     => $option_data,
					'price'      => $result['price']
				);
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
                }
  
