<?php 

foreach ($avg as $av) {
    $permat = round($av->avnilai, 2);
    $avgtugas = round($av->avgtugas, 2);
    $avguts = round($av->avguts, 2);
    $avguas = round($av->avguas, 2);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
	<style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
</head>
<body>
    <!-- Print -->
                <table width="100%">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>:</td>
                        <td>SDN Kertasana</td>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $siswa->nisn ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Jl.Klejet Kertasana, Kec. Bojonegara, Kab. Serang</td>
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
        <br/>
        <br/>
        <label style="font-weight: bold;">Pengetahuan</label>
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
        <label style="font-weight: bold;">Tabel Interval Predikat berdasarkan KKM</label>
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
        <div  style="margin-left: 100px;">

            <table width="100%">
                <tr>
                    <td class="text-center" width="50%">Wali Kelas
                        <br>
                        <br>
                        <br>
                    </td>
                    <td class="text-center">Kepala Sekolah 
                    <br>
                        <br>
                        <br>
                    </td>
                </tr>
                <tr style="height:65px">
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center"  width="50%">Tempat/tgl<br/><?= $nilai->nama_pegawai ?></td>
                    <td class="text-center">Mohamad Efi Lutfi, S.Pd<br/>NIP.197801272014051001</td>
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
                        <td>SDN Kertasana</td>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $siswa->nisn ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>Jl.Klejet Kertasana, Kec. Bojonegara, Kab. Serang</td>
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
            <label style="font-weight: bold;">Perilaku</label>
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
                        <td  width="75%"><center><?= $nilai->sikap ?></center></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td width="25%">Kompetensi</td>
                        <td  width="75%"><center><?= $nilai->kompetensi ?></center></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td width="25%">Keterampilan</td>
                        <td  width="75%"><center><?= $nilai->keterampilan?></center></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <div class="col-sm-12">
            <label style="font-weight: bold;">Absensi</label>
            <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Alasan Ketidakhadiran</th>
                        <th text-align="center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td width="25%">Sakit</td>
                        <td text-align="center" width="75%"><center>Hari</center></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td width="25%">Ijin</td>
                        <td text-align="center" width="75%"><center>Hari</center></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td width="25%">Tanpa Keterangan</td>
                        <td text-align="center" width="75%"><center>Hari</center></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br/>
        <div class="col-sm-12">
            <label style="font-weight: bold;">Catatan Wali Kelas</label>
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
        <div  style="margin-left: 100px;">

            <table width="100%">
                <tr>
                    <td class="text-center" width="50%">Wali Kelas
                        <br>
                        <br>
                        <br>
                    </td>
                    <td class="text-center">Kepala Sekolah 
                    <br>
                        <br>
                        <br>
                    </td>
                </tr>
                <tr style="height:65px">
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center"  width="50%">Tempat/tgl<br/><?= $nilai->nama_pegawai ?></td>
                    <td class="text-center">Mohamad Efi Lutfi, S.Pd<br/>NIP.197801272014051001</td>
                </tr>
            </table>
        </div>
    </section>
</body>
</html>
