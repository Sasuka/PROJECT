<?php
//if (isset($isLogin)) {
//    if ($isLogin == '1'){
//        /* $isLogin == 2 account block*/
//        if ($this->session->flashdata('message') != '') {
//            $this->data['message'] = $this->session->flashdata('message');
//            $this->load->view('site/messager_sucess', $this->data);
//        }
//    }elseif ($isLogin == '2') {
//        /* $isLogin == 2 account block*/
//        if ($this->session->flashdata('message') != '') {
//            $this->data['message'] = $this->session->flashdata('message');
//            $this->data['link'] = $this->session->flashdata('link');
//            $this->load->view('site/messager_blockacc', $this->data);
//        }
//    } elseif ($isLogin == '3') {
//        /*isLogin ==3 account not exists*/
//        if ($this->session->flashdata('message') != '') {
//            $this->data['message'] = $this->session->flashdata('message');
//            $this->data['link'] = $this->session->flashdata('link');
//            $this->load->view('site/messager_notexists', $this->data);
//        }
//    }
//}
//?>
<div class="row">
    <div class="col-md-12 ">
        <div class="page-header ">
            <h2 class="col-md-offset-5">ĐĂNG NHẬP</h2>
        </div>
    </div>

    <div class="col-md-12">
        <form id="form-login" method="POST" action="<?php echo base_url('user/login'); ?>" role="form"
              class="form-horizontal">
            <div class="form-group">
                <label class="col-md-offset-2 col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại đã đăng ký"
                           value="<?php echo set_value('phone') ?>"/>
                    <div name="phone_error" id="phone_error"
                         class="clear error"><?php echo form_error('phone'); ?></div>
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-offset-2 col-sm-2 col-md-2 control-label">Password</label>
                <div class="col-sm-4 col-md-4">
                    <input type="password" class="form-control" name="password"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-5">
                    <button type="submit" class="btn btn-default">ĐĂNG NHẬP</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#form-login').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
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
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password không được để trống'
                        },
                        stringLength: {
                            min: 6,
                            message: 'Phải ít nhất 6 ký tự'
                        }
                    }
                }
            }
        });
    });
</script>