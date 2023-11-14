<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Siswa_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function data()
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
		$this->db->order_by('nisn','desc');
		$query = $this->db->get();
		return $query->result();
	}

    public function siswaKelas($id_kelas)
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
        $this->db->where('kelas.id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query->result();
	}

    public function nilaiList($id_kelas)
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
        $this->db->where('kelas.id_kelas', $id_kelas);
		$query = $this->db->get();
		return $query->result();
	}

    public function nilaiSiswa($id_kelas,$nisn)
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
        $this->db->where('kelas.id_kelas', $id_kelas);
        $this->db->where('siswa.nisn', $nisn);
		$query = $this->db->get();
		return $query->row();
	}

    public function detail($nisn){
        $this->db->select('siswa.*, kelas.*');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->from('siswa');
        $this->db->where('siswa.nisn', $nisn);
		$query = $this->db->get();
		return $query->row();
    }

    public function tambah($data){
        $this->db->insert('siswa', $data);
    }

    public function edit($data)
    {
        $this->db->where('nisn', $data['nisn']);
        $this->db->update('siswa', $data);
    }
    public function update_status_nilai($penilaian)
    {
        $this->db->where('nisn', $penilaian['nisn']);
        $this->db->update('siswa', $penilaian);
    }

    public function delete($data)
    {
        $this->db->where('nisn', $data['nisn']);
        $this->db->delete('siswa', $data);
    }

	public function list($kelas)
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->where('siswa.id_kelas', $kelas);
		$query = $this->db->get();
		return $query->result();
	}

	public function nilaiSendiri($username)
	{ 
		$this->db->select('siswa.*, kelas.*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->where('siswa.nisn', $username);
		$query = $this->db->get();
		return $query->result();
	}

}

?>