<?php

class Transaction extends MY_Controller
{
    public $idTransaction ;
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('transaction_model', 'transactionDetail_model', 'store_model','admin_model','customer_model'));
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');

        //lay tông số lượng tất cả các sản phẩm
        $total_rows = $this->transaction_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //thuc hien load phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('transaction/index');//link hien thi ra danh sach giao dich
        $config['per_page'] = 6;//hien thi so luong giao dich tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['next_link'] = "Next page";
        $config['prev_link'] = "Prev page";

        //khoi tao phan trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        //   pre($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        //kiem tra theo id
        $id = $this->input->get('id');
        $idProduct = intval($id);
        if ($id != 0) {
            $input['where'] = array('MA_GIAODICH' => $idProduct);
        }

        //lấy danh sách nhân viên
        $cond['where']= array('TRANGTHAI'=>1);
        $staff = $this->admin_model->getList($cond);
        //lấy danh sách khách hàng.
        $customer = $this->customer_model->getList($cond);
        //lay danh sach giao dich
        $list = $this->transaction_model->getList($input);

        /*Tìm gán tên nhân viên lập*/
        for ($i = 0; $i < count($list); $i++) {
            for ($j =0;$j < count($staff);$j++){
                if ($list[$i]['MA_NHANVIEN'] == $staff[$j]['MA_NHANVIEN']){
                    $list[$i]['HO_TEN_NV'] = ucwords(strtolower($staff[$j]['HO'].' '.$staff[$j]['TEN']));
                    break;
                }
            }
        }
        /*Tìm gán thông tin khách hàng mua*/
        for ($i = 0; $i < count($list); $i++) {
            for ($j =0;$j < count($customer);$j++){
                if ($list[$i]['MA_KHACHHANG'] == $customer[$j]['MA_KHACHHANG']){
                    $list[$i]['HO_TEN_KH'] = ucwords(strtolower($customer[$j]['HO'].' '.$customer[$j]['TEN']));
                    $list[$i]['SDT_KH'] = $customer[$j]['SDT'];
                    $list[$i]['GIOITINH_KH'] = $customer[$j]['GIOITINH'];
                    break;
                }
            }
        }
//            echo '<pre>';
//             print_r($list);
//         exit();
        $this->data['list'] = $list;//danh sach tat ca giao dich
        $this->data['temp'] = 'admin/transaction/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }
    public function view()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('transactionDetail_model', 'store_model');
