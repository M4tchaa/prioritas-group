<?php
class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_products() {
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }

    public function get_product_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->row_array();
    }

    // Method untuk update produk
    public function update_product($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete_product($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function update_product_status($id, $status) {
        $this->db->set('is_sell', $status);
        $this->db->where('id', $id);
        return $this->db->update('products');
    }
    
}
?>