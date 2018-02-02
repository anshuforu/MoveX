<?php
class ControllerDashboardDevice extends Controller {
	public function index() {
		$this->load->language('dashboard/device');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_view'] = $this->language->get('text_view');

		$data['token'] = $this->session->data['token'];

		$this->load->model('report/device');
        $data['total'] = $this->model_report_device->getTotal();

		$data['total_website'] = $this->model_report_device->getTotalWebsites();
        
        $data['total_app'] = $this->model_report_device->getTotalApp();
     

		$yesterday = $this->model_report_sale->getTotalSales(array('filter_date_added' => date('Y-m-d', strtotime('-2 day'))));

		
		$data['sale'] = $this->url->link('details/customer_paymentdue', 'token=' . $this->session->data['token'], 'SSL');

		return $this->load->view('dashboard/device.tpl', $data);
	}
}
