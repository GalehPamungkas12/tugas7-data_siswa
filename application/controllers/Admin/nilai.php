<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nilai extends CI_Controller {
	public function __construct(){
		parent::__construct();
       $this->load->model('nilai_model');


	}

	public function index()
	{
		$nilai = $this->nilai_model->data();
            $data = array('title'  => 'Data nilai',
                'nilai' => $nilai,
              'isi'  => 'admin/nilai/data');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function tambah(){
		$valid = $this->form_validation;
            $valid->set_rules('nama','nama','required',array('required'=> '%s Harus di isi'));

            
             if ($valid->run() === FALSE) {
                

                   
                        $data = array('title' => 'Tambah Data nilai',
                                    'error' => $this->upload->display_errors('Ukuran file terlalu besar'),
                                    'isi' => 'admin/nilai/tambah');
                        $this->load->view('admin/layout/wrapper', $data, FALSE);
                    }else{

                        $i= $this->input;
                        $data = array('nama'       => $i->post('nama'),
                                'kelas'    => $i->post('kelas'),
                                'uts'    => $i->post('uts'),
                                'uas'    => $i->post('uas'),
                                'nilai_tambahan' => $i->post('nilai_tambahan'));
                                

                        $this->nilai_model->tambah($data);
                        $this->session->set_flashdata('sukses', 'data telah ditambah');
                        redirect(base_url('admin/nilai'), 'refresh');        
                    }
}

    public function edit($id_nilai)
    {
    	$nilai = $this->nilai_model->detail($id_nilai);
            $valid = $this->form_validation;
             $valid->set_rules('nama','nama','required',array('required'=> '%s Harus di isi'));

            if ($valid->run()) {
                if (!empty($_FILES['photo']['name'])) {
                    $config['upload_path'] = './asset/nilai';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '20000';
                    $config['max_width'] = '20000';
                    $config['max_height'] = '20000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('photo')) {
                        $data = array('title' => 'Edit Data nilai',
                                    'nilai' => $nilai,
                                    'error' => $this->upload->display_errors('Ukuran file terlalu besar'),
                                    'isi' => 'admin/nilai/edit');
                        $this->load->view('admin/layout/wrapper', $data, FALSE);
                    }else {
                        $upload_data = array('uploads' => $this->upload->data());

                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './gambar/nilai/'.$upload_data['uploads']['file_name'];
                        $config['quality'] = "100%";
                        $config['maintain_ratio'] = TRUE;
                        $config['width'] = 360;
                        $config['height'] = 360;
                        $config['x_axis'] = 0;
                        $config['y_axis'] = 0;
                        $config['thumb_marker'] = '';
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        if (!empty($_POST['password'])) {
                            $i= $this->input;
                            $data = array('nama'       => $i->post('nama'),
                                'kelas'    => $i->post('kelas'),
                                'uts'    => $i->post('uts'),
                                'uas'    => $i->post('uas'),
                                'nilai_tambahan' => $i->post('nilai_tambahan'));
                                

                            $this->nilai_model->edit($data);
                            $this->session->set_flashdata('sukses', 'data telah diedit');
                            redirect(base_url('admin/nilai'), 'refresh');        
                        }    
                        }
            }else {
                $i = $this->input;
                $data = array( 
                                'nama'       => $i->post('nama'),
                                'kelas'    => $i->post('kelas'),
                                'uts'    => $i->post('uts'),
                                'uas'    => $i->post('uas'),
                                'nilai_tambahan' => $i->post('nilai_tambahan'));
                                

                        $this->nilai_model->edit($data);
                        $this->session->set_flashdata('sukses', 'Data telah diedit');
                        redirect(base_url('admin/nilai'),'refresh');
                }
        }
        $data = array('title' => 'Edit Data nilai',
        'nilai' => $nilai,
        'isi' => 'admin/nilai/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    public function delete($nis){
    	$data = array('nis' => $nis);
            $this->nilai_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/nilai'),'refresh');
}
}
?>