<?php

class Stok_model extends CI_Model
{
    public function createStok($data)
    {
        $stok = $this->db->insert('stok',$data);
        return $stok;
    }

    public function showStok()
    {
        // $this->db->where_not_in('jumlah', array('0'));
        $this->db->order_by('id_stok','DESC');
        $query = $this->db->get('stok');        
        return $query;
    }

    public function showDataStok()
    {
        $this->db->where_not_in('jumlah', array('0'));
        $this->db->order_by('id_stok','DESC');
        $query = $this->db->get('stok');        
        return $query;
    }

    public function editStok($id,$data)
    {
        $this->db->where('id_stok',$id);
        $this->db->update('stok',$data);
        return true;
    }

    public function kurangStok($id, $jml)
    {
        $query = $this->db->query("UPDATE stok SET jumlah=jumlah-$jml WHERE id_stok='$id'");
        return $query;
    }

    public function deleteStok($id)
    {
        $this->db->where('id_stok',$id);
        $this->db->delete('stok');
        return true;
    }

    function total_sum($column_name,  $where, $table_name)
    {
        $this->db->select_sum($column_name);
        // If Where is not NULL
        if(!empty($where) && count($where) > 0 )
        {
           $this->db->where($where);
        }

        $this->db->from($table_name);
        // Return Count Column
        return $this->db->get()->row($column_name);//table_name array sub 0
    }

}
