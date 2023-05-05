<div id="wle-header-slider" style="background:#f8f8f8">  
    <div class="container">
        <div class="row">
            <div id="wle-header-slider-l" class="col-12 col-sm-12 col-lg-3" ></div>
                <div id="wle-header-slider-r" class="col-12 col-sm-12 col-lg-9">
                    <div class="owl-carousel owl-carousel-quangcao owl-theme">
                        <div class="item item_slidequangcao"><img src="public/images/quangcao1.png"  alt=""></div>
                        <div class="item item_slidequangcao"><img src="public/images/quangcao2.png"  alt=""></div>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="container">
            <div id="form">
                <fieldset>
                <div role="main" class="wrapper_cart" style="margin-bottom: 0px;">
                    <div class="cart_title">
                        <div class="orders_item_product">Tên sản phẩm</div>
                        <div class="orders_item_quantity">Số lượng</div>
                        <div class="orders_item_total">Số tiền</div>
                        <div class="orders_item_del">Trạng thái</div>
                    </div><!--  -->
                    <?php 
                        if(isset($data) and $data != NULL){
                            foreach ($data as  $value) {        
                    ?>
                    <div class="panel_cart">
                        <div class="panel_content">
                            <div class="content_cart">
                                <div class="cart_flex">

                                    <div class="cart_product">
                                        <div class="cart_product__items">
                                            <a title="<?= $value['ProductName']?>" href="?act=detail&id=<?= $value['ProductID'] ?>">
                                                <div class="product__items__img" style="background-image: url(Admin/upload/<?= $value['Picture'] ?>);"></div>
                                            </a>

                                            <div class="product__items__name">
                                                <a class="product-name" href="?act=detail&id=<?= $value['ProductID'] ?>" title="<?= $value['ProductName'] ?>"><?= $value['ProductName']?></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="orders_quantity">
                                        <span class="cart_price__items">
                                                <?= number_format($value['QuantityOrdered']) ?>
                                        </span>
                                        
                                    </div>
                                    <div class="orders_price">
                                        <div>
                                            <span class="cart_price__items">
                                                <?= number_format($value['Totalprice']) ?> VNĐ
                                            </span>
                                        </div>
                                    </div>
                                    <div class="orders_delete">
                                        <?php if($value['Status'] =='0'){?>
                                            <span class="cart_price__items" style="color:red">
                                                <b>ĐANG ĐỢI NGƯỜI BÁN XÁC NHẬN</b>
                                            </span>
                                        <?php }elseif ($value['Status'] =='1') { ?>
                                            <span class="cart_price__items" style="color:green">
                                                <b>ĐƠN HÀNG ĐÃ ĐƯỢC XÁC NHẬN</b>
                                            </span>
                                        <?php }elseif ($value['Status'] =='2') { ?>
                                            <a href="?act=taikhoan&xuli=update_orders&id=<?= $value['OrderID']?>&id_product=<?= $value['ProductID']?>">
                                            <button  type="sumbit" class="orders_btn">Đã nhận được hàng</button>
                                            </a>
                                        <?php }elseif ($value['Status'] =='3') { ?>
                                            <span class="cart_price__items" style="color:green">
                                                <b>ĐÃ MUA</b>
                                            </span>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div> 
                    <?php }
                            } ?>                  
                </div>                                   
                </fieldset>
            </div>
</div>
