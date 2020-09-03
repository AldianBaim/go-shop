
<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $this->user_login->check_login();

        $data = [
            'title' => 'GoShop | Admin',
            'titlePage' => 'Dashboard Admin',
            'contentView' => 'admin/index'
        ];

        $this->load->view('layout/backend/wrapper', $data);
    }

    public function logout()
    {
        $this->user_login->logout();
    }
}

/* End of file Home.php */
