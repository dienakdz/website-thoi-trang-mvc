


<div >
	<hr class="width_hr" >

	<!-- sp mới -->
	<span><h5>SẢN PHẨM MỚI</h5></span>
	<?php 
        if($data_sanphamao_left1!=NULL){ 
            for($r=0;$r<2;$r++){
            	for ($i = $r*3; $i < (count($data_sanphamao_left1)-3)*$r+3; $i++) {
    ?>
	<div class="row">
		<div class="col-sm-4">
			<a href="?act=detail&id=<?= $data_sanphamao_left1[$i]['ProductID'] ?>">
				<img class="anh_listao" src="admin/upload/<?= $data_sanphamao_left1[$i]['Picture'] ?>" alt="Product Title" >
			</a>
		</div>

		<div class="col-sm-8 list_sp">
			<div class="text_sanpham ">
				<span><?= $data_sanphamao_left1[$i]['ProductName'] ?></span>
			</div>
			<div class="text">
				<!-- <del>170.000đ</del> -->
				<span class="gia_sanpham"><b>&emsp; <?= number_format($data_sanphamao_left1[$i]['Price']) ?> VNĐ</b></span>
			</div>
		</div>
	</div>
	<br>
	<hr class="width_hr" >
	<?php 
			}
   	 	}
		 }?>
	
	<!-- end sp mới -->

	<!-- sp noi bật -->
	<span><h5>SẢN PHẨM NỔi BẬT</h5></span>

	<?php 
        if($data_sanphamao_left2!=NULL){ 
            for($r=0;$r<2;$r++){
            	for ($i = $r*3; $i < (count($data_sanphamao_left1)-3)*$r+3; $i++) {
    ?>
	<div class="row">
		<div class="col-sm-4">
			<a href="?act=detail&id=<?= $data_sanphamao_left2[$i]['ProductID'] ?>">
				<img class="anh_listao" src="admin/upload/<?= $data_sanphamao_left2[$i]['Picture'] ?>" alt="Product Title" >
			</a>
		</div>

		<div class="col-sm-8 list_sp">
			<div class="text_sanpham ">
				<span><?= $data_sanphamao_left2[$i]['ProductName'] ?></span>
			</div>
			<div class="text">
				<!-- <del>170.000đ</del> -->
				<span class="gia_sanpham"><b>&emsp; <?= number_format($data_sanphamao_left2[$i]['Price']) ?> VNĐ</b></span>
			</div>
		</div>
	</div>
	<br>
	<hr class="width_hr" >
	<?php 
			}
   	 	}
		 }?>
	
	<!-- end sp nổi bật -->

	<!-- sp giảm giá -->
	<span><h5>SẢN PHẨM GIẢM GIÁ</h5></span>

	<?php 
        if($data_sanphamao_left3!=NULL){ 
            for($r=0;$r<2;$r++){
            	for ($i = $r*3; $i < (count($data_sanphamao_left1)-3)*$r+3; $i++) {
    ?>
	<div class="row">
		<div class="col-sm-4">
			<a href="?act=detail&id=<?= $data_sanphamao_left3[$i]['ProductID'] ?>">
				<img class="anh_listao" src="admin/upload/<?= $data_sanphamao_left3[$i]['Picture'] ?>" alt="Product Title" >
			</a>
		</div>

		<div class="col-sm-8 list_sp">
			<div class="text_sanpham ">
				<span><?= $data_sanphamao_left3[$i]['ProductName'] ?></span>
			</div>
			<div class="text">
				<!-- <del>170.000đ</del> -->
				<span class="gia_sanpham"><b>&emsp; <?= number_format($data_sanphamao_left3[$i]['Price']) ?> VNĐ</b></span>
			</div>
		</div>
	</div>
	<br>
	<hr class="width_hr" >
	<?php 
			}
   	 	}
		 }?>
	
	
	<!-- end sp giam giá -->
</div>