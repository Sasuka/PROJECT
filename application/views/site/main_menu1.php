


<ul class="nav navbar-nav clearfix main-menu">
    <li>
        <a href="/" class="current" title="Trang chủ">
            <span>Trang chủ</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="/collections/dong-ho-nam" title="Thương hiệu" class="">
            <span>Thương hiệu</span>
        </a>
        <ul class="dropdown-menu" role="menu">

            <?php
            foreach ($listGroup as $itemGroup){?>
                <li>
                    <a href="#" title="">
                        <?php echo mb_convert_case(mb_strtolower($itemGroup['TEN_NHOM_SANPHAM']), MB_CASE_TITLE, "UTF-8");?>
                    </a>
                </li>
            <?php }?>
        </ul>
    </li>


    <li class="dropdown">
        <a href="/collections/dong-ho-nu" title="Đồng hồ nữ" class="">
            <span>Đồng hồ nữ</span>
        </a>
        <ul class="dropdown-menu" role="menu">

            <li>
                <a href="/collections/dong-ho-nu-beesister" title="Đồng hồ Beesister">Đồng
                    hồ Beesister</a>

            </li>

            <li>
                <a href="/collections/dong-ho-nu-skmei" title="Đồng hồ Skmei">Đồng hồ
                    Skmei</a>

            </li>

            <li>
                <a href="/collections/dong-ho-nu-halei" title="Đồng hồ Halei">Đồng hồ
                    Halei</a>

            </li>

        </ul>
    </li>
    <li>
        <a href="/pages/dich-vu" class="" title="Dịch vụ">
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


<div class="container nav-wrapper check_nav">
    <div class="row">
        <div class="navbar-header">
            <div class="mobile-menu-icon-wrapper">
                <div class="menu-logo">

                    <h1 class="logo logo-mobile">
                        <a href="http://happylive.vn">
                            <img src="<?php echo public_url('site');?>/design/14/logo.png?v=90"
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
        <div id="navbar" class="navbar-collapse collapse ">
            <nav class="nav navbar-nav clearfix main-menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Tutorials</a><span class="dropBottom"></span>
                        <ul>
                            <li><a href="#">Design</a><span class="dropRight"></span>
                                <ul>
                                    <li><a href="#">Photoshop</a></li>
                                    <li><a href="#">Illustrator</a></li>
                                    <li><a href="#">Web Design</a><span class="dropRight"></span>
                                        <ul>
                                            <li><a href="#">XTHML</a></li>
                                            <li><a href="#">CSS</a></li>
                                            <li><a href="#">JavaScript</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Articles</a></li>
                            <li><a href="#">Interviews</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="hidden-xs pull-right right-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="col-md-12">

                    <div class="search-bar">

                        <div class="">
                            <form action="/search">
                                <input type="hidden" name="type" value="product"/>
                                <input type="text" name="q" placeholder="Tìm kiếm..."
                                       autocomplete="off"/>
                            </form>
                        </div>
                    </div>
                </li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>