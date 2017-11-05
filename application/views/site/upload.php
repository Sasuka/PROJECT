<?php
$upload=array(
    "name" => "img",
    "size" => "25",
);
?>

    <?php
    echo form_open_multipart("");
    echo form_label("Avartar: ").form_upload($upload)."<br />";
    echo form_label(" ").form_submit("ok", "Upload");
    echo form_close();
    ?>
<div>
    <form action="#" multi
</div>