<div class="wrap-breadcrumb">
    <div class="clearfix container">
        <div class="row main-header">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li><a href="<?php echo base_url('home'); ?>" target="_self">Trang chủ</a></li>
                    <li><a href="#" target="_self">Danh mục</a></li>
                    <li><a href="#"
                           target="_self"><?php echo isset($infoCate) ? $infoCate['TEN_NHOM_SANPHAM'] : ''; ?></a></li>
                    <li class="active"><span><?php echo isset($infoCate['TEN_LOAI_SANPHAM']) ? $infoCate['TEN_LOAI_SANPHAM'] : ''; ?></span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div>
    <!--    --><?php
    //        if($this->session->flashdata('message')){
    //           // pre($cusAccount);
    //            $this->data['message'] = 'Bạn đăng nhập thành công';
    //            $this->load->view('site/messager_success',$this->data);
    //        }
    //    ?>
</div>
<div id="collection" class="content-pages collection-page" data-sticky_parent>
    <!-- Begin collection info -->
    <!-- Content-->
    <div class="col-lg-12 visible-sm visible-xs">
        <div class="visible-sm visible-xs">
            <h1 class="title-sm">
                SẢN PHẨM
            </h1>
        </div>

        <div class="filter-by-wrapper">
            <div class="filter-by">

                <div class="sort-filter-option navbar-inactive" id="navbar-inner">
                    <div class="filterBtn txtLeft btn-navbar-collection">
						<span class="list-coll">
							<i class="fa fa-server" aria-hidden="true"></i>
							Danh mục
						</span>
                    </div>
                </div>


                <div class="sort-filter-option js-promoteTooltip">
                    <div class="filterBtn txtLeft showOverlay">
                        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i>
                        <span class="custom-dropdown custom-dropdown--white">
							<select class="sort-by custom-dropdown__select custom-dropdown__select--white" name="filter" id="filter">
                                <option value="manual">Sản phẩm nổi bật</option>
								<option value="price-ascending">Giá: Tăng dần</option>
								<option value="price-descending">Giá: Giảm dần</option>
								<option value="title-ascending">Tên: A-Z</option>
								<option value="title-descending">Tên: Z-A</option>
								<option value="created-ascending">Cũ nhất</option>
								<option value="created-descending">Mới nhất</option>
							</select>
						</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class=" col-md-3 col-sm-12 col-xs-12 leftsidebar-col" data-sticky_column>
        <?php $this->load->view('site/product_list/menu_sidebar', $this->data); ?>
    </div>
    <div class="content-col col-md-9 col-sm-12 col-xs-12" data-sticky_column>

        <?php
            if(isset($type) && $type == 'discount') {
                $this->load->view('site/product_list/product_discount', $this->data);
            }else if(isset($type) && $type == 'getProduct'){
                $this->load->view('site/product_list/product_get', $this->data);
            }else if(isset($type) && $type == 'getProductGroup'){
                $this->load->view('site/product_list/product_group', $this->data);
            }else{
                $this->load->view('site/product_list/product_list', $this->data);
            }
        ?>

    </div>

    <!-- End collection info -->
    <!-- Begin no products -->


    <!-- End no products -->
</div>
<script>
    Haravan.queryParams = {};
    if (location.search.length) {
        for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
            aKeyValue = aCouples[i].split('=');
            console.log(aKeyValue);
            if (aKeyValue.length > 1) {
                Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
            }
        }
    }
    var collFilters = jQuery('.coll-filter');
    collFilters.change(function () {
        var newTags = [];
        var newURL = '';
        delete Haravan.queryParams.page;
        collFilters.each(function () {
            if (jQuery(this).val()) {
                newTags.push(jQuery(this).val());
            }
        });

        newURL = '/collections/' + 'dong-ho-nam-longbo';
        if (newTags.length) {
            newURL += '/' + newTags.join('+');
        }
        var search = jQuery.param(Haravan.queryParams);
        if (search.length) {
            newURL += '?' + search;
        }
        location.href = newURL;

    });
    jQuery('.sort-by')
        .val('title-ascending')
        .bind('change', function () {
            Haravan.queryParams.sort_by = jQuery(this).val();
            location.search = jQuery.param(Haravan.queryParams);
        });
</script>
