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
