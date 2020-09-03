<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function login($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get()->row();
    }

    public function getAllUser()
    {
        $this->db->where('record_status !=', 'INACTIVE');
        $this->db->select('*');
        $this->db->from('users');
        return $this->db->get()->result();
    }

    public function getUserById($id)
    {
        $this->db->where('record_status !=', 'INACTIVE');
        $this->db->where('users.id', $id);
        $this->db->select('users.*, user_role.role');
        $this->db->from('users');
        $this->db->join('user_role', 'user_role.id = users.role_id', 'left');
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->set($data);
        $this->db->update('users');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->set('record_status', 'INACTIVE');
        $this->db->update('users');
    }
}

/* End of file Users_model.php */
