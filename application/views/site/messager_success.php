<?php if (isset($message) && $message){ ?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Thành công!</strong> <?php  echo $message;?>
    </div>
    <?php
}
?>