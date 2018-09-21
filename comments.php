<?php
/**
 * The template for displaying comments.
 *
 */

if (post_password_required()) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if (have_comments()) : ?>
		<h3 class="comments-title">
			<?php
				printf(
					esc_html(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'webmaster-bs4')),
					number_format_i18n(get_comments_number()),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3>
		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'webmaster-bs4'); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'webmaster-bs4')); ?></div>
				<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'webmaster-bs4')); ?></div>
			</div>
		</nav>
		<?php endif; ?>
		<ul class="media-list">
			<?php wp_list_comments( array( 'callback' => 'idaho_webmaster_comments' ) ); ?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'webmaster-bs4' ); ?></h2>
			<div class="nav-links">
				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'webmaster-bs4' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'webmaster-bs4' ) ); ?></div>
			</div>
		</nav>
		<?php 
			endif;
	 	endif;
	if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'webmaster-bs4' ); ?></p>
	<?php endif; comment_form(); ?>
</div>
