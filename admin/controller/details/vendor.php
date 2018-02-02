<?php
class ControllerDetailsVendor extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/vendor');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/vendor');
		
		$this->getList();
    }
    public function delete() {
			$this->load->language('details/vendor');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/vendor');
    
		if (isset($this->request->post['selected']))
            {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_details_vendor->delete($id);
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

		$this->getList();
	}
            

	public function add() {

		$this->load->language('details/vendor');
        		$this->load->model('details/vendor');
        $this->load->model('details/vehicle_type');
  
        
		$this->document->setTitle($this->language->get('heading_title'));
    //    print_r($this->request->post);
		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if(($this->request->server['REQUEST_METHOD'] == 'POST' ) && $this->validate())
             {
    
               $data['abc']=$this->model_details_vendor->addVendor($this->request->post);

               
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
           
         $this->getFormadd();
        
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
			$this->response->setOutput($this->load->view('order/vendor_info.tpl',$data));
		
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

public function edit() {
    $this->load->language('details/vendor');

		$this->document->setTitle($this->language->get('heading_title'));
    $this->load->model('details/vendor');
  
         
	if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate()){
       // print_r($this->request->post);die;
            $this->model_details_vendor->editVendor($this->request->post,$this->request->get['id']);
        
                 
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

			$this->response->redirect($this->url->link('details/vendor', 'token=' . $this->session->data['token'] . $url, 'SSL'));
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
			'href' => $this->url->link('details/vendor', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('details/vendor/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
	
		$data['delete'] = $this->url->link('details/vendor/delete', 'token=' . $this->session->data['token'] . $url, 'SSL'); 

		$data['vendor_total_list']=array();
		$data['car_make_list_data']=array();
		$data['vendor_list']=array();
        $filter_data = array(
			'filter_name'	  => $filter_name,
            'filter_address'  => $filter_address,
            'filter_number'  =>  $filter_number,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

       
		$this->load->model('details/vendor'); 
        $vendor_total =$this->model_details_vendor->getAllVendorList($filter_data);
        $vendor_total_list=$this->model_details_vendor->getTotalList($filter_data);
        $data['userid']=$this->user->getId();

	    foreach ($vendor_total as $result) {
			
		$data['vendor_list'][] = array(
				'id'	  =>$result['vendor_id'],
		        'name'    => $result['vendor_name'],
				'address' => $result['vendor_address'],
                'email' => $result['email_id'],
                'number'  => $result['vendor_number'],
                'company_name' => $result['company_name'],
                'vehicle_no'   =>$this->model_details_vendor->totalVehicles($result['vendor_id']),
                 'view' =>$this->url->link('details/vendor/info', 'token=' . $this->session->data['token'] . '&id=' . $result['vendor_id'] . $url, 'SSL'),
                 'edit'   => $this->url->link('details/vendor/edit', 'token=' . $this->session->data['token'] . '&id=' . $result['vendor_id'] .'&name=' . $result['vendor_name'] .'&number=' . $result['vendor_number'].'&alternate_number=' . $result['alternate_number'] .'&address=' . $result['vendor_address'].'&company_name=' . $result['company_name'].'&email_id=' . $result['email_id'] .'&vehicle_no=' .$this->model_details_vendor->totalVehicles($result['vendor_id']). $url, 'SSL'),
            'vehicle_add' =>$this->url->link('details/vehicle_description/add_vehicle', 'token=' . $this->session->data['token'] .'&vendor_id=' . $result['vendor_id'] . $url, 'SSL'),
                
			);
	  
		}

		
$data['service_center'] = $this->language->get('service_center');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
        $data['column_address'] = $this->language->get('column_address');
        $data['column_email'] = $this->language->get('column_email');
        $data['column_number'] = $this->language->get('column_number');
         $data['column_vehicle_no'] = $this->language->get('column_vehicle_no');
             $data['column_id'] = $this->language->get('column_id');
        $data['text_list'] = $this->language->get('text_list');
		$data['text_confirm'] = $this->language->get('text_confirm');
        $data['text_display'] = $this->language->get('text_display');
        $data['label_filter_name'] = $this->language->get('label_filter_name');
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

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
$data['sort_id'] = $this->url->link('details/vendor', 'token=' . $this->session->data['token'] . '&sort=v.vendor_id' . $url, 'SSL');
		$data['sort_name'] = $this->url->link('details/vendor', 'token=' . $this->session->data['token'] . '&sort=v.vendor_name' . $url, 'SSL');
       $data['sort_address'] = $this->url->link('details/vendor', 'token=' . $this->session->data['token'] . '&sort=v.vendor_address' . $url, 'SSL');
        $data['sort_number'] = $this->url->link('details/vendor', 'token=' . $this->session->data['token'] . '&sort=v.vendor_number' . $url, 'SSL');
	
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
		$pagination->url = $this->url->link('details/vendor', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($vendor_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($vendor_total_list - $this->config->get('config_limit_admin'))) ? $vendor_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $vendor_total_list, ceil($vendor_total_list / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_address'] = $filter_address;
        $data['filter_number'] = $filter_number;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
	if(isset($this->session->data['id']))	
    {
    $data['id']=$this->session->data['id'];
    }
		$this->response->setOutput($this->load->view('details/vendor_list.tpl', $data)); 
       
	}
public function area() {
$area_id=$this->request->get['area'];
		$json = array();

		$this->load->model('details/vendor');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'area'    => $this->model_details_vendor->getSubArea($area_id),
			);       

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
    
    public function model() {
$make_id=$this->request->get['make_id'];
		$json = array();

		$this->load->model('details/vendor');

		

	
			//this->load->model('ser/model');
			$json = array(
           
				'make'    => $this->model_details_vendor->getModel($make_id),
			);       

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
    protected function getFormadd() {
         /*if($this->request->server['REQUEST_METHOD'] == 'POST' )
        {
        $data['message']="Please Fill All Vehicle Details";
        }*/
        		$this->load->model('details/vendor');
    
        if(isset($this->request->get['id'])){
          $data['vehicles']=$this->model_details_vendor->getVehicles($this->request->get['id']);
            //print_r($data['vehicles']);die;
        }
            $data['all_areas']=$this->model_details_vendor->getArea();
            $data['all_zones']=$this->model_details_vendor->getZone();
          $data['all_vehicles']=$this->model_details_vendor->getVehicleType();
              $data['all_makes']=$this->model_details_vendor->getMake();
                      $data['all_models']=$this->model_details_vendor->getModels();
         $data['all_subareas']=$this->model_details_vendor->getSubareas();
         $data['all_cities']=$this->model_details_vendor->getCities();
          if(isset($this->request->get['id'])){
           $data['margin']=$this->model_details_vendor->getMargin($this->request->get['id']);
          }
         $data['default_margin']=$this->model_details_vendor->getDefaultMargin();
		$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('details/vendor');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
        	$data['entry_id'] = $this->language->get('entry_id');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_address'] = $this->language->get('entry_address');
        $data['entry_email'] = $this->language->get('entry_email');
        $data['entry_number'] = $this->language->get('entry_number');
        $data['entry_alternate_number'] = $this->language->get('entry_alternate_number');
        $data['entry_company_name'] = $this->language->get('entry_company_name');
        $data['entry_margin'] = $this->language->get('entry_margin');
        $data['entry_area'] = $this->language->get('entry_area');
        $data['entry_sub_area'] = $this->language->get('entry_sub_area');
        $data['entry_city'] = $this->language->get('entry_city');
           $data['entry_labour'] = $this->language->get('entry_labour');
        $data['entry_covered_uncovered'] = $this->language->get('entry_covered_uncovered');
        $data['entry_vehicle_no'] = $this->language->get('entry_vehicle_number');
        $data['entry_vehicle_type'] = $this->language->get('entry_vehicle_type');
         $data['entry_make'] = $this->language->get('entry_vehicle_make');
        $data['entry_model'] = $this->language->get('entry_vehicle_model');
        $data['entry_driver_name'] = $this->language->get('entry_driver_name');
        $data['entry_licence_no'] = $this->language->get('entry_licence_number');
        $data['entry_mobile_no'] = $this->language->get('entry_mobile_number');
        $data['entry_vehicle_insurance'] = $this->language->get('entry_vehicle_insurance_due_date');
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
        
           if (isset($this->error['margin'])) {
			$data['error_margin'] = $this->error['margin'];
		} else {
			$data['error_margin'] = '';
		}
        
        if (isset($this->error['vehicle_no'])) {
			$data['error_vehicle_no'] = $this->error['vehicle_no'];
		} else {
			$data['error_vehicle_no'] = '';
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
			'href' => $this->url->link('details/vendor', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

         
        if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('details/vendor/add', 'token=' . $this->session->data['token'], 'SSL');
            $data['id']="";
		} else {
            
			$data['action'] = $this->url->link('details/vendor/edit', 'token=' . $this->session->data['token'] .'&id='.$this->request->get['id'] . $url, 'SSL');
            
        $data['id']=$this->request->get['id'];
       
                    
		}

        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/vendor', 'token=' . $this->session->data['token'], 'SSL')
		);

      
        
        $data['cancel'] = $this->url->link('details/vendor', 'token=' . $this->session->data['token'], 'SSL');
         if(isset($this->request->get['name']))
        {
            $data['name']=$this->request->get['name'];
        
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
             if(isset($this->request->get['alternate_number']))
        {
            $data['alternate_number']=$this->request->get['alternate_number'];
        
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
       $data['email_id']=$this->request->post['email'];
    }
                if(isset($this->request->post['number']))
    {
        $data['number']=$this->request->post['number'];
    }
                     if(isset($this->request->post['alternate_number']))
    {
        $data['alternate_number']=$this->request->post['alternate_number'];
    }
     
                if(isset($this->request->post['company_name']))
    {
        $data['company_name']=$this->request->post['company_name'];
    }
           
            
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('details/vendor_form.tpl', $data));
        
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
  
