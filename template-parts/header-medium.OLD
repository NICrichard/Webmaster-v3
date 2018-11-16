<?php
/**
 * Template part for displaying medium header.
 *
 */
?>
<div class="brand-text">
	<?php if (is_front_page() && is_home()) : ?>
		<h1 class="site-title display-4 
		<?php
		if (get_theme_mod('idaho_black_logo', true)) {
			echo ' black blk-shadow">';
		} else {
			echo ' shadow">';
		}
		?>
		<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?><br><?php bloginfo('description'); ?></a></h1>
	<?php else : ?>
		<p class="h5 site-title 
		<?php
		if (get_theme_mod('idaho_black_logo', true)) {
			echo ' black blk-shadow">';
		} else {
			echo ' shadow">';
		}
		?>
		<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?><br><?php bloginfo('description'); ?></a></p>
	<?php endif; ?>
</div>
