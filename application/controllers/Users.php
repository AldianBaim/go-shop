<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model', 'users');
    }

    // List all your items
    public function index()
    {
        $this->user_login->check_login();

        $data = [
            'title'       => 'GoShop | User',
            'titlePage'   => 'Data User',
            'users'       => $this->users->getAllUser(),
            'contentView' => 'user/index'
        ];

        $this->load->view('layout/backend/wrapper', $data);
    }

    // Form add 
    public function add($id = null)
    {
        // set validation
        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[10]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        //insert process

        if ($this->form_validation->run() == false) {
            $data = [
                'title'       => 'GoShop | Add User',
                'titlePage'   => 'Add User',
                'user'        => $this->users->getUserById($id),
                'contentView' => 'user/form-add'
            ];

            $this->load->view('layout/backend/wrapper', $data);
        } else {
            // get data from POST
            $data = [
                'fullname' => $this->input->post('fullname'),
                'email'    => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role_id'  => $this->input->post('role_id'),
                'date_created' => date('Y-m-d')
            ];

            $this->users->insert($data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    New user has been added.',
                '</div>'
            );
            redirect('users');
        }
    }

    public function edit($id)
    {
        // set validation
        $this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data = [
                'title'       => 'GoShop | Edit User',
                'titlePage'   => 'Edit User',
                'user'        => $this->users->getUserById($id),
                'contentView' => 'user/form-edit'
            ];

            $this->load->view('layout/backend/wrapper', $data);
        } else {
            // get data from POST
            $user = $this->users->getUserById($id);
            $data = [
                'fullname' => $this->input->post('fullname'),
                'email'    => $this->input->post('email'),
                'role_id'  => $this->input->post('role_id'),
                'date_created' => date('Y-m-d')
            ];
            $this->users->update($id, $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    User : <b>' . $user->fullname . '</b> has been updated.',
                '</div>'
            );
            redirect('users');
        }
    }

    public function detail($id)
    {
        $data = [
            'title'       => 'GoShop | Detail User',
            'titlePage'   => 'Detail User',
            'user'        => $this->users->getUserById($id),
            'contentView' => 'user/detail'
        ];

        $this->load->view('layout/backend/wrapper', $data);
    }


    //Delete one item
    public function delete($id)
    {
        $user = $this->users->getUserById($id);
        $this->users->delete($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                User : <b>' . $user->fullname . '</b> has been deleted.',
            '</div>'
        );
        redirect('users');
    }
}

/* End of file Users.php */
