<?php
$this->load->view('admin/transaction/head', $this->data);
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
                <td style="width:21px;">STT</td>
                <td style="width:5px;">Mã số</td>
                <td style="width: 25px;">Tổng số tiền (USD)</td>
                <td style="width:110px;">Địa chỉ</td>
                <td style="width:25px;">Thanh toán</td>
                <td style="width:45px;">Ngày thực hiện</td>
                <td style="width:25px;">Trạng thái</td>
                <td style="width:100px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="7">
                    <div class="itemActions">
                        <a href="<?php echo admin_url(''); ?>" class="button blueB">
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
            $i = 1;
            foreach ($list as $item) {
                ?>
                <tr class="row_<?php echo $item['MA_GIAODICH']; ?>">
                    <td style="text-align: center;">
                        <?php echo $i++; ?>
                        <input type="hidden" name="idTransaction" id="idTransaction"
                               value="<?php echo $item['MA_GIAODICH']; ?>">
                    </td>

                    <td class="tipS" title="<?php echo 'KH: '.$item['HO_TEN_KH'].' | '.(($item['GIOITINH_KH']=='0') ? 'Nam' :'Nữ');?>"><?= $item['MA_GIAODICH'];?></td>

                    <td>
                        <?php echo $item['TONG_THANHTIEN']; ?>
                    </td>

                    <td class="tipS"  title="<?php echo 'SDT: '.$item['SDT_KH'];?>">
                        <?php echo $item['DIACHI_GIAO']; ?>
                    </td>
                    <td name="typeTrasaction" id="typeTrasaction">
                        <?php
                        if ($item['MA_HINHTHUC'] == 1) {
                            echo 'Tiền mặt';
                        } else if ($item['MA_HINHTHUC'] == 2) {
                            echo 'Paypal';
                        } else {
                            echo 'Không xác định ' . $item['MA_HINHTHUC'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        echo date('d-m-Y', strtotime($item['NGAY_GIAODICH']));
                        ?>
                    </td>
                    <td class="tipS" title="<?php echo isset($item['HO_TEN_NV']) ? $item['HO_TEN_NV']:'' ;?>"
                       >
                        <?php
                        if ($item['TRANGTHAI'] == 0) {
                            echo 'Vừa đặt hàng';
                        } else if ($item['TRANGTHAI'] == 1) {
                            echo 'Chờ xử lý';
                        } else if ($item['TRANGTHAI'] == 2) {
                            echo "Đang giao hàng";
                        } else if ($item['TRANGTHAI'] == 3) {
                            echo "Đơn hàng hủy";
                        }else if ($item['TRANGTHAI'] == 4) {
                            echo "Thành công";
                        }
                        ?>
                    </td>


                    <td class="option textC">
                        <a href="<?php echo report_url('transactionReport/printPaybills/'.$item['MA_GIAODICH'])?>" title="In hóa đơn" class="tipE" target="_blanks">
                            <!--                            <button id="getBill">GIAO HÀNG</button>-->
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/copy.png"
                                 id="getBill_<?php echo $item['MA_GIAODICH']; ?>">
                        </a>
                        <a href="<?php echo admin_url('transactionDetail/index/' . $item['MA_GIAODICH']); ?>"
                           title="Xem chi tiết sản phẩm" class="tipN">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/view.png">
                        </a>
                        <a href="<?php echo admin_url('transaction/view/' . $item['MA_GIAODICH']); ?>" title="Chỉnh sửa"
                           class="tipS">
                            <img src="<?php echo public_url('admin/images') ?>/icons/color/edit.png">
                        </a>


                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<!--<script>-->
<!--    $(document).ready(function () {-->
<!---->
<!--        //thuc hien kiem tra  cty do da lap hoa don ngay do hay chua-->
<!--//        $('#getBill').click(function (e) {-->
<!--//           alert('sss');-->
<!--//           e.preventDefault();-->
<!--//           return false;-->
<!--//        });-->
<!--        $('input[id^="qty_"]').bind('keyup mouseup', function () {-->
<!--//            amount = $('input[id^="qty_"]').val();-->
<!--//            price = $('input[id^="price_"]').val();-->
<!--//            //     var sub_total = $('input[id^="sub_"]').val();-->
<!--//            // alert(amount);-->
<!--//            //   alert(price);-->
<!--//            subtotal = amount * price;-->
<!--//            $('input[id^="sub_"]').val(subtotal);-->
<!--//          //  alert(subtotal);-->
<!--//-->
<!--//        });-->
<!--            $('input[id^="getBill_"]').on('click', function () {-->
<!--            var idTransaction = $('#idTransaction').val();-->
<!--            alert('adasd');-->
<!--            e.preventDefault();-->
<!--            return false;-->
<!--            if (nameProviders == '0') {-->
<!--                alert('Vui lòng chọn nhà cung cấp');-->
<!--            }-->
<!--            if (nameProviders) {-->
<!--                $.ajax({-->
<!--                    type: 'POST',-->
<!--                    url: 'checkRepeat',-->
<!--                    data: 'providersId=' +nameProviders,-->
<!--                    success: function (html) {-->
<!--                        if(html!=''){-->
<!--                            alert(html);-->
<!--                            $('#nameProviders').val(0);-->
<!--                        }-->
<!--                    }-->
<!--                });-->
<!--            }-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->

