<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('session');
    }

    // Menampilkan daftar produk
    public function index() {
        $search = $this->input->get('search');
        $sort_by = $this->input->get('sort_by', TRUE); // Ambil parameter sort_by
        $order = $this->input->get('order', TRUE) ?: 'asc'; // Ambil parameter order, default asc

        // Menangani pencarian
        if ($search) {
            $this->db->like('name', $search);
        }

        // Menangani sorting
        if ($sort_by) {
            $this->db->order_by($sort_by, $order);
        }

        // Ambil data produk
        $products = $this->db->get('products')->result_array();

        // Kirim data ke view
        $data['products'] = $products;
        $data['search'] = $search;
        $data['sort_by'] = $sort_by;
        $data['order'] = $order;

        $this->load->view('product_list', $data);
    }

    // Add produk
    public function add() {
        $this->load->view('product_add');
    }

    public function save() {
        $data = [
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
            'is_sell' => $this->input->post('is_sell')
        ];
        $this->Product_model->insert_product($data);
        redirect('product');
    }

    // Edit produk
    public function edit($id) {
        $data['product'] = $this->Product_model->get_product_by_id($id);
        $this->load->view('product_edit', $data);
    }

    public function update($id) {
        $data = [
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'stock' => $this->input->post('stock'),
            'is_sell' => $this->input->post('is_sell')
        ];
        $this->Product_model->update_product($id, $data);
        redirect('product');
    }

    // Hapus produk
    public function delete($id) {
        if ($this->Product_model->delete_product($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk.');
        }
        redirect('product');
    }

    // Update status produk
    public function update_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
    
        if ($this->Product_model->update_product_status($id, $status)) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false]);
        }
    }
}
