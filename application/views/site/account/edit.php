<?php
$tmp['HO'] = (isset($_POST['fname']) ? $_POST['fname'] : $info['HO']);
$tmp['TEN'] = (isset($_POST['lname']) ? $_POST['lname'] : $info['TEN']);
$tmp['SDT'] = (isset($_POST['phone']) ? $_POST['phone'] : $info['SDT']);
$tmp['EMAIL'] = (isset($_POST['email']) ? $_POST['email'] : $info['EMAIL']);
$tmp['address'] = (isset($_POST['address']) ? $_POST['address'] : $info['DIACHI']);
$tmp['gender'] = (isset($_POST['gender']) ? $_POST['gender'] : $info['GIOITINH']);

?>
<div class="row">
    <div class="col-md-12 ">
        <div class="page-header ">
            <h2 class="col-md-offset-4">CẬP NHẬT THÔNG TIN</h2>
        </div>
    </div>

    <div class="col-md-12">
        <form id="form_edit" method="POST" action="" role="form" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-3 control-label">Fullname</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="fname" placeholder="Họ" value="<?php echo $tmp['HO'] ?>"/>
                    <div name="fname_error" id="fname_error"
                         class="clear error"><?php echo form_error('fname'); ?></div>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="lname" placeholder="Tên" value="<?php echo $tmp['TEN'] ?>"/>
                    <div name="fname_error" id="fname_error"
                         class="clear error"><?php echo form_error('lname'); ?></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Số ĐT</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại liên lạc" value="<?php echo $tmp['SDT']; ?>"/>
                    <div name="phone_error" id="phone_error"
                         class="clear error"><?php echo form_error('phone'); ?></div>
                </div>
                <label class="col-sm-1 control-label">Email</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="email" placeholder="Địa chỉ email..." value="<?php echo $tmp['EMAIL'];?>"/>
                    <div name="email_error" id="email_error"
                    class="clear error"><?php echo form_error('email'); ?></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Địa chỉ</label>
                <div class="col-sm-6">
                   <textarea class="form-control" rows="2" placeholder="Địa chỉ Xã/Huyện,Quận/Thị trấn, Thành phố" name="address" style="text-indent: 10px;">
                     <?php echo $tmp['address'] ?>
                   </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" name="password"/>
                </div>
                <label class="col-sm-2 control-label">Nhập lại password</label>
                <div class="col-sm-2">
                    <input type="password" class="form-control" name="re_password"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Giới tính</label>
                <div class="col-sm-6">
                    <div class="radio-inline col-sm-3">
                        <label>
                            <input type="radio" name="gender" value="0" <?php echo ($tmp['gender'] == '0' ? 'checked' : '') ?>/> Nam
                        </label>
                    </div>
                    <div class="radio-inline col-sm-3">
                        <label>
                            <input type="radio" name="gender" value="1" <?php echo ($tmp['gender'] == '1' ? 'checked' : '') ?>/> Nữ
                        </label>
                    </div>

                </div>
            </div>

<!--            <div class="form-group">-->
<!--                <label class="col-sm-3 control-label">Ngày sinh</label>-->
<!--                <div class="col-sm-6">-->
<!--                    <input type="text" class="form-control" name="birthday" id="datepicker" placeholder="dd/mm/yyyy" value="--><?php //echo set_value('birthday') ?><!--" />-->
<!--                </div>-->
<!--            </div>-->

            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-5">
                    <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                    <button type="submit" class="btn btn-default">CẬP NHẬT</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
//        DateTimePicker filedatepkr = new DateTimePicker();
//        //filedatepkr.CustomFormat = "dd/MM/yyyy";
//        filedatepkr.Value = DateTime.Parse(fidate);
        $( "#datepicker" ).datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $('textarea').each(function(){
                $(this).val($(this).val().trim());
            }
        );
        $('#form_edit').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    message: 'Username không được để trống',
                    validators: {
                        notEmpty: {
                            message: 'The username is required and cannot be empty'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'The username must be more than 6 and less than 30 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9]+$/,
                            message: 'The username can only consist of alphabetical and number'
                        },
                        different: {
                            field: 'password',
                            message: 'The username and password cannot be the same as each other'
                        }
                    }
                },
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
                        },
                        different: {
                            field: 'password',
                            message: 'Họ và password không được giống nhau'
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
                        },
                        different: {
                            field: 'password',
                            message: 'Tên và password không được giống nhau'
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
                        },
                        different: {
                            field: 'password',
                            message: 'Không được đặt giống với password'
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
                password: {
                    validators: {
//                        notEmpty: {
//                            message: 'Password không được để trống'
//                        },
                        different: {
                            field: 'lname',
                            message: 'Password không được đặt giống với'
                        },
                        stringLength: {
                            min: 6,
                            message: 'Phải ít nhất 6 ký tự'
                        }
                    }
                },
                re_password: {
                    validators: {
//                        notEmpty: {
//                            message: 'Nhập password không được để trống'
//                        },
                        identical: {
                            field: 'password',
                            message: 'password không khớp'
                        }
                    }
                },
                birthday: {
                    validators: {
                        notEmpty: {
                            message: 'Ngày sinh không được để trống'
                        }
                    }
                }
//                },
//                gender: {
//                    validators: {
//                        notEmpty: {
//                            message: 'The gender is required'
//                        }
//                    }
//                }
            }
        });
    });



</script>
