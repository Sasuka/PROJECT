<?php
//pre($productTech);

?>
<style>
    .title {
        color: #0eff0c;
        font-weight: bold;
        font-size: larger;

    }

    .tech-detail {
        color: #ffcf02;
        font-weight: lighter;
    }

    .beta-sales .beta-sales-item {
        background: #fff;
        position: relative;
        height: 80px;

    }

    .beta-sales .beta-sales-item .media-body {
        /*background: #0eff0c;*/
        width: 400px !important;
        height: 100%;
        position: absolute;
        z-index: 3;
        left: 75px;
    }

    .media .pull-left img {
        width: 70px;
        height: 70px;
        position: relative;
        overflow: hidden;
        border-radius: 5px;
    }

    .media .product-thumbnail-quantity {
        font-size: 0.770em;
        font-weight: 500;
        white-space: nowrap;
        padding: 0.05em 0.15em;
        border-radius: 1em;
        background-color: rgba(153, 153, 153, 0.9);
        color: #fff;
        position: absolute;
        right: -0.005em;
        top: 0.02em;
        z-index: 1;
        width: 20px;
        height: 20px;
    }
</style>
<?php
//pre($promotion);
//exit();
?>
<div class="space40">&nbsp;</div>
<div class="row">
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
                        $check = 0;
                        if (isset($promotion) && !empty($promotion)) {
                        foreach ($promotion

                        as $itemPromotion) {
                        if ($productInfo['MA_SANPHAM'] == $itemPromotion['MA_SANPHAM']) {
                        ?>
                    <div class="product-sale">
                        <span><label class="sale-lb">- </label> <?php echo($itemPromotion['PHANTRAM_KM']); ?>%</span>
                    </div>
                    <br>
                    Giá chỉ còn:
                    <span style="color: #ff0709;font-size: 1.2em;">
                                            <?php echo round((1 - 0.01 * $itemPromotion['PHANTRAM_KM']) * $productInfo['DONGIA_BAN'], 3); ?>
                                        </span>$ <br>
                    Giá gốc:
                    <span style="color: #ed6e08;font-weight: bold;" class="single-item-price">
                                              <del><?php echo $productInfo['DONGIA_BAN'] ?></del>
                                        </span>$
                    <?php
                    $check = 1;
                    break;
                    }
                    }
                    }
                    if ($check == 0) {
                        ?> <span style="color: #ff0709;font-size: 1.2em;"> Giá bán:
                            <?php echo $productInfo['DONGIA_BAN']; ?>
                                </span>
                        <?php
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

                <p>Lựa chọn:</p>
                <div class="single-item-options">
                    <select class="wc-select" name="color">
                        <option>Số lượng</option>
                        <option value="1">1</option>

                    </select>
                    <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="space40">&nbsp;</div>
        <div class="space40">&nbsp;</div>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Đặc điểm kỹ thuật</a></li>
            <li><a data-toggle="tab" href="#comment">Bình Luận</a></li>

        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3 class="title">Đặc điểm kỹ thuật</h3>
                <span class="tech-detail">Màu sắc:</span><?php echo $tech['MAU_SAC']; ?>
                <hr>
                <span class="tech-detail">Kích thước:</span><?php echo $tech['KHOILUONG']; ?>
                <hr>
                <span class="tech-detail">Khối lượng:</span> <?php echo $tech['KICH_THUOC']; ?>
                <hr>
                <span class="tech-detail">Chất liệu:</span><?php echo $tech['CHATLIEU']; ?>
                <hr>
            </div>
            <div id="comment" class="tab-pane fade">
                <h3 class="title">Bình Luận</h3>
                <div class="fb-comments" data-href="https://tientaiphutung.com" data-width="850"
                     data-numposts="5"></div>
            </div>

        </div>

        <div class="space50">&nbsp;</div>


        <div class="beta-products-list">
            <h4 class="title">Sản phẩm liên quan</h4>

            <div class="row">
                <?php
                $i = 0;

                foreach ($productTech as $item) {
                    $i++;
                    if ($i == 4) break;
                    ?>
                    <div class="col-sm-4">
                        <div class="single-item">
                            <div class="single-item-header">
                                <a href="<?php echo base_url('product/show_product_detail/') . $item['MA_SANPHAM']; ?>"><img
                                            src="<?php echo upload_url('product/') . $item['HINH_DAIDIEN']; ?>" alt=""></a>
                            </div>
                            <div class="single-item-body">
                                <p class="single-item-title"><?php echo $item['TEN_SANPHAM']; ?></p>

                                <?php
                                $check = 0;
                                if (isset($promotion) && !empty($promotion)) {
                                    foreach ($promotion as $itemPromotion) {
                                        if ($item['MA_SANPHAM'] == $itemPromotion['MA_SANPHAM']) {
                                            ?>
                                            <div class="product-sale">
                                                <span><label
                                                            class="sale-lb">- </label> <?php echo($itemPromotion['PHANTRAM_KM']); ?>
                                                    %</span>
                                            </div>
                                            <br>
                                            Giá chỉ còn:
                                            <span style="color: #ff0709;font-size: 1.2em;">
                                            <?php echo round((1 - 0.01 * $itemPromotion['PHANTRAM_KM']) * $item['DONGIA_BAN'], 3); ?>
                                        </span>$ <br>
                                            Giá gốc:
                                            <span style="color: #ed6e08;font-weight: bold;" class="single-item-price">
                                              <del><?php echo $item['DONGIA_BAN'] ?></del>
                                        </span>$
                                            <?php
                                            $check = 1;
                                            break;
                                        }
                                    }
                                }
                                if ($check == 0) {
                                    ?> <span style="color: #ff0709;font-size: 1.2em;"> Giá bán:
                                        <?php echo $item['DONGIA_BAN']; ?>
                                </span>
                                    <?php
                                }

                                ?>
                            </div>
                            <div class="single-item-caption">
                                <!--                            <a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>-->
                                <!--                            <a class="beta-btn primary" href="-->
                                <?php //echo base_url('product/show_product_content');
                                ?><!--">Details <i class="fa fa-chevron-right"></i></a>-->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div> <!-- .beta-products-list -->
    </div>

    <div class="col-sm-3 aside">
        <div class="widget">
            <h3 class="widget-title">Xem nhiều nhất</h3>
            <div class="widget-body">
                <div class="beta-sales beta-lists">
                    <?php if (!empty($productView)) {
                        foreach ($productView as $item) {
                            ?>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="<?php echo base_url('product/show_product_detail/').$item['MA_SANPHAM'];?>"><img
                                            src="<?php echo upload_url('product/') . $item['HINH_DAIDIEN']; ?>" alt=""></a>
                                <div class="media-body">
                                    <span style="color: #ffb10b"><?php echo $item['TEN_SANPHAM']; ?></span>
                                    <?php
                                    $check = 0;
                                    if (!empty($promotion)) {
                                        foreach ($promotion as $itemPro) {
                                            if ($itemPro['MA_SANPHAM'] == $item['MA_SANPHAM']) {
                                                ?>
                                                <br>
                                                <span class="beta-sales-price"><span
                                                            style="color: #0000CC"> Đơn giá bán</span> <?php echo round((1 - 0.01 * $itemPro['PHANTRAM_KM']) * $item['DONGIA_BAN'], 3); ?></span>
                                                <br><span style="color: #ff9f0a;">Giá gốc </span>
                                                <del style="color: #ff0709"><?php echo $item['DONGIA_BAN']; ?></del>
                                                <?php
                                                $check = 1;
                                                break;
                                            }
                                        }
                                    }
                                    if ($check == 0) {
                                        ?>
                                        <br>
                                        <span class="beta-sales-price"><span
                                                    style="color: #0000CC"> Đơn giá bán</span><?php echo round($item['DONGIA_BAN'], 3); ?></span>
                                        <?php
                                    }
                                    ?>
                                    <br>
                                    <span style="color: #ababab;font-family: 'Fira Code Light';">Ngày cập nhật</span> <?php echo date('d/m/Y', strtotime($item['NGAY_CAPNHAT'])); ?>
                                    <hr>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div> <!-- best sellers widget -->
        <div class="widget">
            <h3 class="widget-title">Sản phẩm mới nhất</h3>
            <div class="widget-body">
                <div class="beta-sales beta-lists">
                    <?php if (!empty($productNew)) {
                        foreach ($productNew as $item) {
                            ?>
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="<?php echo base_url('product/show_product_detail/').$item['MA_SANPHAM'];?>"><img
                                            src="<?php echo upload_url('product/') . $item['HINH_DAIDIEN']; ?>" alt=""></a>
                                <!--                                --><?php //if (!empty($promotion)) {
                                //                                    foreach ($promotion as $itemPro) {
                                //                                        if ($itemPro['MA_SANPHAM'] == $item['MA_SANPHAM']) {
                                //                                            ?>
                                <!--                                            <span class="product-thumbnail-quantity"-->
                                <!--                                                  aria-hidden="true"> - -->
                                <?php //echo $itemPro['PHANTRAM_KM']; ?><!--%</span>-->
                                <!--                                            --><?php
                                //                                            break;
                                //                                        }
                                //                                    }
                                //                                }
                                //                                ?>
                                <div class="media-body">
                                    <span style="color: #ffb10b"><?php echo $item['TEN_SANPHAM']; ?></span>
                                    <?php
                                    $check = 0;
                                    if (!empty($promotion)) {
                                        foreach ($promotion as $itemPro) {
                                            if ($itemPro['MA_SANPHAM'] == $item['MA_SANPHAM']) {
                                                ?>
                                                <br>
                                                <span class="beta-sales-price"><span
                                                            style="color: #0000CC"> Đơn giá bán</span> <?php echo round((1 - 0.01 * $itemPro['PHANTRAM_KM']) * $item['DONGIA_BAN'], 3); ?></span>
                                                <br><span style="color: #ff9f0a;">Giá gốc </span>
                                                <del style="color: #ff0709"><?php echo $item['DONGIA_BAN']; ?></del>
                                                <?php
                                                $check = 1;
                                                break;
                                            }
                                        }
                                    }
                                    if ($check == 0) {
                                        ?>
                                        <br>
                                        <span class="beta-sales-price"><span
                                                    style="color: #0000CC"> Đơn giá bán</span><?php echo round($item['DONGIA_BAN'], 3); ?></span>
                                        <?php
                                    }
                                    ?>
                                    <br>
                                    <span style="color: #ababab;font-family: 'Fira Code Light';">Ngày cập nhật</span> <?php echo date('d/m/Y', strtotime($item['NGAY_CAPNHAT'])); ?>
                                    <hr>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div> <!-- best sellers widget -->
    </div>
</div>
<script language="JavaScript">
    <
    div
    id = "fb-root" > < /div>
        < script > (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=109395689741702';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</script>

