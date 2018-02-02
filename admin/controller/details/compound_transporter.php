<?php
class ControllerDetailsCompoundTransporter extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('details/compound_transporter');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('details/compound_transporter');
		
		$this->getList();
    }
  public function getEdit()
  {
      $this->load->language('details/compound_transporter');

		$this->document->setTitle($this->language->get('heading_title'));
     $this->load->model('details/compound_transporter');
      if(($this->request->server['REQUEST_METHOD'] == 'POST' ) )
             {
          
            
 //print_r($_POST);die;
      //print_r($this->request->post);die;
          $this->model_details_compound_transporter->getPaymentSave($this->request->post);
  $this->getList();
           }
      else
      {
           $id=$_GET['transporter_id'];
      $name=$_GET['transporter_name'];
       $balance=$_GET['balance_amount'];
      $this->load->language('details/compound_transporter');
      $data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('details/compound_transporter', 'token=' . $this->session->data['token'] , 'SSL')
		);

	
	 $data['cancel'] = $this->url->link('details/compound_transporter', 'token=' . $this->session->data['token'], 'SSL');
	
      	$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
      $data['text_form'] = $this->language->get('text_form');
        $data['column_address'] = $this->language->get('column_address');
      	$data['transporter_id'] = $this->language->get('transporter_id');
		$data['transporter_name'] = $this->language->get('transporter_name');
        $data['balance'] = $this->language->get('balance');
      $data['date'] = $this->language->get('date');
		$data['amount'] = $this->language->get('amount');
        $data['collected_by'] = $this->language->get('collected_by');
       $data['comment'] = $this->language->get('comment');
		$data['receipt_no'] = $this->language->get('receipt_no');
      $data['tr_name']=$name;
      $data['id']=$id;
      $data['final_balance']=$balance;
       
      
      	$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
     
      $data['action'] = $this->url->link('details/compound_transporter/getEdit', 'token=' . $this->session->data['token'] , 'SSL');
     
      	$this->response->setOutput($this->load->view('details/compound_edit.tpl', $data)); 
      }
  }
