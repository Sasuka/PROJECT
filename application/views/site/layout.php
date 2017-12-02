<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BÁN PHỤ TÙNG Ô TÔ</title>
    <?php $this->load->view('site/head', $this->data); ?>
</head>
<body>
<!--The header-->
<?php $this->load->view('site/header', $this->data); ?>
<!--End Header-->
<div id="page">
    <?php //pre($carts);?>
    <div id="quick-view-modal" class="wrapper-quickview" style="display: none;">

        <div class="quickviewOverlay"></div>
        <div class="jsQuickview">
            <p id="test1"></p>
            <div class="modal-header clearfix" style="width: 100%">
                <a href="/products/dong-ho-nam-skmei-kim-xanh-duong" class="quickview-title text-left"
                   title="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG">
                    <h4 class="p-title modal-title"></h4>
                </a>
                <div class="quickview-close">
                    <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="quickview-image image-zoom">
                    <img class="p-product-image-feature"
                         src="<?php echo upload_url('product'); ?>/"
                         alt="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG">
                </div>
                <div id="quickview-sliderproduct">
                    <div class="quickview-slider">
                        <ul class="owl-carousel owl-theme" style="display: block; opacity: 1;">
                            <div class="owl-wrapper-outer">
                                <div class="owl-wrapper" style="width: 600px; left: 0px; display: block;">
                                    <div class="owl-item" style="width: 100px;">
                                        <li class="product-thumb active">
                                            <a href="javascript:void(0);" data-image="
                    <?php echo upload_url('product'); ?>/1_e0ed7c0240734782a8268793dce0b9b8_large.jpg">
                                                <img src="
                    <?php echo upload_url('product'); ?>/1_e0ed7c0240734782a8268793dce0b9b8_small.jpg"></a>
                                        </li>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-controls clickable" style="display: none;">
                                <div class="owl-pagination">
                                    <div class="owl-page active">
                                        <span class=""></span>
                                    </div>
                                </div>
                                <div class="owl-buttons">
                                    <div class="owl-prev">owl-prev</div>
                                    <div class="owl-next">owl-next</div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <form id="form-quickview" method="post" action="<?php echo base_url(); ?>cart/add">
                    <div class="quickview-information">
                        <div class="form-input">
                            <div class="quickview-price product-price">
                                <i style="color: blue;"> Đơn giá:</i>
                                <span>0</span>
                                <del></del>
                                <div class="discount-cost" style="display: inline-block;">
                                    <i style="color: red;text-indent: 30px;"> Tiết kiệm : <span
                                                style="color: #ffa20a;"></span>.</i>
                                </div>
                            </div>
                            <div class="summary">
                                <br><strong style="color: #0000FF;">Tên sản phẩm: <span
                                            class="product-name" style="color: #ff9f0a; font-family: " Courier New",
                                    Courier, mono"></span></strong>
                                <hr>
                                <strong style="color: #0000FF;"> Loại sản phẩm:&nbsp;<span class="categories-name"
                                                                                           style="color: #ff9f0a; font-family: "
                                                                                           Courier New", Courier,
                                    mono">  </span>
                                    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Thương hiệu: &nbsp;<span class="branch-name"
                                                                                                  style="color: #ff9f0a; font-family: "
                                                                                                  Courier New", Courier,
                                    mono"></span>
                                </strong>
                                <hr>

                                <strong>Tặng phẩm: <span class="gift-name"></span> </strong>

                            </div>
                        </div>

                        <div class="quickview-variants variant-style clearfix">
                            <!--                            <select name="id" class="" id="quickview-select" style="display: none;">-->
                            <!--                                <option value="1012030836">Default Title - 49900000</option>-->
                            <!--                            </select>-->
                            <input type="hidden" name="id" class="quick-view-select" style="display: none "/>

                        </div>
                        <div class="quickview-description">


                        </div>
                        <div class="form-input ">
                            <label>
                                Số lượng</label>
                            <input id="quantity-quickview" name="quantity" type="number" min="1" max="7" value="1">
                        </div>
                        <div class="form-input btnAction" style="width: 100%">
                            <button type="submit" class="btn-detail  btn-color-add btn-min-width btn-mgt btn-addcart"
                                    style="display: block;">
                                Thêm vào giỏ
                            </button>
                            <button disabled=""
                                    class="btn-detail addtocart btn-color-add btn-min-width btn-mgt btn-soldout"
                                    style="display: none;">
                                Hết hàng
                            </button>
                            <input type="hidden" name="btnAddCart" id="btnAddCart"
                                   value="<?php echo base_url('cart/add') ?>"/>
                            <div class="qv-readmore">
                                <span>hoặc </span><a class="read-more p-url" href="" role="button">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        /* QUICK VIEW JS */
        jQuery(document).ready(function () {
            /*****************/
//          s
            /**************/
            var callBack = function (variant, selector) {
                if (variant) {
                    item = $('.wrapper-quickview');
                    if (variant != null && variant.featured_image != null) {
                        item.find(".product-thumb a[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'large') + "']").click();
                    }
                    item.find('.quickview-price').find('span').html(Haravan.formatMoney(variant.price, "{{amount}}₫"));

                    if (variant.compare_at_price > variant.price)
                        item.find('.quickview-price').find('del').html(Haravan.formatMoney(variant.compare_at_price, "{{amount}}₫"));
                    else
                        item.find('.quickview-price').find('del').html('');
                    if (variant.available) {
                        item.find('.btn-addcart').css('display', 'block');
                        item.find('.btn-soldout').css('display', 'none');
                    }
                    else {
                        item.find('.btn-addcart').css('display', 'none');
                        item.find('.btn-soldout').css('display', 'block');
                    }
                }
                else {
                    item.find('.btn-addcart').css('display', 'none');
                    item.find('.btn-soldout').css('display', 'block');
                }
            }
            var quickview_html_variants = $('.quickview-variants').html();
            var quickview_image_zoom = $('.quickview-image').html();

            var quickViewProduct = function (purl) {
                if ($(window).width() < 680) {
                    window.location = purl;
                    return false;
                }
                item = $('.wrapper-quickview');
                $.ajax({
                    url: purl,
                    async: false,
                    success: function (product) {
                        var selectedImage1 = $('.product-list').find('.product-block').find('.product-img img'),
                            slectedImageUrl1 = selectedImage1.attr('src')
                        ;

                        var pro = JSON.parse(product);
                        console.log(slectedImageUrl1);

                        item.find('.quickview-title').attr('title', pro["TEN_SANPHAM"]).attr('href', slectedImageUrl1).find('h4').html(pro["TEN_SANPHAM"]);
                        item.find('.quickview-variants').html(quickview_html_variants);
                        $('.quickview-image').html(quickview_image_zoom);
                        console.log(pro['PHANTRAM_KM']);
                        if (typeof pro['PHANTRAM_KM'] == 'undefined') {
                            item.find('.quickview-price').find('span').html(pro["DONGIA_BAN"] + " $");
                            item.find('.discount-cost').find('i').css({'display': 'none'});
                            item.find('.summary').find('.gift-name').css({'display': 'none'});
                        } else {
                            item.find('.quickview-price').find('span').html((1 - 0.01 * pro['PHANTRAM_KM']) * pro["DONGIA_BAN"] + " $");
                            item.find('.quickview-price').find('del').html(pro["DONGIA_BAN"] + " $");
                            item.find('.discount-cost').find('i').css({'display': 'block'});
                            item.find('.summary').find('.gift-name').css({'display': 'block'});
                            item.find('.discount-cost').find('span').html(pro["PHANTRAM_KM"] + " %");
                            if (pro['TANGPHAM'] != '') {
                                item.find('.summary').find('.gift-name').html(pro['TANGPHAM']);
                            } else {
                                item.find('.summary').find('.gift-name').html('Không có.');
                            }
                        }
                        console.log('max ' + item.find('#quantity-quickview').attr('max'));
                        item.find('#quantity-quickview').attr('max', pro['SOLUONG_BAN']);
                        item.find('.summary').find('.product-name').html(pro['TEN_SANPHAM']);
                        item.find('.summary').find('.categories-name').html(pro['TEN_LOAI_SANPHAM']);
                        item.find('.summary').find('.branch-name').html(pro['TEN_NHOM_SANPHAM']);
                        item.find('.quickview-image').find('img').attr('alt', pro["TEN_SANPHAM"]).attr('src', "http://localhost/www/PROJECT/uploads/product/" + pro['HINH_DAIDIEN']);
                        item.find('.quickview-image').find('img').css({"width": "345px", "height": "260px"});
                        item.find('.quickview-variants').find('.quick-view-select').val(pro["MA_SANPHAM"]);
                        var list_image = JSON.parse(pro['DS_HINHANH']);
                        $.each(list_image, function (key, val) {
                            console.log('key' + key + 'val' + val);


                            img =  item.find('#quickview-sliderproduct')
                                .find('.owl-wrapper').find('.owl-item')
                                .find('li .product-thumb').find('img')
                                .attr('src',"http://localhost/www/PROJECT/uploads/product/"+val);
                           console.log('ê'+img);
                            // $('#owl-wrapper').html(
                            //
                            // );
                            img.width('20px').height('20px').appendTo($('#owl-wrapper'));

                        });

                        var pro_price = $(".product-detail").find(".pro-prices").find(".pro-price").html();
                      //  console.log("ssss" + item.find('.quickview-variants').find('.quick-view-select').val());
                        //  $('#test1').text(pro["TEN_SANPHAM"]);

                     //   console.log(pro);
                    }

                });
                return false;
            }
            //final width --> this is the quick view image slider width
            //maxQuickWidth --> this is the max-width of the quick-view panel
            var sliderFinalWidth = 500,
                maxQuickWidth = 900;

            //open the quick view panel
            jQuery(document).on("click", ".quickview", function (event) {

                var selectedImage = $(this).parents('.product-block').find('.product-img img'),
                    slectedImageUrl = selectedImage.attr('src');
                quickViewProduct($(this).attr('data-handle'));
                animateQuickView(selectedImage, sliderFinalWidth, maxQuickWidth, 'open');

                //update the visible slider image in the quick view panel
                //you don't need to implement/use the updateQuickView if retrieving the quick view data with ajax

            });

            $('.wrapper-quickview').on('click', '.product-thumb a', function () {
                item = $('.wrapper-quickview');
                item.find('.quickview-image img').attr('src', $(this).attr('data-image'));
                item.find('.product-thumb').removeClass('active');
                $(this).parents('li').addClass('active');
                return false;
            });
            //close the quick view panel

            $(document).on('click', '.quickview-close, .quickviewOverlay', function (e) {
                $(".wrapper-quickview").fadeOut(500);
                $('.jsQuickview').fadeOut(500);
            });


            //center quick-view on window resize
            $(window).on('resize', function () {
                if ($('.wrapper-quickview').hasClass('is-visible')) {
                    window.requestAnimationFrame(resizeQuickView);
                }
            });

            function animateQuickView(image, finalWidth, maxQuickWidth, animationType) {

                $('.wrapper-quickview').fadeIn(500);
                $('.jsQuickview').fadeIn(500);
            }

            $(document).on("click", ".btn-addcart", function (event) {
                event.preventDefault();
                variant_id_quickview = $('#quickview-select').val();
                quantity_quickview = $('#quantity-quickview').val();
                id_product = item.find('.quickview-variants').find('.quick-view-select').val();
                var btnCart = item.find('#form-quickview').attr('action');
                //   console.log(btnCart);

                var params = {
                    type: 'POST',
                    url: btnCart,
                    async: false,
                    data: 'quantity=' + quantity_quickview + '&id=' + id_product,
                    dataType: 'json',
                    success: function (line_item) {
                        //  window.location = '/cart';
                        switch (line_item) {
                            case 1:
                                msg = "Đặt mua thất bại";
                                break;
                            default:
                                msg = "Đặt hàng thành công";
                                alert(msg);
                                setTimeout(window.location.reload(true), 2000);

                        }
                        $(".wrapper-quickview").fadeOut(500);
                        $('.jsQuickview').fadeOut(500);

                    },
                    error: function (XMLHttpRequest, textStatus) {
                        /// alert('Sản phẩm bạn vừa mua đã vượt quá tồn kho');
                        alert(dump(XMLHttpRequest));
                    }
                };
                jQuery.ajax(params);
            });


        });
    </script>


    <section id="page_content" class="">
        <div id="pageContainer" class="clearfix">

            <?php $this->load->view('site/header_content', $this->data); ?>

            <nav class="navbar-main navbar navbar-default cl-pri">
                <!-- MENU MAIN -->
                <?php $this->load->view('site/main_menu', $this->data); ?>
                <!-- End container  -->
                <script>

                    $(window).resize(function () {
                        $('li.dropdown li.active').parents('.dropdown').addClass('active');
                        if ($('.right-menu').width() + $('#navbar').width() > $('.check_nav.nav-wrapper').width() - 40) {
                            $('.nav-wrapper').addClass('responsive-menu');
                        }
                        else {
                            $('.nav-wrapper').removeClass('responsive-menu');
                        }
                    })

                    $(document).on("click", ".mobile-menu-icon .dropdown-menu ,.drop-control .dropdown-menu, .drop-control .input-dropdown", function (e) {
                        e.stopPropagation();
                    });
                </script>
                <script>
                    $(function () {
                        $('nav#menu-mobile').mmenu();
                    });
                    $(document).ready(function () {
                        flagg = true;
                        if (flagg) {
                            $('.click-menu-mobile a').click(function () {
                                $('#menu-mobile').removeClass('hidden');
                                flagg = false;
                            })
                        }
                    })
                </script>
            </nav>

            <?php
            //echo $_SERVER['REQUEST_URI']."<pre>";

            //  echo base_url();
            if ($this->uri->segment(1) == "") {
                ?>
                <!-- Begin slider -->
                <div class="slider-default bannerslider">
                    <?php $this->load->view('site/slider', $this->data); ?>
                </div>
                <!--                 End slider-->
                <?php
            } ?>
            <?php //$this->load->view('site/news/news_breadcrumb'); ?>


        </div>

        <section id="content" class="clearfix container">
            <?php
            /**Thông báo trạng thái**/
            if ($this->session->flashdata('message')) {

//                // pre($cusAccount);
//                $this->data['message'] = 'Bạn đăng nhập thành công';
//                $this->load->view('site/messager_success',$this->data);
                if (isset($isLogin)) {
                    //var_dump($isLogin);
                    if ($isLogin == '1') {
                        $this->data['message'] = $this->session->flashdata('message');
                        $this->load->view('site/messager_success', $this->data);
                    } elseif ($isLogin == '2') {
                        $this->data['message'] = $this->session->flashdata('message');
                        $this->data['link'] = $this->session->flashdata('link');
                        $this->load->view('site/messager_blockacc', $this->data);
                    } elseif ($isLogin == '3') {
                        $this->data['message'] = $this->session->flashdata('message');
                        $this->data['link'] = $this->session->flashdata('link');
                        $this->load->view('site/messager_notexists', $this->data);
                    }
                }
            }
            /******/
            $this->load->view($temp, $this->data);
            ?>

        </section>

        <footer id="footer">
            <div class="footer-bottom">
                <?php $this->load->view('site/footer_bottom', $this->data); ?>
            </div>
            <div class="footer-copyright">
                <?php $this->load->view('site/footer_copyright', $this->data); ?>
            </div>
        </footer>
        <a href="#" class="scrollToTop show">
            <i class="fa fa-chevron-up"></i>
        </a>

        <!--Scroll to Top-->
        <div style="display:none" id="myCart" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="false" style="display: block;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Bạn có 9 sản phẩm trong giỏ hàng.</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="hrv-close-modal"></span>
                        </button>
                    </div>
                    <form action="/cart" method="post" id="cartform" style="display: block;">
                        <div class="modal-body">
                            <table style="width:100%;" id="cart-table">
                                <tbody>
                                <tr>
                                    <th></th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th></th>
                                </tr>
                                <tr class="line-item original">
                                    <td class="item-image"></td>
                                    <td class="item-title">
                                        <a></a>
                                    </td>
                                    <td class="item-quantity"></td>
                                    <td class="item-price"></td>
                                    <td class="item-delete text-center"></td>
                                </tr>
                                <tr class="line-item">
                                    <td class="item-image"><img
                                                src="<?php echo upload_url('product'); ?>/7_0590d26379fb4da3ba8d9b57564ee6b0_small.jpg">
                                    </td>
                                    <td class="item-title">
                                        <a href="/products/dong-ho-nam-tevise-1952-chay-co-cuc-chat">ĐỒNG HỒ NAM TEVISE
                                            1952 CHẠY CƠ CỰC CHẤT<br><span></span></a>
                                    </td>
                                    <td class="item-quantity"><input id="quantity1" name="updates[]" min="1"
                                                                     type="number" value="3" class=""></td>
                                    <td class="item-price">2,400,000₫</td>
                                    <td class="item-delete text-center"><a href="javascript:void(0);"
                                                                           onclick="deleteCart(1012006173)"><i
                                                    class="fa fa-times"></i></a></td>
                                </tr>
                                <tr class="line-item">
                                    <td class="item-image"><img
                                                src="<?php echo upload_url('product'); ?>/1_e0ed7c0240734782a8268793dce0b9b8_small.jpg">
                                    </td>
                                    <td class="item-title">
                                        <a href="/products/dong-ho-nam-skmei-kim-xanh-duong">ĐỒNG HỒ NAM SKMEI KIM XANH
                                            DƯƠNG<br><span></span></a>
                                    </td>
                                    <td class="item-quantity"><input id="quantity1" name="updates[]" min="1"
                                                                     type="number" value="6" class=""></td>
                                    <td class="item-price">2,994,000₫</td>
                                    <td class="item-delete text-center"><a href="javascript:void(0);"
                                                                           onclick="deleteCart(1012030836)"><i
                                                    class="fa fa-times"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="modal-note">
                                        <textarea placeholder="Viết ghi chú" id="note" name="note" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="total-price-modal">
                                        Tổng cộng : <span class="item-total">5,394,000₫</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px;">
                                <div class="col-lg-6">
                                    <div class="comeback">
                                        <a href="/collections/all">
                                            <i class="fa fa-caret-left mr10"></i>Tiếp tục mua hàng
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <div class="buttons btn-modal-cart">
                                        <button type="submit" class="button-default" id="checkout" name="checkout">
                                            Đặt hàng
                                            <i class="fa fa-caret-right"></i>
                                        </button>
                                    </div>

                                    <div class="buttons btn-modal-cart">
                                        <button type="submit" class="button-default" id="update-cart-modal" name="">
                                            <i class="fa fa-caret-left"></i>
                                            Cập nhật
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" class="hidden">
            <symbol id="icon-add-cart">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     viewBox="0 0 512 512" enable-background="new 0 0 512 512">
                    <g>
                        <g>
                            <polygon
                                    points="447.992,336 181.555,336 69.539,80 0.008,80 0.008,48 90.477,48 202.492,304 447.992,304 		"/>
                        </g>
                        <path d="M287.992,416c0,26.5-21.5,48-48,48s-48-21.5-48-48s21.5-48,48-48S287.992,389.5,287.992,416z"/>
                        <path d="M447.992,416c0,26.5-21.5,48-48,48s-48-21.5-48-48s21.5-48,48-48S447.992,389.5,447.992,416z"/>
                        <g>
                            <polygon points="499.18,144 511.992,112 160.008,112 172.805,144 		"/>
                            <polygon points="211.195,240 223.992,272 447.992,272 460.805,240 		"/>
                            <polygon points="486.398,176 185.602,176 198.398,208 473.586,208 		"/>
                        </g>
                    </g>
                </svg>
            </symbol>
            <symbol id="icon-list-switch">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     viewBox="0 0 194.828 194.828" style="enable-background:new 0 0 194.828 194.828;"
                     xml:space="preserve">
			<g>
                <g>
                    <g>
                        <path d="M190.931,17.534H3.897C1.745,17.534,0,19.279,0,21.431v19.483c0,2.152,1.745,3.897,3.897,3.897h187.034
										 c2.152,0,3.897-1.745,3.897-3.897V21.431C194.828,19.279,193.083,17.534,190.931,17.534z M187.034,37.017H7.793v-11.69h179.241
										 V37.017z"/>
                        <path d="M190.931,64.293H3.897C1.745,64.293,0,66.038,0,68.19v31.172c0,2.152,1.745,3.897,3.897,3.897h187.034
										 c2.152,0,3.897-1.745,3.897-3.897V68.19C194.828,66.038,193.083,64.293,190.931,64.293z M187.034,95.466H7.793v-23.38h179.241
										 V95.466z"/>
                        <path d="M190.931,122.741H3.897c-2.152,0-3.897,1.745-3.897,3.897v46.759c0,2.152,1.745,3.897,3.897,3.897h187.034
										 c2.152,0,3.897-1.745,3.897-3.897v-46.759C194.828,124.486,193.083,122.741,190.931,122.741z M187.034,169.5H7.793v-38.966
										 h179.241V169.5z"/>
                    </g>
                </g>
            </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
		</svg>

            </symbol>
            <symbol id="icon-sort-by">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     viewBox="0 0 490 490" style="enable-background:new 0 0 490 490;" xml:space="preserve">
			<g>
                <polygon points="85.877,154.014 85.877,428.309 131.706,428.309 131.706,154.014 180.497,221.213 217.584,194.27 108.792,44.46
												 0,194.27 37.087,221.213 	"/>
                <polygon points="404.13,335.988 404.13,61.691 358.301,61.691 358.301,335.99 309.503,268.787 272.416,295.73 381.216,445.54
												 490,295.715 452.913,268.802 	"/>
            </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
		</svg>
            </symbol>
            <symbol id="icon-search_white" viewBox="0 0 1024 1024">
                <path class="path1"
                      d="M1014.176 968.256l-264.32-260.128c69.184-75.264 111.68-174.688 111.68-284.128 0-234.080-192.8-423.872-430.688-423.872s-430.72 189.792-430.72 423.872c0 234.112 192.864 423.872 430.72 423.872 102.752 0 197.088-35.552 271.072-94.688l265.376 261.12c12.928 12.736 33.952 12.736 46.88 0 12.96-12.672 12.96-33.376 0-46.048zM430.848 782.688c-201.312 0-364.48-160.64-364.48-358.688 0-198.080 163.168-358.656 364.48-358.656 201.28 0 364.448 160.576 364.448 358.656 0.032 198.048-163.168 358.688-364.448 358.688z"></path>
            </symbol>
            <symbol id="icon-user" viewBox="0 0 1024 1024">
                <title>user</title>
                <path class="path1"
                      d="M622.826 702.736c-22.11-3.518-22.614-64.314-22.614-64.314s64.968-64.316 79.128-150.802c38.090 0 61.618-91.946 23.522-124.296 1.59-34.054 48.96-267.324-190.862-267.324s-192.45 233.27-190.864 267.324c-38.094 32.35-14.57 124.296 23.522 124.296 14.158 86.486 79.128 150.802 79.128 150.802s-0.504 60.796-22.614 64.314c-71.22 11.332-337.172 128.634-337.172 257.264h896c0-128.63-265.952-245.932-337.174-257.264z"></path>
            </symbol>
        </svg>
</div>
</section>
</div>

</body>
</html>
