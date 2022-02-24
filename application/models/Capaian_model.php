<?php

class Capaian_model extends CI_Model
{
    public function createCapaian($data)
    {
        $capaian = $this->db->insert('capaian',$data);
        return $capaian;
    }

    public function showCapaian()
    {
        // $this->db->order_by('id_capaian','DESC');
        $query = $this->db->get('v_capaian');        
        return $query;
    }

    public function showDashCapaian()
    {
        $this->db->select('*');
        $this->db->select_sum('capaian_vaksin');
        $this->db->group_by('jenis_vaksin');
        $query = $this->db->get('v_capaian');
        return $query;
    }

    public function showGrafik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select('jenis_vaksin');
        $this->db->select_sum('capaian_vaksin');
        $this->db->where("DATE_FORMAT(tgl_capaian,'%m')", date('m'));
        $this->db->group_by('jenis_vaksin');
        $query = $this->db->get('v_capaian');        
        return $query;
    }

    public function showHarian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select('jenis_vaksin');
        $this->db->select_sum('capaian_vaksin');
        $this->db->where("tgl_capaian", date('Y-m-d'));
        $this->db->group_by('jenis_vaksin');
        $query = $this->db->get('v_capaian');        
        return $query;
    }

    public function filterCapaian($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->select_sum('capaian_vaksin');
        $this->db->where('tgl_capaian <=', $tgl2);
        $this->db->where('tgl_capaian <=', $tgl2);
        $this->db->group_by('jenis_vaksin');
        $query = $this->db->get('v_capaian');        
        return $query;
    }

    public function tambahCapaian($id, $jml)
    {
        $query = $this->db->query("UPDATE capaian SET capaian_vaksin=capaian_vaksin+$jml WHERE id_capaian ='$id'");
        return $query;
    }

    public function detailCapaian()
    {
        $this->db->order_by('id_capaian','DESC');
        $this->db->limit(1);
        $query = $this->db->get('v_capaian');        
        return $query;
    }

    public function editCapaian($id,$data)
    {
        $this->db->where('id_capaian',$id);
        $this->db->update('capaian',$data);
        return true;
    }

    public function deleteCapaian($id)
    {
        $this->db->where('id_capaian',$id);
        $this->db->delete('capaian');
        return true;
    }

}
