<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{

    public function getAllProduct()
    {
        $this->db->where('products.record_status != ', 'DELETED');
        $this->db->select('products.*, categories.name as category');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        return $this->db->get()->result();
    }

    public function getProductById($id)
    {
        $this->db->where('products.id', $id);
        $this->db->select('products.*, categories.name as category');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        return $this->db->get()->row();
    }

    public function getProductByIdCategory($id)
    {
        $this->db->where('categories.id', $id);
        $this->db->select('products.*, categories.name as category');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        $this->db->insert('products', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->set($data);
        $this->db->update('products');
    }

    public function find($id)
    {
        $this->db->where('id', $id);
        $this->db->select('*');
        $this->db->limit(1);
        $this->db->from('products');
        return $this->db->get()->row();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->set('record_status', 'DELETED');
        $this->db->update('products');
    }
}

/* End of file Products_model.php */
