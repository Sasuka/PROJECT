<?php

/**
 * Created by PhpStorm.
 * User: tient
 * Date: 29/9/2017
 * Time: 22:13
 * Trang Home giao diện người dùng.
 */
Class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }
    public function index()
    {
        if (isset($cusAccount)){
          $this->data['isLogin'] = '1';
        }
        $this->data['temp'] = 'site/product_list/product_content';
        $this->load->view('site/layout',$this->data);
    }
    function view()
    {
        $this->load->view('site/home/view');
    }
    function _404(){
        $this->load->view("404");
    }
}