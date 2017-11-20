<?php
$tmp['HO'] = (isset($_POST['fname']) ? $_POST['fname'] : '');
$tmp['TEN'] = (isset($_POST['lname']) ? $_POST['lname'] : '');
$tmp['SDT'] = (isset($_POST['phone']) ? $_POST['phone'] :'');
$tmp['EMAIL'] = (isset($_POST['email']) ? $_POST['email'] : '');
$tmp['DIACHI'] = (isset($_POST['address']) ? $_POST['address'] : '');
/* Nếu đã đăng nhập*/
if (!empty($cusAccount)){
    $tmp['HO'] = (isset($_POST['fname']) ? $_POST['fname'] : $cusAccount['HO']);
    $tmp['TEN'] = (isset($_POST['lname']) ? $_POST['lname'] : $cusAccount['TEN']);
    $tmp['SDT'] = (isset($_POST['phone']) ? $_POST['phone'] :$cusAccount['SDT']);
    $tmp['EMAIL'] = (isset($_POST['email']) ? $_POST['email'] : $cusAccount['EMAIL']);
    $tmp['DIACHI'] = (isset($_POST['address']) ? $_POST['address'] : $cusAccount['DIACHI']);
}



?>
<div class="main-content">
    <div class="step">
        <form id="transactionForm" name="transactionForm" accept-charset="UTF-8" method="post"
              action="<?php echo base_url('payBills/method_checkout') ?>">
            <div class="step-sections " step="1">
                <div class="section">
                    <div class="section-header">
                        <h2 class="section-title">Thông tin giao hàng</h2>
                    </div>
                    <div class="section-content section-customer-information no-mb">
                        <input name="utf8" value="✓" type="hidden">
                        <div class="inventory_location_data">
                            <input name="customer_shipping_district" value="" type="hidden">
                            <input name="customer_shipping_ward" value="" type="hidden">
                        </div>
                        <p class="section-content-text">
                            Bạn đã có tài khoản?
                            <a href="<?php echo base_url('user/login') ?>">Đăng
                                nhập</a>
                        </p>
                        <div class="fieldset">
                            <div class="field field-two-thirds">
                                <div class="field-input-wrapper">
                                    <label class="field-label" for="billing_fname">Họ và tên đệm</label>
                                    <div class="form-group">
                                    <input placeholder="Họ và tên lót" autocapitalize="off" spellcheck="false"
                                           class="field-input" size="30" id="fname"
                                           name="fname" value="<?php echo $tmp['HO'];?>" type="text" maxlength="11" <?php echo (!empty($cusAccount['HO'])) ? 'disabled' : ''; ?>>
                                    </div>
                                </div>

                            </div>
                            <div class="field field-required field-third  ">
                                <div class="field-input-wrapper">
                                    <label class="field-label" for="lname">Tên</label>
                                    <div class="form-group">
                                    <input placeholder="Tên" autocapitalize="off" spellcheck="false"
                                           class="field-input" size="30" maxlength="11" id="lname"
                                           name="lname" value="<?php echo $tmp['TEN'];?>" type="tel"
                                        <?php echo (!empty($cusAccount['TEN'])) ? 'disabled' : ''; ?>
                                    >
                                    </div>
                                </div>
                            </div>


                            <div class="field field-two-thirds  ">
                                <div class="field-input-wrapper">
                                    <label class="field-label" for="email">Email</label>
                                    <div class="form-group">
                                    <input placeholder="Email" autocapitalize="off" spellcheck="false"
                                           class="field-input"
                                           size="30" id="email" name="email" value="<?php echo  $tmp['EMAIL'];?>"
                                           type="email"
                                        <?php echo (!empty($cusAccount['EMAIL'])) ? 'disabled' : ''; ?>
                                    >
                                    </div>
                                </div>
                            </div>
                            <div class="field field-required field-third ">
                                <div class="field-input-wrapper ">
                                    <label class="field-label" for="phone">Số điện thoại</label>
                                    <div class="form-group">
                                        <input placeholder="Số điện thoại"
                                               class="field-input " size="30" maxlength="11" name="phone" value="<?php echo $tmp['SDT'];?>" type="text"
                                            <?php echo (!empty($cusAccount['SDT'])) ? 'disabled' : ''; ?>
                                        >
                                    </div>

                                </div>
                            </div>
                            <div class="field   ">
                                <div class="field-input-wrapper">
                                    <label class="field-label" for="address">Địa chỉ</label>
                                    <div class="form-group">
                                    <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false"
                                           class="field-input"
                                           size="30" id="address" name="address" value="<?php echo $tmp['DIACHI'];?>"
                                           type="text" required>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="step-footer">


                <input name="utf8" value="✓" type="hidden">
                <button type="submit" class="step-footer-continue-btn btn" name="checkout">
                    <span class="btn-content">Tiếp tục đến phương thức thanh toán</span>
                    <i class="btn-spinner icon icon-button-spinner"></i>
                </button>

                <a class="step-footer-previous-link" href="<?php echo base_url('cart'); ?>">
                    <svg class="previous-link-icon icon-chevron icon" xmlns="http://www.w3.org/2000/svg" width="6.7"
                         height="11.3" viewBox="0 0 6.7 11.3">
                        <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                    </svg>
                    Giỏ hàng
                </a>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#transactionForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                fname:{
                    message: 'Họ và chữ lót không được để trống',
                    validators: {
                        stringLength: {
                            min: 2,
                            max: 30,
                            message: 'Chiều dài họ và chữ lót trong khoảng từ 2 đến 30 ký tự'
                        },
                        regexp: {
                            regexp: /\D+$/,
                            message: 'Tên chứa chữ số thì không hợp lệ'
                        }
                    }
                },
                lname:{
                    message: 'Tên không được để trống',
                    validators: {
                        notEmpty: {
                            message: 'Tên không được để trống'
                        },
                        stringLength: {
                            min: 2,
                            max: 30,
                            message: 'Chiều dài họ và chữ lót trong khoảng từ 2 đến 30 ký tự'
                        }
                    }
                },
                phone: {
                    validators: {
                        notEmpty: {
                            message: 'Số điện thoại được để trống'
                        },
                        regexp: {
                            regexp: /^[0-9]+$/,
                            message: 'Điện thoại phải là số'
                        },
                        stringLength: {
                            min: 9,
                            max: 12,
                            message: 'Điện thoại không hợp lệ'
                        }
                    }
                },
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Email không được để trống'
                        },
                        emailAddress: {
                            message: 'Địa chỉ mail không hợp lệ'
                        }
                    }
                },
                address: {
                    message: 'Địa chỉ giao không được để trống',
                    validators: {
                        notEmpty: {
                            message: 'Địa chỉ không được để tr'
                        }
                    }
                }

            }
        });
    });
</script>