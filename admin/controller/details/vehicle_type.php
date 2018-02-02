<?php
class ControllerDetailsVehicleType extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/vehicle_type');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/vehicle_type');
		
		$this->getList();
    }
    public function delete() {
			$this->load->language('details/vehicle_type');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/vehicle_type');
    
		if (isset($this->request->post['selected']))
            {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_details_vehicle_type->delete($id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

		
			$this->response->redirect($this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->getList();
	}
            

	public function add() {
       
		$this->load->language('details/vehicle_type');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/vehicle_type');
           


		//if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		   if(($this->request->server['REQUEST_METHOD'] == 'POST' ) && $this->validate())
             {
               $name=$this->request->post['name'];
               $price=$this->request->post['price'];
               $count=$this->model_details_vehicle_type->getTotalvehicle($name);
                $data['count']=$count;
                if($count<1)
                {

               $data['abc']=$this->model_details_vehicle_type->addVehicle($this->request->post);
                    
               $this->session->data['success'] = $this->language->get('text_success');
             
			$this->response->redirect($this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'], 'SSL'));

           }
           }
        else{
        
         $this->getFormadd();
        
        }
    
	}
  
public function edit() {
		$this->load->language('details/vehicle_type');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/vehicle_type');

		
			if ($this->request->server['REQUEST_METHOD'] == 'POST'){
            $this->model_details_vehicle_type->editvehicleType($this->request->post,$this->request->get['id']);
            $this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'], 'SSL'));
	 }
         
        else{
        
         $this->getFormadd();
        
        }
}
     public function validate() {
	
		/*if ($this->request->post['city_name'] == '') {
			$this->error['name'] = $this->language->get('error_name');
		}*/
        
		if ($this->request->post['name'] == '') {
			$this->error['name'] = $this->language->get('error_name');
		}
         
         if ($this->request->post['price'] == '') {
			$this->error['price'] = $this->language->get('error_price');
		}
		/*if ($this->request->post['city'] == '') {
			$this->error['city'] = $this->language->get('error_default');
		}
        if ((utf8_strlen($this->request->post['city']) < 3) || (utf8_strlen($this->request->post['city']) > 128)) {
			$this->error['name'] = $this->language->get('error_name');
		}*/

		return !$this->error;

		
	}
                
    
	protected function getList() {
        
      if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_price'])) {
			$filter_price = $this->request->get['filter_price'];
		} else {
			$filter_price = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'vt.name';
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

        
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
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
			'href' => $this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['add'] = $this->url->link('details/vehicle_type/add', 'token=' . $this->session->data['token'], 'SSL');
	
		$data['delete'] = $this->url->link('details/vehicle_type/delete', 'token=' . $this->session->data['token'], 'SSL'); 

		$data['products'] = array();
		$data['vehicle_total_list']=array();
		$data['car_make_list_data']=array();
		$data['vehicle_list']=array();
        $filter_data = array(
			'filter_name'	  => $filter_name,
            'filter_price'    => $filter_price,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

       
		$this->load->model('details/vehicle_type'); 
        $vehicle_total =$this->model_details_vehicle_type->getAllVehicleList($filter_data);
        $vehicle_total_list=$this->model_details_vehicle_type->getTotalList($filter_data);
	    foreach ($vehicle_total as $result) {
			
		$data['vehicle_list'][] = array(
				'id'				=>$result['vehicle_type_id'],
		        'vehicle_type_name'    => $result['vehicle_type_name'],
				'price'  => $result['vehicle_type_price'],
				'vehicle_base_fair'  => $result['vehicle_base_fair'],
				'vehicle_base_km'  => $result['vehicle_base_km'],
				'vehicle_description'  => $result['vehicle_description'],
				'vehicle_free_wait_time'  => $result['vehicle_free_wait_time'],
				'waiting_charge'  => $result['waiting_charge'],
                 'edit'       => $this->url->link('details/vehicle_type/edit', 'token=' . $this->session->data['token'] . '&id=' . $result['vehicle_type_id'] .'&waiting_charge=' . $result['waiting_charge'] .'&vehicle_description=' . $result['vehicle_description'].'&name=' . $result['vehicle_type_name'] .'&vehicle_free_wait_time=' . $result['vehicle_free_wait_time'].'&vehicle_base_km=' . $result['vehicle_base_km'].'&vehicle_base_fair=' . $result['vehicle_base_fair'].'&price=' . $result['vehicle_type_price'] . $url, 'SSL')
                
			);
	  
		}

		
$data['service_center'] = $this->language->get('service_center');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
        $data['column_price'] = $this->language->get('column_price');
        $data['text_list'] = $this->language->get('text_list');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['label_price'] = $this->language->get('label_price');
		$data['column_vehicle_desc'] = $this->language->get('column_vehicle_desc');

		$data['column_image'] = $this->language->get('column_image');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_waiting_charge'] = $this->language->get('column_waiting_charge');
		$data['column_free_wait_time'] = $this->language->get('column_free_wait_time');
		$data['column_vehicle_base_fair'] = $this->language->get('column_vehicle_base_fair');
		$data['column_vehicle_base_km'] = $this->language->get('column_vehicle_base_km');
		$data['column_action'] = $this->language->get('column_action');
       $data['entry_name'] = $this->language->get('entry_name');
		$data['entry_price'] = $this->language->get('entry_price');
        $data['entry_transport'] = $this->language->get('entry_transport');
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
   	if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'] . '&sort=vt.vehicle_type_name' . $url, 'SSL');
       $data['sort_price'] = $this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'] . '&sort=vt.vehicle_type_price' . $url, 'SSL');
	
		$url = '';

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
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
		$pagination->url = $this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($vehicle_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($vehicle_total_list - $this->config->get('config_limit_admin'))) ? $vehicle_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $vehicle_total_list, ceil($vehicle_total_list / $this->config->get('config_limit_admin')));

		$data['filter_name'] = $filter_name;
		$data['filter_price'] = $filter_price;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		

		$this->response->setOutput($this->load->view('details/vehicle_list.tpl', $data)); 
       
	}

	
    protected function getFormadd() {
   
		$data['token']=$this->session->data['token'];
        $data['heading_title'] = $this->language->get('heading_title');
		$data['car_make'] = $this->language->get('entry_car_make');
		$data['car_model'] = $this->language->get('entry_car_model');
	
		$this->load->model('details/vehicle_type');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_price'] = $this->language->get('entry_price');
        $data['entry_transport'] = $this->language->get('entry_transport');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_waiting_time_charge'] = $this->language->get('entry_waiting_time_charge');
		$data['entry_free_waiting_time'] = $this->language->get('entry_free_waiting_time');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_base_fair'] = $this->language->get('entry_base_fair');
		$data['entry_base_charge'] = $this->language->get('entry_base_charge');
		$data['entry_free_waiting_time '] = $this->language->get('entry_free_waiting_time ');
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
		        $data['e_free_waiting_time'] = $this->language->get('e_free_waiting_time');
		        $data['entry_vehicle_description'] = $this->language->get('entry_vehicle_description');

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
        
           if (isset($this->error['price'])) {
			$data['error_price'] = $this->error['price'];
		} else {
			$data['error_price'] = '';
		}
        
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'], 'SSL')
		);

         
        
        if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('details/vehicle_type/add', 'token=' . $this->session->data['token'], 'SSL');
            $data['id']="";
		} else {
            
			$data['action'] = $this->url->link('details/vehicle_type/edit', 'token=' . $this->session->data['token'] .'&id='.$this->request->get['id'].'&name='.$this->request->get['name'].'&price='.$this->request->get['price'], 'SSL');
            
        $data['id']=$this->request->get['id'];
       
                    
		}

        
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'], 'SSL')
		);

      
        
        $data['cancel'] = $this->url->link('details/vehicle_type', 'token=' . $this->session->data['token'], 'SSL');
        
        $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('details/vehicle_type_form.tpl', $data));
        
    }
                }
  
