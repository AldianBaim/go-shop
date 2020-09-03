<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model', 'products');
        $this->load->model('categories_model', 'categories');
    }

    public function index()
    {
        $this->user_login->check_login();

        $data = [
            'title'       => 'GoShop | Product',
            'titlePage'   => 'Data Product',
            'products'    => $this->products->getAllProduct(),
            'contentView' => 'products/index'
        ];

        $this->load->view('layout/backend/wrapper', $data);
    }

    public function form($id = null)
    {
        // Find product by ID
        $product = $this->products->getProductById($id);

        // set validation
        $this->form_validation->set_rules('name', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data = [
                'title'       => 'GoShop | Form Product',
                'titlePage'   => 'Form Product',
                'categories'  => $this->categories->getAllCategories(),
                'product'     => $product,
                'contentView' => 'products/form'
            ];
        } else {
            // Image process
            $config['upload_path'] = './assets/image/product/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '2000';

            $this->upload->initialize($config);

            $upload_data = [
                'uploads' => $this->upload->data()
            ];
            $config['image_library'] = 'gd2';
            $config['source_image']  = './assets/image/product/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            // If image exist
            if (!$this->upload->do_upload('image')) {
                // get data product from POST with no image
                $data = [
                    'name'        => $this->input->post('name'),
                    'category_id' => $this->input->post('category_id'),
                    'price'       => $this->input->post('price'),
                    'description' => $this->input->post('description'),
                ];

                // If ID not exist => insert
                if ($id) {
                    $this->products->update($id, $data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        Products : <b>' . $data['name'] . '</b> has been updated.',
                        '</div>'
                    );
                    redirect('products');
                } else {
                    echo "error";
                }
            } else {

                // get data product from POST
                $data = [
                    'name'        => $this->input->post('name'),
                    'category_id' => $this->input->post('category_id'),
                    'price'       => $this->input->post('price'),
                    'description' => $this->input->post('description'),
                    'image'       => $upload_data['uploads']['file_name']
                ];

                var_dump($data);
                exit;
                // If ID not exist => insert
                if ($id == null) {
                    $this->products->insert($data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        New products : <b>' . $data['name'] . '</b> has been added.',
                        '</div>'
                    );
                    redirect('products');
                } else {
                    // If ID exist => update
                    $this->products->update($id, $data);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        Product : <b>' . $data['name'] . '</b> has been updated.',
                        '</div>'
                    );
                    redirect('products');
                }
            }
        }

        $this->load->view('layout/backend/wrapper', $data);
    }

    public function detail($id)
    {
        $this->user_login->check_login();

        $data = [
            'title'       => 'GoShop | Product Detail',
            'titlePage'   => 'Product Detail',
            'product'     => $this->products->getProductById($id),
            'contentView' => 'products/detail'
        ];

        $this->load->view('layout/backend/wrapper', $data);
    }

    public function delete($id)
    {
        $product = $this->products->getProductById($id);

        //delete with file image in folder
        if ($product->image) {
            unlink('./assets/image/product/' . $product->image);
        }

        $this->products->delete($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Product : <b>' . $product->name . '</b> has been deleted.',
            '</div>'
        );
        redirect('products');
    }
}

/* End of file Products.php */
