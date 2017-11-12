<?php

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $where['where'] = array('TRANGTHAI' => '1');
        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/index');//link hien thi ra danh sach san pham
        $config['per_page'] = 6;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 3;//hien thi so trang
//        $config['next_link'] = "Trang kế tiếp";
//        $config['prev_link'] = "Trang trước";
//$config['full_tag_open'] = '<div class="pagination">';

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        //khoi tao phan trang
        $this->pagination->initialize($config);
        // pre($config);
        $segment = $this->uri->segment(3);
        $segment = intval($segment);

        $input['limit'] = array($config['per_page'], $segment);

        $list = $this->product_model->getList($input);
        // pre($list);
        $this->data['listProduct'] = $list;
        $this->data['temp'] = 'site/product_list/product_content';
        $this->load->view('site/layout', $this->data);

    }

    public function getProduct1()
    {
        $id = $this->uri->segment(3);
        $id = intval($id);
        $input['where'] = array('MA_SANPHAM' => $id);
        //thuc hien load danh sach san pham dua vao id loai
        $product = $this->product_model->getList($input);
        pre($product,false);
       //pre ($product);
//        $this->data['itemProduct'] = $product;
//        $this->load->view('site/layout',$this->data);
        ?>

<!--        <div id="quick-view-modal" class="wrapper-quickview" style="display: none;">-->
<!--        <div class="quickviewOverlay"></div>-->
<!--        <div class="jsQuickview">-->
<!--            <div class="modal-header clearfix" style="width: 100%">-->
<!--                <a href="/products/dong-ho-nam-skmei-kim-xanh-duong" class="quickview-title text-left"-->
<!--                   title="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG">-->
<!--                    <h4 class="p-title modal-title">ĐỒNG HỒ NAMNG</h4>-->
<!--                </a>-->
<!--                <div class="quickview-close">-->
<!--                    <a href="javascript:void(0);"><i class="fa fa-times"></i></a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-5">-->
<!--                <div class="quickview-image image-zoom">-->
<!--                    <img class="p-product-image-feature"-->
<!--                         src="--><?php //echo upload_url('product'); ?><!--/1_e0ed7c0240734782a8268793dce0b9b8_large.jpg"-->
<!--                         alt="ĐỒNG HỒ NAM SKMEI KIM XANH DƯƠNG">-->
<!--                </div>-->
<!--                <div id="quickview-sliderproduct">-->
<!--                    <div class="quickview-slider">-->
<!--                        <ul class="owl-carousel owl-theme" style="display: block; opacity: 1;">-->
<!--                            <div class="owl-wrapper-outer">-->
<!--                                <div class="owl-wrapper" style="width: 600px; left: 0px; display: block;">-->
<!--                                    <div class="owl-item" style="width: 100px;">-->
<!--                                        <li class="product-thumb active"><a href="javascript:void(0);"-->
<!--                                                                            data-image="--><?php //echo upload_url('product'); ?><!--/1_e0ed7c0240734782a8268793dce0b9b8_large.jpg">-->
<!--                                                <img src="--><?php //echo upload_url('product'); ?><!--/1_e0ed7c0240734782a8268793dce0b9b8_small.jpg"></a>-->
<!--                                        </li>-->
<!--                                    </div>-->
<!--                                    <div class="owl-item" style="width: 100px;">-->
<!--                                        <li class="product-thumb"><a href="javascript:void(0);"-->
<!--                                                                     data-image="--><?php //echo upload_url('product'); ?><!--/2_85fc5908867e488da92b768cb240477d_large.jpg">-->
<!--                                                <img src="--><?php //echo upload_url('product'); ?><!--/2_85fc5908867e488da92b768cb240477d_small.jpg"></a>-->
<!--                                        </li>-->
<!--                                    </div>-->
<!--                                    <div class="owl-item" style="width: 100px;">-->
<!--                                        <li class="product-thumb"><a href="javascript:void(0);"-->
<!--                                                                     data-image="--><?php //echo upload_url('product'); ?><!--/3_30be00d496bb474aa0e9324311dd02f0_large.jpg">-->
<!--                                                <img src="--><?php //echo upload_url('product'); ?><!--/3_30be00d496bb474aa0e9324311dd02f0_small.jpg"></a>-->
<!--                                        </li>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="owl-controls clickable" style="display: none;">-->
<!--                                <div class="owl-pagination">-->
<!--                                    <div class="owl-page active">-->
<!--                                        <span class=""></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="owl-buttons">-->
<!--                                    <div class="owl-prev">owl-prev</div>-->
<!--                                    <div class="owl-next">owl-next</div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-7">-->
<!--                <form id="form-quickview" method="post" action="/cart/add">-->
<!--                    <div class="quickview-information">-->
<!--                        <div class="form-input">-->
<!--                            <div class="quickview-price product-price">-->
<!--                                <span>499,000₫</span>-->
<!--                                <del>700,000₫</del>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="quickview-variants variant-style clearfix">-->
<!--                            <select name="id" class="" id="quickview-select" style="display: none;">-->
<!--                                <option value="1012030836">Default Title - 49900000</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="quickview-description">-->
<!--                        </div>-->
<!--                        <div class="form-input ">-->
<!--                            <label>-->
<!--    Số lượng</label>-->
<!--                            <input id="quantity-quickview" name="quantity" type="number" min="1" value="1">-->
<!--                        </div>-->
<!--                        <div class="form-input" style="width: 100%">-->
<!--                            <button type="submit" class="btn-detail  btn-color-add btn-min-width btn-mgt btn-addcart"-->
<!--                                    style="display: block;">-->
<!--                                        Thêm vào giỏ-->
<!--    </button>-->
<!--                            <button disabled=""-->
<!--                                    class="btn-detail addtocart btn-color-add btn-min-width btn-mgt btn-soldout"-->
<!--                                    style="display: none;">-->
<!--                                        Hết hàng-->
<!--    </button>-->
<!--                            <div class="qv-readmore">-->
<!--                                <span>hoặc </span><a class="read-more p-url" href="" role="button">Xem chi tiết</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<?php
    }

    public function getProduct()
    {
        //lay id loai va kiem tra co ton tai kkhong
        $id = $this->uri->segment(3);

        $this->load->model('catelog_model');
        $where = array('MA_LOAI_SANPHAM' => $id);
        $infoCate = $this->catelog_model->get_info_rule($where);
        if (empty($infoCate)) {
            redirect('');
        }
        $where1 = array('MA_NHOM_SANPHAM' => $infoCate['MA_NHOM_SANPHAM']);
        $infoGroup = $this->group_model->get_info_rule($where1);

        $this->data['infoCate'] = array('TEN_NHOM_SANPHAM' => $infoGroup['TEN_NHOM_SANPHAM'], 'TEN_LOAI_SANPHAM' => $infoCate['TEN_LOAI_SANPHAM']);;
        $input['where'] = array('TRANGTHAI' => '1', 'DONGIA_BAN >' => '0', 'MA_LOAI_SANPHAM' => $id);//con ban va da nhap v
        $total_rows = $this->product_model->get_total($input);//lay so luong theo loai
        $this->data['total_rows'] = $total_rows;


        //tao phan tran
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/getProduct/' . $id);//link hien thi ra danh sach san pham
        $config['per_page'] = 3;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next";
        $config['prev_link'] = "Prev";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
//           pre($segment);
        $input['limit'] = array($config['per_page'], $segment);
        $input['where'] = array('MA_LOAI_SANPHAM' => $id);

        //thuc hien load danh sach san pham dua vao id loai
        $query = $this->product_model->getList($input);

        //   $query = $this->product_model->getList($where);
        $this->data['listProduct'] = $query;
        //thuc hien goi qua view
        $this->data['temp'] = 'site/product_list/product_content';
        $this->load->view('site/layout', $this->data);


    }

