<?php
class c_home
{
    public function index()
    {
        include('models/m_product.php');
        $m_product= new m_product();      
        $featured_products = $m_product -> getfeaturedProducts();
        $new_products = $m_product -> getNewProduct();

        $view = 'views/home/v_home.php';
        include('templates/client/layout.php');
    }
}