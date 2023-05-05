<main>

<div class="main-page-wrapper">
		
	<div id="halink_vn_homepage" class="content-area">
			<div id="wle-header-slider" style="background:#f8f8f8">  
				<div class="container">
		    		<div class="row">
		        	<div id="wle-header-slider-l" class="col-12 col-sm-12 col-lg-3" ></div>
		            	<div id="wle-header-slider-r" class="col-12 col-sm-12 col-lg-9">
		            		<div class="owl-carousel owl-carousel-quangcao owl-theme">
							    <div class="item item_slidequangcao"><img src="public/images/quangcao2.png"  alt=""></div>
							    <div class="item item_slidequangcao"><img src="public/images/quangcao1.png"  alt=""></div>
							</div>
			            </div>
			       	</div>
			    </div>
			</div>


			<div class="container">
				<h1 class="site-title">Thời trang</h1>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-lg-3">
						<span class="text_black_indam"><h4>LỌC THEO GIÁ</h4></span>
					</div>
					<div class="col-sm-6 col-lg-6">
						<span>Trang chủ / Sản phẩm/ Thời trang Thắt Lưng</span>
					</div>
					<div class="col-sm-3 col-lg-3">
						<!-- <form class="#" method="get">
							<select name="orderby" class="orderby" aria-label="Đơn hàng của cửa hàng">
								<option value="menu_order" selected="selected">Thứ tự mặc định</option>
								<option value="popularity">Thứ tự theo mức độ phổ biến</option>
								<option value="rating">Thứ tự theo điểm đánh giá</option>
								<option value="date">Mới nhất</option>
								<option value="price">Thứ tự theo giá: thấp đến cao</option>
								<option value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
							</select>
							<input type="hidden" name="paged" value="1">
						</form> -->
					</div>
					
				</div>

				<div class="row">
					<div class="col-sm-3">
						<!-- ben trai gom cac loai san pham -->
						<form action="?act=list_belt" method="post">
							<div class="price_filter slidecontainer">
							<div id="slider-range"></div>
								<div class="price_slider_amount">
									<input type="text"  name="price_thatlung" />
									<div class="row">
										<div class="col-sm-8 price_slider_amount" >
											<input type="text" id="amount" name="price_thatlung" />
										</div>
										<div class="col-sm-4">
											<button type="submit">LỌC</button>
										</div>
										
									</div>
									<br>
									
								</div>
							</div>
							
						</form>
						<?php require_once("categories_left.php") ?>

					</div>

					<div class="col-sm-9">
						<div class="row">

				            <?php 
								if(isset($data) and $data != NULL){
									foreach ($data as  $value) {		
							?>
			    			<div class="col-xs-12 col-sm-8 col-md-4 vien_trang">
			    				<div class="vien_box">
			    					
			    					<div class="background_xam">
				    					<div class="anh_chinh">
				    						<a href="?act=detail&id=<?= $value['ProductID'] ?>">
						    					<img class="vitrianh" src="admin/upload/<?= $value['Picture'] ?>" alt="Product Title">
						    					<div class="sanpham">
						    					<img class="vitrianh" src="admin/upload/<?= $value['Picture2'] ?>" alt="Product Title">
						    					</div>
					    					</a>
				    					</div>
			    					</div>
			    				
				    				<div class="text_sanpham">
					    				<span><?= $value['ProductName'] ?></span>
					    			</div>
					    			<div class="text">
					    				<!-- <del>170.000đ</del> -->
					    				<span class="gia_sanpham"><b>&emsp; <?= number_format($value['Price']) ?> VNĐ</b></span>
					    			</div>
					    			<div class="btn_add_giohang container" style="text-align:center">
									<a href="?act=detail&id=<?= $value['ProductID'] ?>">	
										<button class="btn_add" >XEM SẢN PHẨM 
					    					
					    						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
												  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
												</svg>
					    					
					    				</button>
									</a>
					    			</div>
			    				</div>
			    			</div>
			    			<?php }}else{
								echo '<p> KHÔNG CÓ DỮ LIỆU TÌM KIẾM</p>';}?>
							
						</div>

					

		    			
					</div>
					<!-- menu chuyển trang -->
					<?php if(isset($data_tong)){?>
					<div class="container vitrimenu">
						<div class="pagination">
					       <?php if ($data_tong >= 9 ) {
								for ($i = 1; $i <= $data_tong / 9; $i++) { ?>
									<a class="active chinh_menu" href="?act=list_belt&trangthatlung=<?= $i ?>"><?= $i ?></a>
							<?php }
							}
							?>
					    </div>
					</div>
					<?php } ?>
					<!-- end menu chuyển trang -->

					</div>
					
				</div>
			</div>
			<br><br>
	</div>
</div>
</main>