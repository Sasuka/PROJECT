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
        if ($this->input->post()) {

            $fname = $this->input->post('fname', true);
            $lname = $this->input->post('lname', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $address = $this->input->post('address', true);

            $dt = array('HO' => $fname,
                'TEN' => $lname,
                'SDT' => $phone,
                'EMAIL' => $email,
                'DIACHI' => $address);
            $this->data['dt'] = $dt;

        }
        $this->data['type'] = 2;
        $this->data['temp'] = 'site/product_order/product_order';
        $this->load->view('site/layout', $this->data);
    }

    public function complete_checkout()
    {/*HUY VD2 Y gửi 900*/
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
            /*Kiểm tra thông tin này đã tồn tại hay chưa?*/
//            echo $arr_ship_info['HO'];
            /*Nếu chưa login thì kiểm tra sự tồn tại của email và phone */
            if (!isset($cusAccount)) {
                if ($this->check_phone_exist('customer_model', $arr_ship_info['SDT']) &&
                    $this->check_email_exist('customer_model', $arr_ship_info['EMAIL'])) {
                    /* Not exists then conitnue*/
                    /*1. Tạo TK KH vãng lai; 2. Cập nhật địa chỉ giao hàng*/
//                    pre($arr_ship_info);
                    if ($this->customer_model->add($arr_ship_info)) {
                    }


                } else {
                    /*Exists email or phone*/

                }
                $customer = $this->customer_model->get_info_rule(array('SDT' => $arr_ship_info['SDT']));
               // pre($customer);
                pre($this->cart->contents());


            }
        }

        $this->data['type'] = 3;
        $this->data['temp'] = 'site/product_order/product_order';
        $this->load->view('site/layout', $this->data);
    }
}