<div class="index__container">
    <div class="index__banner-list">
        <div class="index__banner-item">
            <div class="index__banner-body">
                <h1 class="index__banner-title">XOXO SHOP</h1>
                <h1 class="index__banner-desc">
                    <p>TRANG TÔN VINH CÁI ĐẸP</p>
                    <span>Hàng order 100%</span>
                </h1>
                <a href="#" class="index__banner-btn">Mua ngay</a>
            </div>
        </div>
    </div>
    <div class="container-fluid index__shipping">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="index__shipping-item">
                    <div class="icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="index__shipping-body">
                        <h2>Miễn phí vẫn chuyển</h2>
                        <p>Giao hàng nhanh chóng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="index__shipping-item">
                    <div class="icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="index__shipping-body">
                        <h2>Thanh toán</h2>
                        <p>Thanh toán dưới mọi hình thức</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="index__shipping-item">
                    <div class="icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="index__shipping-body">
                        <h2>Giảm giá thả ga</h2>
                        <p>Những ưu đãi bất ngờ</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="index__shipping-item">
                    <div class="icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <div class="index__shipping-body">
                        <h2>Hỗ trợ</h2>
                        <p>Hỗ trợ 24/24</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="featured__container">
    <h1 class="title">Sản phẩm nổi bật</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($featured_products as $value) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="item__product">
                    <a href="?url=detail.php&id_product=<?php echo $value->id ?>">
                        <div class="item__product-head">
                            <img src="admin/public/front-end/images/products/<?php echo $value->picture ?>" alt="">
                            <?php if ($value->quantity > 0) { ?>
                                <div class="item__controll-btn">
                            
                                    <a href="?url=add_to_cart&id_product=<?php echo $value->id ?>"
                                        class="item__btn-cart">Giỏ hàng</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="item__product-body">
                            <h3><?php echo $value->name ?></h3>
                            <h3> <?php echo number_format($value->price) ?>.000 VND</h3>
                            <?php if ($value->quantity == 0) { ?>
                            <h5>Đã hết hàng</h5>
                            <?php } ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<div class="banner__wrapper featured__container">
    <div class="banner__item">
        <img src="public/layout/images/banner/1.jpg" alt="">
        <div class="banner__item-desc">
            <h2>Lastest<br />Backpack</h2>
        </div>
    </div>
    <div class="banner__primary">
        <img src="public/layout/images/banner/1.3.jpg" alt="">
        <div class="banner__primary-desc">
            <h2>Giảm giá 40%</h2>
            <h3>Phong cách mới</h3>
        </div>
    </div>
    <div class="banner__item">
        <img src="public/layout/images/banner/1.2.jpg" alt="">
        <div class="banner__item-desc">
            <h2>Lastest<br />Backpack</h2>
        </div>
    </div>
</div>
<div class="featured__container">
    <h1 class="title">Sản phẩm mới nhất</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($new_products as $value) : ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="item__product">
                    <a href="?url=detail.php&id_product=<?php echo $value->id ?>">
                        <div class="item__product-head">
                            <img src="admin/public/front-end/images/products/<?php echo $value->picture ?>" alt="">
                            <?php if ($value->quantity > 0) { ?>
                                <div class="item__controll-btn">
                            
                                    <a href="?url=add_to_cart&id_product=<?php echo $value->id ?>"
                                        class="item__btn-cart">Giỏ hàng</a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="item__product-body">
                            <h3><?php echo $value->name; ?></h3>
                            <h3> <?php echo number_format($value->price) ?>.000 VND</h3>
                            <?php if ($value->quantity == 0) { ?>
                            <h5>Đã hết hàng</h5>
                            <?php } ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach ?>

        </div>
    </div>
</div>