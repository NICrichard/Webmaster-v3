<?php get_header(); 
if (is_front_page()) { ?>
<div class="row slider">
	<div id="idahoSlider" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php
		$c = 0;
		$sr = get_posts(array('post_type' => 'slider', 'posts_per_page' => 5));
		foreach($sr as $s) {
			echo '<li data-target="#idahoSlider" data-slide-to="'. $c . '"';
			if ($c == 0) {
				echo ' class="active"';
			}
			echo '></li>';
			$c++;
		}
		?>
		</ol>
		<div class="carousel-inner" role="listbox">
			<?php 
			$slider = get_posts(array('post_type' => 'slider', 'posts_per_page' => 5));
			$count = 0;
			foreach($slider as $slide) {
				$link = get_post_meta($slide->ID, 'link', true);
			?>
			<div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($slide->ID)); ?>')">
				<?php if ($link !== '') { ?>
				<a href="<?php echo $link; ?>" target="_blank">
					<?php } ?>
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($slide->ID)); ?>" class="d-block img-responsive">
					<?php if ($link !== '') { ?>
				</a>
				<?php } ?>
				<?php if (($slide->post_title !== '') || ($slide->post_content !== '')) { ?>
				<div class="carousel-caption d-xs-block">
					<div class="animated fadeInDown">
						<h4 class="h4-responsive">
							<?php echo esc_html($slide->post_title); ?>
						</h4>
						<p>
							<?php echo esc_html($slide->post_content); ?>
						</p>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php 
			$count++; 
			}
			?>
		</div>
		<?php if ($count > 1) { ?>
		<a class="carousel-control-prev" href="#idahoSlider" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#idahoSlider" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<?php } ?>
	</div>
</div>
<?php } ?>
<div id="content" class="container">
	<div class="row">
		<div id="primary" class="<?php if ((is_active_sidebar('sidebar-home') && is_front_page()) || is_active_sidebar('sidebar-1') || (is_active_sidebar('sidebar-page') && !is_front_page())) { echo 'col-xs-12 col-md-8 col-lg-9'; } else { echo 'col'; }?>">
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
		echo '<div class="sidebars col-xs-12 col-md-2 col-lg-3">';
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