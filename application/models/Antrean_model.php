<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrean_model extends CI_Model
{
    public function get_by_dokter_and_tanggal($kode_dokter, $tanggal)
    {
        $this->db->select('a.No_Ponsel as no_hp, a.Nomor as nomor_antrean, rp.Nama_Pasien as nama_pasien, a.No_MR as no_mr, a.Tanggal as tanggal, a.Jenis as jenis_pasien, a.Status as created_by');
        $this->db->from('ANTRIAN a');
        $this->db->join('REGISTER_PASIEN rp', 'rp.No_MR = a.No_MR');
        if ($kode_dokter) {
            $this->db->where('a.Dokter', $kode_dokter);
        }
        if ($tanggal) {
            $this->db->where('a.Tanggal', $tanggal);
        }
        $this->db->order_by('nomor', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
