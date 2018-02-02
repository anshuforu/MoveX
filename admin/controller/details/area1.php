<?php
class ControllerDetailsArea extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/area');

		$this->document->setTitle($this->language->get('heading_title'));
        
        $this->load->model('localisation/country');
		$this->load->model('details/area');

		$this->getList();
	}

	public function add() {
        	$this->load->language('details/area');
        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
      $this->load->model('details/area');
   $this->model_details_area->addArea($this->request->post);

			$this->response->redirect($this->url->link('details/area', 'token=' . $this->session->data['token'], 'SSL'));
		}
        $this->getForm();
		
	}
   
	public function edit() {
		$this->load->language('details/area');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/area');

		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
    
         
            $this->model_details_area->updateArea($this->request->post,$this->request->get['id']);
			//$this->model_localisation_country->editCountry($this->request->get['country_id'], $this->request->post);

			

			$this->response->redirect($this->url->link('details/area', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
        $this->load->language('details/area');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/area');
		if (isset($this->request->post['selected'])) {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_details_area->deleteArea($id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->response->redirect($this->url->link('details/area', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
		
	}

	protected function getList() {
    if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
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

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
        $area_total = $this->model_details_area->getTotalArea();
         $data['areas']=array();

        $filter_data = array(
          'filter_name'	  => $filter_name,
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit' => $this->config->get('config_limit_admin')
		);
        
        $all_areas=$this->model_details_area->getAreas($filter_data);
     
        
      
		foreach ($all_areas as $area) {
			$data['areas'][] = array(
				'area_id'    => $area['area_id'],
				'area_name'   => $area['area_name'],
				'edit'       => $this->url->link('details/area/edit', 'token=' . $this->session->data['token'] . '&id=' . $area['area_id'] .'&name='.$area['area_name'], 'SSL')
			);
        }
	
        $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/area', 'token=' . $this->session->data['token'], 'SSL')
		);
		
		$data['add'] = $this->url->link('details/area/add', 'token=' . $this->session->data['token'], 'SSL');
		$data['delete'] = $this->url->link('details/area/delete', 'token=' . $this->session->data['token'], 'SSL');
        
        $data['heading_title'] = $this->language->get('heading_title');
				$data['entry_name'] = $this->language->get('entry_name');
		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');

		$data['column_name'] = $this->language->get('column_name');
		$data['column_iso_code_2'] = $this->language->get('column_iso_code_2');
		$data['column_iso_code_3'] = $this->language->get('column_iso_code_3');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');   
    $data['button_filter'] = $this->language->get('button_filter');
        if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('details/area', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
	
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $area_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('details/area', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($area_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($area_total - $this->config->get('config_limit_admin'))) ? $area_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $area_total, ceil($area_total / $this->config->get('config_limit_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

        
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('details/area_list.tpl', $data));
	}

	protected function getForm() {
        if($this->request->server['REQUEST_METHOD'] == 'POST' && $this->request->post['name']!="" )
        {
        $data['message']="Data Entered is Already Exist";
        }
        
		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_form'] = !isset($this->request->get['id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');

		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_iso_code_2'] = $this->language->get('entry_iso_code_2');
		$data['entry_iso_code_3'] = $this->language->get('entry_iso_code_3');
		$data['entry_address_format'] = $this->language->get('entry_address_format');
		$data['entry_postcode_required'] = $this->language->get('entry_postcode_required');
		$data['entry_status'] = $this->language->get('entry_status');

		$data['help_address_format'] = $this->language->get('help_address_format');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

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

		$url = '';

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
			'href' => $this->url->link('details/area', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);
		
		if (!isset($this->request->get['id'])) {
			$data['action'] = $this->url->link('details/area/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$data['action'] = $this->url->link('details/area/edit', 'token=' . $this->session->data['token'] . '&id=' . $this->request->get['id'] . $url, 'SSL');
		}

		$data['cancel'] = $this->url->link('details/area', 'token=' . $this->session->data['token'] . $url, 'SSL');


		if (isset($this->request->get['name'])) {
			$data['name'] = $this->request->get['name'];
		} else {
			$data['name'] = '';
		}

	
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('details/area_form.tpl', $data));
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'localisation/country')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 128)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		return !$this->error;
	}
    public function validate() {
	
		/*if ($this->request->post['city_name'] == '') {
			$this->error['name'] = $this->language->get('error_name');
		}*/
        
		if ($this->request->post['name'] == '') {
			$this->error['name'] = $this->language->get('error_name');
		}
		/*if ($this->request->post['city'] == '') {
			$this->error['city'] = $this->language->get('error_default');
		}
        if ((utf8_strlen($this->request->post['city']) < 3) || (utf8_strlen($this->request->post['city']) > 128)) {
			$this->error['name'] = $this->language->get('error_name');
		}*/

		return !$this->error;

		
	}



	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'localisation/country')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/store');
		$this->load->model('sale/customer');
		$this->load->model('marketing/affiliate');
		$this->load->model('localisation/zone');
		$this->load->model('localisation/geo_zone');

		foreach ($this->request->post['selected'] as $country_id) {
			if ($this->config->get('config_country_id') == $country_id) {
				$this->error['warning'] = $this->language->get('error_default');
			}

			$store_total = $this->model_setting_store->getTotalStoresByCountryId($country_id);

			if ($store_total) {
				$this->error['warning'] = sprintf($this->language->get('error_store'), $store_total);
			}

			$address_total = $this->model_sale_customer->getTotalAddressesByCountryId($country_id);

			if ($address_total) {
				$this->error['warning'] = sprintf($this->language->get('error_address'), $address_total);
			}

			$affiliate_total = $this->model_marketing_affiliate->getTotalAffiliatesByCountryId($country_id);

			if ($affiliate_total) {
				$this->error['warning'] = sprintf($this->language->get('error_affiliate'), $affiliate_total);
			}

			$zone_total = $this->model_localisation_zone->getTotalZonesByCountryId($country_id);

			if ($zone_total) {
				$this->error['warning'] = sprintf($this->language->get('error_zone'), $zone_total);
			}

			$zone_to_geo_zone_total = $this->model_localisation_geo_zone->getTotalZoneToGeoZoneByCountryId($country_id);

			if ($zone_to_geo_zone_total) {
				$this->error['warning'] = sprintf($this->language->get('error_zone_to_geo_zone'), $zone_to_geo_zone_total);
			}
		}

		return !$this->error;
	}
}