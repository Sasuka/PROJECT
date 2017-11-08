<?php if (isset($message) && $message){ ?>
    <div class="alert alert-warning" role="alert">
        <strong>Cảnh báo !</strong> <?php echo $message;?><a href="<?php echo $link;?>" class="alert-link">Click rediret</a>.
    </div>
    <?php
}
?>