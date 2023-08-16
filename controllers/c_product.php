<?php
class c_product
{
    public function index()
    {
        include('models/m_product.php');
        $m_product= new m_product();

        include('models/m_category.php');
        $m_category = new m_category();
    
        $categories_type = $m_category->getCategoryType();
       
        $categories = $m_category->getCategory();

        //phân trang
        $search="";
        if(isset($_GET["search"])  && !empty($_GET["search"])) {
            $search=$_GET["search"];
        }
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $number_count = $m_product->get_count_search($search);
        $number_in_on_page = 12;
        $number_page = ceil($number_count / $number_in_on_page);
        $clear = $number_in_on_page * ($page - 1);

      
        $order = "";
        $order_by = "";
        $action = "";
        if(isset($_GET["order"]) && isset($_GET["action"])) {
            $order = $_GET["order"];
            $order_by = 'order by '.$order;
            $action = $_GET["action"];
        }

        if(!isset($_GET["id_category"])) {
            $products = $m_product->getProductBySearch($search, $number_in_on_page, $clear, $order_by, $action);
        } else {        
            $id_category = $_GET["id_category"];
            $products = $m_product->getProductByCateory($id_category, $search, $number_in_on_page, $clear, $order_by, $action);
        }

        $view = 'views/products/v_product.php';
        include('templates/client/layout.php');
    }
}  
