<?php

class MY_Controller extends CI_Controller
{
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
    public function getAllProduct()
    {
        $this->product_model->getAllListProduct();
    }
    public function listProduct($product = '')
    {
        $this->site_model->addProduct($product);
    }

    /* Lấy tất cả thông tin cả phẩm gồm nhóm, loại, sản phẩm
     * */
    public function __construct()
    {
        parent::__construct();$this->load->model(array('site_model', 'product_model', 'catelog_model'));

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
                /***************/
                $this->load->model(array('group_model', 'catelog_model', 'product_model'));
                $listGroup = $this->group_model->getList();
                $this->data['listGroup'] = $listGroup;
                $this->load->model('catelog_model');
                $where['order'] = array('MA_NHOM_SANPHAM', 'ASC');
                $listCate = $this->catelog_model->getList($where);
                $this->data['listCate'] = $listCate;

                $list = $this->product_model->getPaging('home/index');

               //  pre($list);
                 /* Thông tin toàn bộ sản phẩm*/
               // pre($list);
                $this->data['listProduct'] = $list;
                /*Thông tin các sản phẩm được khuyến mãi*/
                $promotion = $this->product_model->getProductPromotion();
                // pre($promotion);
                $this->data['promotion'] = $promotion;
                $cusAccount = $this->session->userdata('cusAccount');
                $this->data['cusAccount'] = $cusAccount;
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
        } elseif ($this->session->userdata('cusAccount')) {
            $this->session->unset_userdata('cusAccount');
            redirect(base_url('home'));
        }

    }

    /* Viêt hoa chữ cái đầu tiên UTF-8*/
    public function mb_ucwords($str)
    {
        $str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
        return ($str);
    }

    //kiem tra so dien thoai da dang ky chua true: không tồn tại, false: tồn tại
    public function check_phone_exist($model = '', $phone = '')
    {
        if ($phone == '') {
            $phone = $this->input->post('phone');
        }
        $this->load->model($model);
        $where = array('SDT' => $phone, 'MATKHAU !=' => '');
        //kiem tra table column phone
        if ($this->$model->check_exist($where)) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Số điện thoại này đã đăng ký');
            return false;
        } else
            return true;
    }

    //kiem tra so dien thoai da dang ky chua
    public function check_email_exist($model = '', $email = '')
    {
        if ($email == '') {
            $email = $this->input->post('email');
        }
        $this->load->model($model);
        $where = array('EMAIL' => $email, 'MATKHAU !=' => '');
        //kiem tra check_exists trong MY_MODEL
        if ($this->$model->check_exist($where)) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký');
            return false;
        } else
            return true;
    }

    /*Kiểm tra số điện thoại này đã đăng ký ở khách hàng vãng lại hay chưa*/
    public function check_phone_exist_client($model = '', $phone = '')
    {
        if ($phone == '') {
            $phone = $this->input->post('phone');
        }
        $this->load->model($model);
        $where = array('SDT' => $phone, 'MATKHAU IS NULL' );
        $this->db->last_query();
        //kiem tra table column phone
        if ($this->$model->check_exist($where)) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Số điện thoại này đã đăng ký thông tin giao hàng.');
            return true;
        } else
            return false;
    }
    /*Kiểm tra email này đã đăng lý ở khach hàng vãng lai hay chưa?*/
    public function check_email_exist_client($model = '', $email = '')
    {
        if ($email == '') {
            $email = $this->input->post('email');
        }
        $this->load->model($model);
        $where = array('EMAIL' => $email, 'MATKHAU IS NULL');
        //kiem tra check_exists trong MY_MODEL
        if ($this->$model->check_exist($where)) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký thông tin giao hàng');
            return true;
        } else
            return false;
    }
}