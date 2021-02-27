<?php
if (!function_exists('wc_form_option')) {
	function wc_form_option ($taxonomy) { ?>
		<!-- Nội dung option -->
		<?php 
		$args = array(
			'hide_empty' => '0',
			'taxonomy' => $taxonomy,
		); 
		$list = get_categories( $args );
		?>
		<?php foreach( $list as $cate) :?>
			<option value="<?php echo $cate->slug ?>"><?php echo $cate->name; ?></option>
		<?php endforeach; ?>
	<?php }
}



function wc_form() {
	ob_start();
	?> 
	<!-- Start Content -->
	<form action="<?php bloginfo( 'siteurl' ); ?>/ket-qua-tim-kiem" method = "GET">

		<select name="nganh-nghe">
			<option value="">Chọn ngành nghề</option>
			<?php wc_form_option('nganh-nghe'); ?>
		</select>
		<select name="hinh-thuc-lam-viec">
			<option value="">Chọn hình thức làm việc</option>
			<?php wc_form_option('hinh-thuc-lam-viec'); ?>
		</select>
		<select name="dia-diem">
			<option value="">Chọn địa điểm</option>
			<?php wc_form_option('dia-diem'); ?>
		</select>
		<select name="muc-luong">
			<option value="">Mức lương</option>
			<?php wc_form_option('muc-luong'); ?>
		</select>
		<button type = "submit">Tìm kiếm</button>
	</form>
	<!-- #End Content#-->
	<?php
	return ob_get_clean();
}
add_shortcode( 'form_tim_kiem', 'wc_form' );

if (!function_exists('wc_loop')) {
	function wc_loop ($tax_1,$slug_1, $tax_2, $slug_2, $tax_3, $slug_3, $tax_4, $slug_4) { ?>
		<!-- Vòng lặp tổng quát -->
		<div class="wc_row">
			<?php
			$args = array( 
				'post_type' => 'viec-lam', 
				'posts_per_page' => -1, 
				'tax_query'             => array(
					'relation' => 'and',
					array(
						'taxonomy'  => $tax_1,
						'field'     => 'slug',
						'terms'     => $slug_1,
						'operator'  => 'IN',
					),
					array(
						'taxonomy'  => $tax_2,
						'field'     => 'slug',
						'terms'     => $slug_2,
						'operator'  => 'IN',
					),
					array(
						'taxonomy'  => $tax_3,
						'field'     => 'slug',
						'terms'     => $slug_3,
						'operator'  => 'IN',
					),
					array(
						'taxonomy'  => $tax_4,
						'field'     => 'slug',
						'terms'     => $slug_4,
						'operator'  => 'IN',
					),


				) 
			);
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();?>
				<!-- Start content -->
				<div class="job-column">
					<div class="job">
						<div class="job-thumb">
							<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="job-info">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</div>
				</div>

				<!-- #End content# -->
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>	 
		</div>
	<?php }
}