//        $typeTransaction = isset($_GET['typeTransaction']) ? $_GET['typeTransaction'] :'';
//        if ($typeTransaction){
//            $statusTrans = $_GET['statusTrans'];
//            if ($statusTrans == 'fail'){
//                $this->session->set_flashdata('message', 'Thanh toán paypal không thành công!');
//                redirect(admin_url('transaction'));
//            }
//        }
        //lay id cua quan trị viên cần chỉnh sửa
        $idTransaction = $this->uri->segment('4');

        if ($this->input->post()) {
            $status = $this->input->post('status');

            //pre($status);
            if ($status == 2) {
                //neu la giao hang
                $this->transaction_suc($idTransaction);
            } else if ($status == 3) {
                //neu la huy don hang
                $this->transaction_cancell();
            }else if($status == 4){
//                báo giao thành công.

                $this->confirm_success();
            }

        }
        $where['where'] = array('MA_GIAODICH' => $idTransaction);
        $list =  $this->transaction_model->getList($where);
        $this->data['list'] =$list[0];
        $this->data['temp'] = 'admin/bill/index';
        $this->load->view('admin/main', $this->data);

    }
    public function transaction_suc($id = ''){
        $idEmployee = $this->input->post('employeeId');
//        $status = '1';
//
//        $data = array(
//            'MA_NHANVIEN' => $idEmployee,
//            'TRANGTHAI' => $status
//        );
        //thuc hien cac cau lenh khi lap hoa don
        $this->db->trans_start();
        $idTransaction = $this->uri->rsegment(3);
      //  pre($idTransaction);
        $input['where'] = array(
            'MA_GIAODICH' => $idTransaction
        );

        $where = array('MA_GIAODICH' => $idTransaction);
        $list = $this->transactionDetail_model->getListJoin('sanpham', 'MA_SANPHAM', $where);

        /*Kiểm tra hàng đã được giao chưa*/
        $transaction = $this->transaction_model->get_info_rule($where);
        if($transaction['TRANGTHAI'] != '1'){
            $this->session->set_flashdata('message', 'Không thành công do đã giao rồi hoặc đã đơn hàng đã hủy!');
            redirect(admin_url('transaction'));
        }
        //thuc hien kiem tra san pham do co so luong khach dat ton hay khong
        foreach ($list as $item) {
            if ($item['SOLUONG'] > $item['SOLUONG_BAN']) {
                $this->session->set_flashdata('message', 'Lập hóa đơn thất bại!');
                redirect(admin_url('transaction'));
                return false;
            }
        }

       /*Thực hiện giao hàng*/
        foreach ($list as $item) {

            $item['SOLUONG_BAN'] = $item['SOLUONG_BAN'] - $item['SOLUONG'];
            $wh = array('MA_SANPHAM' => $item['MA_SANPHAM']);
            $dt = array('SOLUONG_BAN' => $item['SOLUONG_BAN']);
            $this->product_model->update_rule($wh, $dt);

        }

        $data = array(
            'MA_NHANVIEN' => $idEmployee,
            'NGAYLAP_HOADON' => date('Y-m-d'),
            'TRANGTHAI' => '2'
        );
        /*Thực hiện update vào phiếu đơn hàng*/
        $where1 = array('MA_GIAODICH'=>$idTransaction);
        if($this->transaction_model->update_rule($where1, $data)){
//                $this->data['status']='1';
            $this->session->set_flashdata('message', 'Đang giao hàng!');
        }

        $this->db->trans_complete();
      //  pre($storeInfo);

    }
    public function transaction_cancell(){
        $idEmployee = $this->input->post('employeeId');
        //thuc hien cac cau lenh khi lap hoa don
        $this->db->trans_start();
        $idTransaction = $this->uri->rsegment(3);
        $input['where'] = array(
            'MA_GIAODICH' => $idTransaction
        );

        $where = array('MA_GIAODICH' => $idTransaction);
        $list = $this->transactionDetail_model->getListJoin('sanpham', 'MA_SANPHAM', $where);

//        pre($list);
       // $input['where'] = $where;
        $transaction = $this->transaction_model->get_info_rule($where);
       // pre($transaction);
        /*Trả hàng là sau khi giao hàng không thành công*/
        if($transaction['TRANGTHAI'] != '2'){
            $this->session->set_flashdata('message', 'Trả hàng không thành công do đã trả rồi hoặc chưa giao!');
            redirect(admin_url('transaction'));
        }

        /*update số lượng lại sản phẩm*/
        foreach ($list as $item) {

            $item['SOLUONG_BAN'] = $item['SOLUONG_BAN'] + $item['SOLUONG'];
            $wh = array('MA_SANPHAM' => $item['MA_SANPHAM']);
            $dt = array('SOLUONG_BAN' => $item['SOLUONG_BAN']);
            $this->product_model->update_rule($wh, $dt);
        }
        $data = array(
            'MA_NHANVIEN' => $idEmployee,
            'NGAYLAP_HOADON' => date('Y-m-d'),
            'TRANGTHAI' => '3'
        );
        /*Update lại giao dịch với KH*/
        if($this->transaction_model->update_rule($where, $data)){
            $this->session->set_flashdata('message', 'Đơn hàng đã hủy!');
        }
        $this->db->trans_complete();
    }
    public function confirm_success(){
        $idEmployee = $this->input->post('employeeId');
        $idTransaction = $this->uri->rsegment(3);
        $input['where'] = array(
            'MA_GIAODICH' => $idTransaction
        );

        $where = array('MA_GIAODICH' => $idTransaction);
        $list = $this->transactionDetail_model->getListJoin('sanpham', 'MA_SANPHAM', $where);

        $transaction = $this->transaction_model->get_info_rule($where);

        /*Thành công là sau khi giao hàng không thành công*/
        if($transaction['TRANGTHAI'] != '2'){
            $this->session->set_flashdata('message', 'Xác nhận không thành công do chưa giao hàng!');
            redirect(admin_url('transaction'));
        }
        $data = array(
            'MA_NHANVIEN' => $idEmployee,
            'NGAYLAP_HOADON' => date('Y-m-d'),
            'TRANGTHAI' => '3'
        );
        /*Update lại giao dịch với KH*/
        if($this->transaction_model->update_rule($where, $data)){
            $this->session->set_flashdata('message', 'Đơn hàng thành công!');
        }

    }



}
