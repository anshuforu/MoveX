<?php
class ControllerDashboardSale extends Controller {
	public function index() {
		$this->load->language('dashboard/sale');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_view'] = $this->language->get('text_view');

		$data['token'] = $this->session->data['token'];

		$this->load->model('report/sale');

		$data['today'] = $this->model_report_sale->getTotalSales();
     

		$yesterday = $this->model_report_sale->getTotalSales(array('filter_date_added' => date('Y-m-d', strtotime('-2 day'))));

		
		$data['sale'] = $this->url->link('details/customer_paymentdue', 'token=' . $this->session->data['token'], 'SSL');

		return $this->load->view('dashboard/sale.tpl', $data);
	}
}
