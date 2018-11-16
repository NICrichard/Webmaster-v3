<?php
/**
 * Template part for displaying over medium header text.
 *
 */
?>
<div class="brand-text">
	<p class="site-description 
	<?php
		if (get_theme_mod('idaho_black_logo', true)) {
			echo ' black blk-shadow">';
		} else {
			echo ' heading-sm shadow">';
		}
		?>
	<?php bloginfo('description'); ?></p>
	<?php if (is_front_page() && is_home()) : ?>
		<h1 class="display-4 
		<?php
		if (get_theme_mod('idaho_black_logo', true)) {
			echo ' black blk-shadow">';
		} else {
			echo ' site-title shadow">';
		}
		?>
		<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
	<?php else : ?>
		<p class="h1 
		<?php
		if (get_theme_mod('idaho_black_logo', true)) {
			echo ' black blk-shadow">';
		} else {
			echo ' site-title shadow">';
		}
		?>
		<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
	<?php endif; ?>
</div>
