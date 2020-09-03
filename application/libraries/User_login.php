<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Users_model', 'users');
    }

    public function login($username, $password)
    {
        $check = $this->ci->users->login($username, $password);

        if ($check) {
            $fullname = $check->fullname;
            $email    = $check->email;
            $level    = $check->level_id;

            // Set Session
            $this->ci->session->set_userdata('fullname', $fullname);
            $this->ci->session->set_userdata('email', $email);
            $this->ci->session->set_userdata('level', $level);

            // Redirect Page
            redirect('admin');
        } else {
            $this->ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            Wrong username or password!', '</div>');
            redirect('auth');
        }
    }

    public function check_login()
    {
        if (!$this->ci->session->userdata('email')) {
            $this->ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            You must login  !', '</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        // Delete Session
        $this->ci->session->unset_userdata('fullname');
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('level');

        $this->ci->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        You have been logout!', '</div>');

        redirect('auth');
    }
}

/* End of file User_login.php */
