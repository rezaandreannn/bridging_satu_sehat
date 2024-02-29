<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dist/index">SIMRS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dist/index">SRS</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/index_0">General Dashboard</a></li>
          <li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/index">Ecommerce Dashboard</a></li>
        </ul>
      </li>
      <li class="menu-header">rsumm</li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'pasien' || $this->uri->segment(2) == 'dokter' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Master Data</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'pasien' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>master-data/pasien">Pasien</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'dokter' ? 'active' : ''; ?>"><a class="nav-link " href="<?php echo base_url(); ?>master-data/dokter">Dokter</a></li>
        </ul>
      </li>

      <li class="dropdown <?php echo $this->uri->segment(2) == 'antrean' || $this->uri->segment(2) == 'pendaftaran'  ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Kunjungan</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'pendaftaran' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kunjungan/pendaftaran">Pendaftaran</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'antrean' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>kunjungan/antrean">Antrean</a></li>
        </ul>
      </li>

      <li class="menu-header">satu sehat</li>
      <li class="dropdown <?php echo $this->uri->segment(2) == 'pasien' || $this->uri->segment(2) == 'dokter' ? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Master Data</span></a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'components_avatar' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>dist/components_avatar">Organization</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'components_avatar' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>dist/components_avatar">Patient</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'components_avatar' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>dist/components_avatar">Practicioner</a></li>
          <li class="<?php echo $this->uri->segment(2) == 'components_avatar' ? 'active' : ''; ?>"><a class="nav-link beep beep-sidebar" href="<?php echo base_url(); ?>dist/components_avatar">Location</a></li>
        </ul>
      </li>
  </aside>
</div>