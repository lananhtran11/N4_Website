<div class="info__container">

    <aside class="info__aside">
        <div class="info__aside-wrap-box">
         
            <div class="info__aside-header">
                <div class="info__Avatar">
                    <img src="<?php if($user->picture == "") { echo "public/layout/images/no-image.png"; } else { echo "admin/public/front-end/images/customer/$user->picture"; }?>"
                        alt="">
                </div>
                <div class="info__Name-phone-number">
                    <h4><?php echo $user->name_customer?></h4>
                    <span>+ <?php echo $user->phone_number?></span>
                </div>
            </div>
      
            <div class="info__aside-main">
          
                <ul class="info__list-option">
                    <li class="<?php if(!isset($_GET['checkbill'])) { echo "active"; }?>"><i class="fa-regular fa-id-badge"></i> Hồ Sơ</li>
                    <li><i class="fa-sharp fa-solid fa-money-check-dollar"></i> Ngân Hàng</li>
                    <li><i class="fa-solid fa-map-location-dot"></i> Địa Chỉ</li>
                    <li><i class="fa-solid fa-user-lock"></i> Đổi Mật Khẩu</li>
                    <li class="<?php if(isset($_GET['checkbill'])) { echo 'active'; }?>"><i class="fa-solid fa-file-invoice-dollar"></i> Đơn Mua</li>
                    <li><i class="fa-sharp fa-solid fa-bell"></i> Thông báo</li>
                </ul>
            </div>
        </div>
    </aside>
 
    <main class="info__main-content">
        <div class="info__main-wrap-box">
          
            <div class="info__main-infomation">
            
                <h2>Hồ sơ của tôi</h2>
                <h5>Quản lý thông tin hồ sơ để bảo mật tài khoản</h5>
               
                <div class="info__content-box">
                    <form action="?url=change_info.php" method="POST" enctype="multipart/form-data">
                        
                        <input type="text" name="current_phone_number" value="<?php echo $user->phone_number?>"
                            id="phone_number" hidden>
                       
                        <input type="email" name="current_email" value="<?php echo $user->email?>" id="email" hidden>
>
                        <input type="text" name="current_name" value="<?php echo $user->name_customer?>" id="name"
                            hidden>

                        <table class="info__table-view-info">
                            <tr>
                                <td>Tên đăng nhập</td>
                                <td><input type="text" id="name_value" name="user_name"
                                        value="<?php echo $user->name_customer?>" disabled> <button id="change_name"
                                        type="button">Thay đổi</button></span></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type="email" id="email_value" name="email" value="<?php echo $user->email?>"
                                        disabled> <button id="change_email" type="button">Thay đổi</button></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="text" id="phone_number_value" name="phoneNumber"
                                        value="<?php echo $user->phone_number?>" disabled> <button
                                        id="change_phone_number" type="button">Thay đổi</button></td>
                            </tr>
                        </table>
                        <div class="info__change-avatar">
                            <div class="info__view-avatar">
                                <img src="<?php if($user->picture == "") { echo "public/layout/images/no-image.png"; } else { echo "admin/public/front-end/images/customer/$user->picture"; }?>"
                                    alt="">
                                <input type="text" name="current_picture" value="<?php echo $user->picture?>" hidden>
                            </div>
                            <input name="avatar" type="file" accept=".jpg,.jpeg,.png" id="img_input">
                            <div class="info__image-preview" style="display: none;">
                                <p>Xem trước ảnh</p>
                                <div class="info__preview">
                                    <img src="" alt="" id="view_image">
                                </div>
                                <button type='button' id='cancel'>Hủy Lựa Chọn</button>
                            </div>
                            <p>Giới hạn dung lượng chỉ 1MB <br> định dạng jpg, jpeg, png</p>
                        </div>
                        <button class="info_btn-save" name="btn_save">Lưu thông tin</button>
                    </form>
                </div>
            </div>
       
            <div class="info__main-bank" style="display:none;">
              
                <h2>Thẻ Tín Dụng/Ghi Nợ</h2>
                <a href="#"><button class="info_btn-save"><i class="fa-regular fa-square-plus"></i> Thêm thẻ
                        mới</button></a>
                
                <h1 align="center">Bạn chưa liên kết tới ngân hàng nào</h1>
            </div>
           
            <div class="info__main-address" style="display:none;">
           
                <h2>Địa chỉ của tôi</h2>
              
                <div class="info__address-wrap-box">
                    <h4><?php echo $user->name_customer?></h4> <span>+ <?php echo $user->phone_number?></span>
                    <p>Địa chỉ: <span><?php echo $user->address?></span></p>
                </div>
            </div>
       
            <div class="info__main-change-pass" style="display:none;">
              
                <h2>Đổi mật khẩu</h2>
                <h5>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</h5>
               
                <form action="?url=change_pass.php" class='info__form-pass' method="POST">
                    <label for="passWord">Your Password</label> <br>
                    <input type="password" name="passWord" placeholder="Enter Your Password">
                    <br>
                    <label for="new-password">New Password</label> <br>
                    <input type="password" name="new-password" placeholder="Enter New Password">
                    <br>
                    <label for="rePassWord">Repeat Password</label> <br>
                    <input type="password" name="rePassWord" placeholder="Repeat Password">
                    <br>
                    <button type="submit" class="info_btn-save" name="btn-change">Login</button>
                </form>
            </div>
          
            <div class="info__main-bill" style="display:none;">          
                <div class="info__bill-list" style="<?php if(count($orders) > 3) { echo 'overflow: scroll;'; }?>">
                    <table>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Ngày đặt</td>
                                <td>Trạng thái</td>
                                <td>Địa chỉ/Số điện thoại</td>
                                <td>Hoạt động</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($orders as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value->id ?></td>
                                    <td><?php echo $value->order_date ?></td>
                                    <td>
                                        <?php if($value->order_status == 1) { 
                                            echo 'Đang chờ xác nhận';
                                        } else if($value->order_status == 2) {
                                            echo 'Đơn hàng đã được xác nhận và giao hàng';
                                        } else {
                                            echo 'Đơn hàng đã bị hủy';
                                        }?>
                                    </td>
                                    <td><?php echo 'địa chỉ: '.$value->address.' || sđt: '.$value->phone_number ?></td>
                                    <td>
                                        <?php if($value->order_status == 2) {?>

                                        <?php } else if($value->order_status == 3) {?>
                                            <a href="?url=delete_order&id_order=<?php echo $value->id?>"><button>Xóa Bill</button></a>
                                        <?php  } else { ?>
                                            <a href="?url=cancel_order&id_order=<?php echo $value->id?>"><button>Hủy Đơn Hàng</button></a>
                                        <?php } ?>
                                        <a href="?url=order.php&id_order=<?php echo $value->id?>"><button>Xem chi tiết</button></a>
                                    </td>
                                </tr>
                            <?php  endforeach ?>
                        </tbody>
                    </table>
                </div>  
            </div>
            <div class="info__main-notification" style="display:none;">

            </div>
        </div>
    </main>
</div>
<?php
    if(isset($_COOKIE['nofication'])) {
        echo '<script>alert("'.$_COOKIE['nofication'].'")</script>';
    }
?>