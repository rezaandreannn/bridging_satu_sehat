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
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <form id="filterForm" action="" action="" method="get">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode_dokter">Pilih Dokter</label>
                            <select class="form-control select2" id="kode_dokter" name="kode_dokter">
                                <option value="" selected disabled>-- silahkan pillih --</option>
                                <?php foreach ($dokter_select as $dokter) : ?>
                                    <option value="<?= $dokter->kode_dokter; ?>" <?php echo ($this->input->get('kode_dokter') == $dokter->kode_dokter) ? 'selected' : ''; ?>><?= $dokter->nama_dokter; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tanggal">Tanggal <small>(kosongkan jika filter tanggal saat ini)</small></label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $this->input->get('tanggal') ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status_rawat">Status Rawat </label>
                            <select class="form-control selectric" id="status_rawat" name="status_rawat">
                                <option value="" selected disabled>-- silahkan pillih --</option>
                                <option value="RAWAT JALAN" <?php echo ($this->input->get('status_rawat') == 'RAWAT JALAN') ? 'selected' : ''; ?>>Rawat Jalan</option>
                                <option value="RAWAT INAP" <?php echo ($this->input->get('status_rawat') == 'RAWAT INAP') ? 'selected' : ''; ?>>Rawat Inap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 filter-buttons">
                        <div class="form-group d-flex align-items-end">
                            <button type="submit" class="btn btn-primary" style="margin-top: 30px;"><i class="fas fa-filter"></i> Filter</button>
                            <button type="button" class="btn btn-danger" style="margin-top: 30px;" onclick="resetForm()"><i class="fas fa-sync"></i> Reset</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data <?= isset($title) ? $title : ''  ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>No Reg</th>
                                            <th>Nama Pasien</th>
                                            <th>NIK</th>
                                            <th>No MR</th>
                                            <th>Status Rawat</th>
                                            <th>Dokter</th>
                                            <th>Rekanan</th>
                                            <th>Daftar Dari</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pendaftarans as $pendaftaran) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $pendaftaran->no_registrasi; ?></td>
                                                <td><?= ucwords(strtolower($pendaftaran->nama_pasien)); ?></td>
                                                <td><?= $pendaftaran->nik; ?></td>
                                                <td><?= $pendaftaran->no_mr; ?></td>
                                                <td>
                                                    <?php if ($pendaftaran->status_rawat == 'RAWAT JALAN') : ?>
                                                        <div class="badge badge-success">RJ</div>
                                                    <?php else : ?>
                                                        <div class="badge badge-info">RI</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $pendaftaran->nama_dokter ?> </td>
                                                <td>
                                                    <?php if (strpos($pendaftaran->nama_rekanan, 'REGULER/PRIBADI/UMUM') !== false) : ?>
                                                        UMUM
                                                    <?php else : ?>
                                                        <?= $pendaftaran->nama_rekanan; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $pendaftaran->daftar_by; ?></td>
                                                <td><?= ucwords(strtolower($pendaftaran->created_by)); ?></td>
                                                <td width="10%">
                                                    <a href="http://" class="btn btn-sm btn-outline-primary"><i class="far fa-eye"></i></a>
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
<?php $this->load->view('dist/_partials/footer'); ?>