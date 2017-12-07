<?php

class Paypal extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $cart_info = $this->cart->contents();
//        $paybills = $this->load->controller('paybills');
//        $ship_info = $paybills->ship_info;
        $billsInfo = isset($_SESSION['billsInfo']) ? $_SESSION['billsInfo'] : '';
        if ($billsInfo == '') {
            redirect();
        }

      //  pre($billsInfo);
        //pre($cart_info);
        $sum = 0;
        foreach ($cart_info as $item) {
            $sum += $item['subtotal'];
        }
       // pre($sum);
        $this->data['billsInfo'] = $billsInfo;
        $this->data['sum'] = $sum;
        $this->data['temp'] = 'site/paypal/form_payment';
        $this->load->view('site/layout', $this->data);
    }
}