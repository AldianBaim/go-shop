
<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model', 'products');
        $this->load->model('categories_model', 'categories');
    }


    public function index()
    {
        $data = [
            'title' => 'GoShop | Home',
            'titlePage' => 'Home',
            'categories' => $this->categories->getAllCategories(),
            'products'  => $this->products->getAllProduct(),
            'contentView' => 'homepage'
        ];

        $this->load->view('layout/frontend/wrapper', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'GoShop | Contact',
            'categories' => $this->categories->getAllCategories(),
            'titlePage' => 'Contact',
            'contentView' => 'contact'
        ];

        $this->load->view('layout/frontend/wrapper', $data);
    }

    public function category($id)
    {
        $category = $this->categories->getCategoryById($id);

        $data = [
            'title' => 'GoShop | Category',
            'titlePage' => 'Category : ' . $category->name,
            'categories' => $this->categories->getAllCategories(),
            'products'  => $this->products->getProductByIdCategory($id),
            'contentView' => 'product-category'
        ];

        $this->load->view('layout/frontend/wrapper', $data);
    }

    public function product_detail($id)
    {
        $product = $this->products->getProductById($id);

        $data = [
            'title' => 'GoShop | Product Detail',
            'titlePage' => 'Product Detail : ' . strtoupper($product->name),
            'product'   => $product,
            'categories' => $this->categories->getAllCategories(),
            'contentView' => 'product-detail'
        ];

        $this->load->view('layout/frontend/wrapper', $data);
    }

    private function _grandTotal()
    {
        $grandTotal = 0;
        $cart = $this->cart->contents();
        if ($cart) {
            foreach ($cart as $items) {
                $grandTotal = $grandTotal + $items['subtotal'];
            }
            return number_format($grandTotal, 0, ',', '.');
        } else {
            return "No item yet";
        }
    }

    public function checkout()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        $data = [
            'title' => 'GoShop | Category',
            'titlePage' => 'Checkout',
            'user'  => $this->session->fullname,
            'cart'  =>  $this->_grandTotal(),
            'contentView' => 'checkout'
        ];

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/frontend/wrapper', $data);
        } else {


            $data = [
                'fullname'          => $this->input->post('fullname'),
                'address'           => $this->input->post('address'),
                'delivery_service'  => $this->input->post('delivery_service'),
                'cart'              =>  $this->_grandTotal(),
                'payment_method'    => $this->input->post('payment_method')
            ];

            $this->session->set_userdata('fullname', $data['fullname']);
            $this->session->set_userdata('cart', $data['cart']);
            $this->cart->destroy();
            redirect('home');
        }
    }

    public function cart($id)
    {
        $product = $this->products->find($id);

        $data = [
            'id'    => $product->id,
            'qty'   => 1,
            'price' => $product->price,
            'name'  => $product->name
        ];

        $this->cart->insert($data);
        redirect('home');
    }

    public function cart_detail()
    {
        $data = [
            'title' => 'GoShop | Cart Detail',
            'titlePage' => 'Cart Detail',
            'user'  => $this->session->fullname,
            'contentView' => 'cart-detail'
        ];

        $this->load->view('layout/frontend/wrapper', $data);
    }

    public function cart_delete()
    {
        $this->cart->destroy();
        redirect('home');
    }
}

/* End of file Home.php */
