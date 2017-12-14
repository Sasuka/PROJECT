<?php
$this->load->view('admin/store/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper" id="main_product">
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
                <img src="<?php echo public_url('admin/images/') ?>icons/control/16/order.png">
            </span>
            <h6>
                Danh sách các ngăn kho </h6>
            <div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <td style="width:60px;">Mã kho</td>
                <td>Tên kho</td>
<!--                <td>Số lượng tồn</td>-->
                <td>Tên loại sản phẩm</td>
<!--                <td style="width:120px;">Hành động</td>-->
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="5">
                    <div class="itemActions">
                        <a href="<?php echo admin_url('home'); ?>"  class="button blueB">
                            <span style="color:white;">Quay lại</span>
                        </a>
                    </div>

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
            foreach ($list as $item) {
                ?>
                <tr class="row_<?php echo $item['MA_KHO']; ?>">

                    <td class="textC"><?= $item['MA_KHO'] ?></td>

                    <td>
                        <a>
                            <b><?php echo $item['TEN_KHO']; ?></b>
                        </a>

                    </td>

<!--                    <td>-->
<!--                        <span>--><?php //echo $item['SOLUONG_TON']; ?><!--</span>-->
<!--                    </td>-->


                    <td class="textC">
                        <span><?php echo $item['TEN_LOAI_SANPHAM']; ?></span>
                    </td>

<!--                    <td class="option textC">-->
<!---->
<!--                        <a href="--><?php //echo admin_url('store/edit/' . $item['MA_KHO']); ?><!--" title="Chỉnh sửa"-->
<!--                           class="tipS">-->
<!--                            <img src="--><?php //echo public_url('admin/images') ?><!--/icons/color/edit.png">-->
<!--                        </a>-->
<!---->
<!--                        <a href="--><?php //echo admin_url('store/delete/' . $item['MA_KHO']); ?><!--" title="Xóa"-->
<!--                           class="tipS verify_action">-->
<!--                            <img src="--><?php //echo public_url('admin/images') ?><!--/icons/color/delete.png">-->
<!--                        </a>-->
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

