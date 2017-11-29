<?php

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("product_model", "group_model", "madeIn_model", "catelog_model", 'Transaction_model'));
    }

    public function index()
    {
        //lay noi dung cua messager
        $this->data['message'] = $this->session->flashdata('message');
        $total_rows = $this->product_model->get_total();
        $this->load->library('pagination');
        $input = array();
        $id = $this->input->get('id');
        $idProduct = intval($id);
        if ($id != 0) {
            $input['where'] = array('MA_SANPHAM' => $idProduct);
        }

        //tim theo ten san pham
        $nameProduct = $this->input->get('name');
        if ($nameProduct) {
            $input['like'] = array('TEN_SANPHAM', $nameProduct);
        }
        /*tim theo thuong hieu*/

//        if (isset($_GET['group']) && $_GET['group'] != '0'){
//            $input['where'] = array('MA_NHOM_SANPHAM' => $_GET['group']);
//        }
        if (isset($_GET['catelog']) && $_GET['catelog'] != '0') {
            $input['where'] = array('MA_LOAI_SANPHAM' => $_GET['catelog']);
        }
        /*
                //lay danh sach san pham
                $list = $this->product_model->getList($input);
                // pre($list);
                //danh sach san pham duoc giam gia
                //  $idSP_ProDetail = $this->productDetail_model->get
                $listDis = $this->product_model->getProductPromotion();
                // pre($list);
                $this->data['listGroup'] = $this->group_model->getList();//danh sach nhom san pham
        //        pre($this->group_model->getList());
                $this->data['listDis'] = $listDis;//danh sach san pham dc khuyen mai
          */
        /* Phân trang*/
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac sản phẩm trên webiste
        $config['base_url'] = admin_url('product/index');//link hien thi ra danh sach san pham
        $config['per_page'] = 10;//hien thi so luong san pham tren 1 trang
        $config['uri_segment'] = 4;//hien thi so trang
        $config['per_page'] = 10;//hien thi so luong san pham tren 1 trang
        $choice = $total_rows / $config["per_page"];
        $config["num_links"] = floor($choice);
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $list = $this->product_model->getListSearch($config['per_page'], $data['page'], $input);

//        pre($list);
        /*Thông tin các sản phẩm được khuyến mãi*/
        $promotion = $this->product_model->getProductPromotion();
        //   pre($promotion);

        $this->data['list'] = $list;//danh sach tat ca san pham
        $this->data['promotion'] = $promotion;
        $this->data['listGroup'] = $this->group_model->getList();

        $this->data['temp'] = 'admin/product/index';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

    public function getListProductByCate()
    {
        $listDis = $this->product_model->getProductPromotion();
        if (isset($_POST["catelogId"]) && !empty($_POST["catelogId"])) {
            $catelogId = $_POST["catelogId"];
            $input['where'] = array('MA_LOAI_SANPHAM' => $catelogId);
            // print_r($this->catelog_model->getList($input));
            $promotion = $this->product_model->getProductPromotion();
            $list = $this->product_model->getList($input);
            if (empty($list)) {
                echo '<p style="text-align: center;color: #0000FF;margin: 30% 2%">Not Found</p>';
            } else {
                // pre($list);
                foreach ($list as $item) {
                    ?>
                    <tr class="row_<?php echo $item['MA_SANPHAM']; ?>">
                        <td><input name="id[]" value="<?= $item['MA_SANPHAM'] ?>" type="checkbox"></td>

                        <td class="textC"><?= $item['MA_SANPHAM'] ?></td>

                        <td>
                            <div class="image_thumb">
                                <img src="<?php echo base_url('uploads/product/' . $item['HINH_DAIDIEN']) ?>"
                                     height="50">
                                <div class="clear"></div>
                            </div>

                            <a href="product/view/9.html" class="tipS" title="" target="_blank">
                                <b><?php echo $item['TEN_SANPHAM']; ?></b>
                            </a>

                            <div class="f11">
                                Loại: <?php echo $item['LOAI']; ?> | Kinh doanh:<span
                                        style="color:red;"> <?php echo ($item['TRANGTHAI'] == '0') ? 'Hết' : '<span style="color:forestgreen;">Còn</span>'; ?></span>
                            </div>

                        </td>

                        <td class="textR">
                            <b style="font-weight: bold;">
                                <?php
                                //                            $dongia = $item['DONGIA_BAN'];
                                $check = 0;
                                foreach ($promotion as $itemPromotion) {
                                    if ($item['MA_SANPHAM'] == $itemPromotion['MA_SANPHAM']) {
                                        echo '<span style="color: red;">';
                                        echo (1 - 0.01 * $itemPromotion['PHANTRAM_KM']) * $item['DONGIA_BAN'];
                                        echo '</span> $ <br>';
                                        echo '<del>';
                                        echo $item['DONGIA_BAN'];
                                        echo '</del>';
                                        echo ' $';
                                        $check = 1;
                                        break;
                                    }
                                }
                                if ($check == 0) {
                                    echo '<span style="color: red;">';
                                    echo $item['DONGIA_BAN'];
                                    echo '</span> $<br>';
                                }
                                ?>
                            </b>
                        </td>

                        <td class="textC"><?php echo date('d-m-Y', strtotime($item['NGAY_CAPNHAT'])); ?></td>

                        <td class="option textC">
                            <a href="" title="Gán là nhạc tiêu biểu" class="tipE">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/star.png">
                            </a>
                            <a href="product/view/9.html" target="_blank" class="tipS" title="Xem chi tiết sản phẩm">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/view.png">
                            </a>
                            <a href="<?php echo admin_url('product/edit/' . $item['MA_SANPHAM']); ?>" title="Chỉnh sửa"
                               class="tipS">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/edit.png">
                            </a>

                            <a href="<?php echo admin_url('product/delete/' . $item['MA_SANPHAM']); ?>" title="Xóa"
                               class="tipS verify_action">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/delete.png">
                            </a>
                        </td>
                    </tr>
                    <?php
                }

            }

        }
    }

    //lay danh danh tung ben phieu nhap

    public function getListProductOption()
    {
        if (isset($_POST["catelogId"]) && !empty($_POST["catelogId"])) {
            $catelogId = $_POST["catelogId"];
            $input['where'] = array('MA_LOAI_SANPHAM' => $catelogId);
            // print_r($this->catelog_model->getList($input));
            $listProduct = $this->product_model->getList($input);
            // pre($listCate);
            if (!$listProduct) {
                echo '<option value="0">Không có</option>';
            }
            if ($listProduct > 0) {
                ?>
                <option value="0">Chọn loại sản phẩm</option>
                <?php
                foreach ($listProduct as $item) {
                    ?>
                    <option value="<?= $item['MA_SANPHAM']; ?>"><?= $item['TEN_SANPHAM']; ?></option>
                    <?php
                }
            }

        }

    }
    //tung loai suy ra nhôm
    //kiem tra san pham co ton tai trong chi tiet giao dich hay không
//    public function check_transtationDetail(){
//    $table = 'chitiet_giaodich';
//    if($this->giaodich_model->)
//    }
//===================THEM SAN PHAM=================================//
    public function add()
    {

        //load thu vien validate de su dung kiem tra khi upload
        $this->load->library('form_validation');
        $this->load->helper('form');
        //khi nhan submit
        if ($this->input->post()) {


            //xac cac dieu kien
            $this->form_validation->set_rules('namepro', 'Tên sản phẩm', 'required');
            $this->form_validation->set_rules('warranty', 'Bảo hành', 'required');
//            $this->form_validation->set_rules('catelog_dis', 'Phân loại', 'required');
//            $this->form_validation->set_rules('catelog', 'Loại sản phẩm', 'required');
//            $this->form_validation->set_rules('idmade', 'Xuất xứ', 'required');
//            $this->form_validation->set_rules('description', 'Mô tả', 'required');


            //kiem tra dieu kien validate co form_validation thi no chay ham nay
            if ($this->form_validation->run()) {

                $name = $this->input->post('namepro', true);
                $warranty = $this->input->post('warranty', true);
                $catelog_dis = $this->input->post('catelog_dis', true);
                $catelog = $this->input->post('catelog', true);

                $idmade = $this->input->post('idmade', true);
                $description = $this->input->post('description', true);

                $idGroup = $this->input->post('group', true);
                $input['select'] = 'TEN_NHOM_SANPHAM';
                $input['where'] = array('MA_NHOM_SANPHAM' => $idGroup);
                $nameGroup = $this->group_model->getList($input);

                //  pre($nameGroup);
                if ($nameGroup) {
                    $namegroup = strtolower($nameGroup[0]['TEN_NHOM_SANPHAM']);

                } else {
                    $namegroup = '';
                }

                //lay ten file anh minh hoa dc upload len
                $this->load->library('upload_library');
                $upload_path = './uploads/product/' . $namegroup;

                $upload_data = $this->upload_library->upload($upload_path, 'image');
                // pre($upload_data);
                if (isset($upload_data['file_name'])) {

                    $namePicture = $namegroup . '/' . $upload_data['file_name'];


                } else {
                    $namePicture = '';
                }

                //upload danh sach anh kem theo
                // $namePicture =strtolower($namePicture);
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list = json_encode($image_list);

                $dt = array(
                    'TEN_SANPHAM' => $this->mb_ucwords($name),
                    'HINH_DAIDIEN' => $namePicture,
                    'DS_HINHANH' => $image_list,
                    'BAOHANH' => $warranty,
                    'LOAI' => $catelog_dis,
                    'MA_LOAI_SANPHAM' => $catelog,
                    'MA_XUATXU' => $idmade,
                    'MOTA' => $description
                );

                if ($this->product_model->add($dt)) {
                    $this->session->set_flashdata('message', 'Thêm sản phẩm thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Thêm sản phẩm thất bại thất bại');
                }
                redirect(admin_url('product'));
            } else {
                echo 's';
            }
        }
        //trươc  khi submit hoac submit that bai
        $input = array();
        $this->data['madeIn'] = $this->madeIn_model->getList();
        // pre($list);
        //danh sach san pham duoc giam gia
        //  $idSP_ProDetail = $this->productDetail_model->get
        $listDis = $this->product_model->getProductPromotion();
        // pre($list);
        $this->data['listGroup'] = $this->group_model->getList();//danh sach nhom san pham
//        pre($this->group_model->getList());
        $this->data['listDis'] = $listDis;//danh sach san pham dc khuyen mai

        $this->data['temp'] = 'admin/product/add';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

//===================SUA SAN PHAM=================================//
    public function edit1()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);

        //lấy thong tin của quản trị viên
        $input = array('MA_SANPHAM' => $id);
        $info = $this->product_model->get_info_rule($input);
//        pre($info);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này!');
            redirect(admin_url('product'));
        }
        $this->data['product'] = $info;
        //  pre($info);
        //load thu vien validate de su dung kiem tra khi upload
        $this->load->library('form_validation');
        $this->load->helper('form');
        //khi nhan submit
        if ($this->input->post()) {


            //xac cac dieu kien
            $this->form_validation->set_rules('namepro', 'Tên sản phẩm', 'required');
            $this->form_validation->set_rules('warranty', 'Bảo hành', 'required');
//            $this->form_validation->set_rules('catelog_dis', 'Phân loại', 'required');
//            $this->form_validation->set_rules('catelog', 'Loại sản phẩm', 'required');
//            $this->form_validation->set_rules('idmade', 'Xuất xứ', 'required');
//            $this->form_validation->set_rules('description', 'Mô tả', 'required');


            //kiem tra dieu kien validate co form_validation thi no chay ham nay
            if ($this->form_validation->run()) {

                $name = $this->input->post('namepro', true);
                $warranty = $this->input->post('warranty', true);
                //$catelog_dis = $this->input->post('catelog_dis', true);
                // pre($catelog_dis);
                //  $catelog = $this->input->post('catelog', true);

                $idmade = $this->input->post('idmade', true);
                $description = $this->input->post('description', true);

                $idGroup = $this->input->post('group', true);
                $input['select'] = 'TEN_NHOM_SANPHAM';
                $input['where'] = array('MA_NHOM_SANPHAM' => $idGroup);
                $nameGroup = $this->group_model->getList($input);

                //  pre($nameGroup);
                if ($nameGroup) {
                    $namegroup = strtolower($nameGroup[0]['TEN_NHOM_SANPHAM']);

                } else {
                    $namegroup = '';
                }

                //lay ten file anh minh hoa dc upload len
                $this->load->library('upload_library');
                $upload_path = './uploads/product/' . $namegroup;
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                if (isset($upload_data['file_name'])) {
                    $namePicture = $namegroup . '/' . strtolower($upload_data['file_name']);
                    $this->load->library("image_lib");
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $namePicture;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 150;
                    $config['height'] = 120;
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();


                } else {
                    $namePicture = '';
                }
                //upload danh sach anh kem theo
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list = json_encode($image_list);
                //    pre(empty($image_list));


                $dt = array(
                    'TEN_SANPHAM' => $name,
                    'BAOHANH' => $warranty,
                    //  'LOAI' => $catelog_dis,
                    // 'MA_LOAI_SANPHAM' => $catelog,
                    'MA_XUATXU' => $idmade,
                    'MOTA' => $description
                );
                if ($namePicture != '') {
                    $dt['HINH_DAIDIEN'] = $namePicture;
                }
                if (empty($image_list) != '') {
                    $dt['DS_HINHANH'] = $image_list;
                }
                // pre($input);
                $where = array('MA_SANPHAM' => $input['MA_SANPHAM']);

                if ($this->product_model->update_rule($where, $dt)) {
                    $this->session->set_flashdata('message', 'Update thành công!');
                } else {
                    $this->session->set_flashdata('message', 'Update thất bại');
                }

                redirect(admin_url('product'));
            } else {
                $this->session->set_flashdata('message', 'Update thất bại');
                echo $this->session->flashdata('message');
            }
        }
        //trươc  khi submit hoac submit that bai
        $input = array();
        $idCate = $info['MA_LOAI_SANPHAM'];
        $input['where'] = array('MA_LOAI_SANPHAM' => $idCate);
        $idGroup1 = $this->catelog_model->getGroupByCate($input);//lay row dua vao loai san pham

        $this->data['madeIn'] = $this->madeIn_model->getList();
        $this->data['idGroup1'] = $idGroup1;
        // pre($list);
        //danh sach san pham duoc giam gia
        //  $idSP_ProDetail = $this->productDetail_model->get
        $listDis = $this->product_model->getProductPromotion();
        // pre($list);
        $this->data['listGroup'] = $this->group_model->getList();//danh sach nhom san pham
