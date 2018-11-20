<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<header class="entry-header card-header">
        <?php 
        the_title(sprintf('<h4 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); 
        if ('post' === get_post_type()) : 
        ?>
		<div class="entry-meta">
			<?php idaho_webmaster_posted_on(); ?>
		</div>
		<?php endif; ?>
	</header>
	<div class="card-body">
		<div class="card-img-top">
			<?php the_post_thumbnail('panel-image', array('class' => 'visible-md visible-lg')); ?>
			<?php the_post_thumbnail(array(150, 150), array('class' => 'hidden-md hidden-lg')); ?>
		</div>
		<?php
			the_content(sprintf(
				wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'webmaster-bs4'), array('span' => array( 'class' => array()))),
				the_title('<span class="screen-reader-text">"', '"</span>', false)
			));
			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'webmaster-bs4'),
				'after'  => '</div>',
			));
		?>
	</div>
	<footer class="entry-footer card-footer text-muted">
		<?php idaho_webmaster_entry_footer(); ?>
	</footer>
</article>
