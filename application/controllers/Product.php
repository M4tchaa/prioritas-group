<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->database();
        $this->load->helper('url');
        // $this->load->library('pagination');
        $this->load->library('session');
        $this->load->library('form_validation');

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
        // Aturan validasi
        $this->form_validation->set_rules('name', 'Nama Produk', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric|greater_than[0]'); // Validasi harga lebih dari 0
        $this->form_validation->set_rules('stock', 'Stok', 'required|numeric|greater_than[0]'); // Validasi stok lebih dari 0
        $this->form_validation->set_rules('is_sell', 'Status', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal
            $this->session->set_flashdata('error', 'Harga dan Stok harus lebih besar dari 0');
            redirect('product/add'); // Redirect ke halaman tambah produk
        } else {
            // Jika validasi berhasil, simpan produk
            $data = [
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'is_sell' => $this->input->post('is_sell')
            ];
            $this->Product_model->insert_product($data);
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan');
            redirect('product'); // Redirect ke halaman produk
        }
    }

    // Edit produk
    public function edit($id) {
        $data['product'] = $this->Product_model->get_product_by_id($id);
        $this->load->view('product_edit', $data);
    }

    public function update($id) {
        // Menambahkan validasi
        $this->form_validation->set_rules('name', 'Nama Produk', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric|greater_than[0]'); // Validasi harga lebih dari 0
        $this->form_validation->set_rules('stock', 'Stok', 'required|numeric|greater_than[0]'); // Validasi stok lebih dari 0
        $this->form_validation->set_rules('is_sell', 'Status', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan SweetAlert dan kembali ke halaman form edit
            $this->session->set_flashdata('error', 'Harga atau Stok Tidak Valid!');
            $data['product'] = $this->Product_model->get_product_by_id($id);
            $this->load->view('product_edit', $data);
        } else {
            // Jika validasi berhasil, update data produk
            $data = [
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock'),
                'is_sell' => $this->input->post('is_sell')
            ];
            $this->Product_model->update_product($id, $data);
            redirect('product');
        }
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
