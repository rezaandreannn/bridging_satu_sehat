<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{
    public function get_last_1000()
    {
        $this->db->select("NOID as id, No_MR AS no_mr, Nama_Pasien AS nama_pasien, Tgl_Register AS tanggal_register, No_Identitas AS no_bpjs, HP2 AS nik, COALESCE(Telp_Rumah, HP1) as no_hp,
        Tgl_Lahir AS tanggal_lahir, Jenis_Kelamin AS jenis_kelamin, Agama AS agama, Warga_Negara AS warga_negara, Alamat AS alamat, Provinsi AS provinsi, Kota AS kota, Kode_Pos AS kode_pos");
        $this->db->from('REGISTER_PASIEN rp');
        $this->db->order_by('Tgl_Register', 'DESC');
        $this->db->limit('1000');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_select($no_mr, $no_bpjs, $nik, $nama)
    {
        $this->db->select("NOID as id, No_MR AS no_mr, Nama_Pasien AS nama_pasien, No_Identitas AS no_bpjs, HP2 AS nik,
        COALESCE(Telp_Rumah, HP1) as no_hp, Tgl_Lahir AS tanggal_lahir, Jenis_Kelamin AS jenis_kelamin");
        $this->db->from('REGISTER_PASIEN rp');
        if ($no_mr) {
            $this->db->where('No_MR', $no_mr);
        }
        if ($no_bpjs) {
            $this->db->where('No_Identitas', $no_bpjs);
        }
        if ($nik) {
            $this->db->where('HP2', $nik);
        }
        if ($nama) {
            $this->db->like('Nama_Pasien', $nama);
        }
        $this->db->order_by('Tgl_Register', 'DESC');
        $this->db->limit('1000');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_id_pasien($id)
    {
        $this->db->select("NOID as id, No_MR AS no_mr, Nama_Pasien AS nama_pasien, Tgl_Register AS tanggal_register, No_Identitas AS no_bpjs, HP2 AS nik, COALESCE(Telp_Rumah, HP1) as no_hp, Tgl_Lahir AS tanggal_lahir, Jenis_Kelamin AS jenis_kelamin, Agama AS agama, Warga_Negara AS warga_negara, Pekerjaan AS pekerjaan, Status_Nikah AS status_kawin, Alamat AS alamat, Provinsi AS provinsi, Kota AS kota, Kode_Pos AS kode_pos");
        $this->db->from('REGISTER_PASIEN rp');
        $this->db->where('NOID', $id);
        $query = $this->db->get();
        return $query->row();
    }
}
