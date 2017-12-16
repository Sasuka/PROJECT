
<div class="inner-header">
    <div class="container">
        <h2 class="title" style="text-align: center"><strong>Thanh Toán Trực Tuyến</strong></h2>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div class="row">
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

            <!-- Nhập địa chỉ email người nhận tiền (người bán) -->
            <input type="hidden" name="business" value="tientai_receive@gmail.com">

            <!-- tham số cmd có giá trị _xclick chỉ rõ cho paypal biết là người dùng nhất nút thanh toán -->
            <input type="hidden" name="cmd" value="_xclick">

            <!-- Thông tin mua hàng. -->
            <input type="hidden" name="item_name" value="MA_DONHANG_<?php echo $billsInfo['MA_GIAODICH'];?>">
            <!--Trị giá của giỏ hàng, vì paypal không hỗ trợ tiền việt nên phải đổi ra tiền $-->
            Tổng Tiền Thanh Toán Đơn Hàng Của Quý Khách: <input type="text" name="amount" placeholder="Nhập số tiền vào" value="<?php echo $sum;?>" readonly>
            <!--Loại tiền-->
            <input type="hidden" name="currency_code" value="USD">
            <!--Đường link mình cung cấp cho Paypal biết để sau khi xử lí thành công nó sẽ chuyển về theo đường link này-->
            <input type="hidden" name="return" value="http://localhost/www/PROJECT/cart/result_paypal_suc/">
            <!--Đường link mình cung cấp cho Paypal biết để nếu  xử lí KHÔNG thành công nó sẽ chuyển về theo đường link này-->
            <input type="hidden" name="cancel_return" value="http://localhost/www/PROJECT/cart/result_paypal_fal".<?php echo $billsInfo['MA_GIAODICH'];?>>
            <!-- Nút bấm. -->
            <button type="submit" name="submit" value="Thanh toán quay Paypal">Thanh toán quay Paypal</button>
        </form>
    </div>
</div> <!-- #content -->
</div> <!-- .container -->
