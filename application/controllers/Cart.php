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
        $this->load->model('product_model');
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        //pre($id);
        $condition = array('MA_SANPHAM' => $id);
        $product = $this->product_model->get_info_rule($condition);
//        pre($product);
        if (empty($product)) {
            $this->session->set_flashdata('message', 'Đặt hàng thất bại!');
            redirect();
        }

        $qty = $quantity;
        $this->data = array();
        $this->data['id'] = $id;
        $this->data['qty'] = $qty;
        $this->data['name'] = url_title($product['TEN_SANPHAM']);
        $this->data['image'] = $product['HINH_DAIDIEN'];
        $this->data['price'] = $product['DONGIA_BAN'];
        if($this->cart->insert($this->data)){
            $cart = $this->cart->contents();
            $cart = json_encode($cart);
            echo $cart;

        }else{
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
        $cart = $this->cart->contents();
        $total_items = $this->cart->total_items();

        $this->data['carts'] = $cart;
        $this->data['total_items'] = $total_items;
        $this->data['temp'] = 'site/product_cart/product_cart';
        $this->load->view('site/layout', $this->data);
    }

    public function update()
    {

        $carts = $this->cart->contents();
        // pre($carts);
        foreach ($carts as $key => $row) {
            $total_qty = $this->input->post('qty_' . $row['id']);
//            pre($total_qty);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
//        pre($data);
        redirect(base_url('cart'));
    }

    public function del()
    {
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $id = intval($id);
        if ($id > 0) {

//            thong tin san pham
            $carts = $this->cart->contents();
            // pre($carts);
            foreach ($carts as $key => $row) {
                if ($row['id'] == $id) {
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = $quantity;
                   // pre($data);
                    if ($this->cart->update($data)){
                        echo '1';
                    }else{
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
    public function checkout(){


    }
}