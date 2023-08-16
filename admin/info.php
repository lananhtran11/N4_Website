<?php

@session_start();
include('controllers/c_info.php');
if (isset($_SESSION['admin_name'])) {
    $info = new c_info();
    $info->index();
} else {
    header('location : index.php');
    
}