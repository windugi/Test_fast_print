<?php

/**
 * Crud Model
 */
class Crud extends CI_Model
{

	public function insert($table, $data)
	{
		$result = $this->db->insert($table, $data);
		return $result;
	}

	public function update($table, $data, $id)
	{
		$result = $this->db->where('id_produk', $id)->update($table, $data);
		return $result;
	}

	public function delete($table, $id)
	{
		$result = $this->db->delete($table, ['id_produk' => $id]);
		return $result;
	}

	public function get_records($table)
	{
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->join('kategori', 'kategori.id_kategori  = produk.kategori_id');
			$this->db->join('status', 'status.id_status  = produk.status_id');
			$this->db->where('produk.status_id = 1');
			$this->db->order_by("id_produk","desc");
			$query = $this->db->get();
			return $query->result();
	}

	public function find_record_by_id($table, $id)
	{
		$result = $this->db->get_where($table, ['id_produk' => $id])->row();
		return $result;
	}

	public function get_option_kategori() {
		$this->db->select('*');
		$this->db->from('kategori');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_option_status() {
		$this->db->select('*');
		$this->db->from('status');
		$query = $this->db->get();
		return $query->result();
	}

}
