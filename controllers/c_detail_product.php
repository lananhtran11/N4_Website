<?php
    session_start();
class c_detail
{
    public function index()
    {
        if(!isset($_GET['id_product'])) {
            header("location:?url=home");
        }
        
        include('models/m_detail_product.php');
        $m_detail_product= new m_detail_product();
       
        $m_detail_product -> inCreaseView();
            
        $detail_product = $m_detail_product -> getDetailProduct();
        if(empty($detail_product)) {
            header('location: ?url=home');
        }
     
        $id_category = $detail_product->id_category;
        $suggested_products = $m_detail_product -> SuggestedProduct($id_category);

        include('models/m_comment.php');
        $m_comment = new m_comment();

       
        $comments = $m_comment -> getComment();

        //Lấy ra người dùng đăng nhập hiện tại
        if(isset($_SESSION["user_id"])) {
            $m_customer = new m_customer();
            $user = $m_customer-> getCustomerById($_SESSION["user_id"]);
        }

        $quantity = isset($_SESSION['carts'][$detail_product->id]) ? ($detail_product->quantity - $_SESSION['carts'][$detail_product->id]['quantity']) : $detail_product->quantity;

        $view = 'views/detail_product/v_detail.php';
        include('templates/client/layout.php');
    }
    public function insertComment() {
       
        if(isset($_POST["btn_submit"])) {
            include('models/m_comment.php');
            $m_comment = new m_comment();
            $id_product = $_POST["id_product"];
            $id_person = $_SESSION["user_id"];
            $content = $_POST["comment"];

            $m_comment -> insertComment($id_person,$id_product,$content);

            header("location:?url=detail.php&id_product=$id_product");
        }
    }
}