<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= isset($title) ? $title : ''  ?></h1>
            <div class="section-header-breadcrumb">
                <!-- looping -->
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
                <!-- looping -->
            </div>
        </div>

        <div class="section-body">
            <form id="filterForm" action="" method="get">
                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="No_mr">No MR</label>
                            <input type="text" class="form-control" id="No_mr" name="no_mr" value="<?= $this->input->get('no_mr') ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="<?= $this->input->get('nik') ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label for="bpjs">BPJS</label>
                            <input type="text" class="form-control" id="bpjs" name="no_bpjs" value="<?= $this->input->get('no_bpjs') ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $this->input->get('nama') ?>">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 filter-buttons">
                        <div class="form-group d-flex align-items-end">
                            <button type="submit" class="btn btn-sm btn-primary mr-2" style="margin-top: 30px;"><i class="fas fa-filter"></i> Filter</button>
                            <button type="button" class="btn btn-sm btn-danger " style="margin-top: 30px;" onclick="resetForm()"><i class="fas fa-sync"></i> Reset</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- checked request ajax -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="select-register-pendaftaran">
                <label class="form-check-label" for="select-register-pendaftaran">
                    Display Patients Visited Today <b>( <?php echo date('Y-m-d') ?> )</b>
                </label>
            </div>
            <!-- checked -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><?= $sub_title ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>No MR</th>
                                        <th>Nama Pasien</th>
                                        <th>NIK</th>
                                        <th>No HP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>BPJS</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($filters as $pasien) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <div class="badge badge-success"><?= $pasien->no_mr; ?> </div>
                                            </td>
                                            <td><?= ucwords(strtolower($pasien->nama_pasien)); ?></td>
                                            <td><?= $pasien->nik; ?></td>
                                            <td><?= $pasien->no_hp; ?></td>
                                            <td><?= $pasien->jenis_kelamin; ?></td>
                                            <td><?= $pasien->no_bpjs; ?></td>
                                            <td width="10%">
                                                <a data-id="<?= $pasien->id; ?>" class="btn btn-sm btn-outline-primary btnEdit"> <i class="far fa-eye"></i></a>
                                                <a href="http://" class="btn btn-sm btn-outline-primary">sync</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="inputPasienModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputPasienModalLabel">Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updatePasien" name="updatePasien" action="" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Register</label>
                                <input type="date" name="tanggal_register" id="tanggal_register" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No MR</label>
                                <input type="text" name="no_mr" id="no_mr" onkeypress="return hanyaAngka(event)" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" id="nik" onkeypress="return hanyaAngka(event)" name="nik" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pasien</label>
                                <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No BPJS</label>
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="no_bpjs" id="no_bpjs" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Pilih Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" name="no_hp" id="no_hp" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">kristen</option>
                                    <option value="Katholik">Katholik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Protestan">Protestan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Warga Negara</label>
                                <input type="text" name="warga_negara" id="warga_negara" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_kawin" id="status_kawin" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Lajang">Lajang</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kota</label>
                                <select name="kota" id="kota" class="form-control">
                                    <option value="">Pilih Kota</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode POS</label>
                                <input type="text" name="kode_pos" id="kode_pos" onkeypress="return hanyaAngka(event)" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>