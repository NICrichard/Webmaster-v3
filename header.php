<?php $theme_dir = get_template_directory_uri() . '/img/social-img.jpg'; $show_search = (bool)true; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="author" content="State of Idaho">
	<meta name="description" content="<?php echo esc_attr(get_theme_mod('idaho_site_desc', '')); ?>">
	<meta itemprop="description" content="<?php echo esc_attr(get_theme_mod('idaho_site_desc', '')); ?>">
	<meta itemprop="image" content="<?php echo wp_get_attachment_url(get_theme_mod('idaho_site_img', $theme_dir)); ?>">
	<meta name="twitter:card" content="<?php echo esc_attr(get_theme_mod('idaho_site_desc', '')); ?>">
	<meta name="twitter:site" content="<?php if (get_theme_mod('idaho_twitter') == '') { echo '@IDAHOgov'; } else { echo esc_attr(get_theme_mod('idaho_twitter', '@IDAHOgov')); } ?>">
	<meta name="twitter:title" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr(get_theme_mod('idaho_site_desc', '')); ?>">
	<meta name="twitter:creator" content="<?php if (get_theme_mod('idaho_twitter') == '') { echo '@IDAHOgov'; } else { echo esc_attr(get_theme_mod('idaho_twitter', '@IDAHOgov')); } ?>">
	<meta name="twitter:image:src" content="<?php echo wp_get_attachment_url(get_theme_mod('idaho_site_img', $theme_dir)); ?>">
	<meta property="og:title" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
	<meta property="og:description" content="<?php echo esc_attr(get_theme_mod('idaho_site_desc', '')); ?>">
	<meta property="og:site_name" content="<?php echo get_the_title(); ?>">
	<meta property="og:image" content="<?php echo wp_get_attachment_url(get_theme_mod('idaho_site_img', $theme_dir)); ?>">
	<meta property=”og:image:width” content=”1200px”>
	<meta property=”og:image:height” content=”900px”>
	<meta property="og:type" content="website">
	<meta property="og:locale" content="en_US">
	<meta name="DCTERMS.title" content="<?php echo get_the_title(); ?>">
	<meta name="DCTERMS.subject" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
	<meta name="DCTERMS.description" content="<?php echo esc_attr(get_theme_mod('idaho_site_desc', '')); ?>">
	<meta name="DCTERMS.creator" content="State of Idaho">
	<meta name="DCTERMS.created" content="<?php echo esc_attr(get_the_time('Y-m-d\TH:i:s')); ?>">
	<meta name="DCTERMS.modified" content="<?php echo esc_attr(the_modified_date('Y-m-d\TH:i:s', '', '', false)); ?>">
	<meta name="DCTERMS.language" content="EN">
	<meta name="DCTERMS.publisher" content="State of Idaho">
	<meta name="DCTERMS.format" content="text/html">
	<?php wp_head(); ?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon-16x16.png">
	<link rel="shortcut icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/favicon.ico">
	<link rel="manifest" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/site.webmanifest">
	<link rel="mask-icon" href="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Rubik:300,300i,500" rel="stylesheet">
