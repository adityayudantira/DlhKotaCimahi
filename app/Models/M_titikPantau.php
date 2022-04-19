<?php

namespace App\Models;

use CodeIgniter\Model;

class M_titikPantau extends Model {

    public function get_all_data()
    {
        return $this->db->table('tblTitikPantau')->get()->getResultArray();
    }    

    public function insert_data($data) 
    {
        return $this->db->table('tbltitikpantau')->insert($data);
    }

    public function detail($id)
    {
        return $this->db->table('tbltitikpantau')->where('id', $id)->get()->getRowArray();
    }

    public function update_data($data, $id)
    {
        return $this->db->table('tbltitikpantau')->update($data,array('id' => $id));
    }

    public function delete_data($id)
    {
        return $this->db->table('tbltitikpantau')->delete(array('id' => $id));
    }
}

/* End of file M_titikPantau.php */
