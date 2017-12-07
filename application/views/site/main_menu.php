<?php
    $tmp['key'] = isset($_POST['key']) ? $_POST['key'] : "";
?>
<div class="container nav-wrapper check_nav">
    <div class="row">
        <div class="navbar-header">
            <div class="mobile-menu-icon-wrapper">
                <div class="menu-logo">

                    <h1 class="logo logo-mobile">
                        <a href="http://happylive.vn">
                            <img src="<?php echo public_url('site'); ?>/design/14/logo.png?v=90"
                                 alt="Happylive" class="img-responsive logoimg"/>
                        </a>
                    </h1>

                    <div class="nav-login">
                        <a href="/account" class="cart " title="Tài khoản">
                            <svg class="icon icon-user" viewBox="0 0 32 32">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-user">
                                </use>
                            </svg>
                        </a>
                    </div>
                    <div class="menu-btn click-menu-mobile "><a href="#menu-mobile"
                                                                class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span></a>
                    </div>

                    <div id="cart-targets" class="cart">
                        <a href="/cart" class="cart " title="Giỏ hàng">
							<span>

								<svg class="shopping-cart">
									<use xmlns:xlink="./www.w3.org/1999/xlink" xlink:href="#icon-add-cart"/>
								</svg>
							</span>
                            <span id="cart-count" class="cart-number">0</span>
                        </a>
                    </div>
                </div>
                <div class="search-bar-top">
                    <div class="search-input-top">
                        <form action="/search">
                            <input type="hidden" name="type" value="product"/>
                            <input type="text" name="q" placeholder="Tìm kiếm sản phẩm ..."/>
                            <button type="submit" class="icon-search">
                                <svg class="icon-search_white">
                                    <use xmlns:xlink="./www.w3.org/1999/xlink" xlink:href="#icon-search_white"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav clearfix">
                <li>
                    <a href="<?php echo base_url();?>" class="current" title="Trang chủ">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="<?php echo base_url('product');?>" title="Thương Hiệu" class="">
                        <span>Thương hiệu</span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <?php
                        for ($i = 0, $j = $i; $i < count($listGroup); $i++) {

                            ?>
                            <li class="dropdown-submenu">
                                <a tabindex="-1"
                                   href="<?php echo base_url() .'product/getProductGroup/' . $listGroup[$i]['MA_NHOM_SANPHAM'] ;?>"><?php echo mb_convert_case(mb_strtolower($listGroup[$i]['TEN_NHOM_SANPHAM']), MB_CASE_TITLE, "UTF-8"); ?></a>
                                <ul class="dropdown-menu">
                                    <?php for (;$j < count($listCate);$j++) {
                                        if ($listGroup[$i]['MA_NHOM_SANPHAM'] == $listCate[$j]['MA_NHOM_SANPHAM']) {
                                            ?>
                                            <li><a href="<?php echo base_url() . 'product/getProduct/' . $listCate[$j]['MA_LOAI_SANPHAM'] ?>"><?php echo $listCate[$j]['TEN_LOAI_SANPHAM'] ?></a></li>
                                            <?php
                                        }else{
                                            break;
                                        }
                                    }
                                    //                                ?>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo base_url('service');?>" class="" title="Dịch vụ">
                        <span>Dịch vụ</span>
                    </a>
                </li>


                <li>
                    <a href="/pages/gioi-thieu" class="" title="Giới thiệu">
                        <span>Giới thiệu</span>
                    </a>
                </li>


                <li>
                    <a href="/blogs/news" class="" title="Blog">
                        <span>Blog</span>
                    </a>
                </li>


            </ul>
        </div>
        <div class="hidden-xs pull-right right-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="col-md-12">

                    <div class="search-bar">

                        <div class="">
                            <form action="<?php echo base_url('product').'/search'?>" method="POST">
                                <input type="hidden" name="type" value="product"/>
                                <input type="text" name="key"  value="<?php echo $tmp['key'] ;?>" placeholder="Tìm kiếm..."
                                       autocomplete="off"/>
                            </form>
                        </div>
                    </div>
                </li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>