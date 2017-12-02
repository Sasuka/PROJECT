<?php
//pre($promotion);
//pre($listProduct);
?>
<div class="row">
    <div class="main-content">
        <div class="col-md-12 hidden-sm hidden-xs">
            <div class="sort-collection">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h1>
                            Danh sách sản phẩm khuyến mãi.
                        </h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 content-product-list">
            <div class="row product-list">
                <!-- --><?php
                // pre($promotion);
                if (!empty($promotion)) {
                    foreach ($promotion as $item) { ?>
                        <div class="col-md-4  col-sm-6 col-xs-12 pro-loop">
                            <div class="product-block product-resize">
                                <div class="product-img image-resize view view-third">

                                    <div class="product-sale">
                                        <span><label class="sale-lb">- </label> <?php echo($item['PHANTRAM_KM']); ?>
                                            %</span>
                                    </div>
                                    <a href="javascript:void(0);" class="quickview"
                                       data-handle="<?php echo base_url('product/getProduct1/') . $item['MA_SANPHAM']; ?>"
                                       title="">
                                        <img class="first-image  has-img"
                                             alt=""
                                             src="<?php echo upload_url('product/') . $item['HINH_DAIDIEN']; ?>"/>

                                        <?php
                                        $list_image = json_decode($item['DS_HINHANH']);
                                        // pre($list_image);
                                        if (!empty($list_image)) {
                                            ?>
                                            <img class="second-image"
                                                 src="<?php echo base_url('uploads/product/' . $list_image[0]) ?>"
                                                 alt="<?php echo mb_strtoupper($item['TEN_SANPHAM'], 'UTF-8'); ?>"/>

                                        <?php } ?>

                                    </a>

                                    <div class="actionss">
                                        <div class="btn-cart-products">
                                            <a href="javascript:void(0);"
                                               onclick="add_item_show_modalCart(<?php echo $item['MA_SANPHAM'] ?>)"
                                               data-handle="<?php echo base_url(); ?>" class="shopping-bag">
                                                <i class="fa fa-shopping-bag"
                                                   aria-hidden="true"></i>
                                            </a>
                                        </div>

                                        <div class="btn-quickview-products">
                                            <a href="javascript:void(0);" class="quickview"
                                               data-handle="<?php echo base_url('product/getProduct1/') . $item['MA_SANPHAM']; ?>"><i
                                                        class="fa fa-eye"></i></a>
                                        </div>
                                    </div>

                                </div>

                                <div class="product-detail clearfix">


                                    <!-- sử dụng pull-left -->
                                    <h3 class="pro-name"><a
                                                href="#"
                                                title="<?php echo $item['TEN_SANPHAM']; ?>"><?php echo $item['TEN_SANPHAM']; ?> </a>
                                    </h3>
                                    <div class="pro-prices">

                                        <p class="pro-price discount-cost"><?php echo (1 - 0.01 * $item['PHANTRAM_KM']) * $item['DONGIA_BAN']; ?></p>

                                        <p class="pro-price-del text-left discount-original">
                                            <del class="compare-price"><?php echo $item['DONGIA_BAN'] ?></del>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php }
                }
                ?>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="clearfix">
                <div class="text-center">
                    <?php
                    echo $this->pagination->create_links();
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>