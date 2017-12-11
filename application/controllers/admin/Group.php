<?php

class Group extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('group_model');
    }

    public function index()
    {
        $list = $this->group_model->getList();
//       pre($list);
        $this->data['list'] = $list;
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['temp'] = 'admin/group/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

//   ================KIEM TRA CO TRUNG TEN NHOM SAN PHAM================================//
    public function checkNameExists()
    {
        $catelogName = strtoupper($this->input->post('groupName', true));
        $where = array('TEN_NHOM_SANPHAM' => $catelogName);
        if ($this->group_model->check_exist($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Tên nhóm này đã tồn tại');
            return false;
        } else {
            return true;
        }
    }

//   ================THEM NHÓM SAN PHAM================================//
    public function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //khi nhan submit
        if ($this->input->post()) {
            $this->form_validation->set_rules('groupName', 'Tên nhóm sản phẩm', 'callback_checkNameExists');

            //kiem tra dieu kien validate co form_validation thi no chay ham nay
          //  if ($this->form_validation->run()) {
                $groupName = strtoupper($this->input->post('groupName', true));
                /*Create folder*/
              //  chmod(upload_url(), 0777);
                $path   = upload_url("product/").$groupName;
                mkdir(upload_url("product\/").$groupName);
                pre($path);
                //exit();
                if (!is_dir($path)) { //create the folder if it's not already exists
                    mkdir($path, 0755, TRUE);
                }




                //upload hinh logo
//                $this->load->library('upload_library');
//                $upload_path = './uploads/logo/';
//                $upload_data = $this->upload_library->upload($upload_path, 'image');
//                //   pre($upload_data);
//                if (isset($upload_data['file_name'])) {
//                    $upload_data['raw_name'] = strtolower($groupName . $upload_data['file_ext']);
//                    $upload_data['orig_name'] = strtolower($groupName . $upload_data['file_ext']);
//                    $upload_data['file_name'] = strtolower($groupName . $upload_data['file_ext']);
//                    $upload_data['client_name'] = strtolower($groupName . $upload_data['file_ext']);
//                    $namePicture = $upload_data['file_name'];
//
//
//                } else {
//                    $namePicture = '';
//                }
//                // pre($upload_data);
//                $dt = array();
//
//                if ($this->catelog_model->add($dt)) {
//                    $this->session->set_flashdata('message', 'Thêm nhóm thành công!');
//                } else {
//                    $this->session->set_flashdata('message', 'Thêm nhóm thất bại');
//                }
//
//                redirect(admin_url('group'));
         //   }
        }

        //thuc hien load du lieu khi chua submi
        $this->data['temp'] = 'admin/group/add';
        $this->load->view('admin/main', $this->data);
    }

//   ================XOA NHÓM SAN PHAM================================//
    public function delete($id, $redirect = true)
    {
        //lay thong tin cua mot san pham

        $input = array('MA_NHOM_SANPHAM' => $id);
        $info = $this->group_model->get_info_rule($input);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại thương hiệu này');
            if ($redirect) {
                redirect(admin_url('group'));
            } else {
                return false;
            }
        }
        /*Xét kiểm tra có chứa loại hay không
        *1. Không thì xóa ra khỏi DB
        *2.Có thì update trạng thái về 0.
        *
         */
        $containtCate = $this->catelog_model->get_info_rule($input);
        /*2 Nếu rỗng được phép xóa ra khỏi DB*/
        if (empty($containtCate)) {
            $check = $this->group_model->del_rule($input);
            if ($check) {
                $this->session->set_flashdata('message', 'Thương hiệu ' . $info['TEN_NHOM_SANPHAM'] . 'đã xóa');
                redirect(admin_url('group'));
            } else {
                $this->session->set_flashdata('message', 'Thương hiệu ' . $info['TEN_NHOM_SANPHAM'] . 'không xóa được');
                return false;
            }
        } else {
            $status = $this->group_model->update_rule(array('MA_NHOM_SANPHAM' => $id), array('TRANGTHAI' => '0'));
            if ($status) {
                $this->session->set_flashdata('message', 'Thương hiệu ' . $info['TEN_NHOM_SANPHAM'] . 'đã xóa');
                redirect(admin_url('group'));
            } else {
                $this->session->set_flashdata('message', 'Thương hiệu ' . $info['TEN_NHOM_SANPHAM'] . 'không xóa được');
                return false;
            }
        }
    }

    //===================XOA  ALL THUONG HIỆU=================================//
    public function dell_all()
    {
        $ids = $this->input->POST('ids');
        //pre($ids);
        foreach ($ids as $id) {
            $this->delete($id);
        }
    }

    //===================KÍCH HOẠT THUONG HIỆU=================================//
    function update($id = '')
    {
        $input = array('MA_NHOM_SANPHAM' => $id);
        $info = $this->group_model->get_info_rule($input);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại thương hiệu này');
            redirect(admin_url('group'));
        }else {
            $cond['where'] = array('MA_NHOM_SANPHAM' => $id);
            $count = $this->catelog_model->count_field($cond);
            $status = $this->group_model->update_rule(array('MA_NHOM_SANPHAM' => $id), array('TRANGTHAI' => ($count+1)));
            if ($status) {
                $this->session->set_flashdata('message', 'Thương hiệu ' . $info['TEN_NHOM_SANPHAM'] . 'đã cập nhật');
                redirect(admin_url('group'));
            } else {
                $this->session->set_flashdata('message', 'Thương hiệu ' . $info['TEN_NHOM_SANPHAM'] . 'cập nhật không thành công');
            }
        }
    }
    //===================CẬP NHẬT THUONG HIỆU=================================//
    function edit($id=''){
        $this->load->library('form_validation');
        $this->load->helper('form');

        $input = array('MA_NHOM_SANPHAM' => $id);
        $info = $this->group_model->get_info_rule($input);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại thương hiệu này');
            redirect(admin_url('group'));
        }

        if ($this->input->post()) {
            if ($this->form_validation->run()) {
                $groupName = strtoupper($this->input->post('groupName', true));

            }
        }
        pre($info);
        $this->data['temp'] = 'admin/group/edit';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }
}