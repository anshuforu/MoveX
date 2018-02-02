<?php
class ControllerDetailsTransporterVehicle extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/transporter_vehicle');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/transporter_vehicle');
		
		$this->getList();
    }
    public function delete() {
			$this->load->language('details/transporter_vehicle');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/transporter_vehicle');
    
		if (isset($this->request->post['selected']))
            {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_details_transporter_vehicle->delete($id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->getList();
	}
            

	public function add() {
       
		$this->load->language('details/transporter_vehicle');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/transporter_vehicle');
           


		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if($this->request->server['REQUEST_METHOD'] == 'POST' )
             {
               $data['abc']=$this->model_details_transporter_vehicle->addDriver($this->request->post);
               $this->session->data['success'] = $this->language->get('text_success');
               $this->session->data['success'] = $this->language->get('text_success');
           
			$this->response->redirect($this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'], 'SSL'));

           
           }
        else{
        
         $this->getFormadd();
        
        }
    
	}
  
public function edit() {
    
		$this->load->language('details/transporter_vehicle');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/transporter_vehicle');

		
			if ($this->request->server['REQUEST_METHOD'] == 'POST'){
            $this->model_details_transporter_vehicle->editDriver($this->request->post,$this->request->get['id']);
            $this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'], 'SSL'));
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
			'href' => $this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('details/transporter_vehicle/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
	
		$data['delete'] = $this->url->link('details/transporter_vehicle/delete', 'token=' . $this->session->data['token'] . $url, 'SSL'); 

		$data['driver_total_list']=array();
		$data['car_make_list_data']=array();
		$data['driver_list']=array();
        $filter_data = array(
			'filter_name'	  => $filter_name,
            'filter_address'  => $filter_address,
            'filter_number'  =>  $filter_number,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

		$this->load->model('details/transporter_vehicle'); 
        $driver_total =$this->model_details_transporter_vehicle->getAllDriverList($filter_data);
       // print_r($driver_total);die;
        $driver_total_list=$this->model_details_transporter_vehicle->getTotalList($filter_data);
	    foreach ($driver_total as $result) {
			
		$data['driver_list'][] = array(
				'name'	  =>$result['driver_name'],
		        'model'    => $result['vehicle_model'],
				'vehicle_type' => $result['vehicle_type_name'],
                'vehicle_no'  => $result['vehicle_no'],
                'city'  => $result['name'],
                'sub_area'  => $result['sub_area'],
                'area'  => $result['area'],
                'licence_no'  => $result['licence_no'],
               //  'edit'   => $this->url->link('details/transporter_vehicle/edit', 'token=' . $this->session->data['token'] . '&id=' . $result['driver_id'] .'&name=' . $result['driver_name'] .'&number=' . $result['driver_number'] .'&address=' . $result['driver_address'] . $url, 'SSL')
                
			);
	  
		}

		
$data['service_center'] = $this->language->get('service_center');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
        $data['column_address'] = $this->language->get('column_address');
        $data['column_city'] = $this->language->get('column_city');
        $data['column_number'] = $this->language->get('column_number');
        $data['column_sub'] = $this->language->get('column_sub');
        $data['text_list'] = $this->language->get('text_list');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['column_transporter'] = $this->language->get('column_transporter');
        $data['label_filter_name'] = $this->language->get('label_filter_name');
        $data['label_filter_address'] = $this->language->get('label_filter_address');
        $data['label_filter_number'] = $this->language->get('label_filter_number');
		$data['column_image'] = $this->language->get('column_image');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_action'] = $this->language->get('column_action');
		$data['column_licence'] = $this->language->get('column_licence');
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

		$data['sort_name'] = $this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'] . '&sort=dm.driver_name' . $url, 'SSL');
       $data['sort_address'] = $this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'] . '&sort=dm.driver_address' . $url, 'SSL');
        $data['sort_number'] = $this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'] . '&sort=dm.driver_number' . $url, 'SSL');
	
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
		$pagination->total = $driver_total_list;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($driver_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($driver_total_list - $this->config->get('config_limit_admin'))) ? $driver_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $driver_total_list, ceil($driver_total_list / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_address'] = $filter_address;
        $data['filter_number'] = $filter_number;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		

		$this->response->setOutput($this->load->view('details/transporter_list.tpl', $data)); 
       
	}

	
    protected function getFormadd() {
   
		$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('details/transporter_vehicle');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_address'] = $this->language->get('entry_address');
        $data['entry_number'] = $this->language->get('entry_number');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['button_save'] = $this->language->get('button_save');
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
      

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'], 'SSL')
		);

         
        
        if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('details/transporter_vehicle/add', 'token=' . $this->session->data['token'], 'SSL');
            $data['id']="";
		} else {
            
			$data['action'] = $this->url->link('details/transporter_vehicle/edit', 'token=' . $this->session->data['token'] .'&id='.$this->request->get['id'].'&name='.$this->request->get['name'].'&address='.$this->request->get['address'].'&number='.$this->request->get['number'], 'SSL');
            
        $data['id']=$this->request->get['id'];
       
                    
		}

        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'], 'SSL')
		);

      
        
        $data['cancel'] = $this->url->link('details/transporter_vehicle', 'token=' . $this->session->data['token'], 'SSL');
        
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('details/driver_form.tpl', $data));
        
    }
                }
  
