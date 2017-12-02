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

    /*Lấy tát cả san phẩm theo thông tin */
    public function getProductFull($limit = '', $start = '0', $input = array())
    {
        $product = 'sanpham';
        $categories = 'loai_sanpham';
        $group_pro = 'nhom_sanpham';
        $this->db->select(
            $group_pro . '.MA_NHOM_SANPHAM,' .
            $group_pro . '.TEN_NHOM_SANPHAM,' .
            $group_pro . '.LOGO,' .
            $group_pro . '.TRANGTHAI,' .

            $categories . '.MA_LOAI_SANPHAM,' .
            $categories . '.TEN_LOAI_SANPHAM,' .
            $categories . '.MA_NHA_CUNGCAP,' .

            $product . '.MA_SANPHAM,' .
            $product . '.TEN_SANPHAM,' .
            $product . '.DONGIA_BAN,' .
            $product . '.HINH_DAIDIEN,' .
            $product . '.DS_HINHANH,' .
            $product . '.SOLUONG_BAN,' .
            $product . '.NGAY_CAPNHAT,' .
            $product . '.MA_XUATXU,' .
            $product . '.MOTA,' .
            $product . '.BAOHANH,' .
            $product . '.LOAI,' .
            $product . '.TRANGTHAI,' .
            $product . '.VIEW');
        $this->db->from($group_pro);
        $this->db->join($categories, $categories . '.MA_NHOM_SANPHAM =' . $group_pro . '.MA_NHOM_SANPHAM', 'right');
        $this->db->join($product, $product . '.MA_LOAI_SANPHAM = ' . $categories . '.MA_LOAI_SANPHAM', 'right');
        if (isset($input['select'])) {
            $this->db->select($input['select']);
        }
        // Thêm điều kiện cho câu truy vấn truyền qua biến $input['where']

        if ((isset($input['where'])) && $input['where']) {
            $this->db->where($input['where']);
        }
        //tim kiem theo like
        if ((isset($input['like'])) && $input['like']) {
            $this->db->like($input['like'][0], $input['like'][1]);
        }
        // Thêm sắp xếp dữ liệu thông qua biến $input['order'] (ví dụ $input['order'] = array('id','DESC'))
        if (isset($input['order'][0]) && isset($input['order'][1])) {
            $this->db->order_by($input['order'][0], $input['order'][1]);
        }
        if ($limit != '') {
            $this->db->limit($limit, $start);
        }
        return $this->db->get()->result_array();
    }

    /*Lấy danh sách sản phẩm theo loại*/
    public function getProductCategories($where_in = array(), $where = array(),$limit = '',$start = '0')
    {
        $this->db->where_in('MA_LOAI_SANPHAM', $where_in);
        $this->db->from($this->table);
        if ($limit !=''){
            $this->db->limit($limit,$start);
        }
        if (!empty($where)) {
            $this->db->where($where);
        }
        $list = $this->db->get();

        if (empty($list)) {
            return false;
        } else {
            return $list->result_array();
        }
    }

    /* Lấy tất cả thông tin của san phẩm : nhóm, loại, sản phẩm với trạng thái =1 ( hoạt động)
       * Không có sử dụng phân trang paging
       * Thực hiện join 3 table : nhóm right join loại right join san phẩm.
       * */
    private function getAllListProduct($limit = '', $start = '')
    {
        $product = 'sanpham';
        $categories = 'loai_sanpham';
        $group_pro = 'nhom_sanpham';
        $this->db->select(
            $group_pro . '.MA_NHOM_SANPHAM,' .
            $group_pro . '.TEN_NHOM_SANPHAM,' .
            $group_pro . '.LOGO,' .
            $group_pro . '.TRANGTHAI,' .

            $categories . '.MA_LOAI_SANPHAM,' .
            $categories . '.TEN_LOAI_SANPHAM,' .
            $categories . '.MA_NHA_CUNGCAP,' .

            $product . '.MA_SANPHAM,' .
            $product . '.TEN_SANPHAM,' .
            $product . '.DONGIA_BAN,' .
            $product . '.HINH_DAIDIEN,' .
            $product . '.DS_HINHANH,' .
            $product . '.SOLUONG_BAN,' .
            $product . '.NGAY_CAPNHAT,' .
            $product . '.MA_XUATXU,' .
            $product . '.MOTA,' .
            $product . '.TRANGTHAI,' .
            $product . '.VIEW');
        $this->db->from($group_pro);
        $this->db->join($categories, $categories . '.MA_NHOM_SANPHAM =' . $group_pro . '.MA_NHOM_SANPHAM', 'right');
        $this->db->join($product, $product . '.MA_LOAI_SANPHAM = ' . $categories . '.MA_LOAI_SANPHAM', 'right');
        $this->db->where(array($product . '.TRANGTHAI' => '1', $group_pro . '.TRANGTHAI !=' => '0', $product . '.DONGIA_BAN >' => '0'));
        if ($limit != '') {
            if ($start == '') $start = 0;
            $this->db->limit($limit, $start);
        }
        //pre($this->db->get()->result_array());
        return $this->db->get()->result_array();


    }

    /* Thực hiện phần trang
    * href : link khi bấm chuyển trang
     *
    */
    public function getPaging($href = '')
    {
        $config = array();
        $this->load->helper('form');

        $total_rows = count($this->getAllListProduct());
        $config['total_rows'] = $total_rows;//tong tat ca cac sản phẩm trên webiste
        //$config['base_url'] = base_url('product/index');//link hien thi ra danh sach san pham
        $config['base_url'] = base_url($href);
        $this->load->library('pagination');

        $config['per_page'] = 6;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 3;//hien thi so trang

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
        $choice = $total_rows / $config["per_page"];
        $config["num_links"] = floor($choice);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //khoi tao phan trang
        $this->pagination->initialize($config);
        $list = $this->getAllListProduct($config['per_page'], $data['page']);
        //     pre($list);
        return $list;

    }

    /* Danh sach các sản phẩm có khuyến mãi
        * Table : sản phẩm, khuyến mãi, chi tiết khuyến mãi
        *
        */
    public function getProductPromotion($limit = '', $start = '0 ')
    {
        $currentDate = date('Y-m-d');
        //  pre($currentDate);
        $this->db->select('*');
        $this->db->from('sanpham');

        $this->db->join('chitiet_khuyenmai', 'sanpham.MA_SANPHAM = chitiet_khuyenmai.MA_SANPHAM', 'RIGHT');
        $this->db->join('khuyenmai', 'chitiet_khuyenmai.MA_KHUYENMAI=khuyenmai.MA_KHUYENMAI', 'RIGHT');
        $where = "(NGAY_BATDAU < '$currentDate' OR NGAY_BATDAU = '$currentDate')";
        $this->db->where($where);
        $where1 = "(NGAY_KETTHUC > '$currentDate' OR NGAY_KETTHUC = '$currentDate')";
        $this->db->where($where1);
        $this->db->where(array('TRANGTHAI' => 1, 'DONGIA_BAN >' => 0));
        if ($limit != '') {
            // if ($start == '') $start = 0;
            $this->db->limit($limit, $start);
        }


        $query = $this->db->get();
     //   pre($query->result_array());
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }

    }

}