<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_model extends CI_Model
{
    public function get()
    {
        $this->db->select("Kode_Dokter as kode_dokter, Jenis_Profesi as jenis_profesi, Spesialis as spesialis, Nama_Dokter as nama_dokter, Jenis_Kelamin as jenis_kelamin, Tgl_Lahir as tgl_lahir, Agama as agama, Email as email, No_KTP as nik, Alamat as alamat, Kota as kota, Provinsi as provinsi, Kode_Pos as kode_pos, 
        COALESCE(NULLIF(HP1, ''), Telp_Rumah) as no_hp, 
        Pemeriksaan as pemeriksaan, Visite as visit, Konsul as konsul, Tindakan as tindakan, Lain as lain");
        $this->db->from('DOKTER');
        $this->db->like('Jenis_Profesi', 'dokter');
        $this->db->where('Nama_Dokter !=', '-');
        $this->db->where('No_KTP !=', '');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function get_select()
    {
        $this->db->select('KODE_DOKTER as kode_dokter, NAMA_DOKTER as nama_dokter');
        $this->db->from('DOKTER');
        $this->db->where("(JENIS_PROFESI = 'DOKTER UMUM' OR JENIS_PROFESI = 'DOKTER SPESIALIS' OR Spesialis = 'FISIOTERAPI')");
        $this->db->where_not_in('KODE_DOKTER', array('140s', 'TM140'));
        $this->db->order_by('NAMA_DOKTER', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
