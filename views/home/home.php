<main>
	<div class="main-page-wrapper">
			
	<div id="halink_vn_homepage" class="content-area">
	
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

	
        <section id="halink_vn_homepage_content">
         	<div class="container">
        	<!-- Title -->
                <div class="title-wrapper  woodmart-title-color-default woodmart-title-style-default woodmart-title-width-100 text-center woodmart-title-size-medium ">
                    <div class="liner-continer">
                    	<span class="left-line"></span>
                    	<h4 class="wle-upper woodmart-title-container title  woodmart-font-weight-">Sản phẩm mới</h4>
                    	<span class="right-line"></span>
                    </div>
                </div>
    		</div>
    	</section>

    	<div class="container">
    		<?php 
                if($data_sanpham1!=NULL){ 
                    for($r=0;$r<2;$r++){
            ?>
    		<div class="row">
    			<?php 
                for ($i = $r*4; $i < (count($data_sanpham1)-4)*$r+4; $i++) {
                	// $x = (count($data_sanpham1)-12)*$r+12;
                ?>
    			<div class="col-xs-12 col-sm-6 col-md-3 vien_trang">
    				<div class="vien_box">
    					<div class="background_xam">
	    					<div class="anh_chinh">
		    					<a href="?act=detail&id=<?= $data_sanpham1[$i]['ProductID'] ?>">
		    						<img class="vitrianh"src="admin/upload/<?= $data_sanpham1[$i]['Picture'] ?>" alt="Product Title" class="img-products" />
		    						
			    					<div class="sanpham">
			    					<img class="vitrianh" src="admin/upload/<?= $data_sanpham1[$i]['Picture2'] ?>" alt="Product Title" class="img-products" alt="">
			    					</div>
		    					</a>
	    					</div>
		    				<!-- <div class="giamgia">
		    					<span>5%</span>
		    				</div> -->
		    				<div class="giamgia">
		    					<span>Mới</span>
		    				</div>
    					</div>
    				
	    				<div class="text_sanpham">
		    				<a href="?act=detail&id=<?= $data_sanpham1[$i]['ProductID'] ?>"><?= $data_sanpham1[$i]['ProductName'] ?></a>
		    				
		    				
		    			</div>
		    			<div class="text">
		    				<!-- <del>170.000đ</del> -->
		    				<span class="gia_sanpham"><b>&emsp; <?= number_format($data_sanpham1[$i]['Price']) ?> VNĐ</b></span>
		    			</div>
		    			<div class="btn_add_giohang container" style="text-align:center">
		    				<a href="?act=detail&id=<?= $data_sanpham1[$i]['ProductID'] ?>">
			    				<button class="btn_add" >XEM SẢN PHẨM 
			    					
			    						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
										  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
										</svg>
								</button>
		    				</a>
		    			</div>
    				</div>
    			</div>

    			
    		<?php }?>	
			</div>	
			<?php 
                            }
                        }?>
    	</div>

    	<!-- Sản phẩm nổi bật -->
    	<section id="halink_vn_homepage_content">
         	<div class="container">
        	<!-- Title -->
                <div class="title-wrapper  woodmart-title-color-default woodmart-title-style-default woodmart-title-width-100 text-center woodmart-title-size-medium ">
                    <div class="liner-continer">
                    	<span class="left-line"></span>
                    	<h4 class="wle-upper woodmart-title-container title  woodmart-font-weight-">Sản phẩm nổi bật</h4>
                    	<span class="right-line"></span>
                    </div>
                </div>
    		</div>
    	</section>

    	<div class="container">
    		<?php 
                if($data_sanpham2!=NULL){ 
                    for($r=0;$r<2;$r++){
            ?>
    		<div class="row">
    			<?php 
                for ($i = $r*4; $i < (count($data_sanpham2)-4)*$r+4; $i++) {
                ?>
    			<div class="col-xs-12 col-sm-6 col-md-3 vien_trang">
    				<div class="vien_box">
    					<div class="background_xam">
	    					<div class="anh_chinh">
		    					<a href="?act=detail&id=<?= $data_sanpham2[$i]['ProductID'] ?>">
			    					<img class="vitrianh"src="admin/upload/<?= $data_sanpham2[$i]['Picture'] ?>" alt="Product Title" class="img-products" />
			    					<div class="sanpham">
			    					<img class="vitrianh" src="admin/upload/<?= $data_sanpham2[$i]['Picture2'] ?>" alt="Product Title" class="img-products" alt="">
		    					</a>
		    					</div>
	    					</div>
		    				<!-- <div class="giamgia">
		    					<span>5%</span>
		    				</div>
		    				<div class="giamgiamoi">
		    					<span>Mới</span>
		    				</div> -->
    					</div>
    				
	    				<div class="text_sanpham">
		    				<a href="?act=detail&id=<?= $data_sanpham2[$i]['ProductID'] ?>"><?= $data_sanpham2[$i]['ProductName'] ?></a>
		    				
		    			</div>
		    			<div class="text">
		    				<span class="gia_sanpham"><b>&emsp; <?= number_format($data_sanpham2[$i]['Price']) ?> VNĐ</b></span>
		    			</div>
		    			<div class="btn_add_giohang container" style="text-align:center">
		    				<a href="?act=detail&id=<?= $data_sanpham2[$i]['ProductID'] ?>">
		    					<button class="btn_add" >XEM SẢN PHẨM 
		    					
		    						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
									  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
									</svg>
		    					
		    					</button>
		    				</a>
		    				
		    			</div>
    				</div>
    			</div>

    			
    		<?php }?>	
			</div>	
			<?php 
                            }
                        }?>
    	</div>
    	<!-- Sản phẩm giảm giá -->
    	<section id="halink_vn_homepage_content">
         	<div class="container">
        	<!-- Title -->
                <div class="title-wrapper  woodmart-title-color-default woodmart-title-style-default woodmart-title-width-100 text-center woodmart-title-size-medium ">
                    <div class="liner-continer">
                    	<span class="left-line"></span>
                    	<h4 class="wle-upper woodmart-title-container title  woodmart-font-weight-">Sản phẩm giảm giá</h4>
                    	<span class="right-line"></span>
                    </div>
                </div>
    		</div>
    	</section>

    	<div class="container">
    		<?php 
                if($data_sanpham3!=NULL){ 
                    for($r=0;$r<2;$r++){
            ?>
    		<div class="row">
    			<?php 
                for ($i = $r*4; $i < (count($data_sanpham3)-4)*$r+4; $i++) {
                ?>
    			<div class="col-xs-12 col-sm-6 col-md-3 vien_trang">
    				<div class="vien_box">
    					<div class="background_xam">
	    					<div class="anh_chinh">
		    					<a href="?act=detail&id=<?= $data_sanpham3[$i]['ProductID'] ?>">
			    					<img class="vitrianh"src="admin/upload/<?= $data_sanpham3[$i]['Picture'] ?>" alt="Product Title" class="img-products" />
			    					<div class="sanpham">
			    					<img class="vitrianh" src="admin/upload/<?= $data_sanpham3[$i]['Picture2'] ?>" alt="Product Title" class="img-products" alt="">
			    					</div>
			    				</a>
	    					</div>
    					</div>
    				
	    				<div class="text_sanpham">
		    				<a href="?act=detail&id=<?= $data_sanpham3[$i]['ProductID'] ?>"><?= $data_sanpham3[$i]['ProductName'] ?></a>
		    				
		    			</div>
		    			<div class="text">
		    				<span class="gia_sanpham"><b>&emsp; <?= number_format($data_sanpham3[$i]['Price']) ?> VNĐ</b></span>
		    			</div>
		    			<div class="btn_add_giohang container" style="text-align:center">
		    				<a href="?act=detail&id=<?= $data_sanpham3[$i]['ProductID'] ?>">
			    				<button class="btn_add" >XEM SẢN PHẨM 
		    					
		    						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
									  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
									</svg>
		    					
		    					</button>
			    			</a>
		    				
		    			</div>
    				</div>
    			</div>

    			
    		<?php }?>	
			</div>	
			<?php 
                            }
                        }?>
    	</div>
    	<!-- Liên hệ với chung tôi -->
		<div class="" style="background:url(public/images/lienhevoichungtoi.jpg);   height: 200px; background-size: 100%;">
			<div class="container">
				<div class="liner-continer text"> 
                  <span class="left-line"></span>
                    <h4 class="woodmart-title-container title noline  woodmart-font-weight-">
                    	<br>
                      <strong>Liên hệ báo giá</strong>
                    </h4> 
                    <span class="right-line"></span>
              	</div>
              	
                <div class="wpb_wrapper mc4wp-form wle-form-home">
                	<div role="form" class="wpcf7" id="wpcf7-f27-p2-o1" lang="vi" dir="ltr">
                		<div style="position: relative;">
                			<p>
		              			<span class="wpcf7-form-control-wrap your-email">
		              				<input type="email" name="your_email" id="your_email" size="40"   placeholder="Để lại email" />
		              			</span>
		              				<input type="submit" value="Gửi đi" onclick="ajax_email();" class="wpcf7-form-control wpcf7-submit" />
		              		</p>
                			
                		</div>
						<!-- <form action="?act=email" method="POST"> -->
		              		
		              	<!-- </form> -->
		            </div>
				</div>
				<br>
              	<div class="wpb_wrapper">
                  <p style="text-align: center;">Liên hệ với chúng tôi để nhận báo giá</p>
                </div>
			</div>
		</div>
		<br> <br>
		<!-- Tin tức -->
		<section id="halink_vn_homepage_content">
         	<div class="container">
        	<!-- Title -->
                <div class="title-wrapper  woodmart-title-color-default woodmart-title-style-default woodmart-title-width-100 text-center woodmart-title-size-medium ">
                    <div class="liner-continer">
                    	<span class="left-line"></span>
                    	<h4 class="wle-upper woodmart-title-container title  woodmart-font-weight-">Tin Tức</h4>
                    	<span class="right-line"></span>
                    </div>
                </div>
    		</div>
    	</section>

    	<div class="container">
    		<div class="row" style="margin:  5%;">
    			<div class="col-12">
    				<div class="owl-carousel owl-carousel-tintuc owl-theme">
			    		<div class="item item_cardtintuc">
			    			<div class="card card_tintuc" >
			  					<img src="public/images/tintuc1.png" class="card-img-top img_tintuc" alt="...">
			  					<div class="day_tintuc">
			  						<span>24 <br> TH8</span>
			  						
			  					</div>
		  						<div class="card-body">
								    <h5 class="card-title title_card">Tiềm năng của ngành kinh doanh thời trang</h5>
								    <p class="card-text">
								    	Đăng bởi : 
								    	<span>
								    		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
											  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
											  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
											</svg>
								    	</span>
								    	Minh Diện
								    </p>
								    <p class="card-text">
								    	Thời trang luôn được biết đến là một trong những ngành hàng kinh doanh chiếm thị phần lớn nhất hiện nay bởi nhu cầu cũng như xu hướng thay đổi từng ngày...
								    </p>
								    <a href="#" class="btn btn-primary">Chi Tiết</a>
							  </div>
							</div>
			    		</div>
			    		<div class="item item_cardtintuc">
			    			<div class="card card_tintuc" >
			  					<img src="public/images/tintuc2.jpg" class="card-img-top img_tintuc" alt="...">
			  					<div class="day_tintuc">
			  						<span>24 <br> TH8</span>
			  						
			  					</div>
		  						<div class="card-body">
								    <h5 class="card-title title_card">Kiểu giày làm thon chân</h5>
								    <p class="card-text">
								    	Đăng bởi :
								    	<span>
								    		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
											  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
											  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
											</svg>
								    	</span>
								    	Minh Diện
								    </p>
								    <p class="card-text">
								    	Những đôi giày có tông màu nude nhẹ nhàng phù hợp với chị em theo đuổi phong cách nữ tính. Gam màu trung tính dễ phối, có thể kết hợp cùng mọi màu sắc...
								    </p>
								    <a href="#" class="btn btn-primary">Chi Tiết</a>
							  </div>
							</div>
			    		</div>
			    		<div class="item item_cardtintuc">
			    			<div class="card card_tintuc" >
			  					<img src="public/images/tintuc3.jpg" class="card-img-top img_tintuc" alt="...">
			  					<div class="day_tintuc">
			  						<span>24 <br> TH8</span>
			  						
			  					</div>
		  						<div class="card-body">
								    <h5 class="card-title title_card">Cô giáo Minh Thu ghi điểm nhờ những bộ cánh nhìn là mê</h5>
								    <p class="card-text">
								    	Đăng bởi :
								    	<span>
								    		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
											  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
											  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
											</svg>
								    	</span>
								    	Minh Diện
								    </p>
								    <p class="card-text">
								    	Với ngoại hình xinh xắn, giọng nói thu hút và cách truyền đạt dí dỏm, cô giáo 9X này dường như phá bỏ mọi kỷ lục ở các lớp học livestream từng có tại Việt...
								    </p>
								    <a href="#" class="btn btn-primary">Chi Tiết</a>
							  </div>
							</div>
			    		</div>	
		    		</div>
		    	</div>			
		    </div>
		</div>

		<div class="logo_cuoitrangchu">
			<hr >
			<div class="owl-carousel owl-carousel-logo owl-theme">
			    <div class="item item_logo"><a href="?act=nike"><img src="admin/upload/logonike.jpg"></a></div>
			    <div class="item item_logo"><a href="?act=adidas"><img src="admin/upload/logoadidas.png"></a></div>
			    <div class="item item_logo"><a href="?act=louis_vuitton"><img src="admin/upload/logolv.png"></a></div>
			    <div class="item item_logo"><a href="?act=gucci"><img src="admin/upload/logogucci.jpg"></a></div>
			    <div class="item item_logo"><a href="?act=hermes"><img src="admin/upload/logohermes.jpg"></a></div>
			    <div class="item item_logo"><a href="?act=chanel"><img src="admin/upload/logochanel.png"></a></div>
			    <div class="item item_logo"><a href="?act=versace"><img src="admin/upload/versace.png" ></a></div>
			</div>
		</div>
	</div>
	
</div>
</main>