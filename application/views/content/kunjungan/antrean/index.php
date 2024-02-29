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
            <form id="filterForm" action="" method="get">
                <div class="row">
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tanggal">Tanggal <small>(kosongkan jika filter tanggal saat ini)</small></label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $this->input->get('tanggal') ?>">
                        </div>
                    </div>
                    <div class="col-md-4 filter-buttons">
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
                            <h4>Daftar <?= isset($title) ? $title : ''  ?></h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Nama Pasien</th>
                                            <th>No MR</th>
                                            <th>No HP</th>
                                            <th>No Antrean</th>
                                            <th>Tanggal</th>
                                            <th>Jenis Pasien</th>
                                            <th>Daftar Dari</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($this->input->get('kode_dokter'))) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($antreans as $antrean) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= ucwords(strtolower($antrean->nama_pasien)); ?></td>
                                                    <td><?= $antrean->no_mr; ?></td>
                                                    <td><?= $antrean->no_hp; ?></td>
                                                    <td>
                                                        <div class="badge badge-success"><?= $antrean->nomor_antrean; ?></div>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?= date('d M, Y', strtotime($antrean->tanggal)) ?>
                                                    </td>
                                                    <td>
                                                        <?= $antrean->jenis_pasien; ?>
                                                    </td>
                                                    <td><?= $antrean->created_by; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
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