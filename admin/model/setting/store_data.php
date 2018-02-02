<?php
class ModelSettingStoreData extends Model {

	public function getStore() {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "store_data");
        return $query->row;
	}
	public function editStore($data) {

		$this->db->query("UPDATE " . DB_PREFIX . "store_data SET meta_title = '" . $this->db->escape($data['config_meta_title']) . "', `meta_description` = '" . $this->db->escape($data['config_meta_description']) . "', `meta_tag_keywords` = '" . $this->db->escape($data['config_meta_keyword']) . "'");

	}
}
?>