protected function getList() {
        
    if (isset($this->request->get['filter_transporter_id'])) {
			$filter_transporter_id = $this->request->get['filter_transporter_id'];
		} else {
			$filter_transporter_id = null;
		}
        
    	if (isset($this->request->get['filter_transporter_name'])) {
			$filter_transporter_name = $this->request->get['filter_transporter_name'];
		} else {
			$filter_transporter_name = null;
		}

		if (isset($this->request->get['filter_total_balance'])) {
			$filter_total_balance = $this->request->get['filter_total_balance'];
		} else {
			$filter_total_balance = null;
		}
        
        if (isset($this->request->get['filter_total'])) {
			$filter_total = $this->request->get['filter_total'];
		} else {
			$filter_total= null;
		}
      if (isset($this->request->get['filter_total_paid'])) {
			$filter_total_paid = $this->request->get['filter_total_paid'];
		} else {
			$filter_total_paid = null;
		}  
        if (isset($this->request->get['filter_margin_amount'])) {
			$filter_margin_amount = $this->request->get['filter_margin_amount'];
		} else {
			$filter_margin_amount = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'dm.name';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'dm.address';
		}
        if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'dm.number';
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
           
		if (isset($this->request->get['filter_transporter_id'])) {
			$url .= '&filter_transporter_id=' . urlencode(html_entity_decode($this->request->get['filter_transporter_id'], ENT_QUOTES, 'UTF-8'));
		}

        
		if (isset($this->request->get['filter_transporter_name'])) {
			$url .= '&filter_transporter_name=' . urlencode(html_entity_decode($this->request->get['filter_transporter_name'] , ENT_QUOTES, 'UTF-8'));
		}
        
        if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . urlencode(html_entity_decode($this->request->get['filter_total'], ENT_QUOTES, 'UTF-8'));
		}
       if (isset($this->request->get['filter_total_paid'])) {
			$url .= '&filter_total_paid=' . urlencode(html_entity_decode($this->request->get['filter_total_paid'], ENT_QUOTES, 'UTF-8'));
		}
      if (isset($this->request->get['filter_margin_amount'])) {
			$url .= '&filter_margin_amount=' . urlencode(html_entity_decode($this->request->get['filter_margin_amount'], ENT_QUOTES, 'UTF-8'));
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
			'href' => $this->url->link('details/compound_transporter', 'token=' . $this->session->data['token'] . $url, 'SSL')
		);

		$data['add'] = $this->url->link('details/compound_transporter/add', 'token=' . $this->session->data['token'] . $url, 'SSL');
    
	
		$data['delete'] = $this->url->link('details/compound_transporter/delete', 'token=' . $this->session->data['token'] . $url, 'SSL'); 

		$data['asigned_total_list']=array();
		$data['car_make_list_data']=array();
		$data['asigned_list']=array();
        $filter_data = array(
			'filter_transporter_id'	  => $filter_transporter_id,
            'filter_transporter_name'  => $filter_transporter_name,
            'filter_total'  =>  $filter_total,
            'filter_total_paid'  =>  $filter_total_paid,
            'filter_margin_amount'  =>  $filter_margin_amount,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'           => $this->config->get('config_limit_admin')
		);

      
		$this->load->model('details/compound_transporter'); 
        $asigned_total =$this->model_details_compound_transporter->getAllAsignedList($filter_data);
     $transporter =$this->model_details_compound_transporter->getTransporter();
        $asigned_total_list=$this->model_details_compound_transporter->getTotalList($filter_data);
     $new_payment=$this->model_details_compound_transporter->getTotalAllPayments();
      // print_r($new_payment);die;
   // echo "<br>";
   // print_r($transporter);
   // echo "<br>";
	    foreach ($asigned_total as $result) {
            
//print_r($result);
           // echo "<br>";
            foreach($transporter as $amt)
            {
              //  print_r($amt);die;
                  
             
            if($amt['transporter_id']==$result['transporter_id'])
            {
                foreach($new_payment as $payments)
                {
                    $paid=0;
                    $balance=0;
                   // print_r($payments);
                   // echo "<br>";
                   // echo "id".$result['transporter_id'];
                   if($result['transporter_id']==$payments['transporter_id'])
                   {
                     //  echo "in";
                     //  print_r($payments);
                   $paid=$result['paid']+$payments['total'];
                       $balance=$amt['pay_amount']-$paid;
                       break;
                   }
                    else{
                    $paid=$result['paid'];
                    $balance=$amt['pay_amount']- $result['paid'];
                    }
                   
                }
           
                //echo $result['transporter_id']."<br>";
           // echo $result['price']."<br>";
             //   echo $result['paid']."<br>";
              //  echo $amt['pay_amount']."<br>";
          //$balance=$amt['pay_amount']- $result['paid'];
		$data['asined_list'][] = array(
				'booking_id'	  =>$result['transporter_id'],
                'vendor'          =>$result['vendor_name'],
		        'booking_total_amount'    =>$result['price'],
				'margin_amount' => $amt['pay_amount'],
                'paid_amount'  => $paid,
                'balance_amount'  =>$balance,
              'view' =>$this->url->link('details/vendor/info', 'token=' . $this->session->data['token'] . '&id=' . $result['transporter_id'] . $url, 'SSL'),
             //    'edit'   => $this->url->link('details/compound_transporter/edit', 'token=' . $this->session->data['token'] . '&id=' . $result['driver_id'] .'&name=' . $result['driver_name'] .'&number=' . $result['driver_number'] .'&address=' . $result['driver_address'] . $url, 'SSL')
            'edit'    => $this->url->link('details/compound_transporter/getEdit', 'token=' . $this->session->data['token'] . '&transporter_id=' . $result['transporter_id'] . '&transporter_name=' . $result['vendor_name'] .'&balance_amount=' . $balance. $url, 'SSL'),
        );
               }   
            }
	  
		}
  // die;
		
