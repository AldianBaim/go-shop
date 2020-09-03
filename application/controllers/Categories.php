<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('categories_model', 'categories');
    }

    public function index()
    {
        $this->user_login->check_login();

        $data = [
            'title'       => 'GoShop | Category',
            'titlePage'   => 'Data Category',
            'categories'  => $this->categories->getAllCategories(),
            'contentView' => 'categories/index'
        ];

        $this->load->view('layout/backend/wrapper', $data);
    }

    public function form($id = null)
    {
        // Find category by ID
        $category = $this->categories->getCategoryById($id);

        // set validation
        $this->form_validation->set_rules('name', 'Category Name', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data = [
                'title'       => 'GoShop | Form Category',
                'titlePage'   => 'Form Category',
                'category'    => $category,
                'contentView' => 'categories/form'
            ];
        } else {
            // get data from POST
            $data = [
                'name' => $this->input->post('name'),
            ];

            // If ID not exist => insert
            if ($id == null) {
                $this->categories->insert($data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        New category has been added.',
                    '</div>'
                );
                redirect('categories');
            } else {
                // If ID exist => update
                $this->categories->update($id, $data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        Category : <b>' . $category->name . '</b> has been updated.',
                    '</div>'
                );
                redirect('categories');
            }
        }

        $this->load->view('layout/backend/wrapper', $data);
    }

    public function delete($id)
    {
        $category = $this->categories->getCategoryById($id);

        $this->categories->delete($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Category : <b>' . $category->name . '</b> has been deleted.',
            '</div>'
        );
        redirect('categories');
    }
}

/* End of file Categories.php */
