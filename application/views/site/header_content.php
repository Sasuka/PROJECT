<header class="header bkg visible-lg">
    <div class="container clearfix">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 logo">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-7 col-xs-7">
                        <!-- LOGO -->
                        <h1>
                            <a href="#">
                                <img src="Tiến Tài" class="img-responsive logoimg"/>
                            </a>
                        </h1>
                        <h1 style="display:none"><a href="/">Tiến Tài</a>
                        </h1>
                    </div>
                    <div class="hidden-lg hidden-md col-sm-5 col-xs-5 mobile-icons">
                        <div>
                            <a href="#" title="Xem giỏ hàng" class="mobile-cart"><span>5</span></a>
                            <a href="#" id="mobile-toggle"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
                <aside class="top-info">
                    <div class="cart-info hidden-xs">
                        <a class="cart-link" href="<?php echo base_url('cart')?>"><span class="icon-cart"></span>
                            <div class="cart-number"><?php echo $this->cart->total_items(); ?></div>
                        </a>
                        <div class="cart-view clearfix" style="display: none;">
                            <table id="clone-item-cart" class="table-clone-cart">
                                <tr class="item_2 hidden">
                                    <td class="img"><a href="" title=""><img src="" alt=""/></a></td>
                                    <td><a class="pro-title-view" href="" title=""></a>
                                        <span class="variant"></span>
                                        <span class="pro-quantity-view"></span>
                                        <span class="pro-price-view"></span>
                                        <span class="remove_link remove-cart"></span>
                                    </td>
                                </tr>
                            </table>

                            <table id="cart-view">
                                <?php
                                $cart = $this->cart->contents();
                                $sum = 0;
                                foreach ($cart as $row) {
                                    $sum += $row['subtotal'];
                                    ?>
                                    <tr>
                                        <td class="img">
                                            <a href="/products/dong-ho-nam-skmei-kim-xanh-duong">
                                                <img src="<?php echo upload_url('product/') . $row['image']; ?>"
                                                     alt="<?php echo $row['name']; ?>"/>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="pro-title-view" href="#"
                                               title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                            <span class="variant"></span>
                                            <span class="pro-quantity-view"><?php echo $row['qty']; ?></span>
                                            <span class="pro-price-view"><?php echo " X " . $row['price'] . " = <span style='color:#0000FF;'> " . $row['subtotal'] . "</span> $"; ?></span>
                                            <span class="remove_link remove-cart">
                                        <a href='javascript:void(0);' onclick='deleteCart(<?php echo $row['id']; ?>)' name="<?php echo base_url('cart/del')?>">
                                            <i class='fa fa-times'></i></a>
                                        </span>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <span class="line"></span>
                            <table class="table-total">
                                <tr>
                                    <td class="text-left">TỔNG TIỀN:</td>
                                    <td class="text-right" id="total-view-cart"><?php echo $sum . "  $ "; ?></td>
                                </tr>
                                <tr>
                                    <td><a href="<?php echo base_url('cart')?>" class="linktocart">Xem giỏ hàng</a></td>
                                    <td><a href="/checkout" class="linktocheckout">Thanh toán</a></td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <div class="navholder">
                        <nav id="subnav">
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 0917.077.025</a>
                                </li>
                                <?php if (empty($cusAccount)) { ?>
                                <li><a class="reg" href="<?php echo base_url() . 'user/register' ?>" title="Đăng ký">ĐĂNG
                                        KÝ</a></li>
                                <li><a class="log" href="<?php echo base_url() . 'user/login'; ?>" title="Đăng nhập">Đăng
                                        nhập</a>
                                    <?php }else{
                                    ?>
                                <li></span><a
                                            href="<?php echo base_url() . 'user/edit/' . $cusAccount['MA_KHACHHANG']; ?>"><i
                                                class="glyphicon glyphicon-user"
                                                aria-hidden="true"></i><?php echo ' ' . $cusAccount['HO'] . ' ' . $cusAccount['TEN']; ?>
                                    </a></li>

                                <li><a class="logout" href="<?php echo base_url() . 'user/logout'; ?>"
                                       title="Đăng xuất"> Đăng xuất</a>

                                    <?php } ?>
                                </li>
                            </ul>
                        </nav>
                        <div class="header_line"><p>Miễn phí vận chuyển<span class="mar-l5">ĐƠN HÀNG TRÊN 500K TP HỒ CHÍ MINH</span>
                            </p></div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</header>
<script>
 /* Trường hợp xóa 1 sản phẩm*/

    jQuery(document).ready(function () {

        function deleteCart(id) {
            $.ajax({
                url: "<?php echo base_url('cart/del/')?>+id",
                async: false,
                success: function (product) {
                    alert(product);
                }
            });
        }
    });
</script>