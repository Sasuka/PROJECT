<div class="row">
    <div class="main-content">
        <div class="col-md-12 hidden-sm hidden-xs">
            <div class="sort-collection">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h1>
                            Danh sách sản phẩm
                        </h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="browse-tags">
                            <span>Sắp xếp theo:</span>
                            <span class="custom-dropdown custom-dropdown--white">
										<select class="sort-by custom-dropdown__select custom-dropdown__select--white">
										<option value="manual">Sản phẩm nổi bật</option>
											<option value="price-ascending">Giá: Tăng dần</option>
											<option value="price-descending">Giá: Giảm dần</option>
											<option value="title-ascending">Tên: A-Z</option>
											<option value="title-descending">Tên: Z-A</option>
											<option value="created-ascending">Cũ nhất</option>
											<option value="created-descending">Mới nhất</option>

										</select>
									</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 content-product-list">
            <div class="row product-list">
                <?php

//                $tmpArr = array();
//                if (isset($listProduct[0]['MA_KHUYENMAI'])){
//                    $tmpArr = $listProduct;
//                    $listProduct = $promotion;
//                    $promotion = $tmpArr;
//                }

                foreach ($listProduct as $itemProduct) { ?>
                    <div class="col-md-4  col-sm-6 col-xs-12 pro-loop">
                        <div class="product-block product-resize">
                            <div class="product-img image-resize view view-third">
                                <?php if (isset($itemProduct['PHANTRAM_KM'])) { ?>
                                    <div class="product-sale">
                                    <span><label
                                                class="sale-lb">- </label> <?php echo $itemProduct['PHANTRAM_KM']; ?>
                                        %</span>
                                    </div>
                                <?php }
                                if (isset($promotion) && !empty($promotion)) {
                                    foreach ($promotion as $itemPromotion) {
                                        if ($itemProduct['MA_SANPHAM'] == $itemPromotion['MA_SANPHAM']) {

                                            ?>
                                            <div class="product-sale">
                                    <span><label
                                                class="sale-lb">- </label> <?php echo ($itemPromotion['PHANTRAM_KM']); ?>%</span>
                                            </div>
                                            <?php
                                            break;
                                        }
                                    }
                                }
                                ?>

                                <a href="javascript:void(0);" class="quickview"
                                   data-handle="<?php echo base_url('product/getProduct1/') . $itemProduct['MA_SANPHAM']; ?>"
                                   title="<?php echo mb_strtoupper($itemProduct['TEN_SANPHAM'], 'UTF-8'); ?>">
                                    <img class="first-image  has-img"
                                         alt="<?php echo mb_strtoupper($itemProduct['TEN_SANPHAM'], 'UTF-8'); ?>"
                                         src="<?php echo upload_url('product/') . $itemProduct['HINH_DAIDIEN']; ?>"/>
                                    <?php
                                    $list_image = json_decode($itemProduct['DS_HINHANH']);
                                    // pre($list_image);
                                    if (!empty($list_image)) {
                                        ?>
                                        <img class="second-image"
                                             src="<?php echo base_url('uploads/product/'. $list_image[0]) ?>"
                                             alt="<?php echo mb_strtoupper($itemProduct['TEN_SANPHAM'], 'UTF-8'); ?>"/>

                                    <?php }?>
                                </a>

                                <div class="actionss">
                                    <div class="btn-cart-products">
                                        <a href="javascript:void(0);"
                                           onclick="add_item_show_modalCart(<?php echo $itemProduct['MA_SANPHAM'] ?>)"
                                           data-handle="<?php echo base_url(); ?>" class="shopping-bag">
                                            <i class="fa fa-shopping-bag"
                                               aria-hidden="true"></i>
                                        </a>
                                    </div>

                                    <div class="btn-quickview-products">
                                        <a href="javascript:void(0);" class="quickview"
                                           data-handle="<?php echo base_url('product/getProduct1/') . $itemProduct['MA_SANPHAM']; ?>"><i
                                                    class="fa fa-eye"></i></a>
                                    </div>
                                </div>

                            </div>

                            <div class="product-detail clearfix">


                                <!-- sử dụng pull-left -->
                                <h3 class="pro-name"><a
                                            href="#"
                                            title="<?php echo  $itemProduct['TEN_SANPHAM']; ?>"><?php echo $itemProduct['TEN_SANPHAM']; ?> </a>
                                </h3>
                                <div class="pro-prices">
                                    <!--                                    <p class="pro-price">-->
                                    <?php //echo isset($itemProduct['PHANTRAM_KM']) ? (1 - 0.01 * $itemProduct['PHANTRAM_KM']) * $itemProduct['DONGIA_BAN'] : $itemProduct['DONGIA_BAN']; ?><!--</p>-->
                                    <!--                                    <p class="pro-price-del text-left">-->
                                    <!--                                        <del class="compare-price">-->
                                    <?php //echo isset($itemProduct['PHANTRAM_KM']) ? $itemProduct['DONGIA_BAN'] : ""; ?><!--</del>-->
                                    <!--                                    </p>-->
                                    <?php
                                    $check = 0;// dò xem hết có hay không
                                    if (isset($promotion) && !empty($promotion)) {
                                        foreach ($promotion as $itemPromotion) {
                                            if ($itemProduct['MA_SANPHAM'] == $itemPromotion['MA_SANPHAM']) {
                                                ?>
                                                <p class="pro-price discount-cost"><?php echo round((1 - 0.01 * $itemPromotion['PHANTRAM_KM']) * $itemProduct['DONGIA_BAN'],3); ?></p>

                                                <p class="pro-price-del text-left discount-original">
                                                    <del class="compare-price"><?php echo $itemProduct['DONGIA_BAN'] ?></del>
                                                </p>
                                                <?php
                                                $check = 1;
                                                break;
                                            }
                                        }
                                    }
                                    if ($check == 0) {
                                        ?>
                                        <p class="pro-price discount-cost"><?php echo $itemProduct['DONGIA_BAN']; ?></p>
                                        <?php
                                    }
                                    ?>
                                </div>


                            </div>
                        </div>

                    </div>
                <?php } ?>


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