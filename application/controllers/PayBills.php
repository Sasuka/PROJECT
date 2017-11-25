<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 20/11/2017
 * Time: 5:12
 */
require_once APPPATH . 'controllers/User.php';

class PayBills extends MY_Controller
{
    public $dt;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');


    }

    public function index()
    {

    }

    public function checkout()
    {
        /* Thực hiện kiểm tra đã đăng nhập hay chưa*/

        /*Nếu chưa đăng nhập*/
//        if (!empty($cusAccount)){
//            pre($cusAccount);
//        }

        $this->data['cusAccount'] = $this->session->userdata('cusAccount');
        $this->data['type'] = 1;
        $this->data['temp'] = 'site/product_order/product_order';
        $this->load->view('site/layout', $this->data);
    }

    public function method_checkout()
    {
        /*Chuyển cục đa ta*/
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'callback_check_phone_exists');
            $this->form_validation->set_rules('email', 'Email', 'callback_check_email_exists');

            $fname = $this->input->post('fname', true);
            $lname = $this->input->post('lname', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $address = $this->input->post('address', true);

            $data = array('HO' => $fname,
                'TEN' => $lname,
                'SDT' => $phone,
                'EMAIL' => $email,
                'DIACHI' => $address);
            //   $this->data['dt'] = $dt;
            $this->load->model('customer_model');
            /*Nếu chưa login thì kiểm tra sự tồn tại của email và phone */
            if (!isset($cusAccount)) {
                /*Kiểm tra SDT và EMAIL đã tạo TK chính chưa. 1 Nếu chưa 2.Vãng Lai 3. Chính thức*/
                if ($this->check_phone_exist('customer_model',   $phone) &&
                    $this->check_email_exist('customer_model', $email)) {
                    /* Thông tin này chưa đươc đăng ký
                     * 1. Thông tin này đã tham gia mua hàng với tư cách là vãng lai
                     * 2. Thông tin này chưa tham gia lần nào.
                     */
                    if ($this->check_phone_exist_client('customer_model', $phone)) {
                        /*1.Update lại thông tin*/
//                        pre('Cập nhật lại thông tin theo SDT');
                        $where = array('SDT' => $phone);
                        $info = $this->customer_model->get_info_rule($where);
                        if ($this->customer_model->update_rule($where, $data)) {
                            $this->session->set_flashdata('message', 'Cập nhật lại thành công khách hàng vãng lại');
                        }
                    } elseif ($this->customer_model->add($data)) {
                        /* 2.*/
//                        pre('Tạo mới');
                        $this->session->set_flashdata('message', 'Thêm thành công khách hàng vãng lại');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Đã có trong tài khoảng');
                    redirect(base_url());

                }
                /*Thực hiện lập hóa đơn*/

            }


        }


        $this->data['type'] = 2;
        $this->data['temp'] = 'site/product_order/product_order';
        $this->load->view('site/layout', $this->data);
    }

    public function complete_checkout()
    {
        /*1. Nếu đã đăng nhập thì cập nhật address vào table khách hàng
        * 2. Nếu chưa đăng nhập thì tạo mới khách hàng vãng lai table khách hàng.
        * Cập nhật mã hàng khàch hàng vào mã hóa đơn, chi tiết hóa đon.
        **/
        /* Thực hiện lấy dữ liệu*/

        if ($this->input->post()) {
            $this->load->model('customer_model');
            $ship_info = isset($_POST['ship_info']) ? $_POST['ship_info'] : '';
            $ship_rate = isset($_POST['ship_rate']) ? $_POST['ship_rate'] : '';
            $payment_method = $_POST['payment_method'];
            $arr_ship_info = unserialize($ship_info);

            /*Nếu chưa login thì kiểm tra sự tồn tại của email và phone */
            if (!isset($cusAccount)) {
                /*Kiểm tra SDT và EMAIL đã tạo TK chính chưa. 1 Nếu chưa 2.Vãng Lai 3. Chính thức*/
                if ($this->check_phone_exist('customer_model', $arr_ship_info['SDT']) &&
                    $this->check_email_exist('customer_model', $arr_ship_info['EMAIL'])) {
                    /* Thông tin này chưa đươc đăng ký
                     * 1. Thông tin này đã tham gia mua hàng với tư cách là vãng lai
                     * 2. Thông tin này chưa tham gia lần nào.
                     */
                    if ($this->check_phone_exist_client('customer_model', $arr_ship_info['SDT'])) {
                        /*1.Update lại thông tin*/
//                        pre('Cập nhật lại thông tin theo SDT');
                        $where = array('SDT' => $arr_ship_info['SDT']);
                        $info = $this->customer_model->get_info_rule($where);
                        $data = array('HO' => $arr_ship_info['HO'],
                            'TEN' => $arr_ship_info['TEN'],
                            'DIACHI' => $arr_ship_info['DIACHI'],
                            'EMAIL' => $arr_ship_info['EMAIL']);
                        if ($this->customer_model->update_rule($where, $data)) {
                            $this->session->set_flashdata('message', 'Cập nhật lại thành công khách hàng vãng lại');
                        }
                    } elseif ($this->customer_model->add($arr_ship_info)) {
                        /* 2.*/
//                        pre('Tạo mới');
                        $this->session->set_flashdata('message', 'Thêm thành công khách hàng vãng lại');
                    }
                } else {
                    //  pre('Đã có trong tài khoản');
                    $this->session->set_flashdata('message', 'Đã có trong tài khoảng');
                    redirect(base_url());

                }
                $customer = $this->customer_model->get_info_rule(array('SDT' => $arr_ship_info['SDT']));
                /*Thực hiện lập hóa đơn*/
                pre($customer['MA_KHACHHANG']);
                $dt = array('DIACHI_GIAO' => $arr_ship_info['DIACHI'],
                    'MA_KHACHHANG' => 'sss');
            }
        }

        $this->data['type'] = 3;
        $this->data['temp'] = 'site/product_order/product_order';
        $this->load->view('site/layout', $this->data);
    }
}