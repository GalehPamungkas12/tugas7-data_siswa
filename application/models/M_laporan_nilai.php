<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  M_laporan_nilai extends CI_Model {

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

    public function view($nisn){
        $this->db->select('nilai.*,mapel.*, siswa.*,pegawai.*');
		$this->db->from('nilai');
        $this->db->join('pegawai', 'nilai.nip = pegawai.nip');
        $this->db->join('mapel', 'mapel.id_mapel = nilai.id_mapel');
        $this->db->join('siswa', 'siswa.nisn = nilai.nisn');
        $this->db->where('nilai.nisn', $nisn);
        $query = $this->db->get();
        return $query->row();
    }

    public function detail($nisn){
        $this->db->select('siswa.*,kelas.*');
		$this->db->from('siswa');
        $this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
        $this->db->where('siswa.nisn', $nisn);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_nilai($nisn){
        $this->db->select('mapel.id_mapel, mapel.nama_mapel, mapel.kkm, 
                            nilai.nilai, nilai.nisn, nilai.tugas, 
                            nilai.uts, nilai.uas,
                            nilai.predikat_nilai, nilai.predikat_tugas,
                            nilai.predikat_uts,
                            nilai.predikat_uas,');
        $this->db->from('nilai');
        $this->db->join('mapel', 'nilai.id_mapel = mapel.id_mapel');
        $this->db->where('nilai.nisn', $nisn);
        return $this->db->get()->result();
    }

    public function count_nilai($nisn){
        $this->db->select('AVG(nilai) AS avnilai, AVG(tugas) AS avgtugas, AVG(uts) AS avguts, AVG(uas) AS avguas');
        $this->db->where('nisn', $nisn);
        return $this->db->get('nilai')->result();
    }

}

?>