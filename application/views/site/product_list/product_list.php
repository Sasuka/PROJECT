<div class="row">
    <div class="main-content">
        <div class="col-md-12 hidden-sm hidden-xs">
            <div class="sort-collection">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h1>
                            Đồng hồ nam Longbo
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
											<option value="best-selling">Bán chạy nhất</option>
										</select>
									</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 col-sm-12 col-xs-12 content-product-list">
            <div class="row product-list">
                <?php foreach ($listProduct as $itemProduct) {?>

                <div class="col-md-4  col-sm-6 col-xs-12 pro-loop">


                    <div class="product-block product-resize">
                        <div class="product-img image-resize view view-third">

                            <div class="product-sale">
                                <span><label class="sale-lb">- </label> 40%</span>
                            </div>


                            <a href="/products/dong-ho-longbo-mat-vuong-mau-trang-1"
                               title="ĐỒNG HỒ LONGBO MẶT VUÔNG MÀU ĐEN">
                                <img class="first-image  has-img"
                                     alt=" ĐỒNG HỒ LONGBO MẶT VUÔNG MÀU ĐEN "
                                     src="<?php echo upload_url('product/').$itemProduct['HINH_DAIDIEN'];?>"/>

                                <img class="second-image"
                                     src="./product.hstatic.net/1000177652/product/4_ec0319148ec348789ae2a59fc5289855_large.jpg"
                                     alt=" ĐỒNG HỒ LONGBO MẶT VUÔNG MÀU ĐEN "/>

                            </a>

                            <div class="actionss">
                                <div class="btn-cart-products">
                                    <a href="javascript:void(0);"
                                       onclick="add_item_show_modalCart(1012031097)">
                                        <i class="fa fa-shopping-bag"
                                           aria-hidden="true"></i>
                                    </a>
                                </div>

                                <div class="view-details">
                                    <a href="/collections/dong-ho-nam-longbo/products/dong-ho-longbo-mat-vuong-mau-trang-1"
                                       class="view-detail">
                                        <span><i class="fa fa-clone"> </i></span>
                                    </a>
                                </div>
                                <div class="btn-quickview-products">
                                    <a href="javascript:void(0);" class="quickview"
                                       data-handle="/products/dong-ho-longbo-mat-vuong-mau-trang-1"><i
                                            class="fa fa-eye"></i></a>
                                </div>
                            </div>

                        </div>

                        <div class="product-detail clearfix">


                            <!-- sử dụng pull-left -->
                            <h3 class="pro-name"><a
                                    href="/collections/dong-ho-nam-longbo/products/dong-ho-longbo-mat-vuong-mau-trang-1"
                                    title="ĐỒNG HỒ LONGBO MẶT VUÔNG MÀU ĐEN"><?php echo $itemProduct['TEN_SANPHAM'];?> </a></h3>
                            <div class="pro-prices">
                                <p class="pro-price"><?php echo $itemProduct['DONGIA_BAN'];?></p>
                                <p class="pro-price-del text-left">
                                    <del class="compare-price">500,000₫</del>
                                </p>


                            </div>


                        </div>
                    </div>

                </div>
                <?php }?>



            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="clearfix">
                <div id="pagination" class="">


                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">

                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-center">


                        <span class="page-node current">1</span>


                        <a class="page-node"
                           href="/collections/dong-ho-nam-longbo?page=2">2</a>


                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs">

                        <a class="pull-right next fa fa-angle-right"
                           href="/collections/dong-ho-nam-longbo?page=2"><span>Trang sau</span></a>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>