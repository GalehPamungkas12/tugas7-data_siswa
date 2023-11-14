<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		// error_reporting(0);
		parent::__construct();
		$this->load->model('Nilai_model');
		$this->load->model('Kelas_model');
		$this->load->model('Siswa_model');
		$this->load->model('Mapel_model');
		$this->load->model('M_laporan_nilai');
        $this->load->library('pdf');

        if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
						Silahkan login terlebih dahulu.!</div>');
						redirect(base_url('login'),'refresh');
		}
	}

	public function index()
    {
        $kelas = $this->Kelas_model->guru($this->session->userdata('username'));
		$siswa = $this->Siswa_model->list($kelas->id_kelas);


            $data = array('title'  => 'Data Nilai',
							'siswa' => $siswa,
                          'isi'    => 'nilai/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


	public function edit($nisn)
	{
		$siswa = $this->Siswa_model->detail($nisn);
		$mapel = $this->Mapel_model->data();

		$nip = $this->session->userdata('username');

		$valid = $this->form_validation;
		$valid->set_rules('semester','semester','required',array(
			'required'			=>'semester harus diisi'));
		$valid->set_rules('ajar','ajar','required',array(
			'required'			=>'ajar harus diisi'));
		$valid->set_rules('sikap','sikap','required',array(
			'required'			=>'sikap harus diisi'));
		

		if($valid->run()){
        $input = $this->input->post();
        
        $nilai = [];
            foreach ($mapel as $val) {
                $nil = $input['pelajaran'.$val->id_mapel];
                    if($nil < 62){
                        $nilai_predikat = 'D';
                    }
                    else if($nil >= 62 && $nil <= 74){
                        $nilai_predikat = 'C';
                    }
                    else if($nil >= 75 && $nil <= 87){
                        $nilai_predikat = 'B';
                    }
                    else if($nil >= 88){
                        $nilai_predikat = 'A';
                    }
                // var_dump($nilai_predikat);

                $tugas = $input['tugas'.$val->id_mapel];
                    if($tugas < 62){
                        $tugas_predikat = 'D';
                    }
                    else if($tugas >= 62 && $tugas <= 74){
                        $tugas_predikat = 'C';
                    }
                    else if($tugas >= 75 && $tugas <= 87){
                        $tugas_predikat = 'B';
                    }
                    else if($tugas >= 88){
                        $tugas_predikat = 'A';
                    }

                $uts = $input['uts'.$val->id_mapel];
                    if($uts < 62){
                        $uts_predikat = 'D';
                    }
                    else if($uts >= 62 && $uts <= 74){
                        $uts_predikat = 'C';
                    }
                    else if($uts >= 75 && $uts <= 87){
                        $uts_predikat = 'B';
                    }
                    else if($uts >= 88){
                        $uts_predikat = 'A';
                    }

                $uas = $input['uas'.$val->id_mapel];
                    if($uas < 62){
                        $uas_predikat = 'D';
                    }
                    else if($uas >= 62 && $uas <= 74){
                        $uas_predikat = 'C';
                    }
                    else if($uas >= 75 && $uas <= 87){
                        $uas_predikat = 'B';
                    }
                    else if($uas >= 88){
                        $uas_predikat = 'A';
                    }

                array_push($nilai, array(
                    'nisn'          => $nisn,
                    'nip'           => $nip,
                    'id_mapel'      => $val->id_mapel,
                    'nilai'         => $nil,
                    'predikat_nilai'=> $nilai_predikat,
                    'tugas'         => $tugas,
                    'predikat_tugas'=> $tugas_predikat,
                    'uts'           => $uts,
                    'predikat_uts'  => $uts_predikat,
                    'uas'           => $uas,
                    'predikat_uas'  => $uas_predikat,
                    'sikap'         => $input['sikap'],
                    'kompetensi'    => $input['kompetensi'],
                    'keterampilan'  => $input['keterampilan'],
                    'semester'   	=> $input['semester'],
                    'catatan'       => $input['catatan'],
                    'tahun_ajaran'  => $input['ajar']
                )

            );

            $penilaian = array(	'nisn'	=> $siswa->nisn,
								'penilaian' => 1);
        }
        $this->Siswa_model->update_status_nilai($penilaian);
        $this->Nilai_model->insert_nilai($nilai);
		$this->session->set_flashdata('sukses', 'data telah ditambah');
		redirect(base_url('nilai'), 'refresh'); 

	}
        
			//end validasi
				$data = array('title' => 'Tambah Nilai Siswa',
								'siswa' => $siswa,
								'mapel' => $mapel,
								'isi' => 'nilai/edit');
								$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//end edit

	public function view($nisn){
		$siswa = $this->M_laporan_nilai->detail($nisn);
		$nilai = $this->M_laporan_nilai->view($nisn);
		$mapel = $this->M_laporan_nilai->get_nilai($nisn);
		$avg = $this->M_laporan_nilai->count_nilai($nisn);
		// var_dump($avg);die;
		$data = array('title' => 'Laporan Nilai Siswa',
						'nilai'   => $nilai,
						'siswa'    => $siswa,
						'mapel'    => $mapel,
						'avg'    => $avg,
						'isi' => 'nilai/view');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }
	
	public function view2($nisn){
		$siswa = $this->M_laporan_nilai->detail($nisn);
		$nilai = $this->M_laporan_nilai->view($nisn);
		$mapel = $this->M_laporan_nilai->get_nilai($nisn);
		$avg = $this->M_laporan_nilai->count_nilai($nisn);
		// var_dump($avg);die;
		$data = array('title' => 'Laporan Nilai Siswa',
						'nilai'   => $nilai,
						'siswa'    => $siswa,
						'mapel'    => $mapel,
						'avg'    => $avg,
						'isi' => 'laporan_siswa/laporan');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
    }

	public function nilaiList(){
		$siswa = $this->Siswa_model->nilaiSendiri($this->session->userdata('username'));


            $data = array('title'  => 'Data Nilai',
							'siswa' => $siswa,
                          'isi'    => 'laporan_siswa/list'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
	}



	public function delete($id_kelas){
		
		$data = array('id_kelas'	=> $id_kelas);
		$this->Kelas_model->delete($data);
		$this->session->set_flashdata('sukses','Data Telah Di Hapus');
		redirect(base_url('kelas'),'refresh');
	}

    public function cetak_pdf($nisn){
        $siswa = $this->M_laporan_nilai->detail($nisn);
		$nilai = $this->M_laporan_nilai->view($nisn);
		$mapel = $this->M_laporan_nilai->get_nilai($nisn);
		$avg = $this->M_laporan_nilai->count_nilai($nisn);
		// var_dump($avg);die;
		$data = array('title' => 'Laporan Nilai Siswa',
						'nilai'   => $nilai,
						'siswa'    => $siswa,
						'mapel'    => $mapel,
						'avg'    => $avg);

        $filename = "laporan%20nilai%20siswa.pdf";
            $this->pdf->setFileName($filename);
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->loadView('laporan_siswa/pdf', $data);

    
    
    }


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */