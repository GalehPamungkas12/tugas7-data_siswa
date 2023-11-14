<?php

?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li class="active">
                <strong><?= $title; ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
            
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <!-- <a href="<?= base_url('nilai/laporan_pdf/'.$id_kelas) ?>" class="btn btn-success btn-sm">
                    <i class="fa fa-print"></i> Cetak pdf
                </a> -->
                        
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example text-center " >
                        <thead>
                            <tr>
                                <th class="text-center">NISN</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Tahun Ajaran</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($siswa as $siswa){
                            ?>
                            <tr>
                                <td><?= $siswa->nisn ?></td>
                                <td><?= $siswa->nama_siswa ?></td>
                                <td><?= $siswa->kelas ?></td>
                                <td><?= $siswa->tahun_ajaran ?></td>
                                
                                <td class="text-center">
                                    <a href="<?= base_url('nilai/edit/'.$siswa->nisn) ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i> Update Nilai
                                    </a>
                                    <a href="<?= base_url('nilai/view/'.$siswa->nisn) ?>" class="btn btn-info btn-sm">
                                        <i class="fa fa-file"></i> View Laporan
                                    </a>
                                    
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>


