<?php
class ControllerOrderAssignTelecaller extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('order/assign_telecaller');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('order/assign_telecaller');

		$this->getList();
	}
public function delete()
{
   	$this->load->languatLis('order/assign_telecaller');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('order/assign_telecaller');
    
		if (isset($this->request->post['selected']))
            {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_order_assign_telecaller->delete($id);
			}

			$this->session->data['success'] = $this->language->get('text_deleted');

			$this->response->redirect($this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->getList();
}    
public function insert() {
$status=$_POST['first'];
$notify=$_POST['second'];
$comment=$_POST['third'];
$booking_id=$_GET['booking'];
$this->load->model('order/coupon_order'); 
$insert = $this->model_order_coupon_order->insertBooking($status,$notify,$comment,$booking_id);
}
	public function add() {
        $this->load->model('order/assign_telecaller');
		$this->load->language('order/assign_telecaller');

		$this->document->setTitle($this->language->get('heading_title'));
  if(($this->request->server['REQUEST_METHOD'] == 'POST' )  && $this->validate())
             {
     // print_r($this->request->post);die;
      $telecaller_id=$this->request->post['telecaller_name'];
      $date=$this->request->post['date'];
             if (isset($this->request->post['sometext']))
            {
			foreach ($this->request->post['sometext'] as $id) {
	
            $this->model_order_assign_telecaller->insert($id,$telecaller_id,$date);
			}

        }
       $this->session->data['success'] = $this->language->get('text_edited');
           
			$this->response->redirect($this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'], 'SSL'));
	
  }

        $this->getForm();
	}
    
	public function edit() {
        $this->load->model('order/assign_telecaller');
		$this->load->language('order/assign_telecaller');

		$this->document->setTitle($this->language->get('heading_title'));
  if($this->request->server['REQUEST_METHOD'] == 'POST' )
             {
   $telecaller_id=$this->request->post['telecaller_name'];
	
            $this->model_order_assign_telecaller->update($this->request->get['id'],$telecaller_id);
			}

        
		
  

		$this->getForm();
	}
    

	protected function getList() {
		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}
        	if (isset($this->request->get['filter_name_id'])) {
			$filter_name_id= $this->request->get['filter_name_id'];
		} else {
			$filter_name_id = null;
		}

		if (isset($this->request->get['filter_address'])) {
			$filter_address = $this->request->get['filter_address'];
		} else {
			$filter_address = null;
		}

		if (isset($this->request->get['filter_price1'])) {
			$filter_price1 = $this->request->get['filter_price1'];
		} else {
			$filter_price1 = null;
		}

		if (isset($this->request->get['filter_to_address'])) {
			$filter_to_address = $this->request->get['filter_to_address'];
		} else {
			$filter_to_address = null;
		}

		if (isset($this->request->get['filter_vehicle'])) {
			$filter_vehicle = $this->request->get['filter_vehicle'];
		} else {
			$filter_vehicle = null;
		}

		if (isset($this->request->get['filter_booking_date'])) {
			$filter_booking_date = $this->request->get['filter_booking_date'];
		} else {
			$filter_booking_date = null;
		}	
        if (isset($this->request->get['filter_delivering_date'])) {
			$filter_delivering_date = $this->request->get['filter_delivering_date'];
		} else {
			$filter_delivering_date = null;
		}	
        if (isset($this->request->get['filter_distance'])) {
			$filter_distance = $this->request->get['filter_distance'];
		} else {
			$filter_distance = null;
		}  
        if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bs.booking_status_id';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

        if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}
		if (isset($this->request->get['filter_name_id'])) {
			$url .= '&filter_name_id=' . $this->request->get['filter_name_id'];
		}

		if (isset($this->request->get['filter_address'])) {
			$url .= '&filter_address=' . urlencode(html_entity_decode($this->request->get['filter_address'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price1'])) {
			$url .= '&filter_price1=' . $this->request->get['filter_price1'];
		}	
        
        if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['filter_to_address'])) {
			$url .= '&filter_to_address=' . $this->request->get['filter_to_address'];
		}

		if (isset($this->request->get['filter_vehicle'])) {
			$url .= '&filter_vehicle=' . $this->request->get['filter_vehicle'];
		}

		if (isset($this->request->get['filter_booking_date'])) {
			$url .= '&filter_booking_date=' . $this->request->get['filter_booking_date'];
		}	
        if (isset($this->request->get['filter_delivering_date'])) {
			$url .= '&filter_delivering_date=' . $this->request->get['filter_delivering_date'];
		}	
        if (isset($this->request->get['filter_distance'])) {
			$url .= '&filter_distance=' . $this->request->get['filter_distance'];
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 't.name';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'bs.booking_id';
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
			'href' => $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['invoice'] = $this->url->link('order/assign_telecaller/invoice', 'token=' . $this->session->data['token'], 'SSL');
		$data['shipping'] = $this->url->link('order/assign_telecaller/shipping', 'token=' . $this->session->data['token'], 'SSL');
		$data['add'] = $this->url->link('order/assign_telecaller/add', 'token=' . $this->session->data['token'], 'SSL');
		$data['delete'] = $this->url->link('order/assign_telecaller/delete', 'token=' . $this->session->data['token'], 'SSL');
         $data['sort'] = $sort;
		$data['booking_assigned_details'] = array();

		$filter_data = array(
            'filter_name'      => $filter_name,
			 'filter_address'      => $filter_address,
			'sort'                 => $sort,
			'order'                => $order,
			'start'                => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'                => $this->config->get('config_limit_admin')
		);
         $booking_as=$this->model_order_assign_telecaller->bookingAssigned($filter_data);
        $booking_assigned=$this->model_order_assign_telecaller->getBookings($filter_data);
       //print_r($booking_assigned);die;
        
               foreach ($booking_assigned as $booking) {
			$data['booking_assigned_details'][] = array(
				'booking_id'    =>$booking['booking_id'],
                'telecaller_id' =>$booking['telecaller_id'],
                'telecaller_name' =>$booking['telecaller_name'],
                'booking_assigned_id' =>$booking['booking_assigned_id'],
                 'customer_name' =>$booking['customer_name'],
                'from'    =>$booking['form_address'],
                 'to'    =>$booking['to_address'],
                'assigned_to_transporter' =>$booking['assigned_to_transporter'],
                'status' =>$booking['status'],
                'customer_mobile_no' =>$booking['customer_mobile_no'],
				'view'   => $this->url->link('addbooking/addbooking/view', 'token=' . $this->session->data['token'] . '&id=' . $booking['booking_id'], 'SSL'),
				'edit'          => $this->url->link('order/assign_telecaller/edit', 'token=' . $this->session->data['token'] . '&order_id=' . $booking['booking_assigned_id']. '&telecaller_id=' . $booking['telecaller_id'] . $url, 'SSL'),
               'new_link'   => $this->url->link('addbooking/addbooking/view', 'token=' . $this->session->data['token'] . '&id=' . $booking['booking_id'] , 'SSL'),
                 'new_telecaller_link'   =>  $this->url->link('telecallermanage/telecallermanage/info', 'token=' . $this->session->data['token'] . '&order_id=' .$booking['telecaller_id'] . $url, 'SSL'),
    
			);
		}
        $this->load->model('order/coupon_order'); 

       $order_total = $this->model_order_coupon_order->getTotalOrders($filter_data);

		/*$results = $this->model_order_coupon_order->getCouponOrders($filter_data);
        //print_r($results);die;
       foreach ($results as $result) {
			$data['orders'][] = array(
				'order_id'      => $result['booking_status_id'],
				'name'          => $result['firstname'],
				'status'        => $result['status'],
                'distance'        => $result['distance'],
				'total'         => $result['total_price'],
				'form_address'  => $result['form_address'],
                'to_address'    => $result['to_address'],
                'total_price'   => $result['total_price'],
                'vehicle_type_name'=>$result['vehicle_type_name'],
                'booking_time'   =>$result['booking_time'],
                'deliver_time'   =>$result['delivering_time'],
				'view'          => $this->url->link('order/coupon_order/info', 'token=' . $this->session->data['token'] . '&order_id=' . $result['booking_status_id'] . $url, 'SSL'),
				'edit'          => $this->url->link('order/coupon_order/edit', 'token=' . $this->session->data['token'] . '&order_id=' . $result['booking_status_id'] . $url, 'SSL'),
				'delete'        => $this->url->link('order/coupon_order/delete', 'token=' . $this->session->data['token'] . '&order_id=' . $result['booking_status_id'] . $url, 'SSL')
			);
		}
*/
		$data['heading_title'] = $this->language->get('heading_title');
        $data['entry_name_id'] = $this->language->get('entry_name_id');
        $data['entry_address'] = $this->language->get('entry_address');
        $data['entry_booking_date'] = $this->language->get('entry_booking_date');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_distance'] = $this->language->get('entry_distance');
        $data['entry_vehicle'] = $this->language->get('entry_vehicle');
        $data['text_username'] = $this->language->get('text_username');
		
         $data['text_order_id'] = $this->language->get('text_order_id');
         $data['entry_telecaller_name'] = $this->language->get('entry_telecaller_name');
		$data['text_list'] = $this->language->get('text_list');
		$data['text_no_results'] = $this->language->get('text_no_results');
		$data['text_confirm'] = $this->language->get('text_confirm');
		$data['text_missing'] = $this->language->get('text_missing');
		$data['entry_price'] = $this->language->get('entry_price');

		$data['column_order_id'] = $this->language->get('column_order_id');
        $data['column_from'] = $this->language->get('text_from');
        $data['column_to'] = $this->language->get('text_to');
		$data['column_customer'] = $this->language->get('column_customer');
		$data['column_status'] = $this->language->get('column_status');
		$data['column_total'] = $this->language->get('column_total');
		$data['column_date_added'] = $this->language->get('column_date_added');
		$data['column_date_modified'] = $this->language->get('column_date_modified');
		$data['column_action'] = $this->language->get('column_action');

		$data['entry_return_id'] = $this->language->get('entry_return_id');
		$data['entry_order_id'] = $this->language->get('entry_order_id');
		$data['entry_customer'] = $this->language->get('entry_customer');
		$data['heading_title1'] = $this->language->get('heading_title1');
		$data['text_teel'] = $this->language->get('text_teel');
        $data['text_customer'] = $this->language->get('text_customer');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_form_address'] = $this->language->get('entry_form_address');
		$data['entry_date_added'] = $this->language->get('entry_date_added');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['entry_to_address'] = $this->language->get('entry_to_address');
		$data['entry_vehicle'] = $this->language->get('entry_vehicle');
		$data['entry_name'] = $this->language->get('entry_name');
		$data['entry_form_address'] = $this->language->get('entry_form_address');
		$data['entry_to_address'] = $this->language->get('entry_to_address');
		$data['entry_distance'] = $this->language->get('entry_distance');
		$data['entry_date_modified'] = $this->language->get('entry_date_modified');
		$data['entry_delivering_date'] = $this->language->get('entry_delivering_date');

		$data['button_invoice_print'] = $this->language->get('button_invoice_print');
		$data['button_shipping_print'] = $this->language->get('button_shipping_print');
		$data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
		$data['button_view'] = $this->language->get('button_view');

		$data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
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
			$url .= '&filter_address=' . urlencode(html_entity_decode($this->request->get['filter_address'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_to_address'])) {
			$url .= '&filter_to_address=' . $this->request->get['filter_to_address'];
		}

		if (isset($this->request->get['filter_vehicle'])) {
			$url .= '&filter_vehicle=' . $this->request->get['filter_vehicle'];
		}

		if (isset($this->request->get['filter_booking_date'])) {
			$url .= '&filter_booking_date=' . $this->request->get['filter_booking_date'];
		}	
        if (isset($this->request->get['filter_delivering_date'])) {
			$url .= '&filter_delivering_date=' . $this->request->get['filter_delivering_date'];
		}	
        if (isset($this->request->get['filter_distance'])) {
			$url .= '&filter_distance=' . $this->request->get['filter_distance'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort_=bs.booking_id' . $url, 'SSL');
		$data['sort_address'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=t.telecaller_name' . $url, 'SSL');
		$data['sort_toaddress'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=bs.to_address' . $url, 'SSL');
		$data['sort_distance'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=bs.distance' . $url, 'SSL');
		$data['sort_customer'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=customer' . $url, 'SSL');
		$data['sort_vehicle'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=vt.vehicle_type_name' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
		$data['sort_ddate'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=bs.delivering_time' . $url, 'SSL');
		$data['sort_bdate'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=bs.booking_time' . $url, 'SSL');
		$data['sort_price'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=tbp.total_price' . $url, 'SSL');
		$data['sort_total'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=o.total' . $url, 'SSL');
		$data['sort_status'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=os.name' . $url, 'SSL');
		$data['sort_date_added'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=o.date_added' . $url, 'SSL');
		$data['sort_date_modified'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'] . '&sort=o.date_modified' . $url, 'SSL');

		$url = '';
if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}
		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}

		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $order_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('order/coupon_order', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($order_total - $this->config->get('config_limit_admin'))) ? $order_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $order_total, ceil($order_total / $this->config->get('config_limit_admin')));
  
		/*$data['filter_name_id'] = $filter_name_id;
		$data['filter_address'] = $filter_address;
		$data['filter_price1'] = $filter_price1;
		$data['filter_to_address'] = $filter_to_address;
		$data['filter_vehicle'] = $filter_vehicle;
		$data['filter_booking_date'] = $filter_booking_date;
		$data['filter_delivering_date'] = $filter_delivering_date;
		$data['filter_distance'] = $filter_distance;

		$this->load->model('localisation/order_status');

		$data['vehicle'] = $this->model_order_coupon_order->getVehicle();
          
		$data['sort'] = $sort;
		$data['order'] = $order;
*/
        
        
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('order/assign_telecaller_list.tpl', $data));
	}

	public function getForm() {
		$this->load->model('order/assign_telecaller');
$data['bookings'] = $this->model_order_assign_telecaller->getBookingId();
        $data['telecallers'] = $this->model_order_assign_telecaller->getTelecallers();
        
		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_form'] = !isset($this->request->get['order_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');
		$data['entry_store'] = $this->language->get('entry_store');
		
		$data['entry_customer_group'] = $this->language->get('entry_customer_group');
        $data['entry_assigned_date'] = $this->language->get('entry_booking_assigned_date');
		
        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_save'] = $this->language->get('button_save');
        
		$data['token'] = $this->session->data['token'];

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
        
         if (isset($this->error['booking_id'])) {
			$data['error_booking'] = $this->error['booking_id'];
		} else {
			$data['error_booking'] = '';
		}
           if (isset($this->request->get['telecaller_id'])) {
			$data['telecaller_id'] = $this->request->get['telecaller_id'];
		} else {
			$data['telecaller_id'] = '';
		}

		
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('order/coupon_order', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['cancel'] = $this->url->link('order/assign_telecaller', 'token=' . $this->session->data['token'], 'SSL');

		// Stores
	
        $data['booking_add'] = $this->url->link('details/vendor/booking_add', 'token=' . $this->session->data['token'], 'SSL'); 
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
        
             if (!isset($this->request->get['order_id'])) {
			        	$data['action'] = $this->url->link('order/assign_telecaller/add', 'token=' . $this->session->data['token'], 'SSL');
                 $data['id']="";
                    
        
		} else {
                 
            
			$data['action'] = $this->url->link('order/assign_telecaller/edit', 'token=' . $this->session->data['token'] .'&id='.$this->request->get['order_id'], 'SSL');

       $data['id']=$this->request->get['order_id'];
                    
		}
         if(isset($this->request->post['telecaller_name']))
        {
        $data['telecaller_id']=$this->request->post['telecaller_name'];
        }


		$this->response->setOutput($this->load->view('order/assign_telecaller_form.tpl', $data));
	}

	public function info() {
        $booking_customer=array();
        $this->load->model('order/coupon_order');
        if (isset($this->request->get['order_id'])) {
			$order_id = $this->request->get['order_id'];
            
		} else {
			$order_id = 0;
		}
		$order_info = $this->model_order_coupon_order->getOrder($order_id);
      
        $data['order_statuses'] = $this->model_order_coupon_order->getOrderStatuses();
                $data['order_history'] = $this->model_order_coupon_order->getTotalHistory($order_id);
       // print_r($order_info);die;
       		$data['booking_customer'][] = array(
				'order_id'	  =>$order_info['booking_status_id'],
		        'customer_id'=>$order_info['customer_id'],
                'form_address'=>$order_info['form_address'],
                'to_address'=>$order_info['to_address'],
                'distance'=>$order_info['distance'],
                'distance_price'=>$order_info['distance_price'],
                'invoice'=>$order_info['invoice'],
                'invoice_prefix'=>$order_info['invoice_prefix'],
                'labour_price'=>$order_info['total_labour_price'],
                'vehicle'=>$order_info['vehicle'],
                'booking_time'=>$order_info['booking_time'],
                'delivering_time'=>$order_info['delivering_time'],
                'status'=>$order_info['status'],
                'customer_group_id'=>$order_info['customer_group_id'],
                'store_id'=>$order_info['store_id'],
                'firstname'=>$order_info['firstname'],
                'lastname'=>$order_info['lastname'],
                'email'=>$order_info['email'],
                'telephone'=>$order_info['telephone'],
                'fax'=>$order_info['fax'],
                'address'=>$order_info['address_id'],
               );
       
        $this->load->language('order/coupon_order');

			$this->document->setTitle($this->language->get('heading_title'));

			$data['heading_title'] = $this->language->get('heading_title');

			$data['text_order_id'] = $this->language->get('text_order_id');
           $data['entry_telecaller_name'] = $this->language->get('entry_telecaller_name');
			$data['text_invoice_no'] = $this->language->get('text_invoice_no');
			$data['text_invoice_date'] = $this->language->get('text_invoice_date');
			$data['text_store_name'] = $this->language->get('text_store_name');
			$data['text_store_url'] = $this->language->get('text_store_url');
			$data['text_customer'] = $this->language->get('text_customer');
			$data['text_comment'] = $this->language->get('text_comment');
			$data['text_customer_group'] = $this->language->get('text_customer_group');
			$data['text_email'] = $this->language->get('text_email');
			$data['text_notify'] = $this->language->get('text_notify');
			$data['text_status'] = $this->language->get('text_status');
			$data['text_telephone'] = $this->language->get('text_telephone');
			$data['text_date'] = $this->language->get('text_date');
			$data['text_fax'] = $this->language->get('text_fax');
			$data['text_total'] = $this->language->get('text_total');
			$data['text_reward'] = $this->language->get('text_reward');
			$data['text_order_status'] = $this->language->get('text_order_status');
			$data['text_comment'] = $this->language->get('text_comment');
			$data['text_affiliate'] = $this->language->get('text_affiliate');
			$data['text_commission'] = $this->language->get('text_commission');
			$data['text_ip'] = $this->language->get('text_ip');
			$data['text_forwarded_ip'] = $this->language->get('text_forwarded_ip');
			$data['text_user_agent'] = $this->language->get('text_user_agent');
			$data['text_address'] = $this->language->get('text_address');
			$data['text_accept_language'] = $this->language->get('text_accept_language');
			$data['text_date_added'] = $this->language->get('text_date_added');
			$data['text_date_modified'] = $this->language->get('text_date_modified');
			$data['text_firstname'] = $this->language->get('text_firstname');
			$data['text_lastname'] = $this->language->get('text_lastname');
			$data['text_company'] = $this->language->get('text_company');
			$data['text_address_1'] = $this->language->get('text_address_1');
			$data['text_address_2'] = $this->language->get('text_address_2');
			$data['text_city'] = $this->language->get('text_city');
			$data['text_postcode'] = $this->language->get('text_postcode');
			$data['text_zone'] = $this->language->get('text_zone');
			$data['text_zone_code'] = $this->language->get('text_zone_code');
			$data['text_country'] = $this->language->get('text_country');
			$data['text_shipping_method'] = $this->language->get('text_shipping_method');
			$data['text_payment_method'] = $this->language->get('text_payment_method');
			$data['text_history'] = $this->language->get('text_history');
			$data['text_country_match'] = $this->language->get('text_country_match');
			$data['text_country_code'] = $this->language->get('text_country_code');
			$data['text_high_risk_country'] = $this->language->get('text_high_risk_country');
			$data['text_distance'] = $this->language->get('text_distance');
			$data['text_ip_region'] = $this->language->get('text_ip_region');
			$data['text_ip_city'] = $this->language->get('text_ip_city');
			$data['text_ip_latitude'] = $this->language->get('text_ip_latitude');
			$data['text_ip_longitude'] = $this->language->get('text_ip_longitude');
			$data['text_ip_isp'] = $this->language->get('text_ip_isp');
			$data['text_ip_org'] = $this->language->get('text_ip_org');
			$data['text_ip_asnum'] = $this->language->get('text_ip_asnum');
			$data['text_ip_user_type'] = $this->language->get('text_ip_user_type');
			$data['text_ip_country_confidence'] = $this->language->get('text_ip_country_confidence');
			$data['text_ip_region_confidence'] = $this->language->get('text_ip_region_confidence');
			$data['text_ip_city_confidence'] = $this->language->get('text_ip_city_confidence');
			$data['text_ip_postal_confidence'] = $this->language->get('text_ip_postal_confidence');
			$data['text_ip_postal_code'] = $this->language->get('text_ip_postal_code');
			$data['text_ip_accuracy_radius'] = $this->language->get('text_ip_accuracy_radius');
			$data['text_ip_net_speed_cell'] = $this->language->get('text_ip_net_speed_cell');
			$data['text_ip_metro_code'] = $this->language->get('text_ip_metro_code');
			$data['text_ip_area_code'] = $this->language->get('text_ip_area_code');
			$data['text_ip_time_zone'] = $this->language->get('text_ip_time_zone');
			$data['text_ip_region_name'] = $this->language->get('text_ip_region_name');
			$data['text_ip_domain'] = $this->language->get('text_ip_domain');
			$data['text_ip_country_name'] = $this->language->get('text_ip_country_name');
			$data['text_ip_continent_code'] = $this->language->get('text_ip_continent_code');
			$data['text_ip_corporate_proxy'] = $this->language->get('text_ip_corporate_proxy');
			$data['text_anonymous_proxy'] = $this->language->get('text_anonymous_proxy');
			$data['text_proxy_score'] = $this->language->get('text_proxy_score');
			$data['text_is_trans_proxy'] = $this->language->get('text_is_trans_proxy');
			$data['text_free_mail'] = $this->language->get('text_free_mail');
			$data['text_carder_email'] = $this->language->get('text_carder_email');
			$data['text_high_risk_username'] = $this->language->get('text_high_risk_username');
			$data['text_high_risk_password'] = $this->language->get('text_high_risk_password');
			$data['text_bin_match'] = $this->language->get('text_bin_match');
			$data['text_bin_country'] = $this->language->get('text_bin_country');
			$data['text_bin_name_match'] = $this->language->get('text_bin_name_match');
			$data['text_bin_name'] = $this->language->get('text_bin_name');
			$data['text_bin_phone_match'] = $this->language->get('text_bin_phone_match');
			$data['text_bin_phone'] = $this->language->get('text_bin_phone');
			$data['text_customer_phone_in_billing_location'] = $this->language->get('text_customer_phone_in_billing_location');
			$data['text_ship_forward'] = $this->language->get('text_ship_forward');
			$data['text_city_postal_match'] = $this->language->get('text_city_postal_match');
			$data['text_ship_city_postal_match'] = $this->language->get('text_ship_city_postal_match');
			$data['text_score'] = $this->language->get('text_score');
			$data['text_explanation'] = $this->language->get('text_explanation');
			$data['text_risk_score'] = $this->language->get('text_risk_score');
			$data['text_queries_remaining'] = $this->language->get('text_queries_remaining');
			$data['text_maxmind_id'] = $this->language->get('text_maxmind_id');
			$data['text_error'] = $this->language->get('text_error');
			$data['text_loading'] = $this->language->get('text_loading');

			$data['help_country_match'] = $this->language->get('help_country_match');
			$data['help_country_code'] = $this->language->get('help_country_code');
			$data['help_high_risk_country'] = $this->language->get('help_high_risk_country');
			$data['help_distance'] = $this->language->get('help_distance');
			$data['help_ip_region'] = $this->language->get('help_ip_region');
			$data['help_ip_city'] = $this->language->get('help_ip_city');
			$data['help_ip_latitude'] = $this->language->get('help_ip_latitude');
			$data['help_ip_longitude'] = $this->language->get('help_ip_longitude');
			$data['help_ip_isp'] = $this->language->get('help_ip_isp');
			$data['help_ip_org'] = $this->language->get('help_ip_org');
			$data['help_ip_asnum'] = $this->language->get('help_ip_asnum');
			$data['help_ip_user_type'] = $this->language->get('help_ip_user_type');
			$data['help_ip_country_confidence'] = $this->language->get('help_ip_country_confidence');
			$data['help_ip_region_confidence'] = $this->language->get('help_ip_region_confidence');
			$data['help_ip_city_confidence'] = $this->language->get('help_ip_city_confidence');
			$data['help_ip_postal_confidence'] = $this->language->get('help_ip_postal_confidence');
			$data['help_ip_postal_code'] = $this->language->get('help_ip_postal_code');
			$data['help_ip_accuracy_radius'] = $this->language->get('help_ip_accuracy_radius');
			$data['help_ip_net_speed_cell'] = $this->language->get('help_ip_net_speed_cell');
			$data['help_ip_metro_code'] = $this->language->get('help_ip_metro_code');
			$data['help_ip_area_code'] = $this->language->get('help_ip_area_code');
			$data['help_ip_time_zone'] = $this->language->get('help_ip_time_zone');
			$data['help_ip_region_name'] = $this->language->get('help_ip_region_name');
			$data['help_ip_domain'] = $this->language->get('help_ip_domain');
			$data['help_ip_country_name'] = $this->language->get('help_ip_country_name');
			$data['help_ip_continent_code'] = $this->language->get('help_ip_continent_code');
			$data['help_ip_corporate_proxy'] = $this->language->get('help_ip_corporate_proxy');
			$data['help_anonymous_proxy'] = $this->language->get('help_anonymous_proxy');
			$data['help_proxy_score'] = $this->language->get('help_proxy_score');
			$data['help_is_trans_proxy'] = $this->language->get('help_is_trans_proxy');
			$data['help_free_mail'] = $this->language->get('help_free_mail');
			$data['help_carder_email'] = $this->language->get('help_carder_email');
			$data['help_high_risk_username'] = $this->language->get('help_high_risk_username');
			$data['help_high_risk_password'] = $this->language->get('help_high_risk_password');
			$data['help_bin_match'] = $this->language->get('help_bin_match');
			$data['help_bin_country'] = $this->language->get('help_bin_country');
			$data['help_bin_name_match'] = $this->language->get('help_bin_name_match');
			$data['help_bin_name'] = $this->language->get('help_bin_name');
			$data['help_bin_phone_match'] = $this->language->get('help_bin_phone_match');
			$data['help_bin_phone'] = $this->language->get('help_bin_phone');
			$data['help_customer_phone_in_billing_location'] = $this->language->get('help_customer_phone_in_billing_location');
			$data['help_ship_forward'] = $this->language->get('help_ship_forward');
			$data['help_city_postal_match'] = $this->language->get('help_city_postal_match');
			$data['help_ship_city_postal_match'] = $this->language->get('help_ship_city_postal_match');
			$data['help_score'] = $this->language->get('help_score');
			$data['help_explanation'] = $this->language->get('help_explanation');
			$data['help_risk_score'] = $this->language->get('help_risk_score');
			$data['help_queries_remaining'] = $this->language->get('help_queries_remaining');
			$data['help_maxmind_id'] = $this->language->get('help_maxmind_id');
			$data['help_error'] = $this->language->get('help_error');

			$data['column_product'] = $this->language->get('column_product');
			$data['column_model'] = $this->language->get('column_model');
			$data['column_quantity'] = $this->language->get('column_quantity');
			$data['column_price'] = $this->language->get('column_price');
			$data['column_total'] = $this->language->get('column_total');

			$data['entry_order_status'] = $this->language->get('entry_order_status');
			$data['entry_notify'] = $this->language->get('entry_notify');
			$data['entry_comment'] = $this->language->get('entry_comment');

			$data['button_invoice_print'] = $this->language->get('button_invoice_print');
			$data['button_shipping_print'] = $this->language->get('button_shipping_print');
			$data['button_edit'] = $this->language->get('button_edit');
			$data['button_cancel'] = $this->language->get('button_cancel');
			$data['button_generate'] = $this->language->get('button_generate');
			$data['button_reward_add'] = $this->language->get('button_reward_add');
			$data['button_reward_remove'] = $this->language->get('button_reward_remove');
			$data['button_commission_add'] = $this->language->get('button_commission_add');
			$data['button_commission_remove'] = $this->language->get('button_commission_remove');
			$data['button_history_add'] = $this->language->get('button_history_add');

			$data['tab_order'] = $this->language->get('tab_order');
			$data['tab_payment'] = $this->language->get('tab_payment');
			$data['tab_shipping'] = $this->language->get('tab_shipping');
			$data['tab_product'] = $this->language->get('tab_product');
			$data['tab_history'] = $this->language->get('tab_history');
			$data['tab_fraud'] = $this->language->get('tab_fraud');
			$data['tab_action'] = $this->language->get('tab_action');

			$data['token'] = $this->session->data['token'];

			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('sale/coupon_order', 'token=' . $this->session->data['token'], 'SSL')
			);
          	$data['invoice'] = $this->url->link('order/coupon_order/invoice', 'token=' . $this->session->data['token'] . '&order_id=' . (int)$this->request->get['order_id'], 'SSL');
        $data['cancel'] = $this->url->link('order/coupon_order', 'token=' . $this->session->data['token'], 'SSL');
           $data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');
			$this->response->setOutput($this->load->view('order/assign_telecaller_list.tpl',$data));
		
	}

	protected function validate() {
		/*if (!$this->user->hasPermission('modify', 'sale/coupon_order')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}*/
        if ($this->request->post['telecaller_name'] == 0) {
			$this->error['name'] = $this->language->get('error_name');
		}
    
         if (!isset($this->request->post['sometext'])) {
			$this->error['booking_id'] = $this->language->get('error_booking_id');
		}

		return !$this->error;
	}


}
