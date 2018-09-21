<?php
/**
 * Template part for displaying large header.
 *
 */
?>

<div class="brand-text">
	<?php if (is_front_page() && is_home()) : ?>
		<h1 class="site-title heading-lg shadow"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
	<?php else : ?>
		<p class="h1 site-title heading-lg shadow"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
	<?php endif; ?>
</div>
