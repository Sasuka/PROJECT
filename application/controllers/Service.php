<?php
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 05/12/2017
 * Time: 4:13
 */
class Service extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->data['temp'] = 'site/service/index';
        $this->load->view('site/layout', $this->data);
    }
    public function order_introduct(){
        $type = $this->uri->rsegment(3);
        switch ($type) {
            case 1:$this->data['service_type'] = 'order_introduct';break;
            case 2:$this->data['service_type'] = 'delivery_method';break;
            case 3:$this->data['service_type'] = 'policy_security';break;
            case 4:$this->data['service_type'] = 'policy_pay';break;
        }
        $this->data['temp'] = 'site/service/service_content';
        $this->load->view('site/layout', $this->data);
    }
}