<?php
class ControllerTelecallerDashboardOrder extends Controller {
	public function index() {
		$this->load->language('telecaller_dahboard/order');

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_view'] = $this->language->get('text_view');

		$data['token'] = $this->session->data['token'];

		// Total Orders
        $this->load->model('sale/booking');
		$user_id=$this->user->getId();
        $telecaller_id= $this->model_sale_booking->getTelecallerId($user_id);
          $data['total_booking_assigned']=$this->model_sale_booking->getTotalBookingAssigned($telecaller_id);

		$this->load->model('sale/order');
		
		$order_total = $this->model_sale_order->getTotalOrders();
		
		if ($order_total > 1000000000000) {
			$data['total'] = round($order_total / 1000000000000, 1) . 'T';
		} elseif ($order_total > 1000000000) {
			$data['total'] = round($order_total / 1000000000, 1) . 'B';
		} elseif ($order_total > 1000000) {
			$data['total'] = round($order_total / 1000000, 1) . 'M';
		} elseif ($order_total > 1000) {
			$data['total'] = round($order_total / 1000, 1) . 'K';						
		} else {
			$data['total'] = $order_total;
		}
				
		$data['assigned'] = $this->url->link('details/booking_asignedtran', 'token=' . $this->session->data['token'], 'SSL');

		return $this->load->view('telecaller_dashboard/order.tpl', $data);
	}
}
