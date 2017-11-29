<!-- head -->
<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->


<?php
$this->load->view('admin/admin/head', $this->data);


?>
<div class="line">
</div>
<div class="wrapper">
    <?php
    if ($this->session->flashdata('message') != '') {
        $this->_data['message'] = $this->session->flashdata('message');
        $this->load->view('admin/admin/messager', $this->_data);
    }
    ?>
    <!-- Form -->
    <div class="widget">
        <div class="title">
            <img src="<?php echo public_url('admin') ?>/images/icons/dark/add.png" class="titleIcon">
            <h6>Thêm mới quản trị viên</h6>
        </div>

        <form class="form" id="form-employ" action="add" method="post" enctype="multipart/form-data">
            <fieldset>

                <!--                <!-- chức vụ -->
                <!--                <div class="formRow">-->
                <!--                    <label class="formLeft" for="param_cat">Chức vụ:<span class="req">*</span></label>-->
                <!--                    <div class="formRight">-->
                <!--                        <select name="level" _autocheck="true" id='level' class="left">-->
                <!--                            <option value="-1">&nbsp;Lựa chọn chức vụ &nbsp;</option>-->
                <!---->
                <!--                            --><?php
                //                            foreach ($level as $item) {
                //                                ?>
                <!--                                <option value="--><? //= $item['MA_CHUCVU']; ?><!--">-->
                <? //= $item['TEN_CHUCVU']; ?><!--</option>-->
                <!--                                --><?php
                //                            }
                //                            //                         print_r($level);
                //                            ?>
                <!--                        </select>-->
                <!--                        <span name="cat_autocheck" class="autocheck"></span>-->
                <!--                        <div name="level_error" class="clear error" id="level_error"></div>-->
                <!--                    </div>-->
                <!--                    <div class="clear"></div>-->
                <!--                </div>-->
                <input type="hidden" name="level" value="<?php echo $type; ?>">
                <!-- ho -->
                <div class="formRow">
                    <label class="formLeft" for="param_fname">Họ:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo">
                                    <input name="fname" id="fname" _autocheck="true"
                                           type="text" value="<?php echo set_value('fname') ?>" required></span>
                        <span name="fname_autocheck" class="autocheck"></span>
                        <div name="fname_error" id="fname_error"
                             class="clear error"><?php echo form_error('fname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- ten -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="lname" id="lname" _autocheck="true"
                                                            type="text" value="<?php echo set_value('lname') ?>"
                                                            required></span>
                        <span name="lname_autocheck" class="autocheck"></span>
                        <div name="lname_error" id="lname_error"
                             class="clear error"><?php echo form_error('lname'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- mat khau -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Mật khẩu:<span class="req">*</span></label>
                    <div class="formRight"><span class="oneTwo">
                    <input name="password" id="password" _autocheck="true" type="password" value="<?php echo set_value('password') ?>"
                           required="" inputmode="numeric" minlength="6"
                           maxlength="15" size="15">
                        </span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" id="password_error"
                             class="clear error"><?php echo form_error('password'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- nhap lai mat khau -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Nhập lại mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="re-pass" id="re-pass" _autocheck="true"
                                                            type="password"
                                                            value="<?php echo set_value('re-pass') ?>" required="" inputmode="numeric" minlength="6"
                                                            maxlength="15" size="15"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" id="re-pass_error"
                             class="clear error"><?php echo form_error('re-pass'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- sdt -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Số điện thoại:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="phone" id="phone" _autocheck="true"
                                                            type="text" value="<?php echo set_value('phone') ?>"
                                                            inputmode="numeric" minlength="10"
                                                            maxlength="13" size="13"  required></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"
                             id="phone_error"><?php echo form_error('phone'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- email -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Email:<span class="req">*</span></label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="email" id="email" _autocheck="true"
                                                            type="email"
                                                            value="<?php echo set_value('email') ?>"
                                                            class="check_email" required></span>
                        <span name="name_autocheck" class="autocheck" id="mail_autocheck"></span>
                        <div name="name_error" class="clear error"
                             id="email_error"><?php echo form_error('email'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- diachi -->
                <div class="formRow">
                    <label class="formLeft" for="param_site_title">Địa chỉ:</label>
                    <div class="formRight">
                            <span class="oneTwo"><textarea name="address" id="address" rows="4" cols="50" required>
                                    <?php echo set_value('address') ?>
                                </textarea></span>
                        <span name="address_autocheck" class="autocheck"></span>
                        <div name="address_error" id="address_error" class="clear error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <!-- ngay sinh -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Ngày sinh:</label>
                    <div class="formRight">
                                <span class="oneTwo"><input name="birthday" id="birthday" _autocheck="true"
                                                            type="text"
                                                            value="<?php echo set_value('birthday') ?>" required=""></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('birthday'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- hinh anh -->
                <div class="formRow">
                    <label class="formLeft">Hình ảnh:<span class="req"></span></label>
                    <div class="formRight">
                        <div class="left"><input id="image" name="image" type="file"
                                                 value="<?php echo set_value('avatar') ?>" ></div>
                        <div name="image_error" class="clear error"><?php echo form_error('avatar'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- gioi tinh -->
                <div class="formRow">
                    <label class="formLeft" for="param_name">Giới tính:</label>
                    <div class="formRight">
                        <div class="radio-inline">
                            <input name="gender" id="param_name" _autocheck="true" type="radio" value="0" required> Nam
                        </div>
                        <div class="radio-inline">
                            <input name="gender" id="param_name" _autocheck="true" type="radio" value="1" required> Nữ
                        </div>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('gender'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formSubmit">
                    <input value="Thêm mới" class="redB" id="btnAdd" type="submit">
                    <input value="Hủy bỏ" class="basic" type="reset">
                </div>
                <div class="clear"></div>
            </fieldset>
        </form>
    </div>

</div>

