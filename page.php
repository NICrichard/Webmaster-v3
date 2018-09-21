<?php get_header(); ?>
	<div id="primary" class="col">
		<main id="main" class="site-main" tabindex="-1">
			<?php
			while (have_posts()) : the_post();
				get_template_part('template-parts/content', 'page');
			endwhile;
			?>
		</main>
	</div>
<?php get_footer(); ?>
