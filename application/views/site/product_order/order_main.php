<?php
//pre($info);
?>
<div class="main-content">

    <div class="step">
        <form id="form_next_step" accept-charset="UTF-8" method="post"
              action="<?php echo base_url('payBills/complete_checkout'); ?>">
            <div class="step-sections " step="2">
                <div id="section-payment-method" class="section">
                    <div class="section-header">
                        <h2 class="section-title">Phương thức thanh toán</h2>
                    </div>
                    <div class="section-content">
                        <div class="content-box">

                            <div class="radio-wrapper content-box-row">
                                <label class="radio-label" for="payment_method_id_485706">
                                    <div class="radio-input" style="float: left;">
                                        <input id="payment_method_ship" class="input-radio" name="payment_method_id"
                                               value="1" type="radio" required>
                                        <span>Thanh toán khi giao hàng</span>
                                    </div>
                                    <div class="radio-input" style="float: right;">
                                        <input id="payment_method_id" class="input-radio" name="payment_method_id"
                                               value="2" type="radio" required>
                                        <span>Thanh toán trực tuyến</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="step-footer">
                <input name="utf8" value="✓" type="hidden">
                <button type="submit" class="step-footer-continue-btn btn" id="btnComeplete">
                    <span class="btn-content">Hoàn tất đơn hàng</span>
                    <i class="btn-spinner icon icon-button-spinner"></i>
                </button>
                <!-- Nhờ sau khi click hoàn tất gởi thông tin lên-->
                <input type="hidden" id="ship_info" name="ship_info"
                       value="<?php echo isset($info) ? htmlentities(serialize($info)) : ''; ?> ">
                <input type="hidden" id="ship_rate" name="ship_rate" value=""/>
                <input type="hidden" id="payment_method" name="payment_method" value=""/>
                <a href="<?php echo base_url('payBills/checkout'); ?>"
                   class="step-footer-previous-link">
                    <svg class="previous-link-icon icon-chevron icon" xmlns="http://www.w3.org/2000/svg" width="6.7"
                         height="11.3" viewBox="0 0 6.7 11.3">
                        <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                    </svg>
                    Quay lại thông tin giao hàng
                </a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function (e) {
        $("input[name='payment_method_id']").click(function () {
            $('#payment_method').val($(this).val());
        });

    })
</script>

