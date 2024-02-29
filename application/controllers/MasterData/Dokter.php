<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load the model
        $this->load->model('Dokter_model');
    }

    public function index()
    {
        $breadcrumbs = [
            'url' => 'kfjdkshfas'
        ];
        $data = array(
            'title' => "Practicioner",
            'sub_title' => 'Showing data is not null (NIK)',
            'dokters' => $this->Dokter_model->get(),
            'breadcrumbs' => $breadcrumbs
        );

        $this->load->view('content/master-data/dokter/index', $data);
    }
}
