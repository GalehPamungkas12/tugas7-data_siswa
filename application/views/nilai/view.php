<?php 

foreach ($avg as $av) {
    $permat = round($av->avnilai, 2);
    $avgtugas = round($av->avgtugas, 2);
    $avguts = round($av->avguts, 2);
    $avguas = round($av->avguas, 2);
}

?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?= $title ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong><?= $title ?></strong>
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
                            <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                        <div class="box-header">
                            <h3 class="box-title">Laporan Nilai Siswa / <small><?= $siswa->nama_siswa ?></small></h3><br/>
                        <button type="button" class="btn btn-default pull-right" onclick="printDiv('printableArea')" value="Cetak Rapor" target="_blank" id="print"><i class="fa fa-print"></i> Cetak Rapor</button>
                        <a href="<?= base_url('nilai/cetak_pdf/'.$siswa->nisn)?> " class="btn btn-default pull-right" target="_blank" >Export Pdf</a><br/>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <td>NISN</td>
                                    <td class="text-left">: <?= $siswa->nisn ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td class="text-left">: <?= $siswa->nama_siswa?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td class="text-left">: <?= $siswa->kelas?></td>
                                </tr>
                                <tr>
                                    <td>Semester</td>
                                    <td class="text-left">: <?= $nilai->semester?></td>
                                </tr>
                            </table>
                            <br/>
                            <small>Nilai</small>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mata Pelajaran</th>
                                        <th>KKM</th>
                                        <th>Nilai/Mapel</th>
                                        <th>Tugas</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 0;
                                        foreach ($mapel as $val) {
                                            $no++;
                                            echo '
                                                <tr>
                                                    <td>'.$no.'.'.$val->nama_mapel.'</td>
                                                    <td class="text-left">'.$val->kkm.'</td>
                                                    <td class="text-left">'.$val->nilai.'</td>
                                                    <td class="text-left">'.$val->tugas.'</td>
                                                    <td class="text-left">'.$val->uts.'</td>
                                                    <td class="text-left">'.$val->uas.'</td>
                                                </tr>';
                                        }
                                    ?>
                                    <tr>
                                        <th colspan="2" class="text-center">Rata-Rata</th>
                                        <td class="text-left"><label><?= $permat; ?></td></label>
                                        <td class="text-left"><label><?= $avgtugas ?></td></label>
                                        <td class="text-left"><label><?= $avguts; ?></td></label>
                                        <td class="text-left"><label><?= $avguas; ?></td></label>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <table class="table">
                                <tr>
                                    <td width="25%">Sikap</td>
                                    <td class="text-left" width="75%">: <?= $nilai->sikap; ?></td>
                                </tr>
                                <tr>
                                    <td width="25%">Kompetensi</td>
                                    <td class="text-left" width="75%">: <?= $nilai->sikap;?></td>
                                </tr>
                                <tr>
                                    <td width="25%">Keterampilan</td>
                                    <td class="text-left" width="75%">: <?= $nilai->keterampilan?></td>
                                </tr>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Print -->
    <section class="content" id="printableArea" style="display:none">
        <div class="row invoice-info">
        <br/>
        <br/>
            <div class="col-sm-8">
                <table width="100%">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>:</td>
                        <td>SMA Muhammadiyah Pleret</td>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $siswa->nisn ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Kanggotan, Pleret, Bantul, 55791</td>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $siswa->kelas; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $nilai->nama_siswa ?></td>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $nilai->semester; ?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td>:</td>
                        <td><?= $nilai->nisn?></td>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><?= $nilai->tahun_ajaran; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br/>
        <br/>
        <label>Pengetahuan</label>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" style="vertical-align: middle; !important">Mata Pelajaran</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle; !important">KKM</th>
                    <th colspan="2" class="text-center">Nilai/Mapel</th>
                    <th colspan="2" class="text-center">Tugas</th>
                    <th colspan="2" class="text-center">UTS</th>
                    <th colspan="2" class="text-center">UAS</th>
                </tr>
                <tr>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    foreach ($mapel as $val) {
                        $no++;
                        echo '
                            <tr>
                                <td>'.$no.'.'.$val->nama_mapel.'</td>
                                <td class="text-center">'.$val->kkm.'</td>
                                <td class="text-center">'.$val->nilai.'</td>
                                <td class="text-center">'.$val->predikat_nilai.'</td>
                                <td class="text-center">'.$val->tugas.'</td>
                                <td class="text-center">'.$val->predikat_tugas.'</td>
                                <td class="text-center">'.$val->uts.'</td>
                                <td class="text-center">'.$val->predikat_uts.'</td>
                                <td class="text-center">'.$val->uas.'</td>
                                <td class="text-center">'.$val->predikat_uas.'</td>
                            </tr>';
                    }
                ?>
                <tr>
                    <th colspan="2" class="text-center">Rata-Rata</th>
                    <!-- <td class="text-left"></td> -->
                    <td colspan="2" class="text-left" style="padding-left:10px"><label><?= $permat?></td></label>
                    <td colspan="2" class="text-left" style="padding-left:10px"><label><?= $avgtugas?></td></label>
                    <td colspan="2" class="text-left" style="padding-left:10px"><label><?= $avguts?></td></label>
                    <td colspan="2" class="text-left" style="padding-left:10px"><label><?= $avguas?></td></label>
                </tr>
            </tbody>
        </table>
        <br/>
        <br/>
        <label>Tabel Interval Predikat berdasarkan KKM</label>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" style="vertical-align: middle !important;">KKM</th>
                    <th colspan="4" class="text-center">Predikat</th>
                </tr>
                <tr>
                    <td class="text-center">D = Kurang</td>
                    <td class="text-center">C = Cukup</td>
                    <td class="text-center">B = Baik</td>
                    <td class="text-center">A = Sangat Baik</td>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="text-center">62</td>
                    <td class="text-center">n < 62</td>
                    <td class="text-center">62 &le; n &le; 74</td>
                    <td class="text-center">75 &le; n &le; 87</td>
                    <td class="text-center">n &ge; 88</td>
                </tr>
            </tbody>
        </table>
        <br/>
        <br/>
        <br/>
        <div class="col-sm-12">
            <table width="100%">
                <tr>
                    <td class="text-center" width="50%">Wali Kelas</td>
                    <td class="text-center">Kepala Sekolah</td>
                </tr>
                <tr style="height:65px">
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center"  width="50%">Tempat/tgl<br/><?= $nilai->nama_pegawai ?></td>
                    <td class="text-center">Dra. Tin Martini ST<br/>NIP.000000000</td>
                </tr>
            </table>
        </div>
    <!-- </section>
    <section class="content" id="printableArea" style="page-break-before:always;"> -->
    <p style="page-break-before:always;"></p>
    <br/>
    <br/>
    <div class="row invoice-info">
            <div class="col-sm-8">
                <table width="100%">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>:</td>
                        <td>SMA Muhammadiyah Pleret</td>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $siswa->nisn ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Kanggotan, Pleret, Bantul, 55791</td>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $siswa->kelas; ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $nilai->nama_siswa ?></td>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $nilai->semester; ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $nilai->nisn?></td>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><?= $nilai->tahun_ajaran; ?></td>
                    </tr>
                </table>    
            </div>
        </div>
        <br/>
        <br/>
        <div class="col-sm-12">
            <label>Perilaku</label>
            <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Prestasi</th>
                        <th class="text-center">Predikat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td width="25%">Sikap</td>
                        <td class="text-center" width="75%"><?= $nilai->sikap ?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td width="25%">Kompetensi</td>
                        <td class="text-center" width="75%"><?= $nilai->kompetensi ?></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td width="25%">Keterampilan</td>
                        <td class="text-center" width="75%"><?= $nilai->keterampilan?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <div class="col-sm-12">
            <label>Absensi</label>
            <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Alasan Ketidakhadiran</th>
                        <th class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td width="25%">Sakit</td>
                        <td class="text-center" width="75%">Hari</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td width="25%">Ijin</td>
                        <td class="text-center" width="75%">Hari</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td width="25%">Tanpa Keterangan</td>
                        <td class="text-center" width="75%">Hari</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <div class="col-sm-12">
            <label>Catatan Wali Kelas</label>
            <table width="100%" border="1">
                <td style="padding-left:10px"><?= $nilai->catatan ?></td>
            </table>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <div class="col-sm-12">
            <table width="100%">
                <tr>
                    <td class="text-center" width="50%">Wali Kelas</td>
                    <td class="text-center">Kepala Sekolah</td>
                </tr>
                <tr style="height:65px">
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center"  width="50%">Tempat/tgl<br/><?= $nilai->nama_pegawai ?></td>
                    <td class="text-center">Dra. Tin Martini ST<br/>NIP.000000000</td>
                </tr>
            </table>
        </div>
    </section>
</div>
<!-- </div> -->


            


<!-- Jasny -->
<script src="<?= base_url()?>asset/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- DROPZONE -->
<script src="<?= base_url()?>asset/js/plugins/dropzone/dropzone.js"></script>

<!-- CodeMirror -->
<script src="<?= base_url()?>asset/js/plugins/codemirror/codemirror.js"></script>
<script src="<?= base_url()?>asset/js/plugins/codemirror/mode/xml/xml.js"></script>

<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<!-- /.content-wrapper -->
<!-- upload gambar dengan preview -->
<script>
    Dropzone.options.dropzoneForm = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
    };

    $(document).ready(function(){

        var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
            lineNumbers: true,
            matchBrackets: true
        });

   });
</script>
<!-- end upload gambar dengan preview -->