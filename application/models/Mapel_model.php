<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Mapel_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function data()
	{
		$this->db->select('*');
		$this->db->from('mapel');
		$this->db->order_by('nama_mapel','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	

    public function cekNilai()
	{
		$this->db->select('*');
		$this->db->from('mapel');
		$query = $this->db->get();
		return $query->row();
	}

    public function detail($id_mapel){
        $this->db->select('*');
        $this->db->from('mapel');
        $this->db->where('id_mapel', $id_mapel);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data){
        $this->db->insert('mapel', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_mapel', $data['id_mapel']);
        $this->db->update('mapel', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_mapel', $data['id_mapel']);
        $this->db->delete('mapel', $data);
    }

}

?>