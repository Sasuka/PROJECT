<?php
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 12/12/2017
 * Time: 2:51
 */
class Email extends MY_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $config = Array(
            'protocol' => 'sendmail',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'tientai206@gmail.com', // change it to yours
            'smtp_pass' => 'yomgidpttfyzvdqo', // change it to yours
//            'smtp_pass' => 'uwwnoykzoqrcphit', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'smtp_timeout' =>'30',
            'wordwrap' => TRUE
        );
        $this->email->initialize($config);
        $message = '';

        $this->email->set_newline("\r\n");
        $this->email->from('tientai206@gmail.com'); // change it to yours
        $this->email->to('tientai0206@gmail.com');// change it to yours
        $this->email->subject('Resume from JobsBuddy for your Job posting');
        $this->email->message($message);
        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
        }
        $this->email->clear();

    }
}