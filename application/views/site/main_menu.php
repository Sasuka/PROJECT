<?php
    $tmp['key'] = isset($_POST['key']) ? $_POST['key'] : "";
?>
<div class="container nav-wrapper check_nav" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="navbar-header">
            <div class="mobile-menu-icon-wrapper">
                <div class="menu-logo">

                    <h1 class="logo logo-mobile">
                        <a href="#">
                            <img src="<?php echo upload_url().'logo/logos.png'?>"
                                 alt="LOGO T&T" class="img-responsive logoimg"/>
                        </a>
                    </h1>

                    <div class="nav-login">
                        <?php if (empty($cusAccount)){?>
                        <a href="<?php echo base_url() . 'user/login'; ?>" class="cart " title="Tài khoản">
                            <svg class="icon icon-user" viewBox="0 0 32 32">
                                <use xmlns:xlink="<?php echo public_url('admin/images/userPic.png') ?>" xlink:href="#icon-user">
                                </use>
                            </svg>
                        </a>
                        <?php }else{?>
                        <a href="<?php echo base_url() . 'user/edit/' . $cusAccount['MA_KHACHHANG']; ?>">
                            <i class="icon icon-user" viewBox="0 0 32 32" aria-hidden="true"></i>
                            <span style="font-size: 0.2em;"><?php echo $cusAccount['TEN']; ?></span>
                        </a>
                        <?php }?>
                    </div>
                    <div class="menu-btn click-menu-mobile "><a href="#menu-mobile"
                                                                class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span></a>
                    </div>

                    <div id="cart-targets" class="cart">
                        <a href="<?php echo ($this->cart->total_items() != 0) ? base_url('cart') : "";?>" class="cart " title="Giỏ hàng">
							<span>

								<svg class="shopping-cart">
									<use xmlns:xlink="#" xlink:href="#icon-add-cart"/>
								</svg>
							</span>
                            <span id="cart-count" class="cart-number"><?php echo $this->cart->total_items(); ?></span>
                        </a>
                    </div>
                </div>
                <div class="search-bar-top">
                    <div class="search-input-top">
                        <form action="<?php echo base_url('product').'/search'?>" method="post">
                            <input type="hidden" name="type" value="product"/>
                            <input type="text" name="key"  value="<?php echo $tmp['key'] ;?>" placeholder="Tìm kiếm..."
                                   autocomplete="off"/>
                            <button type="submit" class="icon-search">
                                <svg class="icon-search_white">
                                    <use xmlns:xlink="#" xlink:href="#icon-search_white"/>
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
                    <a href="<?php echo base_url('contact');?>" class="" title="Liên hệ">
                        <span>Liên hệ</span>
                    </a>
                </li>


                <li>
                    <a href="#" class="" title="Blog">
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