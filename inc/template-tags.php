<?php
if (!function_exists('idaho_webmaster_active')) :
	function idaho_webmaster_active($condition) {
		return ($condition) ? 'active' : '';
	}
endif;

if (!function_exists('idaho_webmaster_posted_on')) :
	function idaho_webmaster_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf($time_string,
			esc_attr(get_the_date('c')),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date('c')),
			esc_html(get_the_modified_date())
		);
		$posted_on = sprintf(
			esc_html_x('Posted on %s', 'post date', 'webmaster-bs4'),
			'<a class="no-icon-link" href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);
		/*
		$byline = sprintf(
			esc_html_x('by %s', 'post author', 'webmaster-bs4'),
			'<span class="author vcard"><a class="url fn n no-icon-link" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		)*/
		echo '<span class="posted-on">' . $posted_on . '</span>';
	}
endif;

if (!function_exists('idaho_webmaster_entry_footer')) :
	function idaho_webmaster_entry_footer() {
		if ('post' === get_post_type()) {
			$categories_list = get_the_category_list(esc_html__(', ', 'webmaster-bs4'));
			if ( $categories_list && idaho_webmaster_categorized_blog()) {
				printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'webmaster-bs4') . '</span>', $categories_list); 
			}

			$tags_list = get_the_tag_list('', esc_html__(', ', 'webmaster-bs4'));
			if ($tags_list) {
				printf('<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'webmaster-bs4' ) . '</span>', $tags_list);
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(esc_html__('Leave a comment', 'webmaster-bs4'), esc_html__('1 Comment', 'webmaster-bs4'), esc_html__('% Comments', 'webmaster-bs4'));
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				esc_html__('Edit %s', 'webmaster-bs4'),
				the_title('<span class="screen-reader-text">"', '"</span>', false)
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

function idaho_webmaster_categorized_blog() {
	if (false === ($all_the_cool_cats = get_transient( 'idaho_webmaster_categories' ) ) ) {
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2,
		) );
		$all_the_cool_cats = count( $all_the_cool_cats );
		set_transient( 'idaho_webmaster_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		return true;
	} else {
		return false;
	}
}

if (!function_exists('idaho_webmaster_post_thumbnail')) {
	function idaho_webmaster_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) :
		?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->
		<?php else : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => 'img-responsive' ) ); ?>
		</a>
	<?php endif; // End is_singular().
	}
}

function idaho_webmaster_category_transient_flusher() {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	delete_transient('idaho_webmaster_categories');
}
add_action('edit_category', 'idaho_webmaster_category_transient_flusher');
add_action('save_post',     'idaho_webmaster_category_transient_flusher');
