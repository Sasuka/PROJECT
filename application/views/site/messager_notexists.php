<?php if (isset($message) && $message){ ?>
    <div class="alert alert-danger" role="alert">
        <strong>Thông báo! </strong> <?php echo $message;?><a href="<?php echo $link;?>" class="alert-link">Click rediret</a>.
    </div>
    <?php
}
?>

