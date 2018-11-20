  <?php
  $idaho_webmaster_color_primary 	 = substr(get_theme_mod('idaho_color_ui_blue', '#789dbf'), 1); // idaho
  $idaho_webmaster_color_secondary = substr(get_theme_mod('idaho_color_light_blue', '#003459'), 1); // usa
  ?>
  </div>
</div>
<?php
if (is_front_page() && is_active_sidebar('event-bar')) {
?>
  <div class="event-area">
    <div class="container">
      <div class="row">
        <div class="col"><?php dynamic_sidebar('event-bar'); ?></div>
      </div>
    </div>
  </div>
<?php
}
?>
<footer id="colophon" class="site-footer d-print-none">
	<div class="container">
		<div class="row footer-navigation">
			<div class="col-sm-3 hidden-xs" id="usa-map">
				<img src="<?php echo get_template_directory_uri(); ?>/img/inline-map.svg.php?primary=<?php echo esc_attr($idaho_webmaster_color_primary); ?>&amp;secondary=<?php echo esc_attr($idaho_webmaster_color_secondary); ?>" alt="Map of the USA" class="img-responsive">
			</div>
			<?php get_template_part('template-parts/footer', get_theme_mod('idaho_footer_layout', '5col')); ?>
      <div class="col-xs-12 col-sm-3 footer-widget" aria-label="social-media">
          <?php
          if (get_theme_mod('idaho_fb') != '') {
              echo '<a class="no-icon-link social" href="https://facebook.com/' . esc_attr(get_theme_mod('idaho_fb')) . '" target="_blank" rel="noopener noreferrer"><i class="fab fa-2x fa-facebook-square"></i><span class="sr-only">Facebook Icon</span></a>';
          }
          if (get_theme_mod('idaho_twitter') != '') {
            echo '<a class="no-icon-link social" href="https://twitter.com/' . esc_attr(get_theme_mod('idaho_twitter')) . '" target="_blank" rel="noopener noreferrer"><i class="fab fa-2x fa-twitter-square"></i><span class="sr-only">Twitter Icon</span></a>';
          }
          if (get_theme_mod('idaho_instagram') != '') {
            echo '<a class="no-icon-link social" href="https://instagram.com/' . esc_attr(get_theme_mod('idaho_instagram')) . '" target="_blank" rel="noopener noreferrer"><i class="fab fa-2x fa-instagram"></i><span class="sr-only">Instagram Icon</span></a>';
          }
          if (get_theme_mod('idaho_flickr') != '') {
            echo '<a class="no-icon-link social" href="https://flickr.com/photos/' . esc_attr(get_theme_mod('idaho_flickr')) . '" target="_blank" rel="noopener noreferrer"><i class="fab fa-2x fa-flickr"></i><span class="sr-only">Flickr Icon</span></a>';
          }
          if (get_theme_mod('idaho_youtube') != '') {
            echo '<a class="no-icon-link social" href="https://youtube.com/' . esc_attr(get_theme_mod('idaho_youtube')) . '" target="_blank" rel="noopener noreferrer"><i class="fab fa-2x fa-youtube-square"></i><span class="sr-only">YouTube Icon</span></a>';
          }
          if (get_theme_mod('idaho_feed') != '') {
            echo '<a class="no-icon-link social" href="';
            echo site_url();
            echo '/feed/rss/" target="_blank" rel="noopener noreferrer"><i class="fas fa-2x fa-rss-square"></i><span class="sr-only">RSS Feed Icon</span></a>';
          }
          if (get_theme_mod('idaho_email') != '') {
            echo '<a class="no-icon-link social" href="mailto:' . esc_attr(get_theme_mod('idaho_email')) . '"><i class="fas fa-2x fa-envelope-square"></i><span class="sr-only">Envelope Icon</span></a>';
          }
          ?>
      </div>
		</div>
    <div class="row">
    <div class="footer-links mx-auto align-middle" aira-label="State of Idaho required links">
      <a href="https://idaho.gov" target="_blank" rel="noopener noreferrer">Idaho.gov</a> | <a href="https://idaho.gov/about-us/accessibility/" target="_blank" rel="noopener noreferrer">Accessibility</a> | <a href="https://cybersecurity.idaho.gov/" target="_blank">Cybersecurity</a> | <a href="https://idaho.gov/about-us/privacy-policy/" target="_blank" rel="noopener noreferrer">Privacy</a> | <a href="https://idaho.gov/about-us/security-policy/" target="_blank" rel="noopener noreferrer">Security</a>
    </div>
  </div>
	</div>
</footer>
</div>
</div>
</div>
<?php if (get_theme_mod('idaho_google_analytics', '') !== '') { ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '<?php echo esc_attr(get_theme_mod('idaho_google_analytics', '')); ?>', 'auto');
    ga('send', 'pageview');
  </script>
<?php }
wp_footer();
?>
</body>
</html>
