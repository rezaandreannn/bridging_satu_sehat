<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the model
        $this->load->model('Pendaftaran_model');
        $this->load->model('Dokter_model');
    }

    public function index()
    {
        // filtered
        $tanggal = $this->input->get('tanggal');
        $kode_dokter = $this->input->get('kode_dokter');
        $status_rawat = $this->input->get('status_rawat');
        if (empty($tanggal)) {
            $tanggal = date('Y-m-d'); // Tanggal sekarang
        }
        if (empty($kode_dokter)) {
            $kode_dokter = '';
        }
        if (empty($status_rawat)) {
            $status_rawat = '';
        }

        // Panggil metode pada model untuk mengambil data berdasarkan filter
        $pendaftaran = $this->Pendaftaran_model->get_by_date($kode_dokter, $tanggal, $status_rawat);

        $data = array(
            'title' => "Pendaftaran",
            'pendaftarans' => $pendaftaran,
            'dokter_select' => $this->Dokter_model->get_select()
        );

        $this->load->view('content/kunjungan/pendaftaran/index', $data);
    }
}
