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

    // Menilkan daftar produk
    public function index() {
        $data['products'] = $this->Product_model->get_all_products();
        $this->load->view('product_list', $data);
    }

    // add produk
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

    // edit produk
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

    // hapus produk
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
        $this->Product_model->update_product_status($id, $status);
    }
}
