<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mapel_model');
		$this->load->model('Pegawai_model');

        if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Silahkan login terlebih dahulu.!</div>');
						redirect(base_url('login'),'refresh');
		}

	}

	public function index()
    {
        $mapel = $this->Mapel_model->data();
            $data = array('title'  => 'Data Mata Pelajaran',
                          'mapel' => $mapel,
                          'isi'    => 'mapel/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

	public function tambah()
	{
		$pegawai = $this->Pegawai_model->data();

		//Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_mapel','nama_mapel','required|is_unique[mapel.nama_mapel]',array(
			'required'			=>'Mata Pelajaran harus diisi',
            'is_unique'		=> 'Mata Pelajaran <strong>'.$this->input->post('nama_mapel').
            '&nbsp; </strong> sudah ada. Buat Mata pelajaran baru'));
		

		if($valid->run()){
            $i= $this->input;
            $data = array(  
                'nama_mapel'			=> $i->post('nama_mapel'),
                'kkm'			=> $i->post('kkm')
                
            );

            $this->Mapel_model->tambah($data);
            $this->session->set_flashdata('sukses', 'data telah ditambah');
            redirect(base_url('mapel'), 'refresh'); 

            
        }
			//end validasi
				$data = array('title' => 'Tambah Data Mata Pelajaran',
                                'pegawai' => $pegawai,
								'isi' => 'mapel/tambah');
								$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function edit($id_mapel)
	{
		$mapel = $this->Mapel_model->detail($id_mapel);
		$pegawai = $this->Pegawai_model->data();

		
		$valid = $this->form_validation;
		$valid->set_rules('nama_mapel','nama_mapel','required',array(
			'required'			=>'Nama pelajaran harus diisi'));
		

		if($valid->run()){

            $i = $this->input;
            $data = array('id_mapel' => $id_mapel,
                        'nama_mapel'		 => $i->post('nama_mapel'),
                        'kkm'		 => $i->post('kkm')
                        );

            $this->Mapel_model->edit($data);
            $this->session->set_flashdata('sukses', 'data berhasil diedit');
            redirect(base_url('mapel'),'refresh');
			

			
		
		//end valid
		}else{
			
			$data = array('title' => 'Edit Data Mata Pelajaran',
			'mapel'	=> $mapel,
            'pegawai' => $pegawai,
			'isi' => 'mapel/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}
	}
	//end edit

	public function delete($id_mapel){
		
		$data = array('id_mapel'	=> $id_mapel);
		$this->Mapel_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Di Hapus');
		redirect(base_url('mapel'),'refresh');
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */