<div class="group_sidebar">

    <div class="list-group navbar-inner ">


        <div class="mega-left-title btn-navbar title-hidden-sm">
            <h3 class="sb-title">Danh mục </h3>
        </div>

        <ul class="nav navs sidebar menu" id='cssmenu'>


            <li class="item  first">
                <a href="<?php echo base_url('product/discount')?>">
                    <span>Sản phẩm khuyến mãi</span>
                </a>
            </li>


            <li class="item  last">
                <a href="<?php echo base_url('product');?>">
                    <span>Tất cả sản phẩm</span>
                </a>
            </li>


        </ul>

    </div>

    <!-- Banner quảng cáo -->
    <div class="list-group_l banner-left hidden-sm hidden-xs">

        <a href="">
            <img src="<?php echo upload_url('logo').'/logo_left.gif';?>">
        </a>

    </div>
</div>
<script>

    $(document).ready(function () {
        //$('ul li:has(ul)').addClass('hassub');
        $('#cssmenu ul ul li:odd').addClass('odd');
        $('#cssmenu ul ul li:even').addClass('even');
        $('#cssmenu > ul > li > a').click(function () {
            $('#cssmenu li').removeClass('active');
            $(this).closest('li').addClass('active');
            var checkElement = $(this).nextS();
            if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                $(this).closest('li').removeClass('active');
                checkElement.slideUp('normal');
            }
            if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                $('#cssmenu ul ul:visible').slideUp('normal');
                checkElement.slideDown('normal');
            }
            if ($(this).closest('li').find('ul').children().length == 0) {
                return true;
            } else {
                return false;
            }
        });

        $('.drop-down').click(function (e) {
            if ($(this).parents('li').hasClass('has-sub')) {
                e.preventDefault();
                if ($(this).hasClass('open-nav')) {
                    $(this).removeClass('open-nav');
                    $(this).parents('li').children('ul.lve2').slideUp('normal').removeClass('in');
                } else {
                    $(this).addClass('open-nav');
                    $(this).parents('li').children('ul.lve2').slideDown('normal').addClass('in');
                }
            } else {

            }
        });

    });

    $("#list-group-l ul.navs li.active").parents('ul.children').addClass("in");
</script>