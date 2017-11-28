<script>
    $(document).ready(function () {
        var check = false;

        function do_submit() {
            console.log('check ' + this.check);
            if (check) {
                $('#btnAdd').removeAttr('disabled');
            } else {
                $('#btnAdd').attr('disabled', 'disabled');
            }
        }

        $('textarea').each(function () {
                $(this).val($(this).val().trim());
            }
        );

        if ($('#level').val() == '-1') {
            $('#level_error').html('<span style="color:red;">Vui lòng điền vào</span>');
            check = false;
            do_submit();
        } else {
            $('#level_error').html('');
            check = true;
            do_submit();
        }

        var fname = $('#fname').val();
        var password = $('#password').val();
        var re_pass = $('#re-pass').val();
        var phone = $('#phone').val();
        var email = $('#email').val();

        var birthday = $('#birthday').val();
        var gender = $('#gender').val();

        $('#level').change(function (e) {
            var level = $('#level').val();
            if (level == -1) {
                $('#level_error').html('<span style="color:red;">Vui lòng điền vào</span>');
                check = false;
                do_submit();
            } else {
                $('#level_error').html('');
                check = true;
                do_submit();
            }
        });
        $('#fname').on('blur', function (e) {
            var fname = $('#fname').val();
            if (fname == '') {
                $('#fname_error').html('<span style="color:red;">Vui lòng điền vào</span>');
                check = false;
                do_submit();
            } else {
                $('#fname_error').html('');
                check = true;
                do_submit();
            }
        });
        $('#lname').on('blur', function (e) {
            var lname = $('#lname').val();
            if (lname == '') {
                $('#lname_error').html('<span style="color:red;">Vui lòng điền vào</span>');
                check = false;
                do_submit();
            } else {
                $('#lname_error').html('');
                check = true;
                do_submit();
            }
        });

//        $('#address').on('blur', function () {
//            if($('#address').text()!=''){
//                $('#address_error').html('<span style="color:red;">Vui lòng điền vào</span>');
//                check = false;
//                do_submit();
//            }else{
//                $('#address_error').html('');
//                check = true;
//                do_submit();
//            }
//        });

        $('#phone').keyup(function (e) {
//            e.defaultPrevented();
            var phone = $(this).val();
//            if (isNaN(phone) == true) {
//                $('#phone_error').html('<span style="color: #0000FF;">Điện thoại phải là số là số</span>');
////                alert(phone);
//                return false;
//            } else if (phone < 8) {
//                $('#phone_error').html('Số điện thoại tối thiểu là 8 số');
//                return false;
//            } else {
//                $('#phone_error').html('');
//                return true;
//            }


            if (phone.match(/\d/g).length <= 9 || phone.match(/\d/g).length >= 13) {
                $('#phone_error').html('<span style="color: #0000FF;">Số điện thoại chưa đúng!</span>');
               $(this).focus();
                check = false;
                do_submit();
              //  return false;
            } else {
                $('#phone_error').html('');
                check = true;
                do_submit();
                //return true;
            }
        });

        $("#birthday").datepicker({
            dateFormat: 'dd/mm/yy'
        });


    });

    //    function check() {
    //        var level = $('#level').val();
    //        if (level == -1)
    //            return false;
    //        else
    //            return true;
    //    }
</script>
<?php
$type = isset($type) ? $type : '1';

?>

<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Quản Trị Viên</h5>
            <span>Quản lý nhân viên</span>
        </div>

        <div class="horControlB menu_action">
            <ul>
                <li><a href="<?php echo admin_url('admin/add?type=' . $type) ?>">
                        <img src="<?php echo public_url('admin') ?>/images/icons/control/16/add.png">
                        <span>Thêm mới</span>
                    </a></li>

                <li><a href="<?php echo admin_url('admin/listEmp') ?>">
                        <img src="<?php echo public_url('admin') ?>/images/icons/control/16/list.png">
                        <span>Danh sách</span>
                    </a></li>
            </ul>
        </div>

        <div class="clear"></div>
    </div>
</div>