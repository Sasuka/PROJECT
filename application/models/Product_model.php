<?php
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 30/7/2017
 * Time: 9:06
 */

class Product_model extends MY_Model
{
    var $table = 'sanpham';


    public function __construct()
    {
        parent::__construct();
    }

    public function getProductPromotion($limit = '', $start = '')
    {
        $this->db->select('*');
        $this->db->from('sanpham');
        $this->db->join('chitiet_khuyenmai', 'sanpham.MA_SANPHAM = chitiet_khuyenmai.MA_SANPHAM', 'RIGHT');
        $this->db->join('khuyenmai', 'chitiet_khuyenmai.MA_KHUYENMAI=khuyenmai.MA_KHUYENMAI', 'RIGHT');
        $where = '(NGAY_BATDAU < NGAY_CAPNHAT OR NGAY_BATDAU = NGAY_CAPNHAT)';
        $this->db->where($where);
        $where1 = '(NGAY_KETTHUC > NGAY_CAPNHAT OR NGAY_KETTHUC = NGAY_CAPNHAT)';
        $this->db->where($where1);
        $this->db->where(array('TRANGTHAI' => 1, 'DONGIA_BAN >' => 0));
        if ($limit != '') {
            if ($start == '') $start = 0;
            $this->db->limit($limit, $start);
        }


        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }
}