<?php
function bootstrap_breadcrumb() {
    echo '<ol class="breadcrumb">';
    if (!is_home()) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_option('home');
        echo '">';
        echo '<i class="fas fa-home"></i>';
        echo "</a></li>";
        if (is_category() || is_single()) {
            if (is_single()) {
				if (get_post_type() != 'post') {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->labels->menu_name;
					echo "</li><li class='breadcrumb-item'>" . $slug . "</li>";
				} else {
                    $cat = get_the_category();
					echo "</li><li class='breadcrumb-item'>" . $cat[0]->name . "</li>";
				}
                echo "<li class='breadcrumb-item active'>";
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li class="breadcrumb-item">';
            echo the_title();
            echo '</li>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li class='breadcrumb-item'>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li class='breadcrumb-item'>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li class='breadcrumb-item'>Search Results"; echo'</li>';}
    echo '</ol>';
}
?>