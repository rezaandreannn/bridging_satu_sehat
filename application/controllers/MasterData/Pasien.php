<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the model
        $this->load->model('Pasien_model');
    }

    public function index()
    {
        // filtered
        $no_mr = $this->input->get('no_mr');
        $no_bpjs = $this->input->get('no_bpjs');
        $nik = $this->input->get('nik');
        $nama = $this->input->get('nama');

        if (empty($no_mr)) {
            $no_mr = ''; // Input No MR
        }
        if (empty($no_bpjs)) {
            $no_bpjs = ''; // Input BPJS
        }
        if (empty($nik)) {
            $nik = ''; // Input NIK
        }
        if (empty($nama)) {
            $nama = ''; // Input Nama
        }

        // Panggil metode pada model untuk mengambil data berdasarkan filter
        $filters = $this->Pasien_model->get_select($no_mr, $no_bpjs, $nik, $nama);;
        $data = array(
            'title' => "Master Patient Index (MPI)",
            'sub_title' => 'Show ' . count($filters) . ' Data',
            'filters' => $filters,
        );

        $this->load->view('content/master-data/pasien/index', $data);
    }

    public function edit($id)
    {

        // Fetch patient data by ID
        $data['pasien'] = $this->Pasien_model->get_by_id_pasien($id);

        // Return JSON response
        if ($data) {
            $response['status'] = 'success';
            $response['data'] = $data;
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Patient not found';
        }
        echo json_encode($response);
    }
}