//        pre($this->group_model->getList());
        $this->data['listDis'] = $listDis;//danh sach san pham dc khuyen mai


        $this->data['temp'] = 'admin/product/edit';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

    public function edit()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        $this->load->library('form_validation');
        $this->load->helper('form');

        $where = array('sanpham.MA_SANPHAM' => $id);
       $info = $this->product_model->getProductFull($where);
        $info = $info[0];
       // pre($info);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này!');
            redirect(admin_url('product'));
        }
        $this->form_validation->set_rules('namepro', 'Tên sản phẩm', 'required');

        //khi submit
        if ($this->form_validation->run()) {

            $name = $this->input->post('namepro', true);
            $warranty = $this->input->post('warranty', true);
            $catelog_dis = $this->input->post('catelog_dis', true);
            $price = $this->input->post('price', true);
            $idmade = $this->input->post('idmade', true);
            $description = $this->input->post('description', true);
            $status = $this->input->post('status');
            $namegroup = url_title(strtolower($info['TEN_NHOM_SANPHAM']));

            //lay ten file anh minh hoa dc upload len
            $this->load->library('upload_library');
            $upload_path = './uploads/product/' . $namegroup;

            $upload_data = $this->upload_library->upload($upload_path, 'image');
            // pre($upload_data);
            if (isset($upload_data['file_name'])) {

                $namePicture = $namegroup . '/' . $upload_data['file_name'];

            } else {
                $namePicture = '';
            }
            //upload danh sach anh kem theo
            $image_list = array();
            $image_list = $this->upload_library->upload_file($upload_path, 'image_list');

            $dt = array(
                'TEN_SANPHAM' => $name,
                'DONGIA_BAN' => $price,
                'BAOHANH' => $warranty,
                'LOAI' => $catelog_dis,
                'MA_XUATXU' => $idmade,
                'MOTA' => $description,
                'TRANGTHAI' => $status
            );
            if ($namePicture != '') {
                $dt['HINH_DAIDIEN'] = $namePicture;
            }
            if (sizeof($image_list)){
                $image_list = json_encode($image_list);
                $dt['DS_HINHANH'] = $image_list;
            }
            //      pre($dt);
            //        pre($input);
            if ($this->product_model->update_rule($where, $dt)) {
                $this->session->set_flashdata('message', 'Update thành công!');
            } else {
                $this->session->set_flashdata('message', 'Update thất bại');
            }
            redirect(admin_url('product'));
        }


        $this->data['madeIn'] = $this->madeIn_model->getList();
     //   pre($info);
        $this->data['product'] = $info;

        $this->data['temp'] = 'admin/product/edit';//khung tieu de cua admin duoc giu lai
        $this->load->view('admin/main', $this->data);
    }

