<?php /*Template name: Kết quả tìm kiếm Form Search */ 
get_header();
?>
<div class="container">
	<!-- Lấy giá trị từ thanh tìm kiếm trên trình duyệt -->
	<?php  
	$nganh_nghe = $_GET['nganh-nghe']; 
	$htlv = $_GET ['hinh-thuc-lam-viec']; 
	$dia_diem = $_GET ['dia-diem']; 
	$muc_luong = $_GET ['muc-luong'];
	?>
	<?php wc_loop('nganh-nghe',$nganh_nghe , 'hinh-thuc-lam-viec' , $htlv, 'dia-diem' , $dia_diem , 'muc-luong', $muc_luong); ?>
</div>
<?php get_footer(); ?>
