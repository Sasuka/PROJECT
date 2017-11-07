<div id="quick-view-modal" class="wrapper-quickview" style="display: none;">
    <div class="quickviewOverlay"></div>
    <div class="jsQuickview">
        <div class="modal-header clearfix" style="width: 100%">
            <a href="/products/dong-ho-nam-skmei-kim-xanh-duong" class="quickview-title text-left"
               title="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG">
                <h4 class="p-title modal-title">ĐỒNG HỒ NAMNG</h4>
            </a>
            <div class="quickview-close">
                <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="col-md-5">
            <div class="quickview-image image-zoom">
                <img class="p-product-image-feature"
                     src="<?php echo upload_url('product'); ?>/1_e0ed7c0240734782a8268793dce0b9b8_large.jpg"
                     alt="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG">
            </div>
            <div id="quickview-sliderproduct">
                <div class="quickview-slider">
                    <ul class="owl-carousel owl-theme" style="display: block; opacity: 1;">
                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper" style="width: 600px; left: 0px; display: block;">
                                <div class="owl-item" style="width: 100px;">
                                    <li class="product-thumb active"><a href="javascript:void(0);"
                                                                        data-image="<?php echo upload_url('product'); ?>/1_e0ed7c0240734782a8268793dce0b9b8_large.jpg">
                                            <img src="<?php echo upload_url('product'); ?>/1_e0ed7c0240734782a8268793dce0b9b8_small.jpg"></a>
                                    </li>
                                </div>
                                <div class="owl-item" style="width: 100px;">
                                    <li class="product-thumb"><a href="javascript:void(0);"
                                                                 data-image="<?php echo upload_url('product'); ?>/2_85fc5908867e488da92b768cb240477d_large.jpg">
                                            <img src="<?php echo upload_url('product'); ?>/2_85fc5908867e488da92b768cb240477d_small.jpg"></a>
                                    </li>
                                </div>
                                <div class="owl-item" style="width: 100px;">
                                    <li class="product-thumb"><a href="javascript:void(0);"
                                                                 data-image="<?php echo upload_url('product'); ?>/3_30be00d496bb474aa0e9324311dd02f0_large.jpg">
                                            <img src="<?php echo upload_url('product'); ?>/3_30be00d496bb474aa0e9324311dd02f0_small.jpg"></a>
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
            <form id="form-quickview" method="post" action="/cart/add">
                <div class="quickview-information">
                    <div class="form-input">
                        <div class="quickview-price product-price">
                            <span>499,000₫</span>
                            <del>700,000₫</del>
                        </div>
                    </div>
                    <div class="quickview-variants variant-style clearfix">
                        <select name="id" class="" id="quickview-select" style="display: none;">
                            <option value="1012030836">Default Title - 49900000</option>
                        </select>
                    </div>
                    <div class="quickview-description">
                    </div>
                    <div class="form-input ">
                        <label>
                            Số lượng</label>
                        <input id="quantity-quickview" name="quantity" type="number" min="1" value="1">
                    </div>
                    <div class="form-input" style="width: 100%">
                        <button type="submit" class="btn-detail  btn-color-add btn-min-width btn-mgt btn-addcart"
                                style="display: block;">
                            Thêm vào giỏ
                        </button>
                        <button disabled=""
                                class="btn-detail addtocart btn-color-add btn-min-width btn-mgt btn-soldout"
                                style="display: none;">
                            Hết hàng
                        </button>
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
                url: purl + '.js',
                async: false,
                success: function (product) {
                    $.each(product.options, function (i, v) {
                        product.options[i] = v.name;
                    })
                    item.find('.quickview-title').attr('title', product.title).attr('href', product.url).find('h4').html(product.title);
                    item.find('.quickview-variants').html(quickview_html_variants);
                    $('.quickview-image').html(quickview_image_zoom);
                    $.each(product.variants, function (i, v) {
                        item.find('#quickview-select').append("<option value='" + v.id + "'>" + v.title + ' - ' + v.price + "</option>");
                    })
                    if (product.variants.length == 1 && product.variants[0].title.indexOf('Default') != -1)
                        $('#quickview-select').hide();
                    else
                        $('#quickview-select').show();
                    if (product.variants.length == 1 && product.variants[0].title.indexOf('Default') != -1) {
                        callBack(product.variants[0], null);
                    }
                    else {
                        new Haravan.OptionSelectors("quickview-select", {
                            product: product,
                            onVariantSelected: callBack
                        });
                        if (product.options.length == 1 && product.options[0].indexOf('Tiêu đề') == -1)
                            item.find('.selector-wrapper:eq(0)').prepend('<label>' + product.options[0] + '</label>');
                        $('.p-option-wrapper select:not(#p-select)').each(function () {
                            $(this).wrap('<span class="custom-dropdown custom-dropdown--white"></span>');
                            $(this).addClass("custom-dropdown__select custom-dropdown__select--white");
                        });
                        callBack(product.variants[0], null);
                    }
                    if (product.images.length == 0) {
                        item.find('.quickview-image').find('img').attr('alt', product.title).attr('src', './hstatic.net/0/0/global/design/theme-default/no-image.png');
                    }
                    else {
                        $('.quickview-slider').remove();
                        $('#quickview-sliderproduct').append("<div class='quickview-slider' class='flexslider'>");
                        $('.quickview-slider').append("<ul class='owl-carousel'>");
                        $.each(product.images, function (i, v) {
                            elem = $('<li class="product-thumb">').append('<a href="javascript:void(0);" data-image=""><img /></a>');
                            elem.find('a').attr('data-image', Haravan.resizeImage(v, 'large'));
                            elem.find('img').attr('src', Haravan.resizeImage(v, 'small'));
                            item.find('.owl-carousel').append(elem);
                        });
                        item.find('.quickview-image img').attr('alt', product.title).attr('src', Haravan.resizeImage(product.featured_image, 'large'));

                        $('.quickview-slider img').imagesLoaded(function () {
                            var owl = $('.owl-carousel');
                            owl.owlCarousel({
                                items: 3,
                                navigation: true,
                                navigationText: ['owl-prev', 'owl-next']
                            });
                            $('.quickview-slider .owl-carousel .owl-item').first().children('.product-thumb').addClass('active');
                        });

                    }

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
            var params = {
                type: 'POST',
                url: '/cart/add.js',
                async: true,
                data: 'quantity=' + quantity_quickview + '&id=' + variant_id_quickview,
                dataType: 'json',
                success: function (line_item) {
                    window.location = '/cart';
                },
                error: function (XMLHttpRequest, textStatus) {
                    alert('Sản phẩm bạn vừa mua đã vượt quá tồn kho');
                }
            };
            jQuery.ajax(params);
        });


    });
</script>