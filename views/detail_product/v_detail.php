<div class="detail__container">
    <div class="detail__wrap-box">
      
        <div class="detail__product-view">
           
            <div class="detail__product-image">
                <?php if ($detail_product->quantity == 0) { ?>
                <div class="detail__wall-wrap-image">
                    <h2>Đã hết hàng</h2>
                </div>
                <?php } ?>
                <img src="admin/public/front-end/images/products/<?php echo $detail_product->picture ?>" alt="">
            </div>
          
            <div class="detail__product-content">
                
                <a href="#" class="detail__product-title"><?php echo $detail_product->name ?></a>
                
                <div class="detail__product-price">
                    <div class="detail__product-wrap-price">
                        <?php if ($detail_product->quantity > 0) { ?>
                        
                        <span class="detail__product-price-new">
                             <?php if (number_format($detail_product->saleOff) == 0) {
                                        echo $detail_product->price;
                                    } else if (number_format($detail_product->saleOff) != 0) {
                                        $new_price = $detail_product->price - ($detail_product->price * ($detail_product->saleOff / 100));
                                        echo $new_price;
                                    }
                                    ?>.000 VND
                        </span>
                       
                        <span class="detail__product-price-old">
                            <?php if (number_format($detail_product->saleOff) != 0) {
                                    echo '(' . $detail_product->price . ')';
                                } ?>
                        </span>
                        <span class="detail__product-price-sale">
                            <?php if (number_format($detail_product->saleOff) != 0) {
                                    echo 'Giảm ' . $detail_product->saleOff . '%';
                                } ?>
                        </span>
                        <?php } else { ?>
                        <span class="detail__product-price-new">
                             <?php echo $detail_product->price; ?>.000 VND
                        </span>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="detail__product-overview">
                    <h5>Miêu tả:</h5>
                    <p><?php echo $detail_product->description ?></p>
                </div>
           
                <div class="detail__product-size">
                    <h5>Size:</h5>
                    <a href="#">S</a>
                    <a href="#">M</a>
                    <a href="#">L</a>
                    <a href="#">XL</a>
                    <a href="#">XXL</a>
                </div>
              
                <form action="?url=add_to_cart&id_product=<?php echo $detail_product->id ?>" method="POST">
                    <div class="detail__product-color-quantity">
                        
                        <div class="detail__product-color">
                            <h5>Màu sắc:</h5>
                            <div class="detail__product-wrap-color">
                                <a style="background-color: rgba(255, 172, 154, 1);" href="#"
                                    class="detail__product-color-active">color 1</a>
                                <a style="background-color: rgba(255, 64, 129, 1);" href="#">color 2</a>
                                <a style="background-color: rgb(0, 0, 0);"" href=" #">color 3</a>
                            </div>
                        </div>
                       
                        <div class="detail__product-quantity">
                            <h5>Số lượng:</h5>
                            <div class="detail__product-wrap-quantity">
                               
                                <input type="text" value="1" name="quantity" class="detail_product-input-plus-minus"
                                    id="<?php echo $quantity ?>">

                                
                                <span class="detail__product-inc btnqty">
                                    <i class="fa-solid fa-chevron-up"></i>
                                </span>

                               
                                <span class="detail__product-dec btnqty">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                   
                    <div class="detail__product-action">
                        <button name="btn_add" class="detail__product-action-btn btn-text" <?php if ($detail_product->quantity == 0) {
                                                                                                echo 'disabled';
                                                                                            } ?>>Giỏ hàng</button>
                    </div>
                </form>
            </div>
        </div>
  
        <div class="detail__reviews-description">
            <ul class="detail__tablist-container">
                <li class="active">
                    <a href="#">Bình luận</a>
                </li>
                <li>
                    <a href="#">Mô tả</a>
                </li>
            </ul>

            <div class="detail__reviews">
                <div class="detail__product-avg-ratting">
                    <h4>4.5 <span>(overall)</span></h4>
                    <span>Based on <?php echo count($comments) ?> Comments</span>
                </div>
                <div class="detail__product-comment-box" style='<?php if (count($comments) > 6) {
                                                                    echo "overflow: scroll; max-height: 350px;";
                                                                } ?>'>
                    <?php foreach ($comments as $value) : ?>
                    
                    <div class="detail__product-comment-view">
                        <div class="detail__product-comment-view-info">
                            <div class="detail__product-comment-author">
                                <span><?php echo $value->name_customer ?></span>
                            </div>
                            <div class="detail__product-comment-time">
                                <span><?php echo $value->time_comment ?></span>
                                <span><?php echo $value->date_comment ?></span>
                            </div>
                        </div>
                        <p class="detail__product-comment-view-title">
                            <?php echo $value->comment_content ?>
                        </p>
                    </div>
                    <?php endforeach ?>
                </div>
          
                <div class="detail__comment-form-wrap-box">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                    <h3>Thêm bình luận</h3>
                    <form action="?url=add_comment.php" method="POST" class="detail__comment-form-action">
                       
                        <input type="text" name="id_product" value="<?php echo $detail_product->id ?>" hidden>
                     
                        <div class="input-name-box">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="<?php echo $user->name_customer ?>"
                                placeholder="Type your name" disabled>
                        </div>
                     
                        <div class="input-email-box">
                            <label for="email">Email:</label>
                            <input type="email" name="email" value="<?php echo $user->email ?>"
                                placeholder="Type your email address" disabled>
                        </div>                      
                        <div class="input-comment-box">
                            <label for="comment">Your comment:</label>
                            <textarea name="comment" id="" cols="30" rows="10" placeholder="White a comment"></textarea>
                        </div>
                        <div class="input-btnsubmit-box">
                            <button type="submit" name="btn_submit">ADD COMMENT</button>
                        </div>
                    </form>
                    <?php } else { ?>
                    <h3>Vui Lòng Đăng Nhập Để Có Thể Đánh Giá Sản Phẩm</h3>
                    <a href="?url=login.php">LOGIN</a>
                    <?php } ?>
                </div>
            </div>
            <div class="detail__description">
                <p>
                    <?php echo $detail_product->description ?>
                </p>
            </div>
        </div>
    </div>
    <div class="detail__suggested-products">
        <div class="detail__wrap-box">
            <h1>SẢN PHẨM LIÊN QUAN</h1>
            <div class="detail__product-slider">
                <?php foreach ($suggested_products as $value) : ?>
                <div class="detail__product-item">
                    <div class="detail__wrap-item">
                        <div class="detail__item-image">
                            <a href="?url=detail.php&id_product=<?php echo $value->id ?>">
                                <img src="admin/public/front-end/images/products/<?php echo $value->picture ?>" alt="">
                            </a>
                        </div>
                        <a href="?url=detail.php&id_product=<?php echo $value->id ?>" class="detail__view-detail">
                            <i class="fa-regular fa-square-plus"></i>
                        </a>
                        <?php if ($value->quantity > 0) { ?>
                        <div class="detail__item-action">
                            <a href="#"><button class="detail__item-action-btn btn-icon">
                                    <i class="fa-solid fa-arrows-rotate"></i>
                                </button></a>
                            <a href="?url=add_to_cart&id_product=<?php echo $value->id ?>"><button
                                    class="detail__item-action-btn btn-text">
                                    Giỏ hàng
                                </button></a>
                            <a href="#"><button class="detail__item-action-btn btn-icon">
                                    <i class="fa-regular fa-heart"></i>
                                </button></a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="detail__item-detail">
                        <a href="?url=detail.php&id_product=<?php echo $value->id ?>" class="detail__item-title">
                            <?php echo $value->name ?>
                        </a>
                        <span class="detail__item-price new">
                            <?php if (number_format($value->saleOff) == 0 && $detail_product->quantity > 0) {
                                        echo $value->price;
                                    } else if (number_format($value->saleOff) != 0 && $detail_product->quantity > 0) {
                                        $new_price_sg = $value->price - ($value->price * ($value->saleOff / 100));
                                        echo $new_price_sg;
                                    }
                                    ?>.000 VND
                        </span>
                        <?php if (number_format($value->saleOff) != 0 && $detail_product->quantity > 0) { ?>
                            <span class="detail__item-price old">(
                                <?php echo $value->price; ?>
                            )</span>
                        <?php }  ?>
                        <?php if ($value->quantity == 0) { ?>
                        <h5>Đã hết hàng</h5>
                        <?php } ?>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_COOKIE['nofication'])) {
    echo '<script>alert("' . $_COOKIE['nofication'] . '")</script>';
}
?>