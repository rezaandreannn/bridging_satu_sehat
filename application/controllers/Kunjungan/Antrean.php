<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrean extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the model
        $this->load->model('Antrean_model');
        $this->load->model('Dokter_model');
    }

    public function index()
    {
        // filtered
        $kode_dokter = $this->input->get('kode_dokter');
        $tanggal = $this->input->get('tanggal');

        if (empty($tanggal)) {
            $tanggal = date('Y-m-d'); // Tanggal sekarang
        }

        if (empty($kode_dokter)) {
            $kode_dokter = '1'; // default 1
        }

        // Panggil metode pada model untuk mengambil data berdasarkan filter
        if ($kode_dokter || $tanggal) {
            $antrean = $this->Antrean_model->get_by_dokter_and_tanggal($kode_dokter, $tanggal);
        }

        $data = array(
            'title' => "Antrean",
            'antreans' => $antrean,
            'dokter_select' => $this->Dokter_model->get_select()
        );

        $this->load->view('content/kunjungan/antrean/index', $data);
    }
}