//    hien thi trang chi tiet san pham
    public function view()
    {
        $this->load->model('madeIn_model');
        $this->load->model('promotionDetail_model');
        //thuc hien lay thong tin chi tiet cua san pham
        $id = $this->uri->rsegment('3');
        $condition = array('MA_SANPHAM' => $id);
        $info = $this->product_model->get_info_rule($condition);
        if (empty($info)) {
            redirect();
        }
        //update lai luot view
        $view = $info['VIEW'] + 1;
        $where = array('MA_SANPHAM' => $id);
        $data = array('VIEW' => $view);
        $this->product_model->update_rule($where, $data);


        $condition1 = array('MA_XUATXU' => $info['MA_XUATXU']);
        $madeIn = $this->madeIn_model->get_info_rule($condition1);

        $condition2 = array('MA_LOAI_SANPHAM' => $info['MA_LOAI_SANPHAM']);
        $this->load->model('catelog_model');
        $catePro = $this->catelog_model->get_info_rule($condition2);


        $promotion = $this->promotionDetail_model->get_info_rule($condition);
        //xem san pham do thuc ma nao loai nao
        $this->load->model('productDetail_model');
        $condition4 = array('MA_SANPHAM' => $id, 'MA_LOAI_SANPHAM' => $info['MA_SANPHAM']);
        $detailProduct = $this->productDetail_model->get_info_rule($condition4);
        //  pre($detailProduct);

        //  pre($madeIn);
//            pre($info);

        //thuc hien load file chi thiet
        $this->data['product'] = $info;
        $this->data['madeIn'] = $madeIn;
        $this->data['cate'] = $catePro;
        $this->data['detail'] = $detailProduct;
        $this->data['promotion'] = $promotion;

        $this->data['temp'] = 'site/product/view';
        $this->load->view('site/layout', $this->data);


    }

    public function search()
    {
        $id = $this->uri->segment(3);
        if ($this->uri->rsegment(3) == 1) {
            //co su dung auto complate
            $key_search = $this->input->get('term');
        } else {
            $key_search = $this->input->get('key-search');
        }
        $this->data['key'] = trim($key_search);
        $input = array();
        $input['where'] = array('DONGIA_BAN>' => 0, 'TRANGTHAI' => 1);
        $input['like'] = array('TEN_SANPHAM', $key_search);

        $total_rows = $this->product_model->get_total($input);//lay so luong theo loai
        $this->data['total_rows'] = $total_rows;


        //tao phan tran
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/search/' . $id);//link hien thi ra danh sach san pham
        $config['per_page'] = 3;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next";
        $config['prev_link'] = "Prev";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
//           pre($segment);

        $input['limit'] = array($config['per_page'], $segment);
        $list = $this->product_model->getList($input);
//        pre($list);
//       pre($list);
        $this->data['list'] = $list;
        if ($this->uri->rsegment(3) == 1) {
            $result = array();
            // print_r($list);
            $i = -1;
            foreach ($list as $row) {
                $i++;
                $item = array();
                $item['id'] = $row[$i]['MA_SANPHAM'];
                $item['label'] = $row[$i]['TEN_SANPHAM'];
                $item['value'] = $row[$i]['TEN_SANPHAM'];
                $result[] = $item;
            }
            die(json_encode($result));
        }


        $this->data['temp'] = 'site/product/search';
        $this->load->view('site/layout', $this->data);
    }

    public function search_price()
    {
        $id = $this->uri->segment(3);

        $price_from = intval($this->input->get('price_from'));
        $price_to = intval($this->input->get('price_to'));
        $this->data['price_from'] = $price_from;
        $this->data['price_to'] = $price_to;
        // pre($price_from.'-'.$price_to);
        $input = array();
        $input['where'] = array('DONGIA_BAN>=' => $price_from, 'DONGIA_BAN<=' => $price_to, 'TRANGTHAI' => 1);

        $total_rows = $this->product_model->get_total($input);//lay so luong theo loai
        $this->data['total_rows'] = $total_rows;


        //tao phan tran
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/search/' . $id);//link hien thi ra danh sach san pham
        $config['per_page'] = 3;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next";
        $config['prev_link'] = "Prev";

        //khoi tao phan trang
        $this->pagination->initialize($config);
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);


        $list = $this->product_model->getList($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'site/product/price_search';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Danh sách các sản phẩm khuyến mãi
     * */
    public function discount()
    {
        $listDis = $this->product_model->getProductPromotion();
        $this->data['listProduct'] = $listDis;
        // pre($listDis);
        $this->data['temp'] = 'site/product_list/product_content';
        $this->load->view('site/layout', $this->data);
    }
}