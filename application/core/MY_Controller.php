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
                $listGroup = $this->group_model->getList();
                $this->data['listGroup'] = $listGroup;
                //Lấy danh sách sản phẩm
                $this->load->model('catelog_model');
                $where['order'] = array('MA_NHOM_SANPHAM','ASC');
                $listCate = $this->catelog_model->getList($where);
                $this->data['listCate'] = $listCate;
                $list = $this->product_model ->getList();
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
        }
        redirect(admin_url('login'));

    }
}