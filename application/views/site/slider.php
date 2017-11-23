
<div class="hrv-banner-container">
    <div class="hrvslider">
        <ul class="slides">
            <li>
                <a href="#" class="hrv-url">
                    <img class="img-responsive"
                         src="<?php echo upload_url('slider').'/slider_1.png';?>"
                         alt="Hình ảnh ô tô"/>
                </a>
                <div id="#" class="hrv-caption hrv-banner-caption">
                    <div class="container">
                        <div class="hrv-caption-inner">
                            <div class="hrv-banner-content slider-1">
                                <h2 class="hrv-title1">Giá rẻ bất ngờ</h2>
                                <h3 class="hrv-title2">CHẤT LƯỢNG ĐẢM BẢO</h3>
                                <a href="#" class="hrv-url">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="hrv-url">
                    <img class="img-responsive"
                         src="<?php echo upload_url('slider');?>/slider_2.png"
                         alt=""/>
                </a>
                <div id="hrv-banner-caption2" class="hrv-caption hrv-banner-caption">
                    <div class="container">
                        <div class="hrv-caption-inner">
                            <div class="hrv-banner-content slider-2">
                                <h2 class="hrv-title1">Tinh tế sang trọng</h2>
                                <h3 class="hrv-title2">ĐẲNG CẤP MÃI MÃI</h3>
                                <a href="#" class="hrv-url">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="hrv-url">
                    <img class="img-responsive"
                         src="<?php echo upload_url('slider');?>/slider_3.png"
                         alt=""/>
                </a>
                <div id="hrv-banner-caption3" class="hrv-caption hrv-banner-caption">
                    <div class="container">
                        <div class="hrv-caption-inner">
                            <div class="hrv-banner-content slider-3">
                                <h2 class="hrv-title1">Chăm sóc tận tình</h2>
                                <h3 class="hrv-title2">Giao hàng tận nơi</h3>
                                <a href="#" class="hrv-url">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        if ($('.slides li').size() > 0) {
            $(".hrv-banner-container .slides").owlCarousel({
                singleItem: true,
                autoPlay: 5000,
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [980, 1],
                itemsTablet: [768, 1],
                itemsMobile: [479, 1],
                slideSpeed: 500,
                paginationSpeed: 500,
                rewindSpeed: 500,
                addClassActive: true,
                navigation: true,
                stopOnHover: true,
                pagination: false,
                scrollPerPage: true,
                afterMove: nextslide,
                afterInit: nextslide,
            });
            function nextslide() {
                $(".hrv-banner-container .owl-item .hrv-banner-caption").css('display', 'none');
                $(".hrv-banner-container .owl-item .hrv-banner-caption").removeClass('hrv-caption')
                $(".hrv-banner-container .owl-item.active .hrv-banner-caption").css('display', 'block');

                var heading = $('.hrv-banner-container .owl-item.active .hrv-banner-caption').clone().removeClass();
                $('.hrv-banner-container .owl-item.active .hrv-banner-caption').remove();
                $('.hrv-banner-container .owl-item.active>li').append(heading);
                $('.hrv-banner-container .owl-item.active>li>div').addClass('hrv-banner-caption hrv-caption');
            }

        }
    })

</script>
