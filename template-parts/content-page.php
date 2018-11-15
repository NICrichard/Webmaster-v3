<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (get_post_meta(get_the_ID(), 'hide_title', true) !== 'yes') : ?>
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</header>
	<?php endif; ?>
	<div class="entry-content">
        <?php 
            the_content(); 
			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'webmaster-bs4'),
				'after'  => '</div>',
			));
		?>
	</div>
	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					esc_html__('Edit %s', 'webmaster-bs4'),
					the_title('<span class="screen-reader-text">"', '"</span>', false)
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer>
</article>
