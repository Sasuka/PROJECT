<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 20/11/2017
 * Time: 5:12
 */

//require_once APPPATH . 'controllers/User.php';
class PayBills extends MY_Controller
{
    public $dt;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('customer_model');
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

    /* Kiểm tra số điện thoại đã tồn tại trong table khách hàng */

    public function check_email_exists_in_customer()
    {
        $email = $this->input->post('email');
        $where = array('EMAIL' => $email, 'MATKHAU!=' => '');
        if ($this->customer_model->check_exist($where)) {
            //return error
            $this->form_validation->set_message(__FUNCTION__, 'Email này đã đăng ký');
            return false;
        } else true;
    }

    /* Kiểm tra sự tồn tại của email trong table khách hàng*/

    public function method_checkout()
    {
        if ($this->input->post()) {
            $dt = array();
            $fname = $this->input->post('fname', true);
            $lname = $this->input->post('lname', true);
            $phone = $this->input->post('phone', true);
            $email = $this->input->post('email', true);
            $address = $this->input->post('address', true);
            $dt = array('HO' => $this->mb_ucwords($fname),
                'TEN' => $this->mb_ucwords($lname),
                'SDT' => $phone,
                'EMAIL' => $email,
                'DIACHI' => $address);

            if (!($this->session->userdata('cusAccount'))) {
                /* Thêm mới thông tin giao hàng*/
                $this->form_validation->set_rules('phone', 'Số điện thoại', 'callback_check_phone_exists_in_customer');
                $this->form_validation->set_rules('email', 'Email', 'callback_check_email_exists_in_customer');
                if ($this->form_validation->run()) {
                    $this->data['type'] = 2;
                } else {
                    $this->data['type'] = 1;
                }

            } else {
                $this->data['type'] = 2;
            }

            $this->data['info'] = $dt;
            $this->data['temp'] = 'site/product_order/product_order';
            $this->load->view('site/layout', $this->data);

            return;

//
//            //   $this->data['dt'] = $dt;
//            $this->load->model('customer_model');
//            /*Nếu chưa login thì kiểm tra sự tồn tại của email và phone */
//            if (!isset($cusAccount)) {
//                /*Kiểm tra SDT và EMAIL đã tạo TK chính chưa. 1 Nếu chưa 2.Vãng Lai 3. Chính thức*/
//                if ($this->check_phone_exist('customer_model', $phone) &&
//                    $this->check_email_exist('customer_model', $email)) {
//                    /* Thông tin này chưa đươc đăng ký
//                     * 1. Thông tin này đã tham gia mua hàng với tư cách là vãng lai
//                     * 2. Thông tin này chưa tham gia lần nào.
//                     */
//                    if ($this->check_phone_exist_client('customer_model', $phone)) {
//                        /*1.Update lại thông tin*/
////                        pre('Cập nhật lại thông tin theo SDT');
//                        $where = array('SDT' => $phone);
//                        $info = $this->customer_model->get_info_rule($where);
//                        if ($this->customer_model->update_rule($where, $dt)) {
//                            $this->session->set_flashdata('message', 'Cập nhật lại thành công khách hàng vãng lại');
//                        }
//                    } elseif ($this->customer_model->add($data)) {
//                        /* 2.*/
////                        pre('Tạo mới');
//                        $this->session->set_flashdata('message', 'Thêm thành công khách hàng vãng lại');
//                    }
//                } else {
//                    $this->session->set_flashdata('message', 'Đã có trong tài khoảng');
//                    redirect(base_url());
//
//                }
//                /*Thực hiện lập hóa đơn*/
//
//            }


        }
        $this->data['type'] = 1;
        $this->data['temp'] = 'site/product_order/product_order';
        $this->load->view('site/layout', $this->data);
    }

