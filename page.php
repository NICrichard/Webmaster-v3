<?php get_header(); ?>
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
