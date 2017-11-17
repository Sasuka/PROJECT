<?php $this->load->view('site/product_cart/breadcrumb'); ?>
<section id="content" class="clearfix container">
    <div class="row">
        <div id="cart" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Begin empty cart -->

            <div class="row">
                <div id="layout-page" class="col-md-12 col-sm-12 col-xs-12">
			<span class="header-page clearfix">
				<h1>Giỏ hàng</h1>
			</span>
                    <form action="<?php echo base_url('cart/checkout')?>" method="post" id="cartformpage">
                        <table>
                            <thead>
                            <tr>
                                <th class="image">&nbsp;</th>
                                <th class="item">Tên sản phẩm</th>
                                <th class="qty">Số lượng</th>
                                <th class="price">Giá tiền<br><span style="color: #ff0a10;">(DVT: $)</span></th>
                                <th class="remove">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cart = $this->cart->contents();
                            $sum = 0;
                            foreach ($cart as $row) {
                                $sum += $row['subtotal'];
                                ?>
                                <tr>
                                    <td class="image">
                                        <div class="product_image">
                                            <a href="<?php echo upload_url('product/') . $row['image']; ?>"
                                               target="_blank">
                                                <img src="<?php echo upload_url('product/') . $row['image']; ?>"
                                                     alt="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG"/>

                                            </a>
                                        </div>
                                    </td>
                                    <td class="item">
                                        <a href="<?php echo $row['name']; ?>">
                                            <strong><?php echo $row['name']; ?></strong>

                                        </a>
                                    </td>
                                    <td class="qty">
                                        <input type="number" size="4" name="updates[]" min="1"
                                               id="updates_<?php echo $row['rowid']; ?>"
                                               value="<?php echo $row['qty']; ?>" onfocus="this.select();"
                                               class="tc item-quantity"/>
                                    </td>
                                    <td class="price"><?php echo $row['subtotal']; ?></td>
                                    <td class="remove">
                                        <a href="javascript:void(0);" onclick='deleteCart(<?php echo $row['id']; ?>)'
                                           name="<?php echo base_url('cart/del') ?>" class="cart">Xóa</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr class="summary">
                                <td class="image">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="text-center"><b>Tổng cộng:</b></td>
                                <td class="price">
								<span class="total">
									<strong><?php echo "<span style='color:#33ff'>" . $sum . "</span>"; ?></strong>
								</span>
                                </td>
                                <td>&nbsp;</td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 inner-left inner-right">
                                <div class="checkout-buttons clearfix">
                                    <label for="note">Ghi chú </label>
                                    <textarea id="note" name="note" rows="8" cols="50"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 cart-buttons inner-right inner-left">
                                <div class="buttons clearfix">
                                    <button type="submit" id="checkout" class="button-default"
                                            name="checkout" value="">Thanh toán
                                    </button>
                                    <button type="submit" id="update-cart" class="button-default"
                                            name="update" value="">Cập nhật
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12  col-xs-12 continue-shop">

                                <a href="<?php echo base_url('home'); ?>">
                                    <i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>


            <!-- End cart -->

        </div>


    </div>
</section>
<script>
    jQuery(document).ready(function () {
        $('#checkout').on('click', function (evt) {

        });
    });
</script>
