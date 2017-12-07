<link rel="stylesheet" href="<?php echo public_url() . 'site/css/service.css' ?>"/>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
        <?php
        if (isset($service_type)){
            switch ($service_type){
                case 'order_introduct' :$this->load->view('site/service/order_introduct', $this->data);break;
                case 'delivery_method' :$this->load->view('site/service/delivery_method', $this->data);break;
                case 'policy_security' :$this->load->view('site/service/policy_security', $this->data);break;
                case 'policy_pay' :$this->load->view('site/service/policy_pay', $this->data);break;

            }
        }
        ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
        <div class="other-article"><h3 class="title">Các tin khác</h3>
            <div class="other-item">
                <figure>
                    <div class="item-img">
                        <img src="<?php echo upload_url('introduction/');?>article_1512010869_24.jpg"
                             alt="Hướng dẫn đặt hàng"></div>
                    <figcaption>
                        <div class="item-time">30/11/2017</div>
                        <div class="item-title">
                            <a href="<?php echo base_url('service/order_introduct/1')?>" target="_self" title="Hướng dẫn đặt hàng">
                                Hướng dẫn đặt hàng </a></div>
                    </figcaption>
                </figure>
            </div>
            <div class="other-item">
                <figure>
                    <div class="item-img">
                        <img src="<?php echo upload_url('introduction/');?>article_1506922955_969.jpg"
                             alt="Cách thức giao nhận"></div>
                    <figcaption>
                        <div class="item-time">02/10/2017</div>
                        <div class="item-title">
                            <a href="<?php echo base_url('service/order_introduct/2')?>" target="_self" title="Cách thức giao nhận">
                                Cách thức giao nhận </a></div>
                    </figcaption>
                </figure>
            </div>
            <div class="other-item">
                <figure>
                    <div class="item-img">
                        <img src="<?php echo upload_url('introduction/');?>article_1506913254_881.jpg"
                             alt="Chính sách bảo mật"></div>
                    <figcaption>
                        <div class="item-time">02/10/2017</div>
                        <div class="item-title">
                            <a href="<?php echo base_url('service/order_introduct/3')?>" target="_self" title="Chính sách bảo mật">
                                Chính sách bảo mật </a></div>
                    </figcaption>
                </figure>
            </div>

            <div class="other-item">
                <figure>
                    <div class="item-img">
                        <img src="<?php echo upload_url('introduction/');?>article_1507000273_705.jpg"
                             alt="Chính sách đổi trả"></div>
                    <figcaption>
                        <div class="item-time">28/09/2017</div>
                        <div class="item-title">
                            <a href="<?php echo base_url('service/order_introduct/4')?>" target="_self" title="Chính sách đổi trả">
                                Chính sách đổi trả </a></div>
                    </figcaption>
                </figure>
            </div>

        </div>
    </div>
</div>
