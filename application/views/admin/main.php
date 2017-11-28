<!doctype html>
<html lang="vi">
<head>
    <?php
    $this->load->view('admin/head',$this->data);
    ?>
</head>
<body id="tbody-admin">
<!-- menu left -->
<div id="left_content">
    <?php $this->load->view('admin/left'); ?>
</div>
<!-- content -->
<div id="rightSide">
    <?php $this->load->view('admin/header',$this->data); ?>
    <!-- Content -->
    <?php $this->load->view($temp); ?>
    <!-- End Content -->
    <?php $this->load->view('admin/footer',$this->data); ?>
</div>
<div class="clear"></div>
</body>
</html>