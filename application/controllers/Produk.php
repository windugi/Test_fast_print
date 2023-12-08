<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  Produk Controller
 */
class Produk extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud');
	}

	public function index()
	{
		$data['data'] = $this->crud->get_records('produk');
		$this->load->view('produk/list', $data);
	}


	public function create()
	{
		// $data=array('get_category'=> $this->crud->get_option_kategori());  
		// $data2=array('get_status'=> $this->crud->get_option_status());  
		$data['get_category'] = $this->crud->get_option_kategori();  
		$data['get_status'] = $this->crud->get_option_status();  


		$this->load->view('produk/create', $data);
	}


	public function store()
	{
		$data['nama_produk'] = $this->input->post('produk');
		$data['kategori_id'] = $this->input->post('category');
		$data['harga'] = preg_replace('/[Rp. ]/','',$this->input->post('harga'));
		$data['status_id'] = $this->input->post('status');

		$this->crud->insert('produk', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been saved successfully.</div>');
		redirect(base_url());
	}

	public function edit($id)
	{
		$data['data'] = $this->crud->find_record_by_id('produk', $id);
		$data['get_category'] = $this->crud->get_option_kategori();  
		$data['get_status'] = $this->crud->get_option_status();  
		$this->load->view('produk/edit', $data);
	}

	public function update($id)
	{
		$data['nama_produk'] = $this->input->post('produk');
		$data['kategori_id'] = $this->input->post('category');
		$data['harga'] = preg_replace('/[Rp. ]/','',$this->input->post('harga'));
		$data['status_id'] = $this->input->post('status');

		$this->crud->update('produk', $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
		redirect(base_url());
	}

	public function delete($id)
	{
		$this->crud->delete('produk', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
		redirect(base_url());
	}
	
}
