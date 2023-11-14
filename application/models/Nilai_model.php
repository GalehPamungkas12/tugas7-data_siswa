<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Nilai_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function data()
	{
		$this->db->select('nilai.*,mapel.*, siswa.*');
		$this->db->from('nilai');
        $this->db->join('mapel', 'mapel.id_mapel = nilai.id_mapel');
        $this->db->join('siswa', 'siswa.nisn = nilai.nisn');
        $this->db->order_by('siswa.nisn', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function laporan($id_kelas)
	{
		$this->db->select('nilai.*,mata_pelajaran.*, siswa.*');
		$this->db->from('nilai');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_pelajaran = nilai.id_pelajaran');
        $this->db->join('siswa', 'siswa.nis = nilai.nis');
        $this->db->where('siswa.id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query->result();
	}

	public function laporan2($nis)
	{
		$this->db->select('nilai.*,mata_pelajaran.*, siswa.*');
		$this->db->from('nilai');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_pelajaran = nilai.id_pelajaran');
        $this->db->join('siswa', 'siswa.nis = nilai.nis');
        $this->db->where('nilai.nis', $nis);
		$query = $this->db->get();
		return $query->result();
	}

    public function detail($nis){
        $this->db->select('nilai.*,mata_pelajaran.*, siswa.*');
		$this->db->from('nilai');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_pelajaran = nilai.id_pelajaran');
        $this->db->join('siswa', 'siswa.nis = nilai.nis');
        $this->db->where('nilai.nis', $nis);
        $query = $this->db->get();
        return $query->result();
    }

    public function detail2($id_pelajaran){
        $where = "nilai.id_pelajaran = '$id_pelajaran'";
        $this->db->select('nilai.*,mata_pelajaran.*, siswa.*');
		$this->db->from('nilai');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.id_pelajaran = nilai.id_pelajaran');
        $this->db->join('siswa', 'siswa.nis = nilai.nis');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_nilai($nilai){
        $this->db->insert_batch('nilai', $nilai);
        $nilai['nisn'] = $this->db->insert_id();
    }

    public function edit($data)
    {
        $this->db->where('id_nilai', $data['id_nilai']);
        $this->db->update('nilai', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_kelas', $data['id_kelas']);
        $this->db->delete('kelas', $data);
    }

}

?>