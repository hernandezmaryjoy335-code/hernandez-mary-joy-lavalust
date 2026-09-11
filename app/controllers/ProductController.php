<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
    }

    public function before_action()
    {
        if (!$this->session->userdata('authenticated')) {
            $this->response->redirect(site_url('login'));
        }
    }

    public function index()
    {
        $this->call->view('products/index', [
            'products' => $this->ProductModel->get_all_products(),
            'username' => $this->session->userdata('username'),
            'success'  => $this->session->flashdata('success'),
            'error'    => $this->session->flashdata('error')
        ]);
    }

    public function create()
    {
        $this->call->view('products/create', [
            'error' => $this->session->flashdata('error')
        ]);
    }

    public function store()
    {
        $productName = trim(
            (string) $this->request->post('product_name', '')
        );

        $description = trim(
            (string) $this->request->post('description', '')
        );

        $price = $this->request->post('price');
        $quantity = $this->request->post('quantity');

        if (
            $productName === '' ||
            !is_numeric($price) ||
            !is_numeric($quantity) ||
            (float) $price < 0 ||
            (int) $quantity < 0
        ) {
            $this->session->set_flashdata(
                'error',
                'Please provide valid product information.'
            );

            $this->response->redirect(
                site_url('products/create')
            );
        }

        $this->ProductModel->create_product([
            'product_name' => $productName,
            'description'  => $description,
            'price'        => number_format(
                (float) $price,
                2,
                '.',
                ''
            ),
            'quantity'     => (int) $quantity
        ]);

        $this->session->set_flashdata(
            'success',
            'Product added successfully.'
        );

        $this->response->redirect(site_url('products'));
    }

    public function edit($id)
    {
        $product = $this->ProductModel->get_product($id);

        if (!$product) {
            $this->session->set_flashdata(
                'error',
                'Product not found.'
            );

            $this->response->redirect(site_url('products'));
        }

        $this->call->view('products/edit', [
            'product' => $product
        ]);
    }

    public function update($id)
    {
        if (!$this->ProductModel->get_product($id)) {
            $this->session->set_flashdata(
                'error',
                'Product not found.'
            );

            $this->response->redirect(site_url('products'));
        }

        $productName = trim(
            (string) $this->request->post('product_name', '')
        );

        $description = trim(
            (string) $this->request->post('description', '')
        );

        $price = $this->request->post('price');
        $quantity = $this->request->post('quantity');

        if (
            $productName === '' ||
            !is_numeric($price) ||
            !is_numeric($quantity) ||
            (float) $price < 0 ||
            (int) $quantity < 0
        ) {
            $this->session->set_flashdata(
                'error',
                'Please provide valid product information.'
            );

            $this->response->redirect(
                site_url('products/edit/' . (int) $id)
            );
        }

        $this->ProductModel->update_product($id, [
            'product_name' => $productName,
            'description'  => $description,
            'price'        => number_format(
                (float) $price,
                2,
                '.',
                ''
            ),
            'quantity'     => (int) $quantity
        ]);

        $this->session->set_flashdata(
            'success',
            'Product updated successfully.'
        );

        $this->response->redirect(site_url('products'));
    }

    public function delete($id)
    {
        if (!$this->ProductModel->get_product($id)) {
            $this->session->set_flashdata(
                'error',
                'Product not found.'
            );

            $this->response->redirect(site_url('products'));
        }

        $this->ProductModel->delete_product($id);

        $this->session->set_flashdata(
            'success',
            'Product deleted successfully.'
        );

        $this->response->redirect(site_url('products'));
    }
}
