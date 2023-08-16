<?php
include_once 'models/m_login.php';

include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

@session_start();
class c_login
{
    public function index()
    {
        include('views/login_register/v_login.php');
    }
    public function check_login()
    {
        if (isset($_POST['btn_login'])) {
            if (isset($_POST['email']) && isset($_POST['current-password'])) {
                $email = $_POST['email'];
                $password = $_POST['current-password'];
                $this->save_login_session($email, $password);
                if (isset($_SESSION['user_id'])) {
                    header('location:?url=home');
                } else {
                    $_SESSION['error_login_user'] = "Sai thông tin đăng nhập";
                    header('location:?url=login.php');
                    echo 'Đăng nhập thất bại';
                }
            } else {
                $_SESSION['error_login_user'] = "Chưa nhập đủ dữ liệu";
                header('location:?url=login.php');
                echo 'Đăng nhập thất bại';
            }
        }
    }
    public function save_login_session($email, $password)
    {
        $m_login = new m_login();
        $user = $m_login->read_check_login($email, $password);
        if (!empty($user)) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name_customer;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_picture'] = $user->picture;
            $_SESSION['user_role'] = $user->role;
           
        }
    }
    public function logOut()
    {
        session_destroy();
        header('location:?url=login.php');
    }
  
    public function forget_password()
    {
        $m_login = new m_login();
        if (isset($_POST['forget_password'])) {
            $email = $_POST['email'];
         
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array();
            $alphaLength = strlen($alphabet) - 1; 
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            echo (implode($pass)); 
            $forget_password = implode($pass);
            $user = $m_login->forget_password($email);
            $email_user = $user->email; 
            $name_user = $user->name_customer; 

            // php mailer
            if (!empty($user)) {
                $mail = new PHPMailer(true);
                try {
                    
                    $mail->CharSet = "UTF-8";
                    $mail->Encoding = 'base64';
                    $mail->SMTPDebug = 0;                                 // bật tính năng gửi success or faild thì vẫn show thông tin mail để ta cấu hình
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'xoxo@gmail.com';                 // SMTP username
                    $mail->Password = 'wraezcmsphxiaouc';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                 
                    $mail->setFrom('xoxo@gmail.com', 'XOXO Shop');
                    $mail->addAddress($email_user, $name_user);           // Name is optional
                    $mail->addCC('xoxo@gmail.com');

                
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Bạn muốn đặt lại mật khẩu?';

                    $body = '';
                    $body .= '<p>Xin chào,</p>' . $name_user;
                    $body .= '<p>Bạn đã yêu cầu đặt lại mật khẩu của tài khoản XOXO Shop?</p>';
                    $body .= '<p>Mật khẩu mới của bạn là: ' . $forget_password . '</p>';
                    // $body .= '<p>Nếu bạn đã yêu cầu đặt lại mật khẩu, hãy ấn vào <a href="change_passowrd.php"><h3 style="color: green;">tại đây</h3></a> để tạo mật khẩu mới để vào tài khoản XOXO Shop của bạn.</p>';
                    // $body .= '<p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>';
                    // $body .= 'Nếu bạn gặp phải bất cứ vấn đề nào khi đăng nhập vào tài khoản XOXO Shop, vui lòng gửi mail đến địa chỉ: xoxo@gmail.com</pre>';
                    $body .= '<p>Trân trọng.</p>';

                    // $mail->Body    = 'Mat khau moi cua ban la: ' . $forget_password;
                    $mail->Body = $body;

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            }
            $m_login->update_password($email, $forget_password);
            header('location:?url=login.php');
        }
        include('views/login_register/v_forget_password.php');
    }
}