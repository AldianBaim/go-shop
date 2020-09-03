<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // Login User Authentication
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'GoShop | Login',
            ];

            $this->load->view('auth/login', $data);
        } else {
            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $this->user_login->login($email, $password);
        }
    }

    public function logout()
    {
        $this->user_login->logout();
    }
}

/* End of file Auth.php */
