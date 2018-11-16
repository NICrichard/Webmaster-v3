<?php get_header(); 
if (is_front_page()) { ?>
<div class="row">
	<div class="col-xs-12">
		<div id="idahoSlider" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#idahoSlider" data-slide-to="0" class="active"></li>
				<li data-target="#idahoSlider" data-slide-to="1"></li>
				<li data-target="#idahoSlider" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<?php 
				$slider = get_posts(array('post_type' => 'slider', 'posts_per_page' => 5));
				$count = 0;
				foreach($slider as $slide) {
				?>
				<div class="carousel-item <?php echo ($count ==0) ? 'active' : ''; ?>">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($slide->ID)); ?>" class="d-block img-responsive">
					<div class="carousel-caption d-none d-md-block">
						<h5>...</h5>
						<p>...</p>
					</div>
				</div>
				<?php 
				$count++; 
				}
				?>
			</div>
			<a class="carousel-control-prev" href="#idahoSlider" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#idahoSlider" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>
<?php } ?>
<div class="row">
	<div id="primary" class="<?php if ((is_active_sidebar('sidebar-home') && is_front_page()) || is_active_sidebar('sidebar-1') || (is_active_sidebar('sidebar-page') && !is_front_page())) { echo 'col-lg-9'; } else { echo 'col'; }?>">
		<main id="main" class="site-main" tabindex="-1">
			<?php
			while (have_posts()) : the_post();
				get_template_part('template-parts/content', 'page');
			endwhile;
			?>
		</main>
	</div>
	<?php 
	if ((is_active_sidebar('sidebar-home') && is_front_page()) || is_active_sidebar('sidebar-1') || (is_active_sidebar('sidebar-page') && !is_front_page())) {
	echo '<div class="sidebars col-lg-3">';
	if (is_active_sidebar('sidebar-home') && is_front_page()) {
		dynamic_sidebar('sidebar-home');
	} 
	if (is_active_sidebar('sidebar-1')) {
		dynamic_sidebar('sidebar-1');
	}
	if (is_active_sidebar('sidebar-page') && !is_front_page()) {
		dynamic_sidebar('sidebar-page');
	}
	echo '</div>';
}
	get_footer(); 
	?>
