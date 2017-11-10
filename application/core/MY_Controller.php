<?php

class MY_Controller extends CI_Controller
{
    //transtion data to view
    public $data = array();

    //lay danh sach nhom san pham
    public function getListGroup()
    {
        return $this->site_model->groupMenu();
    }

    public function getListCate()
    {
        return $this->site_model->cateMenu();
    }

//    ====================PRODUCT====================//
    public function getAllProduct()
    {
        $this->product_model->getAllListProduct();
    }

    public function listProct($product = '')
    {
        $this->site_model->addProduct($product);


    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('site_model', 'product_model', 'catelog_model'));

        $controler = $this->uri->segment(1);
        $controler = strtolower($controler);
        switch ($controler) {

            case 'admin': {
                $this->load->helper('admin');
                $this->_check_login();
                break;
            }
            case 'process': {
                $this->load->helper('process');
                break;
            }
            default: {
                $this->load->model(array('group_model', 'catelog_model', 'product_model'));
                /***************/
                //thuc hien load phan trang
                $total_rows = $this->product_model->get_total();
                $this->data['total_rows'] = $total_rows;
                $this->load->library('pagination');
                $config = array();
                $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
                $config['base_url'] = base_url('home/index');//link hien thi ra danh sach san pham
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
                /*******************/
                $listGroup = $this->group_model->getList();
                $this->data['listGroup'] = $listGroup;
                //Lấy danh sách sản phẩm
                $this->load->model('catelog_model');
                $where['order'] = array('MA_NHOM_SANPHAM','ASC');
                $listCate = $this->catelog_model->getList($where);
                $this->data['listCate'] = $listCate;
                $list = $this->product_model ->getList($input);
                $this->data['listProduct'] = $list;
//                $select = 'NHOM_SANPHAM.MA_NHOM_SANPHAM,TEN_NHOM_SANPHAM,MA_LOAI_SANPHAM,TEN_LOAI_SANPHAM,MA_NHA_CUNGCAP,TRANGTHAI,LOGO';
//                $list = $this->group_model->getListJoinLRB1('LOAI_SANPHAM', 'MA_NHOM_SANPHAM', '', 'left', $select);
//                $this->data['list'] = $list;
                // pre($list);


            }

        }
    }

    //   thuc hien kiem tra khi nguoi dung co tinh vao admin
    private function _check_login()
    {
        $controller = $this->uri->rsegment(1);
        $controller = strtolower($controller);
        //lay session
        $login = $this->session->userdata('login');
        //khi chua dang nhap ma vao controller khac login thi cho quay lai cho dang nhap la bat buoc
        //giong nnhu vao nha thi phai mo cua chinh
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        //neu ma da login roi ma dang nhap lai nua thi khong cho
        //giong nhu o trong nha roi thì khong duoc mo cua vao lai nha
        //cai nay la de phan quyen cho no khong dc tron lan cac quyen khac
        if (!empty($login) && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }

    // thuc hien logout
    public function logout()
    {
        if ($this->session->userdata('login')) {
//            $this->session->sess_destroy();
            $this->session->unset_userdata('login');
            redirect(admin_url('login'));
        }elseif($this->session->userdata('cusAccount')){
            $this->session->unset_userdata('cusAccount');
            redirect(base_url('home'));
        }

    }
    /* Viêt hoa chữ cái đầu tiên UTF-8*/
    public function mb_ucwords($str) {
        $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
        return ($str);
    }
}