<?php get_header(); ?>
	<div id="primary" class="content-area <?php echo esc_attr((is_active_sidebar('sidebar-home')) ? 'col-md-8' : 'col-md-12'); ?>">
	<div class="container">
		<main id="main" class="site-main homepage">
        <?php if (!get_theme_mod('idaho_search_home', true)) : ?>
			<div class="row d-print-none">
				<div class="col col-md-offset-2">
                	<?php get_search_form(); ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="finder">
			<?php 
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					the_content();
					wp_link_pages(array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'webmaster-bs4'),
						'after'  => '</div>',
					));
				}
			} else {
				echo "Sorry, no content found!";
			}
			?>
			</div>
		</main>
		</div>
	</div>
	<?php if (is_active_sidebar('sidebar-home')) : ?>
		<div class="sidebar-home"><?php dynamic_sidebar('sidebar-home'); ?></div>
	<?php endif; get_footer(); ?>
