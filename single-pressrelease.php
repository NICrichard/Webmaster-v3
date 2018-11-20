<?php get_header(); ?>
<div id="content" class="container">
<div class="row">
	<main id="main" class="site-main <?php if (is_active_sidebar('sidebar-1') || is_active_sidebar('sidebar-page')) { echo 'col-lg-9'; } else { echo 'col'; }?>" role="main">
	<?php 
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			echo '<div class="pr"><div class="row">';
			echo '<h2 class="pr-title col-12">' . get_the_title() . '</h2>';
			$post_date = get_the_date('l F j, Y');
			echo '<em class="pr-date col-12">' . $post_date . '</em>';
			echo '<p class="col-12">' . get_the_content() . '</p>';
			echo '</div></div>';
		}
		wp_reset_postdata();
	} else {
		esc_html_e('No press releases currently found!', 'webmaster-bs4');
	}
	?>
	</main>
	<?php 
	if (is_active_sidebar('sidebar-1') || is_active_sidebar('sidebar-page')) {
	echo '<div class="sidebars col-lg-3">';
	 if (is_active_sidebar('sidebar-1')) {
		dynamic_sidebar('sidebar-1');
	}
	if (is_active_sidebar('sidebar-page')) {
		dynamic_sidebar('sidebar-page');
	}
	echo '</div>';
}
echo '</div>';
	get_footer(); 
	?>