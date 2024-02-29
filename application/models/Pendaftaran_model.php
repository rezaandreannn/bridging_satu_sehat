<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    public function get_by_date($kode_dokter, $tanggal, $status_rawat)
    {
        $this->db->select('p.No_Reg as no_registrasi, rp.Nama_Pasien as nama_pasien, rp.HP2 as nik, p.No_MR as no_mr, p.Medis as status_rawat, d.Nama_Dokter as nama_dokter, r.NamaRekanan as nama_rekanan, a.Status as daftar_by, p.NamaUser as created_by');
        $this->db->from('PENDAFTARAN p');
        $this->db->join('REGISTER_PASIEN rp', 'rp.No_MR = p.No_MR', 'left');
        $this->db->join('ANTRIAN a', "a.No_MR = p.No_MR AND CONVERT(DATE, a.Tanggal) = CONVERT(DATE, '$tanggal')", 'left');
        $this->db->join('DOKTER d', 'd.Kode_Dokter = a.Dokter', 'left');
        $this->db->join('REKANAN r', 'r.KodeRekanan = p.KodeRekanan', 'left');
        $this->db->where('p.Tanggal', $tanggal);
        if ($kode_dokter) {
            $this->db->where('d.Kode_Dokter', $kode_dokter);
        }
        if ($status_rawat) {
            $this->db->where('p.Medis', $status_rawat);
        }
        $this->db->order_by('d.Nama_Dokter');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
