<?php
//class ItemProduct{
//    public $title;
//}
class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->helper('form');
        //lay tông số lượng tất cả các sản phẩm
        $where['where'] = array('TRANGTHAI' => '1');
        $total_rows = $this->product_model->get_total($where);
        $this->data['total_rows'] = $total_rows;
        $config['total_rows'] = $total_rows;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/index');//link hien thi ra danh sach san pham

        $this->load->library('pagination');
        $config = array();
        $config['per_page'] = 6;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 3;//hien thi so trang
        $choice = $total_rows / $config["per_page"];
        $config["num_links"] = floor($choice);
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
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$list = $this->product_model->getListSearch($config['per_page'], $data['page'], $where);
        //  pre($list);
        $list = $this->product_model->getPaging('product/index');
        $this->data['listProduct'] = $list;

        $this->data['temp'] = 'site/product_list/product_content';
        $this->load->view('site/layout', $this->data);

    }

    public function getProduct1()
    {
        $this->load->model(array('catelog_model', 'promotionDetail_model'));
        $id = $this->uri->segment(3);
        $id = intval($id);
        $where = array('sanpham.MA_SANPHAM' => $id);
        $promotionList = $this->promotionDetail_model->getListThreeJoin('khuyenmai', 'MA_KHUYENMAI', 'sanpham', 'MA_SANPHAM', $where);

        // pre($promotionList[0]);
        $product = $this->catelog_model->getListThreeJoin('sanpham', 'MA_LOAI_SANPHAM', 'nhom_sanpham', 'MA_NHOM_SANPHAM', $where);
        if (!empty($promotionList)) {
            $product[0]['PHANTRAM_KM'] = $promotionList[0]['PHANTRAM_KM'];
            $product[0]['TANGPHAM'] = $promotionList[0]['TANGPHAM'];
            $product[0]['TEN_KHUYENMAI'] = $promotionList[0]['TEN_KHUYENMAI'];

        }
        //   pre($product[0]);
        //$input['where'] = array('MA_SANPHAM' => $id);
        //thuc hien load danh sach san pham dua vao id loai
        //$product= $this->product_model->getList($input);
        $product = $product[0];
        $product = json_encode($product);
        echo $product;
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
        $config['total_rows'] = $total_rows;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url('product/getProduct/' . $id);//link hien thi ra danh sach san pham
        $config['per_page'] = 3;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next";
        $config['prev_link'] = "Prev";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'], $segment);
        $input['where'] = array('MA_LOAI_SANPHAM' => $id, 'DONGIA_BAN>' => '0');

        //thuc hien load danh sach san pham dua vao id loai
        $query = $this->product_model->getList($input);
        // pre($query);
        $this->data['getProduct'] = $query;
        //thuc hien goi qua view
        $this->data['type'] = 'getProduct';
        $this->data['temp'] = 'site/product_list/product_content';
        $this->load->view('site/layout', $this->data);
    }

    /*Tìm kiếm sản phẩm theo nhóm sản phẩm*/
    public function getProductGroup()
    {
        $id = $this->uri->segment(3);
        $this->load->model('group_model');
        $where = array('MA_NHOM_SANPHAM' => $id);
        $infoGroup = $this->group_model->get_info_rule($where);
        if (empty($infoGroup)) {
            redirect('');
        }
        /* Trang không tìm thấy*/
        if ($infoGroup['TRANGTHAI'] == '1') {
            $this->data['temp'] = '';
            $this->load->view('site/layout', $this->data);
            redirect();
        } else {
            /*Lấy ra những danh sách loại thuộc nhóm đó*/
            $where1['where'] = array('MA_NHOM_SANPHAM' => $infoGroup['MA_NHOM_SANPHAM']);
            $catelog = $this->catelog_model->getList($where1);
             /* Lấy ra những danh sách san phẩm thuộc loại*/
            $where2['where'] = array('TRANGTHAI >' => 0);
            $product = $this->product_model->getList($where2);
            $categoriesArr = array();
            for ($i = 0; $i < count($catelog); $i++) {
                $categoriesArr[$i] = $catelog[$i]['MA_LOAI_SANPHAM'];
            }

            $status = array('TRANGTHAI!=' => 0,'DONGIA_BAN!=' => 0);
            $list = $this->product_model->getProductCategories($categoriesArr,$status);
            /*Thực hiện phân trang*/
            $this->load->library('pagination');
            $total_rows = count($list);
            $config = array();
            $config['total_rows'] = $total_rows;//tong tat ca cac sản phẩm trên webiste
            $config['base_url'] = base_url('product/getProductGroup/' . $id);//link hien thi ra danh sach san pham
            $config['per_page'] = 3;//hien thi so luong san pham tren 1 trang
            $config['uri_segment'] = 4;//hien thi so trang
            $config['next_link'] = "Next";
            $config['prev_link'] = "Prev";
            //khoi tao phan trang
            $this->pagination->initialize($config);
            $start = $this->uri->segment(4);
            $start = intval($start);
            $list = $this->product_model->getProductCategories($categoriesArr,$status,$config['per_page'],$start);

            for ($i = 0; $i < count($list); $i++) {
                 for ($j =0;$j < count($catelog);$j++){
                     if ($list[$i]['MA_LOAI_SANPHAM'] == $catelog[$j]['MA_LOAI_SANPHAM']){
                         $list[$i]['TEN_LOAI_SANPHAM'] = $catelog[$j]['TEN_LOAI_SANPHAM'];
                         break;
                     }
                 }
            }
            $this->data['infoCate'] = $infoGroup;
            $this->data['type'] = 'getProductGroup';
            $this->data['productGroup'] = $list;
            $this->data['temp'] = 'site/product_list/product_content';
            $this->load->view('site/layout', $this->data);
        }


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


        //thuc hien load file chi thiet
        $this->data['product'] = $info;
        $this->data['madeIn'] = $madeIn;
        $this->data['cate'] = $catePro;
        $this->data['detail'] = $detailProduct;
        $this->data['promotion'] = $promotion;

        $this->data['temp'] = 'site/product/view';
        $this->load->view('site/layout', $this->data);


    }

    public function search1()
    {
        $id = $this->uri->segment(3);
        pre($id);
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

        $input['limit'] = array($config['per_page'], $segment);
        $list = $this->product_model->getList($input);

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

    public function search()
    {
        $keyWord = ($this->input->post("key")) ? $this->input->post("key") : "";
        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $keyWord;
        $type = isset($_GET['type']) ? $_GET['type'] : 'product';
        // $key = isset($_GET['key']) ? $_GET['key'] : '';
        $input = array();
        if ($type == 'product') {
            $input['like'] = array('sanpham.TEN_SANPHAM', $keyWord);
            $input['where'] = array('sanpham.DONGIA_BAN >' => 0, 'sanpham.TRANGTHAI' => 1);
            $total_rows = $this->product_model->get_total($input);
        }
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url("product/search/$search");//link hien thi ra danh sach san pham
        $config['per_page'] = 6;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
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
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);

        $list = $this->product_model->getProductFull($config['per_page'], $data['page'], $input);
//        pre($list);
        $this->data['listProduct'] = $list;
        $this->data['temp'] = 'site/product_list/product_list';
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
        $input = array();
        $this->load->library('pagination');
        $listDis = $this->product_model->getProductPromotion();
        $total_rows = count($listDis);
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = base_url("product/discount");//link hien thi ra danh sach san pham
        $config['per_page'] = 6;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
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
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $this->pagination->initialize($config);

        //$list = $this->product_model->getProductPromotion($config['per_page'], $data['page']);
        //  pre($list);
        //$this->data['listProduct'] = $list;
        // $this->data['promotion'] = $this->product_model->getProductFull($config['per_page'], $data['page'], $input);
        $this->data['type'] = 'discount';
        $this->data['temp'] = 'site/product_list/product_content';
        $this->load->view('site/layout', $this->data);
    }

}