//===================XOA SAN PHAM=================================//
    public function delete()
    {
        //kiem tra san pham do da co trong giao dich hay chua
        //neu chua co thi xoa trong database con neu co roi thi bat trang thai len
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        $this->dell($id);

        redirect(admin_url('product'));
    }

    //===================XOA  ALL SAN PHAM=================================//
    public function dell_all()
    {
        $ids = $this->input->POST('ids');
        //pre($ids);
        foreach ($ids as $id) {
            $this->dell($id);
        }
    }

    //xoa thong tin san pham dua vao id
    private function dell($id)
    {
        //lấy thong tin của quản trị viên
        $input = array('MA_SANPHAM' => $id);
        $info = $this->product_model->get_info_rule($input);
//        pre($info);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này!');
            redirect(admin_url('product'));
        }
        $this->data['product'] = $info;
        //kiem tra san pham do da co trong giao dich hay chua
//        if ($this->giaodich_model->check_exist($input)) {
//
        //co thuc hien giao dich thi chi cap nhat lai trang
        $data = array('TRANGTHAI' => '0');//hang nay ngung kinh doanh
        if ($this->product_model->update_rule($input, $data)) {
            $this->session->set_flashdata('message', 'Delete success!');
        } else {
            $this->session->set_flashdata('message', 'Delete Fail!');
        }

//        } else {
//            //khong co thuc hien giao dich thi xoa db
//            $this->product_model->del_rule($input);
//            $image_link = './uploads/product/' . $info['HINH_DAIDIEN'];
//            if (file_exists($image_link)) {
//                unlink($image_link);
//            }
//            //xoa danh sách cac hinh
//            $image_list = json_decode($info['DS_HINHANH']);
//            if (is_array($image_list)) {
//                foreach ($image_list as $item) {
//                    $image_link = './uploads/product/' . $item['DS_HINHANH'];
//                    if (file_exists($image_list)) {
//                        unlink($image_link);
//                    }
//                }
//            }

        // }
    }

}
