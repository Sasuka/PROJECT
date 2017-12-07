<?php
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 07/12/2017
 * Time: 22:50
 */
class Contact extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    function index(){
        $this->data['temp'] = 'site/contact/index';
        $this->load->view('site/layout', $this->data);
    }
}