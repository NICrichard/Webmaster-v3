<?php get_header(); ?>
	<section id="primary" class="content-area col">
		<main id="main" class="site-main" role="main">
		<script>
        (function() {
            var cx = '<?php echo esc_attr(get_theme_mod('idaho_gcs_id', '')); ?>';
            var gcse = document.createElement('script');
            gcse.type = 'text/javascript';
            gcse.async = true;
            gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(gcse, s);
        })();
        </script>
<gcse:search enableAutoComplete="true"></gcse:search>
		</main>
	</section>
<?php get_footer(); ?>
