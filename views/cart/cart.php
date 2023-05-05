<div id="wle-header-slider" style="background:#f8f8f8">
    <div class="container">
        <div class="row">
            <div id="wle-header-slider-l" class="col-12 col-sm-12 col-lg-3"></div>
            <div id="wle-header-slider-r" class="col-12 col-sm-12 col-lg-9">
                <div class="owl-carousel owl-carousel-quangcao owl-theme">
                    <div class="item item_slidequangcao"><img src="public/images/quangcao1.png" alt=""></div>
                    <div class="item item_slidequangcao"><img src="public/images/quangcao2.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div id="form">
        <ul id="progressbar">
            <li class="active" id="step1">

                <strong>Giỏ hàng của bạn</strong>
            </li>
            <li id="step2"><strong>Thanh toán</strong></li>
            <li id="step3"><strong>Hoàn tất</strong></li>
        </ul>
        <div class="progress">
            <div class="progress-bar"></div>
        </div> <br>
        <fieldset>
            <div role="main" class="wrapper_cart" style="margin-bottom: 0px;">
                <div class="cart_title">
                    <div class="item_product">Sản phẩm</div>
                    <div class="item_price">Đơn giá</div>
                    <div class="item_quantity">Số lượng</div>
                    <div class="item_total">Số tiền</div>
                    <div class="item_del">Thao tác</div>
                </div><!--  -->
                <?php
                if (isset($_SESSION['product'])) {
                    foreach ($_SESSION['product'] as $value) { ?>
                        <div class="panel_cart">
                            <div class="panel_content">
                                <div class="content_cart">
                                    <div class="cart_flex">
                                        <div class="cart_product">
                                            <div class="cart_product__items">
                                                <a title="<?= $value['ProductName'] ?>"
                                                    href="?act=detail&id=<?= $value['ProductID'] ?>">
                                                    <div class="product__items__img"
                                                        style="background-image: url(Admin/upload/<?= $value['Picture'] ?>);">
                                                    </div>
                                                </a>

                                                <div class="product__items__name">
                                                    <a class="product-name" href="?act=detail&id=<?= $value['ProductID'] ?>"
                                                        title="<?= $value['ProductName'] ?>"><?= $value['ProductName'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart_price">
                                            <div>
                                                <span class="cart_price__items">
                                                    <?= number_format($value['Price']) ?> VNĐ
                                                </span>
                                            </div>
                                        </div>
                                        <div class="cart_quantity">
                                            <form action="" method="POST">
                                                <div class="quantity__butons buttons_added">
                                                    <a href="?act=cart&xuli=delete&id=<?= $value['ProductID'] ?>">
                                                        <input type="button" value="-" class="minus">
                                                    </a>
                                                    <input type="number" step="1" min="1" max="<?= $value['Quantity'] ?>"
                                                        name="quantity" value="<?= $value['Quantity'] ?>" title="Qty"
                                                        class="input-text qty text" size="4" pattern="" inputmode="">

                                                    <a href="?act=cart&xuli=update&id=<?= $value['ProductID'] ?>">
                                                        <input type="button" value="+" class="plus">
                                                    </a>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="cart_total">
                                            <span>
                                                <?= number_format($value['ThanhTien']) ?> VNĐ
                                            </span>
                                        </div>
                                        <div class="cart_delete">
                                            <a href="?act=cart&xuli=deleteall&id=<?= $value['ProductID'] ?>">
                                                <button class="btn__delete"><i class="fas fa-trash-alt"></i></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <input type="button" name="next-step" class="next-step stardust-button--primary  btn-checkout"
                value="Mua hàng">
        </fieldset>
        <fieldset>
            <form action="?act=checkout&xuli=save" method="post">
                <div class="row row_wrapper">
                    <div class="wrapper">
                        <div class="title">
                            Thông tin giao hàng
                        </div>
                        <div class="form">
                            <div class="inputfield">
                                <label>Họ và tên</label>
                                <input type="text" name="fulname" required class="input">
                            </div>
                            <div class="inputfield">
                                <label>Số điện thoại</label>
                                <input type="text" name="phonenumber" required class="input">
                            </div>
                            <div class="inputfield">
                                <label>Tỉnh / Thành phố</label>
                                <div class="custom_select">
                                    <select name="ls_province"></select>
                                </div>
                            </div>
                            <div class="inputfield">
                                <label>Quận / Huyện</label>
                                <div class="custom_select">
                                    <select name="ls_district"></select>
                                </div>
                            </div>
                            <div class="inputfield">
                                <label>Phường / Xã</label>
                                <div class="custom_select">
                                    <select name="ls_ward"></select>
                                </div>
                            </div>
                            <div class="inputfield">
                                <label>Địa chỉ</label>
                                <textarea id="issue" class="textarea" name="address" required
                                    placeholder="Ví dụ: 470 Trần Đại Nghĩa" rows="1"></textarea>
                            </div>
                            <div class="inputfield">
                                <label>Loại địa chỉ</label>
                                <div class="addresstype">
                                    <input type="radio" class="radio" name="typeaddress" required value="Nhà riêng" />
                                    <span class="form-check-span" for="typeaddress">
                                        Nhà riêng / Chung cư
                                    </span>
                                    <input type="radio" class="radio" name="typeaddress" required value="Công ty" />
                                    <span class="form-check-span" for="typeaddress">
                                        Cơ quan / Công ty
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper">
                        <div class="title">
                            Hình thức thanh toán
                        </div>
                        <div class="payment-method">
                            <label for="credit_card" class="method credit_card">
                                <div class="card-logos">
                                    <img src="Admin/upload/visa_logo.png" />
                                    <img src="Admin/upload/mastercard_logo.png" />
                                </div>
                                <div class="radio-input">
                                    <input id="credit_card" type="radio" name="shippingtype" required
                                        value="Thanh toán bằng thẻ tín dụng">
                                    Thanh toán bằng thẻ tín dụng
                                </div>
                            </label>
                            <label for="paypal" class="method paypal">
                                <div class="card-logos">
                                    <img src="Admin/upload/paypal_logo.png" />
                                </div>
                                <div class="radio-input">
                                    <input id="paypal" type="radio" name="shippingtype" required
                                        value="Thanh toán bằng PayPal">
                                    Thanh toán bằng PayPal
                                </div>
                            </label>
                            <label for="e-wallet" class="method e-wallet">
                                <div class="card-logos">
                                    <img src="Admin/upload/momo.png" />
                                    <img src="Admin/upload/zalopay.jpg" />
                                    <img src="Admin/upload/viettelipay.png" />
                                </div>
                                <div class="radio-input">
                                    <input id="e-wallet" type="radio" name="shippingtype" required
                                        value="Thanh toán bằng ví điện tử">
                                    Thanh toán bằng ví điện tử
                                </div>
                            </label>
                            <label for="cod" class="method cod">
                                <div class="card-logos">
                                    <img src="Admin/upload/shipcod.png" />
                                </div>
                                <div class="radio-input">
                                    <input id="cod" type="radio" name="shippingtype" required
                                        value="Thanh toán khi nhận hàng">
                                    Thanh toán khi nhận hàng
                                </div>
                            </label>
                        </div>
                        <div class="title" style="margin-bottom: 0;">
                            Mã giảm giá
                        </div>
                        <div class="form">
                            <div class="inputfield">
                                <input type="text" class="input" placeholder="Nhập mã giảm giá"
                                    style="margin-right: 10px;">
                                <input type="submit" value="APPLY" class="btn">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper">
                    <div role="main" class="wrapper_cart" style="margin-bottom: 0px;">
                        <div class="title">
                            Sản phẩm
                        </div>
                        <div class="cart_title">
                            <div class="item_product">Sản phẩm</div>
                            <div class="item_price">Đơn giá</div>
                            <div class="item_quantity">Số lượng</div>
                            <div class="item_total">Số tiền</div>
                        </div><!--  -->
                        <?php
                        if (isset($_SESSION['product'])) {
                            foreach ($_SESSION['product'] as $value) { ?>
                                <div class="panel_cart">
                                    <div class="panel_content">
                                        <div class="content_cart">
                                            <div class="cart_flex">
                                                <div class="cart_product">
                                                    <div class="cart_product__items">
                                                        <a title="<?= $value['ProductName'] ?>"
                                                            href="?act=detail&id=<?= $value['ProductID'] ?>">
                                                            <div class="product__items__img"
                                                                style="background-image: url(Admin/upload/<?= $value['Picture'] ?>);">
                                                            </div>
                                                        </a>
                                                        <div class="product__items__name">
                                                            <a class="product-name"
                                                                href="?act=detail&id=<?= $value['ProductID'] ?>"
                                                                title="<?= $value['ProductName'] ?>"><?= $value['ProductName'] ?></a>
                                                            <div class="_2o95Vf"
                                                                style="background-image: url(&quot;https://cf.shopee.vn/file/bd5328df650cdbfda6340d64144fd76e&quot;);">
                                                            </div>
                                                            <div class="_931iK8"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="_30hIFE">

                                                </div>
                                                <div class="cart_price">
                                                    <div>
                                                        <span class="cart_price__items">
                                                            <?= $value['Price'] ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="cart_quantity">
                                                    <span>
                                                        <?= $value['Quantity'] ?>
                                                    </span>
                                                </div>
                                                <div class="cart_total">
                                                    <span>
                                                        <?= number_format($value['ThanhTien']) ?>
                                                    </span>
                                                </div>
                                                <div class="cart_delete">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
                <div class="form-total-checkout">
                    <div class="total__checkout checkout__item__name ">Tổng tiền hàng</div>
                    <div class="total__checkout checkout__item__price ">
                        <?= number_format($count) ?> VNĐ
                    </div>
                    <div class="total__checkout checkout__item__name ">Phí vận chuyển</div>
                    <div class="total__checkout checkout__item__price ">₫32.800</div>
                    <div class="total__checkout checkout__item__name ">Tổng thanh toán:</div>
                    <div class="total__checkout price-checkout checkout__item__price" name="total-order">
                        <?= number_format($count + 32800) ?> VNĐ
                    </div>
                </div>
                <button class="next-step1 stardust-button--primary  btn-checkout">
                    Đặt hàng
                </button>

                <a href="" name="previous-step" class="previous-step">Quay lại giỏ hàng</a>
        </fieldset>
        </form>
    </div>
</div>