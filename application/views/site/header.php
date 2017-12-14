<nav id="menu-mobile" class="hidden">
    <ul>
        <li><a href="<?php echo base_url('');?>">Trang chủ</a></li>
        <li class="has-children">
            <a href="<?php echo base_url('product');?>">Thương Hiệu</a>
            <ul class="child count-nav-6">
                <?php
                for ($i = 0, $j = $i; $i < count($listGroup); $i++) {

                ?>
                <li><a href="<?php echo base_url() .'product/getProductGroup/' . $listGroup[$i]['MA_NHOM_SANPHAM'] ;?>"><?php echo mb_convert_case(mb_strtolower($listGroup[$i]['TEN_NHOM_SANPHAM']), MB_CASE_TITLE, "UTF-8"); ?></a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="<?php echo base_url('service');?>">Dịch Vụ</a></li>
        <li><a href="<?php echo base_url('contact');?>">Liên Hệ</a></li>
        <li><a href="#">Blog</a></li>
    </ul>
</nav>