<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-3 col-xs-12 clear-sm">
            <div class="widget-wrapper animated">

                <h3 class="title title_left">Tổng kết</h3>

                <div class="inner about_us">

                    <p class="message">
                        <marquee behavior="scroll" direction="left"
                                 onmouseover="this.setAttribute('scrollamount', 3, 0);"
                                 onmouseout="this.setAttribute('scrollamount', 6, 0);">
                            &check; GVHD: Ths. Ninh Xuân Hải.<br>
                            &check;SVTTH: Lê Tiến Tài.
                        </marquee>
                        &nbsp;&nbsp;&nbsp;Xin chân thành gởi đến lời cảm tới toàn thể giáo viên trong trường HVCNBCVT PTIT HCM dã
                        dạy cho em những kiến thức quý báu.Đặc biệt, là thầy Ninh Xuân Hải đã nhiệt tình giúp đỡ em
                        để hoàn thành bài báo cáo tốt nghiệp này.

                    </p>

                    <ul class="list-unstyled">

                        <li>
                            <i class="fa fa-home"></i>97 Man Thiện Quận 9, Hồ Chí Minh
                        </li>


                        <li>
                            <i class="fa fa-envelope-o"></i> <a
                                    href="mailto:tientai206@gmail.com">tientai206@gmail.com</a>
                        </li>


                        <li>
                            <i class="fa fa-phone"></i>0917.077.025
                        </li>


                    </ul>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-md-2 col-xs-12 clear-sm">
            <div class="widget-wrapper animated">

                <h3 class="title title_left">Liên kết</h3>

                <div class="inner">

                    <ul class="list-unstyled list-styled">

                        <li>
                            <a href="<?php echo base_url(); ?>">Trang chủ</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('product'); ?>">Thương hiệu</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('product/discount'); ?>">Khuyến mãi</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('service'); ?>">Dịch vụ</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('introduct'); ?>">Giới thiệu</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('blog'); ?>">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-sm-6 col-md-3 col-xs-12 clear-sm">
            <div class="widget-wrapper animated">


                <h3 class="title title_left">Đăng kí nhận tin</h3>

                <div class="inner">


                    <form accept-charset='UTF-8' action='#' class='contact-form'
                          method='post'>
                        <input name='form_type' type='hidden' value='customer'>
                        <input name='utf8' type='hidden' value='✓'>

                        <div class="group-input">
                            <input type="hidden" id="contact_tags" name="contact[tags]"
                                   value="khách hàng tiềm năng, bản tin"/>
                            <input type="email" required="required" name="contact[email]"
                                   id="contact_email"/>
                            <span class="bar"></span>
                            <label>Nhập email của bạn</label>
                            <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                        </div>


                    </form>


                    <div class="caption">Hãy nhập email của bạn vào đây để nhận tin!</div>

                </div>


                <div id="widget-social" class="social-icons">
                    <ul class="list-inline">

                        <li>
                            <a target="_blank" href="https://www.facebook.com/tientai206"
                               class="social-wrapper facebook">
                            <span class="social-icon">
                              <i class="fa fa-facebook"></i>
                            </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://twitter.com/" class="social-wrapper twitter">
                            <span class="social-icon">
                              <i class="fa fa-twitter"></i>
                            </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>" class="social-wrapper pinterest">
                            <span class="social-icon">
                              <i class="fa fa-pinterest"></i>
                            </span>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://plus.google.com/u/0/108531141792470875862"
                               class="social-wrapper google">
                            <span class="social-icon">
                              <i class="fa fa-google-plus"></i>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>


        <div class="col-sm-6 col-md-4 col-xs-12 clear-sm">
            <div class="widget-wrapper animated">

                <h3 class="title title_left">Kết nối với chúng tôi</h3>

                <div class="inner">
                    <!-- Facebook widget -->

                    <div class="footer-static-content">
                        <div class="fb-page" data-href="https://www.facebook.com/Phutungototientaicom-1950013108603246/"
                             data-height="300" data-small-header="false"
                             data-adapt-container-width="true" data-hide-cover="false"
                             data-show-facepile="true" data-show-posts="false"></div>
                    </div>
                    <div style="clear:both;">

                    </div>

                    <!-- #Facebook widget -->
                    <script>
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "<?php echo public_url('site');?>/design/connect.facebook.net/en_US/sdk.js#xfbml=1&appId=263266547210244&version=v2.0";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>

                </div>
            </div>
        </div>


    </div>
</div>