$data['service_center'] = $this->language->get('service_center');
		$data['heading_title'] = $this->language->get('heading_title');
		$data['label_filter'] = $this->language->get('label_filter');
        $data['column_address'] = $this->language->get('column_address');
        $data['column_number'] = $this->language->get('column_number');
        $data['text_list'] = $this->language->get('text_list');
		$data['text_confirm'] = $this->language->get('text_confirm');
        $data['label_filter_name'] = $this->language->get('label_filter_name');
        $data['label_filter_address'] = $this->language->get('label_filter_address');
        $data['label_filter_number'] = $this->language->get('label_filter_number');
		$data['column_image'] = $this->language->get('column_image');
		$data['column_name'] = $this->language->get('column_name');
		$data['column_price'] = $this->language->get('column_price');
		$data['column_action'] = $this->language->get('column_action');
		$data['label_total_bal'] = $this->language->get('label_total_bal');
		$data['label_total_paid'] = $this->language->get('label_total_paid');
       $data['entry_name'] = $this->language->get('entry_name');
		$data['entry_price'] = $this->language->get('entry_price');
		$data['entry_quantity'] = $this->language->get('entry_quantity');
		$data['entry_status'] = $this->language->get('entry_status');
        $data['button_add'] = $this->language->get('button_add');
		$data['button_edit'] = $this->language->get('button_edit');
		$data['button_delete'] = $this->language->get('button_delete');
		$data['button_filter'] = $this->language->get('button_filter');
          $data['button_change_password'] = $this->language->get('button_change_password');
         $data['text_no_results'] = $this->language->get('text_no_results');
         $data['column_balance'] = $this->language->get('column_balance');
         $data['column_paid'] = $this->language->get('column_paid');
     $data['total_amount']=  $this->language->get('total_amount');
     $data['column_vendor']=  $this->language->get('column_vendor');
     $data['pay']=  $this->language->get('pay');
      $data['label_transporter']=  $this->language->get('label_transporter');
        

    
        
     $data['total_margin'] = $this->language->get('total_margin');
    $data['total_paid'] = $this->language->get('total_paid');
    $data['total_balance'] = $this->language->get('total_balance');

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
        if (isset($this->request->get['filter_transporter_id'])) {
			$url .= '&filter_transporter_id=' . urlencode(html_entity_decode($this->request->get['filter_transporter_id'], ENT_QUOTES, 'UTF-8'));
		}
   	if (isset($this->request->get['filter_transporter_name'])) {
			$url .= '&filter_transporter_name=' . $this->request->get['filter_transporter_name'];
		}
        	if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}	
        if (isset($this->request->get['filter_total_paid'])) {
			$url .= '&filter_total_paid=' . $this->request->get['filter_total_paid'];
		}	
        if (isset($this->request->get['filter_margin_amount'])) {
			$url .= '&filter_margin_amount=' . $this->request->get['filter_margin_amount'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_name'] = $this->url->link('details/compound_transporter', 'token=' . $this->session->data['token'] . '&sort=dm.driver_name' . $url, 'SSL');
       $data['sort_address'] = $this->url->link('details/compound_transporter', 'token=' . $this->session->data['token'] . '&sort=dm.driver_address' . $url, 'SSL');
        $data['sort_number'] = $this->url->link('details/compound_transporter', 'token=' . $this->session->data['token'] . '&sort=dm.driver_number' . $url, 'SSL');
	
		$url = '';
     
		if (isset($this->request->get['filter_transporter_id'])) {
			$url .= '&filter_transporter_id=' . urlencode(html_entity_decode($this->request->get['filter_transporter_id'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_transporter_name'])) {
			$url .= '&filter_transporter_name=' . $this->request->get['filter_transporter_name'];
		}
      
        if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}   
        if (isset($this->request->get['filter_total_paid'])) {
			$url .= '&filter_total_paid=' . $this->request->get['filter_total_paid'];
		}    
        if (isset($this->request->get['filter_margin_amount'])) {
			$url .= '&filter_margin_amount=' . $this->request->get['filter_margin_amount'];
		}

	   if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $asigned_total_list;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('details/compound_transporter', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($asigned_total_list) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($asigned_total_list - $this->config->get('config_limit_admin'))) ? $asigned_total_list : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $asigned_total_list, ceil($asigned_total_list / $this->config->get('config_limit_admin')));

		
		$data['filter_transporter_id'] = $filter_transporter_id;
		$data['filter_transporter_name'] = $filter_transporter_name;
        $data['filter_total'] = $filter_total;
        $data['filter_total_paid'] = $filter_total_paid;
        $data['filter_margin_amount'] = $filter_margin_amount;


		$data['sort'] = $sort;
		$data['order'] = $order;

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		
		

		$this->response->setOutput($this->load->view('details/compound_transporter.tpl', $data)); 
       
	}


                }
  
