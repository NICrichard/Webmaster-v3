<?php
/**
 * Events List Widget Template
 * 
 */
if (!defined('ABSPATH')) { die('-1'); }
$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();
$posts = tribe_get_list_widget_events();
if ($posts) : 
?>
	<div class="tribe-list-widget">
		<?php foreach ($posts as $post) : setup_postdata($post); ?>
			<div class="col d-flex tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">
				<div class="col-4 tribe-event-duration"><?php echo tribe_get_start_date($post, false); ?></div>
				<div class="col-8 tribe-event-title">
					<span class="cal-title"><a href="<?php echo esc_url(tribe_get_event_link()); ?>" rel="bookmark"><?php the_title(); ?></a></span>
			        <?php if(tribe_get_start_time()) { ?><small class="event-time"><?php echo tribe_get_start_time(); ?> - <?php echo tribe_get_end_time(); ?></small><?php } ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php else : ?>
	<p><?php printf(esc_html__('There are no upcoming %s at this time.', 'the-events-calendar'), $events_label_plural_lowercase); ?></p>
<?php endif;
