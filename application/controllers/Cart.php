<?php

class Cart extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('cart');
    }

//    them san pham vao gio hang
    public function add()
    {
        //lay san pham muon them vao gio hang
        $this->load->model(array('product_model', 'catelog_model', 'promotionDetail_model'));
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
//        pre($quantity);
        $condition = array('MA_SANPHAM' => $id);
        $product = $this->product_model->get_info_rule($condition);
//        pre($product);
        if (empty($product)) {
            $this->session->set_flashdata('message', 'Đặt hàng thất bại!');
            redirect();
        }
        $where = array('sanpham.MA_SANPHAM' => $id);
        $promotionList = $this->promotionDetail_model->getListThreeJoin('khuyenmai', 'MA_KHUYENMAI', 'sanpham', 'MA_SANPHAM', $where);
        // pre($promotionList[0]);
        $product = $this->catelog_model->getListThreeJoin('sanpham', 'MA_LOAI_SANPHAM', 'nhom_sanpham', 'MA_NHOM_SANPHAM', $where);
        if (!empty($promotionList)) {
            $product[0]['PHANTRAM_KM'] = $promotionList[0]['PHANTRAM_KM'];
            $product[0]['TANGPHAM'] = $promotionList[0]['TANGPHAM'];
            $product[0]['TEN_KHUYENMAI'] = $promotionList[0]['TEN_KHUYENMAI'];

        }
        $product = $product[0];
        //  pre($product);
        $this->data = array();
        $this->data['id'] = $id;
        $this->data['qty'] = $quantity;
        $this->data['name'] = url_title($product['TEN_SANPHAM']);
        $this->data['image'] = $product['HINH_DAIDIEN'];
        $this->data['price_original'] = $product['DONGIA_BAN'];
        $this->data['price'] = isset($product['PHANTRAM_KM']) ? (1 - 0.01*$product['PHANTRAM_KM']) * $product['DONGIA_BAN'] : $product['DONGIA_BAN'];
        $this->data['per_discount'] = isset($product['PHANTRAM_KM']) ? $product['PHANTRAM_KM'] : '';
        $this->data['gitf_pro'] = isset($product['TANGPHAM']) ? $product['TANGPHAM'] : '';

        if ($this->cart->insert($this->data)) {
            $cart = $this->cart->contents();
            $cart = json_encode($cart);
            echo $cart;

        } else {
            echo 1;
        }
        // $cart = $this->cart->contents();
        //$cart = json_encode($cart);
        //  echo $cart;
//        chuyen dánh sach sang trang gio hang
//        redirect(base_url('cart'));

    }

    public function index()
    {
        //hien thi danh sách trong gio hang
//        pre($this->cart->contents());
        // $carts = $this->cart->contents();
        //$total_items = $this->cart->total_items();
        // $this->data['carts'] = $carts;
        // $this->data['total_items'] = $total_items;
        $this->data['temp'] = 'site/product_cart/product_cart';
        $this->load->view('site/layout', $this->data);
    }

    public function update()
    {

        $carts = $this->cart->contents();
        //   pre($carts);

        foreach ($carts as $key => $row) {
            $total_qty = $this->input->post('qty_' . $row['id']);
//            pre($total_qty,false);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
        redirect(base_url('cart'));
    }

    public function del()
    {
        $id = $_POST['id'];
        $quantity = 0;
        $id = intval($id);
        if ($id > 0) {

//            thong tin san pham
            $carts = $this->cart->contents();
//             pre($carts);
            foreach ($carts as $key => $row) {
                if ($row['id'] == $id) {
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = $quantity;
                    // pre($data);
                    if ($this->cart->update($data)) {
                        echo '1';
                    } else {
                        echo '0';
                    }
                }
            }
        } else {
            //xoa toan bo gio hang
            $this->cart->destroy();
        }
    }

    /* Thực hiện các điều kiện trước khi mua hàng*/
    /*1: thanh toán, 2: hoa đon, 3: continue*/
    public function checkout()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        $type = $this->uri->segment(3);
        $pay_bills = $this->uri->segment(4);
        // pre($pay_bills);
        if (isset($_POST['checkout'])) {

            $this->data['pay_bills'] = $pay_bills;
            //   pre($this->data['pay_bill']);
            $this->data['type'] = $type;
            $this->data['temp'] = 'site/product_order/product_order';
            $this->load->view('site/layout', $this->data);

        } elseif (isset($_POST['update'])) {
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row) {
                $total_qty = $this->input->post('qty_' . $row['id']);
                $data = array();
                $data['rowid'] = $key;
                $data['qty'] = $total_qty;
                $this->cart->update($data);
            }
            redirect(base_url('cart'));
        }
    }

    public function update_cart()
    {
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row) {
            $total_qty = $this->input->post('qty_' . $row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
        redirect(base_url('cart'));
    }
}