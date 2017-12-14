<?php
$this->load->view('admin/transaction_detail/head', $this->data);
?>
<div class="line"></div>
<div class="wrapper" id="main_transaction">
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
                Danh sách sản phẩm </h6>
            <div class="num f12">Số lượng: <b><?php echo $total_rows; ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">



            <thead>
            <tr>
                <td style="width:2px;">STT</td>
                <td style="width:5px;">Mã sản phẩm</td>
                <td style="width:80px;">Tên sản phẩm</td>
                <td style="width: 10px;">Số lượng</td>
                <td style="width:10px;">Giá gốc (USD)</td>
                <td style="width:15px;">Giá sau khi giảm(USD)</td>
                <td style="width:25px;">Thanh toán</td>
                <td style="width:25px;">Tặng phẩm</td>

            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="8">
                    <div class="itemActions">
                        <a href="<?php echo admin_url('transaction'); ?>" id="submit" class="button blueB">
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
            $i=1;
            //pre($list);
            foreach ($list as $item) {
                ?>
                <tr class="row_<?php echo $item['MA_SANPHAM']; ?>">
                    <td style="text-align: center;"><?php echo $i++;?></td>

                    <td style="text-align: center;">
                        <?= $item['MA_SANPHAM'] ?>
                    </td>
                    <!-- đơn giá bán nghĩa là đơn giá hiện tại đc update trên website, don gia hien tai là đon
                    giá tính từ khi KH chọn mua-->
                    <td class="tooltip">
                        <b><?php echo $item['TEN_SANPHAM']; ?></b>
                        <span class="tooltiptext">Đơn giá: <?php echo $item['DONGIA_BAN']; ?></span>
                    </td>
                    <td>
                        <?php echo $item['SOLUONG']; ?>
                    </td>
                    <td>
                        <?php echo $item['DONGIA_HT']; ?>
                    </td>
                    <td>
                        <?php echo $item['THANHTOAN']; ?>
                    </td>
                    <td>
                        <?php echo $item['THANHTOAN']*$item['SOLUONG']; ?>
                    </td>
                    <td>
                        <?php echo $item['TANGPHAM'];?>
                    </td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

