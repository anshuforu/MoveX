<?php
class ControllerTelecallerDashboardTodayBookings extends Controller {
    public function info() {
       echo "hii";die;
		
	}
	public function index() {
		$this->load->language('telecaller_dashboard/today_bookings');

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
		$user_id=$this->user->getId();
        $telecaller_id= $this->model_sale_booking->getTelecallerId($user_id);
		$results = $this->model_sale_booking->getTodayBookings($telecaller_id);


		foreach ($results as $result) {
			$data['bookings'][] = array(
				'booking_id'   => $result['booking_id'],
				'booking_id'          => $result['booking_id'],
                'customer'          => $result['customer_name'],
                'status'          => $result['name'],
				'view'       => $this->url->link('details/booking_asignedtran/view', 'token=' . $this->session->data['token'] . '&id=' . $result['booking_id'], 'SSL'),
			);
		}

		return $this->load->view('telecaller_dashboard/today_bookings.tpl', $data);
	}
    	

}
