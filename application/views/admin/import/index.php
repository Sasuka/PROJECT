<?php
$this->load->view('admin/import/head', $this->data);
$account = $this->session->userdata('account');
?>
<div class="line"></div>
<div class="wrapper" id="main_import">
    <?php
    //  var_dump($this->session->flashdata('message'));
    if ($this->session->flashdata('message') != '') {
        $this->data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/messager', $this->data);
    }
    ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon">
                <img src="<?php echo public_url('admin/images') ?>/icons/control/16/list.png">
            </span>
            <h6>
                Danh sách phiếu nhập </h6>
            <div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <td style="width:60px;">Mã số</td>
                <td>Tên nhân viên</td>
                <td>Tên nhà cung cấp</td>
                <td>Tổng thành tiền</td>
                <td style="width:75px;">Ngày lập</td>
                <td style="width:120px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
<!--                    <div class="list_action itemActions">-->
<!--                        <a href="#submit" id="submit" class="button blueB" url="--><?php //echo admin_url('import/dell_all');?><!--">-->
<!--                            <span style="color:white;">Xóa hết</span>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div class="itemActions">-->
<!--                        <a  target="_blank" href="--><?php //echo report_url('paybills/');?><!--" id="submit" class="button blueB">-->
<!--                            <span style="color:white;">Xuất hóa đơn</span>-->
<!--                        </a>-->
<!--                    </div>-->
                    <div class="pagination">
                        <?php
                        echo $this->pagination->create_links();
                        ?>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody class="list_item">
            <div id="loading" style="width: 50px;height: 50px;position: absolute;z-index: 99;margin:15% 45%;"></div>
            <?php
               // pre($list);
            $i =0;
            foreach ($list as $item) {
                ?>
                <tr class="row_<?php echo $item['MA_PHIEUNHAP'];?>">

                    <td class="textC"><?= $item['MA_PHIEUNHAP'] ?></td>

                    <td>
                        <a href="#" class="tipS" title="">
                            <b><?php echo $item['HO'].' '.$item['TEN']; ?></b>
                        </a>
                    </td>
                    <td>
                        <a>
                            <b><?php echo $item['TEN_NHA_CUNGCAP']; ?></b>
                        </a>
                    </td>
                    <td>
                        <a class="tipS" title="">
                            <b><?php echo $item['TONG_THANHTIEN']; ?></b>
                        </a>
                    </td>
                    <td class="textC">
                        <?php echo date('d-m-Y', strtotime($item['NGAYLAP_PHIEUNHAP'])); ?>
                    </td>

                    <td class="option textC">

<!--                        chinh nhan vien lap phieu nhap nao thi moi duoc sua va xoa phieu nhap do-->
<!--                        dong thoi khong co chua ma phieu nhap-->
                        <a href="<?php echo admin_url('importDetail/index/' . $item['MA_PHIEUNHAP']); ?>" target="_self" class="tipS" title="Xem chi tiết sản phẩm">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/view.png">
                        </a>
                        <?php

                        if(($item['MA_NHANVIEN']==$account['MA_NHANVIEN']) &&
                        ($item['TONG_THANHTIEN'] == 0)) { ?>

                            <a href="<?php echo admin_url('import/edit/' . $item['MA_PHIEUNHAP']); ?>" title="Chỉnh sửa" target="_self"
                               class="tipS">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/edit.png">
                            </a>

                            <a href="<?php echo admin_url('import/delete/' . $item['MA_PHIEUNHAP']); ?>" title="Xóa"
                               class="tipS verify_action">
                                <img src="<?php echo public_url('admin/images') ?>/icons/color/delete.png">
                            </a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

