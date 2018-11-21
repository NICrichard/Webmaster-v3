<?php
add_shortcode('recent-posts', 'idaho_webmaster_recent_posts_func');
if (!function_exists('idaho_webmaster_recent_posts_func')) :
	function idaho_webmaster_recent_posts_func($atts, $content = '') {
		$html = (string) '<div class="shortcode_recent-posts"><div class="list-group">';
		$params = (array) shortcode_atts(array(
			'heading' 		=> 'h4',
      'limit'       => 5
		), $atts);

		$args = array(
			'numberposts' => (int) $params['limit'],
			'post_status' => 'publish',
		);

		$recent_posts = wp_get_recent_posts($args);
    $loop_count = 0;
		foreach ($recent_posts as $recent) {
      $loop_count++;
      $content = (string) '';
      
      if ($loop_count === 1 ) {
        $content = sprintf('<p class="list-group-item">%1$s</p>', wp_trim_words($recent['post_content'], 40));
      }
      
			$html .= sprintf('
				<a href="%1$s" class="list-group-item">
          <%4$s class="list-group-item active">%2$s</%4$s>
          %3$s
        </a>',
        get_permalink($recent['ID']),
				esc_attr($recent['post_title']),
				$content,
				tag_escape($params['heading'])
			);
		}

		return $html . '</div><a href="' . get_permalink(get_option('page_for_posts')) . '" class="btn btn-default btn-block">View all posts.</a></div>';
	};
endif;