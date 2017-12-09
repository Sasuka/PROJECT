<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 09/12/2017
 * Time: 8:37
 */
class TransactionReport extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('transaction_model', 'transactionDetail_model', 'import_model', 'customer_model', 'admin_model'));

        $this->load->library('myfpdf');
    }

    public function index($id = '')
    {

    }

    function printPaybills($id = '')
    {
        $infoArr = array();

        if ($id != 0) {
            $input = array('MA_GIAODICH' => $id);
            $this->data['id'] = $id;
        }
        //lấy danh sách nhân viên
        $cond['where'] = array('TRANGTHAI' => 1);
        $staff = $this->admin_model->getList($cond);
        //lấy danh sách khách hàng.
        $customer = $this->customer_model->getList($cond);
        //lay danh sach giao dich
        $list = $this->transaction_model->get_info_rule($input);

        /*Tìm gán tên nhân viên lập*/
        for ($j = 0; $j < count($staff); $j++) {
            if ($list['MA_NHANVIEN'] == $staff[$j]['MA_NHANVIEN']) {
                $list['HO_TEN_NV'] = ucwords(strtolower($staff[$j]['HO'] . ' ' . $staff[$j]['TEN']));
                break;
            }
        }
        if (!isset($list['HO_TEN_NV'])){
            $list['HO_TEN_NV']='';
        }

        /*Tìm gán thông tin khách hàng mua*/
        for ($j = 0; $j < count($customer); $j++) {
            if ($list['MA_KHACHHANG'] == $customer[$j]['MA_KHACHHANG']) {
                $list['HO_TEN_KH'] = ucwords(strtolower($customer[$j]['HO'] . ' ' . $customer[$j]['TEN']));
                $list['SDT_KH'] = $customer[$j]['SDT'];
                $list['GIOITINH_KH'] = $customer[$j]['GIOITINH'];
                break;
            }
        }
        /*Tìm gán mã hình thức*/
        if ($list['MA_HINHTHUC'] == '1') {
            $list['HINHTHUC'] = 'Tiền mặt';
        }else if($list['MA_HINHTHUC'] == '2'){
            $list['HINHTHUC'] = 'PayPal';
        }
        /*Chiết tiết hóa đơn*/
        $infoDetailTrans = $this->transactionDetail_model->getListJoin('sanpham', 'MA_SANPHAM',array('MA_GIAODICH'=>$id));

//        echo '<pre>';
//        print_r($infoDetailTrans);
//        exit();
        $this->data['infoTrans'] = $list;
        $this->data['infoDetailTtrans'] = $infoDetailTrans;
        $this->data['list'] = $list;//danh sach tat ca giao dich

        $this->load->view('report/transactions', $this->data);
    }
}