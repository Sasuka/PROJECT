<div class="product_order">
    <!-- list product-->
    <div class="sidebar">
        <div class="sidebar-content">
            <div class="order-summary order-summary-is-collapsed">
                <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                <div class="order-summary-sections">
                    <div class="order-summary-section order-summary-section-product-list"
                         data-order-summary-section="line-items">
                        <table class="product-table">
                            <thead>
                            <tr>
                                <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                <th scope="col"><span class="visually-hidden">Giá</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $product = $this->cart->contents();
                            $sum_price = 0;
                            foreach ($product as $row) {
                                $sum_price += $row['subtotal'];
                                ?>
                                <tr class="product" data-product-id="<?php echo $row['rowid']; ?>"
                                    data-variant-id="<?php echo $row['rowid']; ?>">
                                    <td class="product-image">
                                        <div class="product-thumbnail">
                                            <div class="product-thumbnail-wrapper">
                                                <img class="product-thumbnail-image" alt="<?php echo $row['name']; ?>"
                                                     src="<?php echo upload_url('product/') . $row['image']; ?>">
                                            </div>
                                            <span class="product-thumbnail-quantity"
                                                  aria-hidden="true"><?php echo $row['qty']; ?></span>
                                        </div>
                                    </td>
                                    <td class="product-description">
                                        <span class="product-description-name order-summary-emphasis"><?php echo $row['name']; ?></span>

                                    </td>
                                    <td class="product-quantity visually-hidden"><?php echo $row['qty']; ?></td>
                                    <td class="product-price">
                                        <span class="order-summary-emphasis"><span
                                                    style="color: #0000FF"> <?php echo $row['subtotal']; ?></span> $</span>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <input type="hidden" name="sum_price" id="sum_price" value="<?php echo $sum_price; ?>"/>
                    </div>

                    <div class="order-summary-section order-summary-section-discount"
                         data-order-summary-section="discount">
                        <form id="form_discount_add" accept-charset="UTF-8" method="post">
                            <input name="utf8" value="✓" type="hidden">
                            <div class="fieldset">
                                <div class="field  ">
                                    <div class="field-input-btn-wrapper">
                                        <div class="field-input-wrapper">
                                            <label class="field-label" for="discount.code">Mã giảm giá</label>
                                            <input placeholder="Mã giảm giá" class="field-input"
                                                   data-discount-field="true" autocomplete="off" autocapitalize="off"
                                                   spellcheck="false" size="30" id="discount.code" name="discount.code"
                                                   value="" type="text">
                                        </div>
                                        <button type="submit" class="field-input-btn btn btn-default btn-disabled">
                                            <span class="btn-content">Sử dụng</span>
                                            <i class="btn-spinner icon icon-button-spinner"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="order-summary-section order-summary-section-total-lines"
                         data-order-summary-section="payment-lines">
                        <table class="total-line-table">
                            <thead>
                            <tr>
                                <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                <th scope="col"><span class="visually-hidden">Giá</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="total-line total-line-subtotal">
                                <td class="total-line-name">Tạm tính</td>
                                <td class="total-line-price">
															<span class="order-summary-emphasis" id="summary"
                                                                  data-checkout-subtotal-price-target="669300000"
                                                                  style="color: red;">

															</span>
                                    $
                                </td>
                            </tr>

                            <tr class="total-line total-line-shipping">
                                <td class="total-line-name">Phí vận chuyển</td>
                                <td class="total-line-price">
															<span class="order-summary-emphasis" id="ship_costs"
                                                                  data-checkout-total-shipping-target="0">

															</span>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot class="total-line-table-footer">
                            <tr class="total-line">
                                <td class="total-line-name payment-due-label">
                                    <span class="payment-due-label-total">Tổng cộng</span>
                                </td>
                                <td class="total-line-name payment-due">
                                    <span class="payment-due-currency">$</span>
                                    <span class="payment-due-price" data-checkout-payment-due-target="669300000" id="total_costs">

															</span>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- list product-->
    <div class="main" style="width: 62%;">
        <div class="main-header">
            <a href="#" class="logo">
                <h1 class="logo-text">Tiến Tài</h1>
            </a>

            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url('cart') ?>">Giỏ hàng</a>
                </li>
                <li class="breadcrumb-item breadcrumb-item-current">
                    Thông tin giao hàng
                </li>
                <li class="breadcrumb-item ">
                    Phương thức thanh toán
                </li>
            </ul>
        </div>
        <?php

        if ($type == '1') {
            $this->load->view('site/product_order/pay_bills', $this->data);
        } elseif ($type == '2') {
            $this->load->view('site/product_order/order_main', $this->data);
        } elseif ($type == '3') {
            $this->load->view('site/product_order/order_complete', $this->data);
        } ?>
        <div class="main-footer">
        </div>
    </div>
</div>

<style>

    @-webkit-keyframes rotate {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes rotate {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .sidebar {
        background: #FAFAFA;
        border-left: 1px solid #E1E1E1;
        font-family: Arial !important;
    }

    .product_order .main a {
        text-decoration: none;
        color: #338dbc;
        transition: color 0.2s ease-in-out;
        display: inline-block;
    }

    .product_order a:focus {
        outline: none;
        color: #00CC00;

    }

    .product_order .main .main-header a:hover {
        color: #6da008;
        font-weight: bold;
        font-size: 1.1em;
    }

    .product_order .main .main-content a:hover {
        color: #338dbc;
        font-weight: bold;
        font-size: 1.1em;
    }

    .product_order > ul {
        margin: 0;
        padding: 0;
        list-style-type: none;
    }

    h1, h2, h3, h4, h5, h6 {
        font-weight: normal;
        margin: 0;
        line-height: 1em;
    }

    h2 {
        font-size: 1.28571em;
    }

    h3 {
        font-size: 1em;
        font-weight: 500;
        margin-bottom: 0.75em;
    }

    h3:not(:first-child) {
        margin-top: 1.5em;
    }

    .product_order > table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        font-size: 1em;
    }

    .product_order > td, th {
        padding: 0;
        padding-left: 1em;
    }

    .product_order > td:first-child, th:first-child {
        padding-left: 0;
        text-align: left;
    }

    .product_order > td:last-child, th:last-child {
        text-align: right;
    }

    .product_order > img {
        border: 0;
        max-width: 100%;
    }

    .product_order > p {
        margin: 0;
        line-height: 1.5em;
    }

    .product_order > button, input, optgroup, select, textarea {
        color: inherit;
        font: inherit;
        margin: 0;
        padding: 0;
        -webkit-appearance: none;
        -webkit-font-smoothing: inherit;
        border: none;
        background: transparent;
        line-height: normal;
    }

    .product_order > button:focus, input:focus {
        outline: none;
    }

    .product_order > button, input[type="button"], input[type="reset"], input[type="submit"] {
        -webkit-appearance: button;
        cursor: pointer;
    }

    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: '';
    }

    .radio-wrapper,
    .checkbox-wrapper {
        display: table;
        box-sizing: border-box;
        width: 100%;
        zoom: 1;
    }

    .radio-wrapper:after, .radio-wrapper:before,
    .checkbox-wrapper:after, .checkbox-wrapper:before {
        content: "";
        display: table;
    }

    .radio-wrapper .radio-input,
    .checkbox-wrapper .checkbox-input {
        display: table-cell;
        padding-right: 0.75em;
        white-space: nowrap;
    }

    .radio-wrapper .radio-input .input-radio,
    .checkbox-wrapper .checkbox-input .input-checkbox {
        width: 18px;
        height: 18px;
        box-shadow: 0 0 0 0 #338dbc inset;
        transition: all 0.2s ease-in-out;
        position: relative;
        cursor: pointer;
        vertical-align: -4px;
        outline: 0;
        border: solid 1px #d9d9d9;
    }

    .radio-wrapper .radio-input .input-radio:hover,
    .checkbox-wrapper .checkbox-input .input-checkbox:hover {
        border-color: #cccccc;
    }

    .radio-wrapper .radio-input .input-radio {
        border-radius: 50%;
    }

    .radio-wrapper .radio-input .input-radio:checked,
    .checkbox-wrapper .checkbox-input .input-checkbox:checked {
        border: none;
        box-shadow: 0 0 0 10px #338dbc inset;
    }

    .radio-wrapper .radio-input .input-radio:checked:focus,
    .checkbox-wrapper .checkbox-input .input-checkbox:checked:focus {
        border-color: #286f94;
    }

    .radio-wrapper .radio-input .input-radio:checked:after,
    .checkbox-wrapper .checkbox-input .input-checkbox:checked:after {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 1;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 100 ")";
        filter: alpha(opacity=100);
    }

    .radio-wrapper .radio-input .input-radio:after,
    .checkbox-wrapper .checkbox-input .input-checkbox:after {
        content: "";
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: scale(0.2);
        transform: scale(0.2);
        transition: all 0.2s ease-in-out 0.1s;
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 0 ")";
        filter: alpha(opacity=0);
    }

    .radio-wrapper .radio-input .input-radio:after {
        width: 4px;
        height: 4px;
        margin-left: -2px;
        margin-top: -2px;
        background-color: #fff;
        border-radius: 50%;
    }

    .radio-wrapper .radio-label,
    .checkbox-wrapper .checkbox-label {
        display: table-cell;
        width: 100%;
        cursor: pointer;
        vertical-align: middle;
        padding: 1.3em;
    }

    > .radio-wrapper .radio-label .radio-label-primary,
    .checkbox-wrapper .checkbox-label .checkbox-label-primary {
        display: table-cell;
        width: 100%;
    }

    .radio-wrapper .radio-accessory,
    .checkbox-wrapper .checkbox-accessory {
        display: table-cell;
        padding-left: 0.75em;
        white-space: nowrap;
    }

    .radio-wrapper.no-box,
    .checkbox-wrapper.no-box {
        display: block;
    }

    z.radio-wrapper.no-box .radio-input,
    .checkbox-wrapper.no-box .checkbox-input {
        display: inline-block;
    }

    .radio-wrapper.no-box .radio-label,
    .checkbox-wrapper.no-box .checkbox-label {
        display: inline-block;
        width: inherit;
    }

    ::selection {
        background: #338dbc;
        color: white;
    }

    .btn {
        display: inline-block;
        border-radius: 4px;
        font-weight: 500;
        padding: 1.4em 1.7em;
        box-sizing: border-box;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        position: relative;
        background: #338dbc;
        color: white;
    }

    .btn:hover {
        background: #286f94;
        color: white;
    }

    .btn-spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -10px;
        margin-left: -10px;
        /*transition: opacity 0.3s ease-in-out;*/
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 0 ")";
        filter: alpha(opacity=0);
    }

    .btn-loading {
        pointer-events: none;
        cursor: default;
    }

    .btn-loading .btn-content {
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 0 ")";
        filter: alpha(opacity=0);
    }

    .btn-loading .btn-spinner {
        -webkit-animation: rotate 0.5s linear infinite;
        animation: rotate 0.5s linear infinite;
        opacity: 1;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 100 ")";
        filter: alpha(opacity=100);
    }

    .icon {
        background-position: center center;
        background-repeat: no-repeat;
        display: inline-block;
    }

    .icon.icon-button-spinner {
        width: 20px;
        height: 20px;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCI+PHBhdGggZD0iTTIwIDEwYzAgNS41MjMtNC40NzcgMTAtMTAgMTBTMCAxNS41MjMgMCAxMCA0LjQ3NyAwIDEwIDB2MmMtNC40MTggMC04IDMuNTgyLTggOHMzLjU4MiA4IDggOCA4LTMuNTgyIDgtOGgyeiIgZmlsbD0iI2ZmZiIvPjwvc3ZnPg=='), none;
    }

    .icon.icon-clear {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMiAtNCAxNiAxNiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAyIC00IDE2IDE2Ij48cGF0aCBvcGFjaXR5PSIuMiIgZD0iTTEwLTRjLTQuNCAwLTggMy42LTggOHMzLjYgOCA4IDggOC0zLjYgOC04LTMuNi04LTgtOHptMy43IDEwLjdsLTEgMS0yLjctMi42LTIuNyAyLjYtMS0xIDIuNi0yLjctMi42LTIuNyAxLTEgMi43IDIuNiAyLjctMi42IDEgMS0yLjYgMi43IDIuNiAyLjd6Ii8+PC9zdmc+'), none;
    }

    .icon.icon-os-question {
        width: 18px;
        height: 18px;
        margin-right: 0.5em;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOCIgaGVpZ2h0PSIxOCIgdmlld0JveD0iMCAwIDE4IDE4Ij48cGF0aCBkPSJNOSAxOGM0Ljk3IDAgOS00LjAzIDktOXMtNC4wMy05LTktOS05IDQuMDMtOSA5IDQuMDMgOSA5IDl6TTUuODUgNy4xNjJoMS41NDZjLjA1My0uODAzLjYtMS4zMTcgMS40NS0xLjMxNy44MjggMCAxLjM4LjQ5NCAxLjM4IDEuMTggMCAuNjUtLjI3NSAxLTEuMDkyIDEuNDkzLS45MDguNTM0LTEuMjkgMS4xMjYtMS4yMyAyLjExNGwuMDA2LjQ0OGgxLjUyN3YtLjM3NmMwLS42NS4yNDQtLjk4NyAxLjEwNi0xLjQ5NC44OTYtLjUzNCAxLjM5Ni0xLjIzOCAxLjM5Ni0yLjI0NiAwLTEuNDU1LTEuMjA3LTIuNDk1LTMuMDEtMi40OTUtMS45NTUgMC0zLjAzIDEuMTMtMy4wOCAyLjY5em0yLjg5NiA3LjA1OGMuNjcyIDAgMS4wOTMtLjQxNCAxLjA5My0xLjA0NiAwLS42NC0uNDIzLTEuMDU0LTEuMDk1LTEuMDU0LS42NiAwLTEuMDkzLjQxNS0xLjA5MyAxLjA1NCAwIC42MzIuNDM0IDEuMDQ2IDEuMDkzIDEuMDQ2eiIgZmlsbD0iI0I1QjVCNSIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+'), none;
    }

    .icon.icon-closed-box {
        width: 68px;
        height: 54px;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2OCIgaGVpZ2h0PSI1NCIgdmlld0JveD0iMjQuMSAtMTcgNjggNTQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMjQuMSAtMTcgNjggNTQiPjxwYXRoIHN0cm9rZT0iI0IyQjJCMiIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGZpbGw9Im5vbmUiIGQ9Ik0yNS4xLTVoNjZNMzIuMSAyOGgxNk0zMi4xIDIzaDEyIi8+PHBhdGggc3Ryb2tlPSIjQjJCMkIyIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgZD0iTTI1LjEtNS40bDYuNy0xMC42aDUyLjlsNi40IDEwLjZ2MzguNmMwIDEuNi0xLjIgMi44LTIuOCAyLjhoLTYwLjRjLTEuNiAwLTIuOC0xLjItMi44LTIuOHYtMzguNnpNNTguMS0xNnYxMSIgZmlsbD0ibm9uZSIvPjwvc3ZnPg=='), none;
    }

    .icon.icon-closed-box.has-error {
        width: 68px;
        height: 54px;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2OCIgaGVpZ2h0PSI1NCIgdmlld0JveD0iMjQuMSAtMTcgNjggNTQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMjQuMSAtMTcgNjggNTQiPjxwYXRoIHN0cm9rZT0iI2ZmNmQ2ZCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGZpbGw9Im5vbmUiIGQ9Ik0yNS4xLTVoNjZNMzIuMSAyOGgxNk0zMi4xIDIzaDEyIi8+PHBhdGggc3Ryb2tlPSIjZmY2ZDZkIiBzdHJva2Utd2lkdGg9IjIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgZD0iTTI1LjEtNS40bDYuNy0xMC42aDUyLjlsNi40IDEwLjZ2MzguNmMwIDEuNi0xLjIgMi44LTIuOCAyLjhoLTYwLjRjLTEuNiAwLTIuOC0xLjItMi44LTIuOHYtMzguNnpNNTguMS0xNnYxMSIgZmlsbD0ibm9uZSIvPjwvc3ZnPg=='), none;
    }

    .flexbox {
    }

    .flexbox body, .flexbox .content, .flexbox .content .wrap, .flexbox .main {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-flex: 1 0 auto;
        -ms-flex: 1 0 auto;
        flex: 1 0 auto;
    }

    .flexbox .main-content {
        -webkit-flex: 1 0 auto;
        -ms-flex: 1 0 auto;
        flex: 1 0 auto;
    }

    .step-footer {
        z-index: 2;
        position: relative;
        margin-top: 1em;
        zoom: 1;
    }

    .step-footer:after, .step-footer:before {
        content: "";
        display: table;
    }

    .step-footer:after {
        clear: both;
    }

    .step-footer .step-footer-previous-link {
        cursor: pointer;
        display: block;
    }

    .step-footer .step-footer-previous-link .previous-link-icon {
        fill: #338dbc;
        transition: all 0.2s cubic-bezier(0.3, 0, 0, 1);
        margin-right: 0.25em;
    }

    .step-footer .step-footer-previous-link:hover .previous-link-icon {
        fill: #2b78a0;
        -webkit-transform: translateX(-5px);
        transform: translateX(-5px);
    }

    .step-footer .step-footer-info {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .content {
        overflow-x: hidden;
    }

    .content.content-second {
        display: none;
    }

    .section {
        position: relative;
        padding-top: 2em;
    }

    .section.thank-you-checkout-info {
        padding-top: 0.5em;
    }

    .section:first-child {
        padding-top: 0;
    }

    .section .section-header {
        position: relative;
    }

    .section .section-content {
        zoom: 1;
        margin-bottom: 2em;
    }

    .section .section-content .section-content-text {
        margin-bottom: 0.75em;
    }

    .section .section-content.no-mb, .section .section-content:last-child {
        margin-bottom: inherit;
    }

    .section .section-content:after, .section .section-content:before {
        content: "";
        display: table;
    }

    .section .section-content .content-box {
        box-shadow: 0 0 0 1px #d9d9d9;
        border-radius: 4px;
        background: #fff;
        color: #737373;
        margin-top: 1em;
    }

    .section .section-content .content-box.has-error {
        box-shadow: 0 0 0 2px #ff6d6d;
        color: #ff6d6d;
    }

    .section .section-content .content-box.no-border {
        box-shadow: none;
    }

    .section .section-content .content-box:first-child {
        margin-top: 0;
    }

    .section .section-content .content-box .content-box-row {
        display: table;
        box-sizing: border-box;
        width: 100%;
        border-top: 1px solid #d9d9d9;
        zoom: 1;
    }

    .section .section-content .content-box .content-box-row.content-box-row-padding {
        padding: 1.3em;
    }

    .section .section-content .content-box .content-box-row:first-child {
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-top: none;
    }

    .section .section-content .content-box .content-box-row:last-child {
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    .section .section-content .content-box .content-box-row:after,
    .section .section-content .content-box .content-box-row:before {
        content: "";
        display: table;
    }

    .section .section-content .content-box .content-box-row.content-box-row-secondary {
        background-color: #fafafa;
    }

    .section .section-content .content-box .content-box-row.content-box-row-no-border {
        padding-bottom: 0;
    }

    .section .section-content .content-box .content-box-row.content-box-row-no-border + .content-box-row {
        border-top: none !important;
    }

    .section .section-content .content-box .content-box-emphasis {
        font-weight: 500;
        color: #4d4d4d;
    }

    .section .section-content .content-box h3 {
        color: #4d4d4d;
    }

    .section .section-content .content-box h2 {
        color: #333333;
    }

    .section .section-content .content-box h2:only-child {
        margin: 0;
    }

    .section .section-title {
        color: #333333;
    }

    .fieldset {
        margin: -0.45em;
        zoom: 1;
    }

    .fieldset:after, .fieldset:before {
        content: "";
        display: table;
    }

    .fieldset:after {
        clear: both;
    }

    .fieldset .field {
        width: 100%;
        float: left;
        padding: 0.45em;
        box-sizing: border-box;
    }

    .fieldset .field .field-input-btn-wrapper {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .fieldset .field .field-input-btn-wrapper .field-input-btn {
        width: auto;
        margin-left: 0.9em;
        white-space: nowrap;
        padding-top: 0;
        padding-bottom: 0;
    }

    .fieldset .field .field-input-btn-wrapper .field-input-wrapper {
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .fieldset .field .field-input-wrapper {
        position: relative;
    }

    .fieldset .field .field-input-wrapper .field-label {
        font-size: 0.85714em;
        font-weight: normal;
        position: absolute;
        top: 0;
        width: 100%;
        padding: 0 0.93333em;
        z-index: 1;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-transform: translateY(3px);
        transform: translateY(3px);
        pointer-events: none;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        box-sizing: border-box;
        opacity: 0;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 0 ")";
        filter: alpha(opacity=0);
        color: #999999;
        transition: all 0.2s ease-out;
        margin: 0.5em 0;
        margin-top: 0.3em;
        display: block;
    }

    .fieldset .field .field-input-wrapper .field-input {
        box-shadow: 0 0 0 1px #d9d9d9;
        transition: all 0.2s ease-out;
        background-color: white;
        color: #333333;
        border-radius: 4px;
        display: block;
        box-sizing: border-box;
        width: 100%;
        padding: 0.94em 0.8em;
        word-break: normal;
    }

    .fieldset .field .field-input-wrapper .field-input:focus {
        box-shadow: 0 0 0 2px #338dbc;
        outline: none;
    }

    .fieldset .field .field-input-wrapper .field-description {
        display: block;
        margin-left: 25px;
        margin-top: 2px;
    }

    .fieldset .field .field-input-wrapper.field-input-wrapper-select {
    }

    .fieldset .field .field-input-wrapper.field-input-wrapper-select::before {
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyMSIgaGVpZ2h0PSIxOSIgdmlld0JveD0iMCAwIDIxIDE5Ij48dGl0bGU+QXJ0Ym9hcmQgMTwvdGl0bGU+PGRlc2M+Q3JlYXRlZCB3aXRoIFNrZXRjaC48L2Rlc2M+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZyBmaWxsPSIjMDAwIj48Zz48cGF0aCBkPSJNMCAwaDF2MTlIMFYweiIgaWQ9IlNoYXBlIiBmaWxsLW9wYWNpdHk9Ii4xNSIvPjxwYXRoIGQ9Ik0xMSA4aDEwbC01IDUtNS01eiIgZmlsbC1vcGFjaXR5PSIuNSIvPjwvZz48L2c+PC9nPjwvc3ZnPg=='), none;
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        width: 50px;
        background-position: center center;
        background-repeat: no-repeat;
        pointer-events: none;
    }

    .fieldset .field .field-message {
        font-size: 0.85714em;
    }

    .fieldset .field .field-message.field-message-error {
        margin: 0;
        display: none;
        margin: 0.75em 0 0.25em;
        transition: all 0.3s ease-out;
        line-height: 1.3em;
        color: #ff6d6d;
    }

    .fieldset .field.field-active {
    }

    .fieldset .field.field-active .field-input-wrapper .field-label {
        color: #737373;
    }

    .fieldset .field.field-show-floating-label {
    }

    .fieldset .field.field-show-floating-label .field-input-wrapper .field-label {
        -webkit-transform: none;
        transform: none;
        opacity: 1;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=" 100 ")";
        filter: alpha(opacity=100);
    }

    .fieldset .field.field-show-floating-label .field-input-wrapper .field-input {
        padding-top: 1.5em;
        padding-bottom: 0.38em;
    }

    .fieldset .field.field-show-floating-label .field-input-wrapper .field-input::-webkit-input-placeholder {
        color: transparent;
    }

    .fieldset .field.field-show-floating-label .field-input-wrapper .field-input::-moz-placeholder {
        color: transparent;
    }

    .fieldset .field.field-show-floating-label .field-input-wrapper .field-input::-moz-placeholder {
        color: transparent;
    }

    .fieldset .field.field-show-floating-label .field-input-wrapper .field-input::-ms-input-placeholder {
        color: transparent;
    }

    .fieldset .field.field-error {
    }

    .fieldset .field.field-error .field-input-wrapper {
    }

    .fieldset .field.field-error .field-input-wrapper .field-input {
        box-shadow: 0 0 0 2px #ff6d6d;
    }

    .fieldset .field.field-error .field-message.field-message-error {
        display: block;
    }

    .wrap {
        margin: 0 auto;
        max-width: 40em;
        zoom: 1;
    }

    .wrap:after {
        clear: both;
    }

    .wrap:after, .wrap:before {
        content: "";
        display: table;
    }

    .sidebar {
        position: relative;
        color: #717171;
    }

    .sidebar h2 {
        color: #323232;
    }

    .sidebar:after {
        content: "";
        display: block;
        width: 300%;
        position: absolute;
        top: 0;
        left: -100%;
        bottom: 0;
        background: #fafafa;
        z-index: -1;
        box-shadow: 0 -1px 0 #e1e1e1 inset;
    }

    .sidebar .sidebar-content {
    }

    .sidebar .sidebar-content .order-summary {
    }

    .sidebar .sidebar-content .order-summary .order-summary-sections {
    }

    .sidebar .sidebar-content .order-summary .order-summary-sections .order-summary-section {
        border-top: 1px solid;
        padding-top: 1.5em;
        padding-bottom: 1.5em;
        border-color: #e1e1e1;
    }

    .sidebar .sidebar-content .order-summary .order-summary-sections .order-summary-section:first-child {
        border-top: none;
    }

    .sidebar .sidebar-content .order-summary .order-summary-emphasis {
        font-weight: 500;
        color: #4b4b4b;
    }

    .sidebar .sidebar-content .order-summary .order-summary-small-text {
        font-size: 0.85714em;
        color: #969696;
    }

    .sidebar .sidebar-content .order-summary .product {
    }

    .sidebar .sidebar-content .order-summary .product:first-child td {
        padding-top: 0;
    }

    .sidebar .sidebar-content .order-summary .product td {
        padding-top: 1em;
    }

    .sidebar .sidebar-content .order-summary .product .product-image {
    }

    .sidebar .sidebar-content .order-summary .product .product-image .product-thumbnail {
        width: 4.6em;
        height: 4.6em;
        border-radius: 8px;
        background: #fff;
        position: relative;
    }

    .sidebar .sidebar-content .order-summary .product .product-image .product-thumbnail .product-thumbnail-wrapper {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
    }

    .sidebar .sidebar-content .order-summary .product .product-image .product-thumbnail .product-thumbnail-wrapper .product-thumbnail-image {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        max-width: 100%;
        max-height: 100%;
        margin: auto;
    }

    .sidebar .sidebar-content .order-summary .product .product-image .product-thumbnail .product-thumbnail-quantity {
        font-size: 0.85714em;
        font-weight: 500;
        white-space: nowrap;
        padding: 0.15em 0.65em;
        border-radius: 2em;
        background-color: rgba(153, 153, 153, 0.9);
        color: #fff;
        position: absolute;
        right: -0.75em;
        top: -0.75em;
        z-index: 2;
    }

    .sidebar .sidebar-content .order-summary .product .product-image .product-thumbnail::after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        border-radius: 8px;
        box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1) inset;
    }

    .sidebar .sidebar-content .order-summary .product .product-description {
        width: 100%;
    }

    .sidebar .sidebar-content .order-summary .product .product-description .product-description-name,
    .sidebar .sidebar-content .order-summary .product .product-description .product-description-variant,
    .sidebar .sidebar-content .order-summary .product .product-description .product-description-property {
        display: block;
    }

    .sidebar .sidebar-content .order-summary .product .product-quantity {
    }

    .sidebar .sidebar-content .order-summary .product .product-price {
        white-space: nowrap;
    }

    .sidebar .btn-disabled {
        cursor: default;
        background: #c8c8c8;
        box-shadow: none;
    }

    .banner {
        -webkit-flex-shrink: 0;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        padding: 1.5em 0;
        background: transparent;
        background-size: cover;
        display: none;
    }

    .logo-text {
        color: #333333;
    }

    .main {
    }

    .main .main-header {
    }

    .main .main-header .logo {
        display: none;
    }

    .main .main-header .breadcrumb {
    }

    .main .main-header .breadcrumb .breadcrumb-item {
        display: inline-block;
        font-size: 0.85714em;
        color: #999999;
    }

    .main .main-header .breadcrumb .breadcrumb-item.breadcrumb-item-current {
        font-weight: 500;
        color: #4d4d4d;
    }

    .main .main-header .breadcrumb .breadcrumb-item:after {
        content: "";
        display: inline-block;
        width: 6px;
        height: 11px;
        vertical-align: middle;
        margin: 0 0.5em;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2IiBoZWlnaHQ9IjExIiBvcGFjaXR5PSIuNCIgZmlsbD0iIzAwMCI+PHBhdGggZD0iTS41MjYgMS40MDhsNCA0LjY0NS4wMTQtLjgzLTQgNC4zNTQuOTIuODQ2IDQtNC4zNTYuMzc2LS40MS0uMzYyLS40Mi00LTQuNjQ1LS45NDguODE2eiIvPjwvc3ZnPg=='), none;
    }

    .main .main-header .breadcrumb .breadcrumb-item:last-child:after {
        display: none;
    }

    .main .main-header .breadcrumb .breadcrumb-item .breadcrumb-link {
        cursor: pointer;
    }

    .main .main-footer {
        padding: 1em 0;
        border-top: 1px solid #e6e6e6;
    }

    .main h2 {
        color: #333333;
    }

    .field-label-strong {
        font-weight: 600;
    }

    .ctrl_payment_method {
        padding: 10px 60px;
    }

    .ctrl_payment_method > label {
        margin-bottom: 5px;
        display: block;
    }

    .ctrl_payment_method .payment_method_list {
        padding-left: 10px;
    }

    .total-line {
    }

    .total-line td {
        padding-top: 0.75em;
    }

    .total-line-table-footer .total-line td {
        padding-top: 3em;
        position: relative;
    }

    .total-line-table-footer .total-line td::before {
        background-color: #e1e1e1;
        content: '';
        position: absolute;
        top: 1.5em;
        left: 0;
        width: 100%;
        height: 1px;
    }

    .payment-due-label {
    }

    .payment-due-label .payment-due-label-total {
        font-size: 1.14286em;
        color: #4b4b4b;
    }

    .payment-due {
    }

    .payment-due .payment-due-currency {
        font-size: 0.85714em;
        vertical-align: 0.2em;
        margin-right: 0.5em;
        color: #969696;
    }

    .payment-due .payment-due-price {
        font-size: 1.71429em;
        font-weight: 500;
        letter-spacing: -0.04em;
        color: #4b4b4b;
        line-height: 1em;
    }

    .applied-reduction-code {
        margin-left: 0.5em;
    }

    .applied-reduction-code .applied-reduction-code-icon {
        fill: #338dbc;
        vertical-align: middle;
        margin-right: 0.14286em;
    }

    .applied-reduction-code .applied-reduction-code-information {
        font-size: 0.85714em;
        color: #338dbc;
        font-weight: 500;
    }

    .applied-reduction-code-clear-button {
        vertical-align: middle;
        margin-left: 0.28571em;
    }

    .hanging-icon {
        margin-right: 0.75em;
        stroke: #338dbc;
    }

    .hanging-icon.hanging-icon-error {
        stroke: #ff6d6d;
    }

    .os-header {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        margin: 0;
    }

    .os-header .os-header-heading {
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .os-header .os-header-heading .os-order-number {
        display: block;
    }

    .os-header .os-header-heading .os-header-title {
        font-size: 1.5em;
        margin-bottom: 0.1em;
    }

    .os-header .os-header-heading .os-description {
        color: #4d4d4d;
    }

    .wrap {
        margin: 0 auto;
        max-width: 40em;
        zoom: 1;
    }

    .wrap:after, .wrap:before {
        content: "";
        display: table;
    }

    .order-summary-toggle {
        background: #fafafa;
        border-top: 1px solid #e6e6e6;
        border-bottom: 1px solid #e6e6e6;
        padding: 1.25em 0;
        -webkit-flex-shrink: 0;
        -ms-flex-negative: 0;
        flex-shrink: 0;
        text-align: left;
        width: 100%;
    }

    .order-summary-toggle .order-summary-toggle-inner {
        display: table;
        box-sizing: border-box;
        width: 100%;
        zoom: 1;
    }

    .order-summary-toggle .order-summary-toggle-inner:after,
    .order-summary-toggle .order-summary-toggle-inner:before {
        content: "";
        display: table;
    }

    .order-summary-toggle .order-summary-toggle-inner .order-summary-toggle-icon-wrapper {
        display: table-cell;
        vertical-align: middle;
        padding-right: 0.75em;
        white-space: nowrap;
    }

    .order-summary-toggle .order-summary-toggle-inner .order-summary-toggle-icon-wrapper .order-summary-toggle-icon {
        fill: #338dbc;
        transition: fill 0.2s ease-in-out;
    }

    .order-summary-toggle .order-summary-toggle-inner .order-summary-toggle-text {
        color: #338dbc;
        vertical-align: middle;
        transition: color 0.2s ease-in-out;
        display: none;
    }

    .order-summary-toggle .order-summary-toggle-inner .order-summary-toggle-text .order-summary-toggle-dropdown {
        vertical-align: middle;
        transition: fill 0.2s ease-in-out;
        fill: #338dbc;
    }

    .order-summary-toggle .order-summary-toggle-inner .order-summary-toggle-total-recap {
        display: table-cell;
        vertical-align: middle;
        text-align: right;
        padding-left: 0.75em;
        white-space: nowrap;
    }

    .order-summary-toggle .order-summary-toggle-inner .order-summary-toggle-total-recap .total-recap-final-price {
        font-size: 1.28571em;
        line-height: 1em;
        color: #4d4d4d;
    }

    .order-summary-toggle.order-summary-toggle-show {
    }

    .order-summary-toggle.order-summary-toggle-hide .order-summary-toggle-inner .order-summary-toggle-text.order-summary-toggle-text-show,
    .order-summary-toggle.order-summary-toggle-show .order-summary-toggle-inner .order-summary-toggle-text.order-summary-toggle-text-hide {
        display: table-cell;
        width: 100%;
    }

    .logged-in-customer-information {
        display: table;
        box-sizing: border-box;
        width: 100%;
        margin-bottom: 1.5em;
    }

    .logged-in-customer-information:after,
    .logged-in-customer-information:before {
        content: "";
        display: table;
    }

    .logged-in-customer-information .logged-in-customer-information-avatar-wrapper {
        display: table-cell;
        padding-right: 1em;
        white-space: nowrap;
        vertical-align: middle;
    }

    .logged-in-customer-information .logged-in-customer-information-avatar-wrapper .logged-in-customer-information-avatar {
        border-radius: 8px;
        background-size: cover;
        position: relative;
        max-width: none;
        width: 50px;
        height: 50px;
        overflow: hidden;
    }

    .logged-in-customer-information .logged-in-customer-information-avatar-wrapper .logged-in-customer-information-avatar:before {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1MCIgaGVpZ2h0PSI1MCIgdmlld0JveD0iMCAwIDUwIDUwIj48dGl0bGU+QXJ0Ym9hcmQ8L3RpdGxlPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PHBhdGggZD0iTTAgMGg1MHY1MEgwVjB6IiBmaWxsPSIjRDhEOEQ4Ii8+PHBhdGggZD0iTTI1LjEwMyAyNi4yNDJjMy4yMTIgMCA1LjY0Mi0yLjkyIDUuNjQyLTYuNzg3IDAtMy4wODYtMi41OC01LjcwNS01LjY0Mi01LjcwNS0zLjA2IDAtNS42NCAyLjYyLTUuNjQgNS43MDUgMCAzLjg2NiAyLjQzIDYuNzg3IDUuNjQgNi43ODd6bTAtMTAuNTRjMS45NTIgMCAzLjY3OCAxLjc2MyAzLjY3OCAzLjc1MyAwIDIuNzU3LTEuNTc0IDQuODM1LTMuNjc3IDQuODM1LTIuMTAzIDAtMy42NzctMi4wNzgtMy42NzctNC44MzUgMC0xLjk5IDEuNzI2LTMuNzUzIDMuNjc3LTMuNzUzem0tOC40NSAyMC42MTVsLjE3Ny0xLjg3N2MuMzktMy43NzggNC42OTctNC42MSA4LjI3My00LjYxIDMuNTc3IDAgNy44ODQuODMyIDguMjc0IDQuNTk4bC4xNzYgMS44OWgyLjAxNWwtLjE3Ni0yLjA4Yy0uNDQtNC4xMTctNC4wNjgtNi4zODQtMTAuMjktNi4zODQtNi4yMiAwLTkuODQ2IDIuMjY3LTEwLjI4NyA2LjM5N2wtLjE3NiAyLjA2N2gyLjAxNHoiIGZpbGw9IiNGRkYiLz48L2c+PC9zdmc+'), none;
    }

    .logged-in-customer-information .logged-in-customer-information-paragraph {
        display: table-cell;
        width: 100%;
        padding-top: 0.25em;
        vertical-align: middle;
    }

    @media (min-width: 1300px) {
        .hanging-icon {
            position: absolute;
            right: 100%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            margin-right: 1.5em;
        }
    }

    @media (min-width: 1000px) {
        .wrap {
            padding: 0 5%;
            width: 90%;
            max-width: 78.57143em;
        }

        .order-summary-toggle {
            display: none;
        }

        .flexbox .content .wrap {
            -webkit-flex-direction: row-reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
        }

        .main {
            width: 52%;
            width: 52%;
            padding-right: 6%;
            float: left;
        }

        .main .main-header {
            padding-bottom: 2em;
        }

        .main .main-header .logo {
            display: block;
        }

        .main .main-header .breadcrumb {
            margin-top: 1em;
        }

        .sidebar {
            width: 38%;
            padding-left: 4%;
            background-position: left top;
            float: right;
        }

        .sidebar:after {
            left: 0;
            background-position: left top;
            box-shadow: 1px 0 0 #e1e1e1 inset;
        }

        .sidebar .sidebar-content .order-summary .order-summary-sections .order-summary-section:first-child {
            padding-top: 0;
        }
    }

    @media (max-width: 999px) {
        .content {
        }

        .content.content-second {
            display: block;
        }

        .wrap {
            width: 100%;
            box-sizing: border-box;
            padding: 0 1em;
        }

        .banner {
            display: block;
        }

        .main .main-header .breadcrumb {
            display: none;
        }

        .sidebar .sidebar-content .order-summary.order-summary-is-collapsed {
            height: 0;
            overflow: hidden;
        }
    }

    @media (max-width: 999px) and (min-width: 750px) {
        .hanging-icon {
            position: absolute;
            right: 100%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            margin-right: 1.5em;
        }
    }

    @media (min-width: 750px) {
        h1 {
            font-size: 2em;
        }

        .main {
            padding-top: 1.5em;
        }

        .main .main-content {
            padding-bottom: 4em;
        }

        .step-footer {
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-direction: row-reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            margin-top: 1.5em;
        }

        .step-footer .step-footer-continue-btn {
            -webkit-flex: 0 0 auto;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            float: right;
        }

        .step-footer .step-footer-previous-link {
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            margin-right: 1em;
            float: left;
            display: block;
        }

        .step-footer .step-footer-info {
            -webkit-flex: 1 1 auto;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            margin-right: 1em;
            float: left;
        }

        .section {
            padding-top: 3em;
        }

        .section.thank-you-checkout-info {
            padding-top: 1.5em;
        }

        .section .section-header {
            margin-bottom: 1.5em;
        }

        .field-half {
            width: 50% !important;
        }

        .field-two-thirds {
            width: 66.66667% !important;
        }

        .field-third {
            width: 33.33333% !important;
        }

        .os-header {
            margin: 0 0 -0.5em !important;
        }

        .icon {
        }

        .icon.icon-closed-box {
            width: 108px;
            height: 85px;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDgiIGhlaWdodD0iODUiIHZpZXdCb3g9IjAgMCAxMDggODUiPjxnIHN0cm9rZT0iI0IyQjJCMiIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGZpbGw9Im5vbmUiPjxwYXRoIGQ9Ik0xIDE4aDEwNk0xMSA3MC4zaDI2bS0yNi02aDI2bS0yNi02aDE3Ii8+PC9nPjxwYXRoIHN0cm9rZT0iI0IyQjJCMiIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGQ9Ik0xIDE4bDEwLjctMTdoODQuN2wxMC42IDE3djYxLjVjMCAyLjUtMiA0LjUtNC41IDQuNWgtOTdjLTIuNSAwLTQuNS0yLTQuNS00LjV2LTYxLjV6TTU0IDF2MTYuNiIgZmlsbD0ibm9uZSIvPjwvc3ZnPg=='), none;
        }

        .icon.icon-closed-box.has-error {
            width: 108px;
            height: 85px;
            background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDgiIGhlaWdodD0iODUiIHZpZXdCb3g9IjAgMCAxMDggODUiPjxnIHN0cm9rZT0iI2ZmNmQ2ZCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGZpbGw9Im5vbmUiPjxwYXRoIGQ9Ik0xIDE4aDEwNk0xMSA3MC4zaDI2bS0yNi02aDI2bS0yNi02aDE3Ii8+PC9nPjxwYXRoIHN0cm9rZT0iI2ZmNmQ2ZCIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIGQ9Ik0xIDE4bDEwLjctMTdoODQuN2wxMC42IDE3djYxLjVjMCAyLjUtMiA0LjUtNC41IDQuNWgtOTdjLTIuNSAwLTQuNS0yLTQuNS00LjV2LTYxLjV6TTU0IDF2MTYuNiIgZmlsbD0ibm9uZSIvPjwvc3ZnPg=='), none;
        }
    }

    @media (min-width: 1000px) {
        .main, .sidebar {
            padding-top: 4em;
        }
    }

    .text-center {
        text-align: center;
    }

    @media (max-width: 749px) {
        .main {
            padding-top: 1.5em;
        }

        .main .main-content {
            padding-bottom: 1.5em;
        }

        .section-header {
            margin-bottom: 1em;
        }

        .text-center {
            text-align: left;
        }

        .btn {
            width: 100%;
            padding-top: 1.75em;
            padding-bottom: 1.75em;
        }

        .step-footer {
        }

        .step-footer .step-footer-previous-link {
            padding-top: 1.5em;
            text-align: center;
        }

        .step-footer .step-footer-info {
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding-top: 1.5em;
            text-align: center;
        }
    }

    .thank-you-additional-content {
        margin-top: 15px;
        line-height: 1.25em;
    }

    .blank-slate {
        white-space: pre-line;
        padding: 1.5em;
        text-align: center;
    }

    .blank-slate .blank-slate-icon {
        margin-bottom: 1em;
    }

    .dp-none {
        display: none;
    }

    .dp-inline-block {
        display: inline-block;
    }

    .visually-hidden {
        border: 0;
        clip: rect(0, 0, 0, 0);
        clip: rect(0 0 0 0);
        width: 2px;
        height: 2px;
        margin: -2px;
        overflow: hidden;
        padding: 0;
        position: absolute;
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }

    .group:after {
        content: "";
        display: table;
        clear: both;
    }

    .pt0 {
        padding-top: 0px !important;
    }

    .mt0 {
        margin-top: 0px !important;
    }

    .mb5 {
        margin-bottom: 5px;
    }

    .hidden {
        display: none !important;
    }

</style>
<!-- JS update price sum-->
<script>
    $(document).ready(function () {
        //    alert($('#sum_price').val());
        var sum_price = $('#summary').text($('#sum_price').val());
        var ship_costs = $('#ship_costs').text();
        console.log(sum_price+"-"+ship_costs);
        $('#total_costs').text(sum_price + ship_costs);
    });
</script>