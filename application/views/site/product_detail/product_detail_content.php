<?php
//pre($productInfo);
//pre($promotion);
?>

<!--<link rel="stylesheet" href="--><?php //echo public_url() ?><!--bootstrap/css/bootstrap.min.css">-->

<link rel="stylesheet" href="<?php public_url('site/') ?>dest/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php public_url('site/') ?>dest/vendors/colorbox/example3/colorbox.css">
<link rel="stylesheet" title="style" href="<?php public_url('site/') ?>dest/css/style.css">
<link rel="stylesheet" href="<?php public_url('site/') ?>dest/css/animate.css">
<link rel="stylesheet" title="style" href="<?php public_url('site/') ?>dest/css/huong-style.css">


<div class="space40">&nbsp;</div>
<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-4">
            <img src="<?php echo upload_url('product/') . $productInfo['HINH_DAIDIEN']; ?>" alt="">
        </div>
        <div class="col-sm-8">
            <div class="single-item-body">
                <p class="single-item-title"><?php echo $productInfo['TEN_SANPHAM']; ?></p>
                <p class="single-item-price">
                    <?php
                    if (isset($promotion) && !empty($promotion)) {
                    foreach ($promotion

                    as $itemPromotion) {
                    if ($productInfo['MA_SANPHAM'] == $itemPromotion['MA_SANPHAM']){
                    ?>
                <div class="product-sale">
                    Giảm: <span><label class="sale-lb">- </label> <?php echo($itemPromotion['PHANTRAM_KM']); ?>%</span>
                </div>
                <br>
                <span style="color: #ff2020;font-size: larger;">Giá chỉ còn:</span>$&nbsp;
                <span style="font-size: 1.2em;color: #0eff0c">
                            <?php echo round((1 - 0.01 * $itemPromotion['PHANTRAM_KM']) * $productInfo['DONGIA_BAN'], 3); ?>
                        </span>
                <br>
                <span style="color: #ed6e08;font-size: larger;font-family: " Courier New">Giá gốc:</span>
                <del class="compare-price"><?php echo $productInfo['DONGIA_BAN'] ?></del>
                $
                <?php
                break;
                }
                }
                }
                ?>
                </p>

            </div>

            <div class="clearfix"></div>
            <div class="space20">&nbsp;</div>
            <div class="single-item-desc">
                <p><?php echo $productInfo['MOTA']; ?></p>
            </div>
            <div class="space20">&nbsp;</div>

            <p>Options:</p>
            <div class="single-item-options">
                <select class="wc-select" name="size">
                    <option>Size</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
                <select class="wc-select" name="color">
                    <option>Color</option>
                    <option value="Red">Red</option>
                    <option value="Green">Green</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                </select>
                <select class="wc-select" name="color">
                    <option>Qty</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="space40">&nbsp;</div>
    <h2>TABE</h2>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Đặc điểm kỹ thuật</a></li>
        <li><a data-toggle="tab" href="#comment">Bình luận</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Đặc điểm kỹ thuật</h3>
            <hr>

        </div>
        <div id="comment" class="tab-pane fade">
            <h3>Bình luận</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
        </div>

    </div>
    <div class="space50">&nbsp;</div>
    <div class="beta-products-list">
        <h4>Sản phẩm có liên quan</h4>

        <div class="row">
            <?php
            //pre($productRelative);
            if (!empty($productRelative)) {
                $i = 0;
                foreach ($productRelative as $item) {
                    $i++;
                    if ($i == 4) break;
                    ?>
                    <div class="col-sm-4">
                        <div class="single-item">
                            <div class="single-item-header">
                                <a href="#"><img src="<?php echo upload_url('product/') . $item['HINH_DAIDIEN']; ?>"
                                                 alt=""></a>
                            </div>
                            <div class="single-item-body">
                                <p class="single-item-title"><?php echo $item['TEN_SANPHAM']; ?></p>
                                <p class="single-item-price">
                                    <?php
                                    if (isset($promotion) && !empty($promotion)) {
                                    foreach ($promotion as $itemPromotion) {
                                    if ($item['MA_SANPHAM'] == $itemPromotion['MA_SANPHAM']){
                                    ?>
                                    <div class="product-sale">
                                        Giảm: <span><label
                                                    class="sale-lb">- </label> <?php echo($itemPromotion['PHANTRAM_KM']); ?>
                                            %</span>
                                    </div>
                                    <br>
                                    <span style="color: #ff2020;font-size: larger;">Giá chỉ còn:</span>$&nbsp;
                                    <span style="font-size: 1.2em;color: #0eff0c">
                                  <?php echo round((1 - 0.01 * $itemPromotion['PHANTRAM_KM']) * $item['DONGIA_BAN'], 3); ?>
                                    </span>
                                    <br>
                                    <span style="color: #ed6e08;font-size: larger;font-family: " Courier New">Giá
                                    gốc:</span>
                                    <del class="compare-price"><?php echo $item['DONGIA_BAN'] ?></del>
                                    $
                                        <?php
                                        break;
                                        }
                                    }
                                }
                                ?>
                                </p>
                            </div>
                            <div class="single-item-caption">
                                <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
                                <a class="beta-btn primary" href="product.html">Details <i
                                            class="fa fa-chevron-right"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            ?>
        </div>

    </div> <!-- .beta-products-list -->
</div>
<div class="col-sm-3 aside">
    <div class="widget">
        <h3 class="widget-title">Best Sellers</h3>
        <div class="widget-body">
            <div class="beta-sales beta-lists">
                <div class="media beta-sales-item">
                    <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
                    <div class="media-body">
                        Sample Woman Top
                        <span class="beta-sales-price">$34.55</span>
                    </div>
                </div>
                <div class="media beta-sales-item">
                    <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
                    <div class="media-body">
                        Sample Woman Top
                        <span class="beta-sales-price">$34.55</span>
                    </div>
                </div>
                <div class="media beta-sales-item">
                    <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
                    <div class="media-body">
                        Sample Woman Top
                        <span class="beta-sales-price">$34.55</span>
                    </div>
                </div>
                <div class="media beta-sales-item">
                    <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
                    <div class="media-body">
                        Sample Woman Top
                        <span class="beta-sales-price">$34.55</span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- best sellers widget -->
    <div class="widget">
        <h3 class="widget-title">New Products</h3>
        <div class="widget-body">
            <div class="beta-sales beta-lists">
                <div class="media beta-sales-item">
                    <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/1.png" alt=""></a>
                    <div class="media-body">
                        Sample Woman Top
                        <span class="beta-sales-price">$34.55</span>
                    </div>
                </div>
                <div class="media beta-sales-item">
                    <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/2.png" alt=""></a>
                    <div class="media-body">
                        Sample Woman Top
                        <span class="beta-sales-price">$34.55</span>
                    </div>
                </div>
                <div class="media beta-sales-item">
                    <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/3.png" alt=""></a>
                    <div class="media-body">
                        Sample Woman Top
                        <span class="beta-sales-price">$34.55</span>
                    </div>
                </div>
                <div class="media beta-sales-item">
                    <a class="pull-left" href="product.html"><img src="assets/dest/images/products/sales/4.png" alt=""></a>
                    <div class="media-body">
                        Sample Woman Top
                        <span class="beta-sales-price">$34.55</span>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- best sellers widget -->
</div>


<!-- include js files -->
<!--<script src="--><?php //echo public_url('site/');?><!--dest/js/jquery.js"></script>-->
<script src="<?php echo public_url('site/'); ?>dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<!--<script src="--><?php //echo public_url() ?><!--bootstrap/js/bootstrap.min.js"></script>-->
<!--<script src="--><?php //echo public_url('site/');?><!--dest/vendors/bxslider/jquery.bxslider.min.js"></script>-->
<script src="<?php echo public_url('site/'); ?>dest/vendors/colorbox/jquery.colorbox-min.js"></script>
<script src="<?php echo public_url('site/'); ?>dest/vendors/animo/Animo.js"></script>
<script src="<?php echo public_url('site/'); ?>dest/vendors/dug/dug.js"></script>
<script src="<?php echo public_url('site/'); ?>dest/js/scripts.min.js"></script>

<!--customjs-->
