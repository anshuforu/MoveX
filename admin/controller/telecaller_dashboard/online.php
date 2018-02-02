<?php
class ControllerTelecallerDashboardOnline extends Controller {
	public function index() {
		$this->load->language('telecaller_dahboard/online');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_view'] = $this->language->get('text_view');

		$data['token'] = $this->session->data['token'];

		// Total Orders
		$this->load->model('report/customer');
		 $this->load->model('sale/booking');
		$user_id=$this->user->getId();
        $telecaller_id= $this->model_sale_booking->getTelecallerId($user_id);
        $data['total_booking_not_assigned']=$this->model_sale_booking->getTotalBookingNotAssigned($telecaller_id);

		// Customers Online
		$online_total = $this->model_report_customer->getTotalCustomersOnline();
		
		if ($online_total > 1000000000000) {
			$data['total'] = round($online_total / 1000000000000, 1) . 'T';
		} elseif ($online_total > 1000000000) {
			$data['total'] = round($online_total / 1000000000, 1) . 'B';
		} elseif ($online_total > 1000000) {
			$data['total'] = round($online_total / 1000000, 1) . 'M';
		} elseif ($online_total > 1000) {
			$data['total'] = round($online_total / 1000, 1) . 'K';						
		} else {
			$data['total'] = $online_total;
		}			
		
		$data['not_assigned'] = $this->url->link('details/notbooking_asignedtran', 'token=' . $this->session->data['token'], 'SSL');

		return $this->load->view('telecaller_dashboard/online.tpl', $data);
	}
}
