<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 09/12/2017
 * Time: 8:37
 */
class PayBills extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('importDetail_model', 'import_model', 'providers_model','admin_model'));
        $this->load->library('myfpdf');
    }

    public function index($id = '')
    {

    }

    function printDetailPayBilss($id = '')
    {
        $infoArr = array();
        $this->data['id'] = $id;
        $input = array('MA_PHIEUNHAP' => $id);
        $list = $this->importDetail_model->getListThreeJoin('phieunhap', 'MA_PHIEUNHAP', 'sanpham', 'MA_SANPHAM', $id);
        $this->data['list'] = $list;
        $dt = $this->import_model->get_info_rule($input);
        $this->data['import'] = $dt;
        $provider = $this->providers_model->get_info_rule(array('MA_NHA_CUNGCAP' => $dt['MA_NHA_CUNGCAP']));
        $staff = $this->admin_model->get_info_rule(array('MA_NHANVIEN' => $dt['MA_NHANVIEN']));
        $infoArr = array('TEN_NHA_CUNGCAP' => $provider['TEN_NHA_CUNGCAP'],
                         'NGAYLAP_PHIEUNHAP' => $dt['NGAYLAP_PHIEUNHAP'],
                          'TONG_THANHTIEN'=>$dt['TONG_THANHTIEN'],
                          'HO_VA_TEN' =>$staff['HO'].' '.$staff['TEN']);
        $this->data['info'] = $infoArr;
        $this->load->view('report/paybills', $this->data);
    }
}