    public function complete_checkout()
    {
        if ($this->input->post()) {
            $this->load->model('customer_model');
            $ship_info = isset($_POST['ship_info']) ? $_POST['ship_info'] : '';
            $ship_rate = isset($_POST['ship_rate']) ? $_POST['ship_rate'] : '';
            $payment_method = $_POST['payment_method'];
            $arr_ship_info = unserialize($ship_info);
            /*Thông tin dữ liệu gồm có 3 loại
             * 1: Đã đăng ký.
             * 3. Chưa b
             * 2. Đã tham gia.ao giờ.
             */
            if (!($this->check_phone_exists_in_customer($arr_ship_info['SDT']))) {
                /* 1.Đã đăng ký*/

            } elseif ($this->check_phone_exist_client('customer_model', $arr_ship_info['SDT'])) {
                /* 2. Đã tham gia
                 * Update lại thông tin theo SDT
                 */
                $where = array('SDT' => $arr_ship_info['SDT']);
                $data = array('HO' => $arr_ship_info['HO'],
                    'TEN' => $arr_ship_info['TEN'],
                    'DIACHI' => $arr_ship_info['DIACHI'],
                    'EMAIL' => $arr_ship_info['EMAIL']);
                if ($this->customer_model->update_rule($where, $data)) {
                    $this->session->set_flashdata('message', 'Cập nhật lại thành công khách hàng vãng lại');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhật lại thất bại khách hàng vãng lại');
                }
            } else {
                /* 3. Mới hoàn toàn.
                 * Tạo mới
                 */
                if ($this->customer_model->add($arr_ship_info)) {
                    $this->session->set_flashdata('message', 'Thêm thành công khách hàng vãng lai');
                } else {
                    $this->session->set_flashdata('message', 'Thêm thất bại khách hàng vãng lai');
                }

            }
            $customer = $this->customer_model->get_info_rule(array('SDT' => $arr_ship_info['SDT']));
            /*Thực hiện lập hóa đơn đơn hàng*/

            //pre($payment_method);
            $bill_info = array('DIACHI_GIAO' => $arr_ship_info['DIACHI'],
                'MA_KHACHHANG' => $customer['MA_KHACHHANG'],
                'MA_HINHTHUC' => $payment_method,
                'NGAY_GIAODICH' => date('Y-m-d H:i:s')
            );
            $this->load->model(array('transaction_model', 'transactionDetail_model'));
            $this->db->trans_begin();

            if ($this->transaction_model->add($bill_info)) {
                $this->session->set_flashdata('message', 'Thêm hóa đơn thành công');
                /*Lấy mã hóa đơn mới nhất.*/
                $list = $this->transaction_model->get_info_rule($bill_info);
//                pre($list);

//                $new_transaction = $this->transaction_model->get_new_transaction();
//                $new_transaction = $new_transaction[0];
//                pre($new_transaction);
                $cart_info = $this->cart->contents();
               // pre($cart_info);
                $sum_cost = 0;
                foreach ($cart_info as $item_cart){
                    $data = array('MA_GIAODICH' => $list ['MA_GIAODICH'],
                        'MA_SANPHAM' => $item_cart['id'],
                        'SOLUONG'=> $item_cart['qty'],
                        'DONGIA_HT' => $item_cart['price_original'],
                        'THANHTOAN' => $item_cart['price'],
                        'TANGPHAM' => $item_cart['gitf_pro']);

                    if (!$this->transactionDetail_model->add($data)){
                        break;
                    }else{
                        $sum_cost += $item_cart['subtotal'];
                    }
                }
                /* Cập nhật lại tổng thành tiền*/
                $where = array('MA_GIAODICH' => $list['MA_GIAODICH']);
                $data = array('TONG_THANHTIEN' => $sum_cost);
                $this->transaction_model->update_rule($where,$data);

            } else {
                $this->session->set_flashdata('message', 'Thêm hóa đơn thất bại');
            }

            if ($this->db->trans_status() === FALSE){
                $this->session->set_flashdata('message', 'Thêm CT hóa đơn thất bại');
                $this->db->trans_rollback();
            }else{
                $this->session->set_flashdata('message', 'Thêm CT hóa đơn thành công');
                $this->db->trans_commit();
                $this->cart->destroy();
                redirect();
            }
        }

        $this->data['type'] = 3;
        $this->data['temp'] = 'site/product_order/product_order';
        $this->load->view('site/layout', $this->data);
    }

    public function check_phone_exists_in_customer($phone = '')
    {
        if ($phone == '')
            $phone = $this->input->post('phone');

        $where = array('SDT' => $phone, 'MATKHAU!=' => '');
        if ($this->customer_model->check_exist($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Số điện thoại này đã đăng ký');
            return false;
        } else
            return true;
    }
}