<?php
class ControllerCommonTelecallerDashboard extends Controller {
	public function index() {
		$this->load->language('common/telecaller_dashboard');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_sale'] = $this->language->get('text_sale');
		$data['text_map'] = $this->language->get('text_map');
		$data['text_activity'] = $this->language->get('text_activity');
		$data['text_recent'] = $this->language->get('text_recent');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/telecaller_dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('common/telecaller_dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);
		
		// Check install directory exists
		if (is_dir(dirname(DIR_APPLICATION) . '/install')) {
			$data['error_install'] = $this->language->get('error_install');
		} else {
			$data['error_install'] = '';
		}

		$data['token'] = $this->session->data['token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['order'] = $this->load->controller('telecaller_dashboard/order');
        $data['booking'] = $this->load->controller('telecaller_dashboard/booking');
		$data['sale'] = $this->load->controller('telecaller_dashboard/sale');
        $data['customer'] = $this->load->controller('telecaller_dashboard/customer');
		$data['online'] = $this->load->controller('telecaller_dashboard/online');
		
	      $data['today_bookings'] = $this->load->controller('telecaller_dashboard/today_bookings');
		$data['recent'] = $this->load->controller('telecaller_dashboard/recent');
        $data['recent_bookings'] = $this->load->controller('telecaller_dashboard/recent_bookings');
		$data['footer'] = $this->load->controller('common/footer');

		// Run currency update
		if ($this->config->get('config_currency_auto')) {
			$this->load->model('localisation/currency');

			$this->model_localisation_currency->refresh();
		}
			
		$this->response->setOutput($this->load->view('common/telecaller_dashboard.tpl', $data));
	}
}
