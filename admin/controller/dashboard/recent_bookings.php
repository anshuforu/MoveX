<?php
class ControllerDashboardRecentBookings extends Controller {
	public function index() {
		$this->load->language('dashboard/recent_bookings');

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_no_results'] = $this->language->get('text_no_results');
		
		$data['column_booking_id'] = $this->language->get('column_booking_id');
		$data['column_customer'] = $this->language->get('column_customer');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_total'] = $this->language->get('column_total');
		$data['column_action'] = $this->language->get('column_action');

		$data['button_view'] = $this->language->get('button_view');

		$data['token'] = $this->session->data['token'];

		// Last 5 Orders
		$data['orders'] = array();

		$filter_data = array(
			'sort'  => 'o.date_added',
			'order' => 'DESC',
			'start' => 0,
			'limit' => 5
		);
		
		$results = $this->model_sale_booking->getBookings();
     

		foreach ($results as $result) {
			$data['bookings'][] = array(
				'booking_status_id'   => $result['booking_status_id'],
				'firstname'   => $result['customer_name'],
				'status'     => $result['name'],
                'departure_time' =>$result['delivering_time'],
				//'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				//'total'      => $this->currency->format($result['total'], $result['currency_code'], $result['currency_value']),
				'view'       => $this->url->link('addbooking/addbooking/view', 'token=' . $this->session->data['token'] . '&id=' . $result['booking_status_id'], 'SSL'),
			);
		}

		return $this->load->view('dashboard/recent_bookings.tpl', $data);
	}
}
