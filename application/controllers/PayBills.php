<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 20/11/2017
 * Time: 5:12
 */
class PayBills extends MY_Controller
{
    public $dt;
    public $str;

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
        // global  $str;
        $str = 'method_checkout';
        if ($this->input->post()) {

            $fname = $this->input->post('fname', true);
            $lname = $this->input->post('lname', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $address = $this->input->post('address', true);
            global $dt;
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
    {
        /*1. Nếu đã đăng nhập thì cập nhật address vào table khách hàng
        * 2. Nếu chưa đăng nhập thì tạo mới khách hàng vãng lai table khách hàng.
        * Cập nhật mã hàng khàch hàng vào mã hóa đơn, chi tiết hóa đon.
        **/


    }
}