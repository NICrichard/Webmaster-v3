<?php 
get_header(); 
$args = array(
    'post_type'     => 'pressrelease',
	'post_status'   => 'publish',
	'posts_per_page'=> -1
);
$pr = new WP_Query($args);
?>
	<div id="content" class="container">
<div class="row">
		<main id="main" class="site-main <?php if (is_active_sidebar('sidebar-1') || is_active_sidebar('sidebar-page')) { echo 'col-lg-9'; } else { echo 'col'; }?>" role="main">
		<?php 
		if ($pr->have_posts()) : ?>
			<header class="page-header"><h1 class="page-title">Press Releases</h1></header>
			<?php 
			$prev_month = '';
			while ($pr->have_posts()): $pr->the_post();
			?>
			<div class="card border-secondary">
				<div class="card-header"><a href="<?php echo the_permalink(get_the_ID()); ?>"><?php echo the_title(); ?></a></div>
				<div class="card-body">
					<em class="card-title"><?php echo get_the_date(); ?></em>
					<p class="card-text"><?php echo the_excerpt(); ?></p>
				</div>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
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