</head>
<body <?php body_class(); ?> id="site-body">
	<!--[if lt IE 10]>
  	<div class="alert alert-warning alert-dismissible" role="alert">
  		<button class="btn btn-primary close" aria-hidden="true" data-dismiss="alert" type="button" aria-label="close">×</button>
  		<strong>You're using an unsupported version of Internet Explorer, and this site's functionality is greatly reduced.</strong>
  		<p><a href="https://support.microsoft.com/en-us/help/17621" target="_blank" rel="noopener noreferrer" class="alert-link">Upgrade Internet Explorer</a> or install a <a href="https://browsehappy.com" target="_blank" rel="noopener noreferrer" class="alert-link">modern browser</a>, or contact your system administrator.</p>
  	</div>
	<![endif]-->
	<div class="content-wrapper">
	<a href="#main" class="skip-link">Skip to main content</a>
	<div class="top-navigation d-print-none">
		<div class="row">
			<div class="hidden-xs col-md-6"><img class="img-fluid idaho-logo" src="<?php echo get_template_directory_uri(); ?>/img/idaho.svg" alt="Idaho" width="50px"/> Official Government Website</div>
			<div class="col-xs-11 col-sm-11 col-md-5"><?php idaho_webmaster_bs_nav_top(); ?></div>
			<div class="hidden-xs visible-md col-md-1 pull-right"><i class="fas fa-plus-square" onclick="resizeText(1)"></i> | <i class="fas fa-minus-square" onclick="resizeText(-1)"></i></div>
		</div>
	</div>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" itemscope itemtype="https://schema.org/Organization">
			<div class="site-branding header-background">
				<div class="container">
					<div class="row align-items-center d-flex">
						<div class="col-xs-12 col-sm-3 col-md-3">
							<a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" class="img-fluid logo" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
								<img itemprop="logo" <?php if (get_theme_mod('idaho_black_logo') === '') { ?> src="<?php echo esc_url(get_stylesheet_directory_uri() . '/img/logo' . ((get_theme_mod('idaho_black_logo', true)) ? '' : '-white') . '.svg'); ?>"<?php } else { ?> src="<?php echo esc_url(get_theme_mod('idaho_logo', get_stylesheet_directory_uri() . '/img/logo.svg')); ?>" <?php }	?> alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="img-responsive logo-col <?php if (get_theme_mod('idaho_black_logo', true)) { echo 'blk-shadow">'; } else { echo 'shadow">'; } ?></a><br>
                                <strong class="agency <?php if (get_theme_mod('idaho_black_logo', true)) { echo 'black blk-shadow">'; } else { echo 'site-title shadow">'; } bloginfo('name'); ?></strong>	
						</div>
						<div class="hidden-xs visible-md col-sm-9 col-md-4 agency-logo">
							<?php if (get_theme_mod('agency_logo') !== '') {
								echo '<img class="img-responsive" src="' . esc_url(get_theme_mod("agency_logo")) . '" alt="agency logo">';
							} ?>
						</div>
						<div class="hidden-sm col-md-4 d-print-none">
							<div class="search-form">
								<?php if (!get_theme_mod('idaho_search_header', false)) { get_search_form(); } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			if (get_theme_mod('idaho_gcs_id') === '' || get_theme_mod('idaho_gcs_id') == NULL) {
				$show_search = (bool)false;
			}
			if (get_theme_mod('idaho_search_header', false)) {
				$show_search = (bool)false;
			}
			?>
			<div class="bg-light">
				<nav class="navbar navbar-expand-lg" role="navigation">
					<div class="container">
						<div class="d-lg-none">
							<button type="button" class="navbar-toggler btn-light" data-toggle="collapse" data-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation" <?php if ($show_search == true) { echo "style='position:absolute;'"; } ?>><span class="sr-only">Toggle navigation</span><i class="fas fa-bars"></i></button>
							<?php if ($show_search === true) { ?>
								<button type="button" class="navbar-search btn-light" data-toggle="collapse" data-target="#search-collapse" aria-controls="search-collapse" aria-expanded="false" aria-label="Toggle search"><span class="sr-only">Toggle search</span><i class="fas fa-search"></i></button>
							<?php } ?>
						</div>
						<?php if ($show_search === true) { ?>
									<div class="collapse" id="search-collapse">
										<div class="d-block d-lg-none d-print-none" aria-label="search">
											<?php get_search_form(); ?>
										</div>
									</div>
						<?php } idaho_webmaster_bootstrap_nav(); ?>
					</div>
				</nav>
			</div>
		</header>
		<div class="site-content">
			<?php if (is_front_page() || is_404()) {} else { ?>
			<div class="container">
				<div class="row"><nav aria-label="breadcrumbs"><?php
					if ('on' !== get_post_meta(get_the_ID(), '_idaho_breadcrumbs', 'off')) {
						bootstrap_breadcrumb();
					}
				?></nav></div>
			</div>
			<?php } ?>
			
				
