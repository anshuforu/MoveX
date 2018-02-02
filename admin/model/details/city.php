<?php
class ModelDetailsCity extends Model {
	
   public function addcity($data) {
        $query = $this->db->query("INSERT INTO  " . DB_PREFIX . "city(city_name) VALUES('".$data['name']."')");
    }
    public function getTotalCityCount($city_name) {
	
		$qry = $this->db->query("SELECT count(*) as count FROM `" . DB_PREFIX . "city` WHERE city_name='$city_name'");

		
			return $qry->row['count'];
		
	}
public function getProductOptions($product_id) {
		$product_option_data = array();

		$product_option_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "city`WHERE po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		foreach ($product_option_query->rows as $product_option) {
			$product_option_value_data = array();

			$product_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE product_option_id = '" . (int)$product_option['product_option_id'] . "'");

			foreach ($product_option_value_query->rows as $product_option_value) {
				$product_option_value_data[] = array(
					'product_option_value_id' => $product_option_value['product_option_value_id'],
					'option_value_id'         => $product_option_value['option_value_id'],
					'quantity'                => $product_option_value['quantity'],
					'subtract'                => $product_option_value['subtract'],
					'price'                   => $product_option_value['price'],
					'price_prefix'            => $product_option_value['price_prefix'],
					'points'                  => $product_option_value['points'],
					'points_prefix'           => $product_option_value['points_prefix'],
					'weight'                  => $product_option_value['weight'],
					'weight_prefix'           => $product_option_value['weight_prefix']
				);
			}

			$product_option_data[] = array(
				'product_option_id'    => $product_option['product_option_id'],
				'product_option_value' => $product_option_value_data,
				'option_id'            => $product_option['option_id'],
				'name'                 => $product_option['name'],
				'type'                 => $product_option['type'],
				'value'                => $product_option['value'],
				'required'             => $product_option['required']
			);
		}

		return $product_option_data;
	}
   public function getcitys($data = array()) {
		
		$sql ="SELECT  * FROM " . DB_PREFIX . "city";

				$sort_data = array(
			'city_name',
			//'cmodel.car_model_name',
			//'csp.price',
		);
       	if (!empty($data['filter_city'])) {
			$sql .= " WHERE city_name LIKE '%" . $this->db->escape($data['filter_city']) . "%'";
		}


		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY city_name";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}
		$query = $this->db->query($sql);

		return $query->rows;
	}
    public function getTotalList($data = array()) {
		$sql ="SELECT  count(city_id) as total FROM " . DB_PREFIX . "city";
           
		      	if (!empty($data['filter_city'])) {
			$sql .= " WHERE city_name LIKE '%" . $this->db->escape($data['filter_city']) . "%'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
      public function updatecity($data,$id) {
        $query = $this->db->query("UPDATE  " . DB_PREFIX . "city SET city_name='".$data['name']."' WHERE city_id='$id'");
    }
	 public function deletecity($id) {
        $query = $this->db->query("DELETE FROM " . DB_PREFIX . "city WHERE city_id='$id'");
    }
    public function getTotalcity() {
		$query = $this->db->query("SELECT  count(*) as total FROM " . DB_PREFIX . "city");

		return $query->row['total'];
	}

}