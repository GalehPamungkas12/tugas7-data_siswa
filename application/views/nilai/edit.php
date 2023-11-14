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
                            <?php


                            echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
                            if(isset($error)){
                                echo '<div class="alert alert-warning">';
                                echo $error;
                                echo '</div>';
                            }

                            $atribut = array ('class' => 'form-horizontal');
                            //Open Form
                            echo form_open_multipart(base_url('nilai/edit/'.$siswa->nisn),$atribut);
                            ?>
                                <input type="hidden" name="nisn" value="<?= $siswa->nisn ?>">
                                <input type="hidden" name="kelas" value="<?= $siswa->kelas ?>">


                                <div class="row container-fluid">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                    <label>Semester</label>
                                    <select class="form-control" name="semester">
                                        <option disabled selected>Pilih Semester</option>
                                        <option value="Ganjil">Ganjil</option>
                                        <option value="Genap">Genap</option>
                                        
                                    </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Tahun Ajaran</label>
                                        <input type="text" class="form-control input-sm" name="ajar">
                                    </div>
                                </div>
                                <hr/> 
                                <div class="form-group">
                                    <div class="col-sm-4">
                                    <label>Sikap</label>
                                    <select class="form-control" name="sikap">
                                        <option disabled selected>Pilih sikap</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    </div>
                                    <div class="col-sm-4">
                                    <label>Kompetensi</label>
                                    <select class="form-control" name="kompetensi">
                                        <option disabled selected>Pilih Kompetensi</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                    <label>Keterampilan</label>
                                    <select class="form-control" name="keterampilan">
                                        <option value="" disabled selected>Nilai Keterampilan</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                    </div>
                                </div>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Mapel</th>
                                        <th class="text-center">Nilai Mapel</th>
                                        <th class="text-center">Tugas</th>
                                        <th class="text-center">UTS</th>
                                        <th class="text-center">UAS</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 0; 
                                        foreach ($mapel as $val) { 
                                        $no++;      
                                    ?>
                                        <tr>
                                            <td><?= $no.'.';?></td>
                                            <td><?= $val->nama_mapel ?></td>
                                            <td><input type="text" class="form-control input-sm" name="pelajaran<?= $val->id_mapel ?>"></td>
                                            <td><input type="text" class="form-control input-sm" name="tugas<?= $val->id_mapel ?>"></td>
                                            <td><input type="text" class="form-control input-sm" name="uts<?= $val->id_mapel ?>"></td>
                                            <td><input type="text" class="form-control input-sm" name="uas<?= $val->id_mapel ?>"></td>
                                        </tr>
                                    <?php 
                                        } 
                                    ?>
                                    </tbody>
                                </table>
                                    
                                <label>Catatan Wali Kelas</label>
                                <textarea class="form-control" name="catatan" placeholder="Catatan Wali Kelas"></textarea>
                                </div>
                                <hr/>
                                <div class="form-group" style="margin:5px auto;">
                                    <div class="col-sm-offset-10 col-sm-2 "> 
                                        <input type="submit" name="edit" class="btn btn-primary" value="Submit">
                                        <a href="<?= base_url('nilai')?>" class="btn btn-danger" >Batal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<!-- Jasny -->
<script src="<?= base_url()?>asset/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- DROPZONE -->
<script src="<?= base_url()?>asset/js/plugins/dropzone/dropzone.js"></script>

<!-- CodeMirror -->
<script src="<?= base_url()?>asset/js/plugins/codemirror/codemirror.js"></script>
<script src="<?= base_url()?>asset/js/plugins/codemirror/mode/xml/xml.js"></script>


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