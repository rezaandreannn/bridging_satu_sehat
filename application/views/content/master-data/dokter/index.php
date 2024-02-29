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
            <a href="" class="btn btn-primary mb-1"><i class="fas fa-user-plus"></i> Add Data</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><?= isset($sub_title) ? $sub_title : ''  ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Kode Dokter</th>
                                            <th>Nama Dokter</th>
                                            <th>NIK</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($dokters as $dokter) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td>
                                                    <div class="badge badge-primary"><?= $dokter->kode_dokter ?> </div>
                                                </td>
                                                <td><?= ucwords(strtolower($dokter->nama_dokter)); ?></td>
                                                <td><?= $dokter->nik; ?></td>
                                                <td><?= $dokter->no_hp; ?></td>
                                                <td><?= $dokter->email; ?></td>
                                                <td>
                                                    <div class="badge badge-success">active</div>
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