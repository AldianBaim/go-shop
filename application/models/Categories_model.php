<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Categories_model extends CI_Model
{

    public function getAllCategories()
    {
        $this->db->where('record_status !=', 'DELETED');
        $this->db->select('*');
        $this->db->from('categories');
        return $this->db->get()->result();
    }

    public function getCategoryById($id)
    {
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->from('categories');
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $this->db->insert('categories', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->set($data);
        $this->db->update('categories');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->set('record_status', 'DELETED');
        $this->db->update('categories');
    }
}

/* End of file Categories_model.php */
