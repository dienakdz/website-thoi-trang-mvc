<?php if ($data != null) { ?>
<div class="main-page-wrapper">
	<div class="container">
	<h1 class="site-title"> &nbsp </h1>
	</div>
	<div class="container meta-location-add_to_cart" style="margin-top:13%">
    	<div class="row product-image-summary-wrap">
            <div class="product-image-summary col-lg-12 col-12 col-md-12">
                <div class="row product-image-summary-inner">
                    <div class="col-lg-6 col-12 col-md-6 product-images">
                    	<div class="product-images-inner">
                    		<div class="row">
                    			<div class="col-lg-3">
                    			
                    				<div class="small-image pointer">
                    					<?php if ($data['Picture'] !=  null) { ?>
						                <img class="img_left" src="admin/upload/<?= $data['Picture'] ?>" alt="">
						                <br><br><br>
						                <?php } ?>	
						                <?php if ($data['Picture2'] !=  null) { ?>
						                <img class="img_left" src="admin/upload/<?= $data['Picture2'] ?>" alt="">
						                <br><br><br>
						                <?php } ?>

						            </div>
                    			</div>

                    			<div class="col-lg-9">
                    				<?php if ($data['Picture'] !=  null) { ?>
                    				<div class="big-image" >
                    					<img  id="zoom-img" style="background-image: url('admin/upload/<?= $data['Picture'] ?>');" alt="">
                    				</div>
						            <?php } ?>	

                    			</div>
                    			
                    		</div>


						
                    	</div>
                    </div>
                    <div class="col-lg-6 col-12 col-md-6 summary entry-summary" >
                    	<div class="summary-inner">
                        	<div class="single-breadcrumbs-wrapper">
                            	<div class="single-breadcrumbs">
                                	<nav class="woocommerce-breadcrumb">
                                		<a href="?act=home">Trang chủ</a>&nbsp;/&nbsp;
                                		<a href="#"><?= $data['CategoryName'] ?></a>
                                		&nbsp;/&nbsp;<?= $data['ProductName'] ?>
                                	</nav>
                                </div>
                            </div>
                            <!-- <div id="myresult" class="img-zoom-result zoom_img"></div> -->
                        	<h1 class="product_title entry-title"><?= $data['ProductName'] ?></h1>
                        	<p class="price">
                        		<ins><span class="woocommerce-Price-amount amount">
                        			<bdi><?=number_format($data['Price'])?> VNĐ </bdi>
                        		</span></ins>
                        	</p>


							<div class="woocommerce-product-details__short-description">
								<p><?= $data['ProductDesc'] ?></p>
							</div>

							<form action="?act=cart&xuli=add&id=<?=$data['ProductID']?>" method="post">
							<div class="quantity">
								<label class="screen-reader-text" ><?= $data['ProductName'] ?> số lượng</label>
								<div >
                                   
                                    <input type="number" step="1" min="1" max="<?= $data['Quantity'] ?>" name="quantity_input" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                                    
                                </div>
							</div>
							<a href="?act=cart&xuli=add&id=<?=$data['ProductID']?>">
								<button class="single_add_to_cart_button button alt">Thêm vào giỏ hàng</button>
							</a>
							</form>


	
							<div class="product_meta">
								<span class="posted_in">Danh mục: <a href="#"><?= $data['CategoryName'] ?></a></span>
								<span class="tagged_as">Từ khóa: <a href="#" ><?= $data['ProductName'] ?></a></span>
							</div>

							<div class="product-share"> 
								<span class="share-title">Share</span>
							  <div class="woodmart-social-icons text-center icons-design-default icons-size-small color-scheme-dark social-share social-form-circle"> 
							  	<a rel="nofollow" href="#" target="_blank" class=" woodmart-social-icon social-facebook"> <i class="fa fa-facebook"></i> <span class="woodmart-social-icon-name">Facebook</span> </a> 
							    
							    <a rel="nofollow" href="#" target="_blank" class=" woodmart-social-icon social-twitter"> <i class="fa fa-twitter"></i> <span class="woodmart-social-icon-name">Twitter</span> </a> 
							    
							    <a rel="nofollow" href="#" target="_blank" class=" woodmart-social-icon social-pinterest"> <i class="fa fa-pinterest"></i> <span class="woodmart-social-icon-name">Pinterest</span> </a> 
							    
							    <a rel="nofollow" href="#" target="_blank" class=" woodmart-social-icon social-linkedin"> <i class="fa fa-linkedin"></i> <span class="woodmart-social-icon-name">linkedin</span> 
							    
							    </a> <a rel="nofollow" href="#" target="_blank" class=" woodmart-social-icon social-tg"> <i class="fa fa-telegram"></i> <span class="woodmart-social-icon-name">Telegram</span> </a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-tabs-wrapper" style="margin-top:3%">
    	<div class="container">
        	<div class="row">
            	<div class="col-12 ">
        			
					<div class="tabs-layout-tabs">
						<ul class="tabs" id="active_mota">
							<li  class="tablinks active " onclick="openCity(event, 'tab-description')">
								<a >Mô tả</a>
							</li>
							<li class="tablinks" onclick="openCity(event, 'tab-reviews')" >
								<a  >Đánh giá (<?php echo $data_tong ?>)</a>
							</li>
							<li class="tablinks"  onclick="openCity(event, 'tab-detail_tab')">
								<a >Chính sách giao hàng</a>
							</li>
						</ul>

						<div class="tabcontent" id="tab-description">
								
						<h2>Mô tả</h2>
						<div>
								<p><?= $data['ProductDesc'] ?></p>
						</div>
							
						</div>
						<div class="tabcontent" id="tab-reviews" style="display: none;" >
							<div id="reviews" class="woocommerce-Reviews">
								<div id="comments">
									<h2 class="woocommerce-Reviews-title">Đánh giá</h2>
									<?php if(isset($data_rating) and $data_rating !=NULL){
										foreach ($data_rating as $value_rating) {
										
									?>

									
									<div class="row">
										<div class="col-lg-2 comment-respond">
											<img src="public/images/rating_person.png" style="border-radius:30px" alt="">
											<br>
											<p class="stars" >
												<span>	<a class="star-1 <?php echo ($value_rating['Rating_Star'])=="1"?"active":"" ?>" >1</a>
														<a class="star-2 <?php echo ($value_rating['Rating_Star'])=="2"?"active":"" ?>" >2</a>				
														<a class="star-3 <?php echo ($value_rating['Rating_Star'])=="3"?"active":"" ?>" >3</a>		
														<a class="star-4 <?php echo ($value_rating['Rating_Star'])=="4"?"active":"" ?>" >4</a>					
														<a class="star-5 <?php echo ($value_rating['Rating_Star'])=="5"?"active":"" ?>" >5</a>
												</span>					
											</p>
											
										</div>
										<div class="col-lg-10">
											<b><?php echo $value_rating['RatingName'] ?></b> <br>
											<?php echo $value_rating['RatingComment'] ?>
											
										</div>
										
									</div>
								<?php }
								}else{
								 ?>
								 <p class="woocommerce-noreviews">Chưa có đánh giá nào.</p>
								<?php } ?>

								</div>

								<div id="review_form_wrapper">
									<div id="review_form">
										<div id="respond" class="comment-respond">
											<?php if(isset($check_orders) and $check_orders !=NULL) { ?>
											<span id="reply-title" class="comment-reply-title">Hãy là người đầu tiên nhận xét “<?= $data['ProductName'] ?>” 
												<small>
													<a rel="nofollow" id="cancel-comment-reply-link" href="/san-pham/ghe-de-tap-chi/#respond" style="display:none;">Hủy
													</a>
												</small>
											</span>
											<!-- <form action="#" method="post" id="commentform" class="comment-form" novalidate=""> -->
												<p class="comment-notes">
													<span id="email-notes">Email của bạn sẽ không được hiển thị công khai.</span> Các trường bắt buộc được đánh dấu 
													<span class="required">*</span>
												</p>
												<div class="comment-form-rating">
													<label for="rating">Đánh giá của bạn&nbsp;<span class="required">*</span></label>
													<p class="stars" >
														<span>	<a class="star-1 <?php echo ($data_rating['Rating_Star'])=="1"?"
																	active":"" ?>" >1</a>
																<a class="star-2 <?php echo ($data_rating['Rating_Star'])=="2"?"active":"" ?>" >2</a>				
																<a class="star-3 <?php echo ($data_rating['Rating_Star'])=="3"?"active":"" ?>" >3</a>		
																<a class="star-4 <?php echo ($data_rating['Rating_Star'])=="4"?"active":"" ?>" >4</a>					
																<a class="star-5 <?php echo ($data_rating['Rating_Star'])=="5"?"active":"" ?>" >5</a>
														</span>					
													</p>
													<select name="rating" id="rating_star"  >
														<option value="">Xếp hạng…</option>
														<option value="5">Rất tốt</option>
														<option value="4">Tốt</option>
														<option value="3">Trung bình</option>
														<option value="2">Không tệ</option>
														<option value="1">Rất tệ</option>
													</select>
												</div>
												<p class="comment-form-comment" >
													<label for="comment">Nhận xét của bạn&nbsp;
														<span class="required">*</span>
													</label>
													<textarea  id="rating_comment" cols="45" rows="8" required=""></textarea>
												</p>
												<p class="comment-form-author" >
													<label for="author">Tên&nbsp;<span class="required">*</span></label>
													<input id="rating_name" type="text" value="" size="30" required="">
												</p>
												<p class="comment-form-email" >
													<label for="email">Email&nbsp;<span class="required">*</span></label>
													<input  id="rating_email" type="email" value="" size="30" required=""></p>
											
												<p class="form-submit">
													<input  type="button" class="single_add_to_cart_button button alt" value="Gửi đi" onClick ="ajax_rating();">
													
													
												</p>
											<?php }else{ ?>
												<span id="reply-title" class="comment-reply-title">
													Hãy đăng nhập và mua sản phẩm để đánh giá 
												</span>
											<?php } ?>
										</div><!-- #respond -->
									</div>
								</div>

							</div>
						</div>
						<div class="tabcontent" id="tab-detail_tab" style="display: none;">
							<h2><strong>Chính sách giao hàng</strong></h2>
							<p>
								<strong>1. Thời gian giao hàng: </strong><br>
								Đơn hàng nội và ngoại thành TP.Gia Lai: <br>
								Thời gian giao hàng là 1-2 ngày sau khi đặt hàng.<br>

								Đơn hang trước 11h30 trưa thì sẽ giao trong buổi chiều cùng ngày<br>

								Đơn hàng sau 11h30 sẽ giao trong buổi tối và sáng hôm sau.<br>

								Đơn hàng ở các tỉnh thành khác:<br>
								Thời gian là 2-3 ngày đối với khu vực trung tâm tỉnh thành phố, 3-7 ngày đối với khu vực ngoại thành, huyện, xã, thị trấn…<br>

								(Không tính thứ bảy, chủ nhật hay các ngày lễ tết)<br>

								Thời gian xử lý đơn hàng sẽ được tính từ khi nhận được thanh toán hoàn tất của quý khách.<br>

								Có thể thay đổi thời gian giao hàng nếu khách hàng yêu cầu và Missha chủ động đổi trong trường hợp chịu ảnh hưởng của thiên tai hoặc các sự kiện đặc biệt khác.<br>

								Đơn hàng của quý khách sẽ được giao tối đa trong 2 lần. Trường hợp lần đầu giao hàng không thành công, sẽ có nhân viên liên hệ để sắp xếp lịch giao hàng lần 2 với quý khách, trong trường hợp vẫn không thể liên lạc lại được hoặc không nhận được bất kì phản hồi nào từ phía quý khách, đơn hàng sẽ không còn hiệu lực.<br>

								Để kiểm tra thông tin hoặc tình trạng đơn hàng của quý khách, xin vui lòng inbox fanpage hoặc gọi số hotline, cung cấp tên, số điện thoại để được kiểm tra.<br>

								Khi hàng được giao đến quý khách, vui lòng ký xác nhận với nhân viên giao hàng và kiểm tra lại số lượng cũng như loại hàng hóa được giao có chính xác không. Xin quý khách vui lòng giữ lại biên lại vận chuyển và hóa đơn mua hàng để đối chiếu kiểm tra.<br>
								<strong>2. Phí giao hàng:</strong> <br>

								Phí ship cố định là 32,000đ áp dụng cho mọi khu vực
								
							</p>	
						</div>
							

				    </div>
            	</div>
        	</div>
        	<!-- san phẩm tương tự -->
        	<br> 
        	<h3 class="title slider-title">Sản phẩm tương tự</h3>
        	<div class="row text-center">
                <?php foreach ($data_lq as $row) { ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 vien_trang">
	    				<div class="vien_box">
	    					<div class="background_xam">
		    					<div class="anh_chinh">
			    					<a href="?act=detail&id=<?= $row['ProductID'] ?>">
			    						<img class="vitrianh"src="admin/upload/<?= $row['Picture'] ?>" alt="Product Title" class="img-products" />
			    						
				    					<div class="sanpham">
				    					<img class="vitrianh" src="admin/upload/<?= $row['Picture2'] ?>" alt="Product Title" class="img-products" alt="">
				    					</div>
			    					</a>
		    					</div>
			    				<div class="giamgia">
			    					<span>Mới</span>
			    				</div>
	    					</div>
	    				
		    				<div class="text_sanpham">
			    				<span><?= $row['ProductName'] ?></span>
			    				
			    				
			    			</div>
			    			<div class="text">
			    				<!-- <del>170.000đ</del> -->
			    				<span class="gia_sanpham"><b>&emsp; <?= number_format($row['Price']) ?> VNĐ</b></span>
			    			</div>
			    			<div class="btn_add_giohang container" style="text-align:center">
			    				<button class="btn_add" >THÊM VÀO GIỎ HÀNG 
			    					
			    						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
										  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
										</svg>
			    					
			    				</button>
			    			</div>
	    				</div>
	    			</div>
                <?php } ?>
                <!-- single product end -->
            </div>


    	</div>
    </div>


</div>

<?php } ?>