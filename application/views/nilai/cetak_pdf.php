<?php
$mapel = $this->Mapel_model->cariGuru($this->session->userdata('username'));
$nilai = $this->Nilai_model->detail2($mapel->id_pelajaran);


function getHari($date){
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
     $day = $datetime->format('l');
    switch ($day) {
     case 'Sunday':
      $hari = 'Minggu';
      break;
     case 'Monday':
      $hari = 'Senin';
      break;
     case 'Tuesday':
      $hari = 'Selasa';
      break;
     case 'Wednesday':
      $hari = 'Rabu';
      break;
     case 'Thursday':
      $hari = 'Kamis';
      break;
     case 'Friday':
      $hari = 'Jum\'at';
      break;
     case 'Saturday':
      $hari = 'Sabtu';
      break;
     default:
      $hari = 'Tidak ada';
      break;
    }
    return $hari;
   }

   function getBulan($date){
    $datetime = DateTime::createFromFormat('Y-m-d', $date);
     $day = $datetime->format('F');
    switch ($day) {
     case 'January':
      $hari = 'Januari';
      break;
     case 'February':
      $hari = 'Februari';
      break;
     case 'March':
      $hari = 'Maret';
      break;
     case 'April':
      $hari = 'April';
      break;
     case 'May':
      $hari = 'Mei';
      break;
     case 'June':
      $hari = 'Juni';
      break;
     case 'July':
      $hari = 'Juli';
      break;
     case 'August':
      $hari = 'Agustus';
      break;
     case 'September':
      $hari = 'September';
      break;
     case 'October':
      $hari = 'Oktober';
      break;
     case 'November':
      $hari = 'November';
      break;
     case 'December':
      $hari = 'Desember';
      break;
     default:
      $hari = 'Tidak ada';
      break;
    }
    return $hari;
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List nilai Pelanggan</title>
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


<div style="text-align:center">
    <h3> Laporan nilai Pelanggan</h3>
</div>
<table id="table">
					<tr>
                        <td>No</td>
                        <td>NIS</td>
                        <td>NAMA SISWA</td>
                        <td>Kelas</td>
                        <td>TUGAS</td>
                        <td>UTS</td>
                        <td>UAS</td>
                        <td>NILAI</td>
					</tr>
					<?php $no=1; foreach ($siswa  as $siswa) { ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $siswa->nis ?></td>
                                <td><?= $siswa->nama_siswa ?></td>
                                <td><?php
                                $kelas = $this->db->get_where('kelas',['id_kelas'=>$siswa->id_kelas])->row();
                                echo $kelas->kelas; ?></td>
                                <?php 
                                $nilai = $this->db->get_where('nilai',['id_pelajaran'=>$mapel->id_pelajaran,
                                'nis'=>$siswa->nis])->row();
                                if(empty($nilai)){
                                    echo "<td>0</td>";
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                }else{
                                    if($nilai->nis == $siswa->nis){
                                        echo "<td>".$nilai->tugas."</td>";
                                        echo "<td>".$nilai->uts."</td>";
                                        echo "<td>".$nilai->uas."</td>";
                                        echo "<td>".$nilai->nilai."</td>";
                                    }else{
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                        echo "<td>0</td>";
                                    
                                    }
                                }
                                ?>
                            
                        <?php $no++; }?>
			</table>
</body>
</html>
